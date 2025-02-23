<?php
namespace Opencart\Catalog\Model\Extension\PsLiveSearch\Module;
/**
 * Class PsLiveSearch
 *
 * @package Opencart\Catalog\Model\Extension\PsLiveSearch\Module
 */
class PsLiveSearch extends \Opencart\System\Engine\Model
{
    /**
     * @param array $args
     *
     * @return array
     */
    public function replaceSearchViews(array $args): array
    {
        $views = [];

        $views[] = [
            'search' => '<div id="search" class="',
            'replace' => '<div id="search" class="ps-live-search-container '
        ];

        $views[] = [
            'search' => '<input type="text" name="search"',
            'replace' => '<input type="text" name="search" id="ps-live-search-input" data-live-search-target="ps-live-search"'
        ];

        $views[] = [
            'search' => '</i></button>',
            'replace' => <<<HTML
            </i></button>
            <ul id="ps-live-search" class="ps-live-search-list" data-lang="{{ language }}"></ul>
            <script>
                $('#ps-live-search-input').pslivesearch({
                    'source': function (request, response) {
                        $.ajax({
                            url: 'index.php?route=extension/ps_live_search/module/ps_live_search{{ oc4_separator }}autocomplete&search=' + encodeURIComponent(request),
                            dataType: 'json',
                            success: function (json) {
                                response(json);
                            }
                        });
                    },
                    'select': function (item) {
                        $('#ps-live-search-input').val(request);
                    },
                    'translations': {
                        'heading_products': '{{ heading_products }}',
                        'heading_categories': '{{ heading_categories }}',
                        'heading_manufacturers': '{{ heading_manufacturers }}',
                        'heading_informations': '{{ heading_informations }}',
                        'text_showing_results': '{{ text_showing_results }}',
                        'text_all_product_results': '{{ text_all_product_results }}',
                        'text_no_results': '{{ text_no_results }}',
                    },
                    'options': {
                        'input_delay': {{ input_delay | default(100) }},
                        'input_min_chars': {{ input_min_chars | default(1) }}
                    }
                });
            </script>
            HTML
        ];

        return $views;
    }

    /**
     * @param string $search
     *
     * @return array
     */
    public function getProducts(string $search): array
    {
        if (version_compare(VERSION, '4.1.0.0', '>=')) {
            $special_query = "(SELECT (CASE WHEN `ps`.`type` = 'P' THEN (`ps`.`price` * (`p`.`price` / 100)) WHEN `ps`.`type` = 'S' THEN (`p`.`price` - `ps`.`price`) ELSE `ps`.`price` END) FROM `" . DB_PREFIX . "product_discount` `ps` WHERE `ps`.`product_id` = `p`.`product_id` AND `ps`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND `ps`.`quantity` = '1' AND `ps`.`special` = '1' AND ((`ps`.`date_start` = '0000-00-00' OR `ps`.`date_start` < NOW()) AND (`ps`.`date_end` = '0000-00-00' OR `ps`.`date_end` > NOW())) ORDER BY `ps`.`priority` ASC, `ps`.`price` ASC LIMIT 1) AS `special`";
        } else {
            $special_query = "(SELECT ps.`price` FROM `" . DB_PREFIX . "product_special` ps WHERE ps.`product_id` = `p`.`product_id` AND ps.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND ((ps.`date_start` = '0000-00-00' OR ps.`date_start` < NOW()) AND (ps.`date_end` = '0000-00-00' OR ps.`date_end` > NOW())) ORDER BY ps.`priority` ASC, ps.`price` ASC LIMIT 1) AS `special`";
        }

        $sql = "SELECT
            p.`product_id`,
            p.`image`,
            p.`tax_class_id`,
            pd.`name`,
            pd.`description`,
            p.`price`,
            " . $special_query . "
        FROM `" . DB_PREFIX . "product` p
        LEFT JOIN `" . DB_PREFIX . "product_description` pd ON (p.`product_id` = pd.`product_id`)
        LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`p2s`.`product_id` = p.`product_id`)
        WHERE pd.`language_id` = '" . (int) $this->config->get('config_language_id') . "' AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND p.`status` = '1'";

        $query = [];

        $words = explode(' ', trim(preg_replace('/\s+/', ' ', $search)));

        $words = array_filter($words);

        foreach ($words as $word) {
            if (strlen($word) < 2) {
                continue;
            }

            $query[] = "`pd`.`name` LIKE '" . $this->db->escape('%' . $word . '%') . "'";

            $query[] = "pd.`tag` LIKE '" . $this->db->escape('%' . $word . '%') . "'";
        }

        $query[] = "LCASE(`p`.`model`) = '" . $this->db->escape($this->_strtolower($search)) . "'";
        $query[] = "LCASE(`p`.`sku`) = '" . $this->db->escape($this->_strtolower($search)) . "'";
        $query[] = "LCASE(`p`.`upc`) = '" . $this->db->escape($this->_strtolower($search)) . "'";
        $query[] = "LCASE(`p`.`ean`) = '" . $this->db->escape($this->_strtolower($search)) . "'";
        $query[] = "LCASE(`p`.`jan`) = '" . $this->db->escape($this->_strtolower($search)) . "'";
        $query[] = "LCASE(`p`.`isbn`) = '" . $this->db->escape($this->_strtolower($search)) . "'";
        $query[] = "LCASE(`p`.`mpn`) = '" . $this->db->escape($this->_strtolower($search)) . "'";

        $sql .= " AND (" . implode(" OR ", $query) . ")";

        $sql .= " ORDER BY p.`sort_order` ASC, LCASE(`pd`.`name`) ASC LIMIT 0,5";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * @param string $search
     *
     * @return array
     */
    public function getCategories(string $search): array
    {
        $sql = "SELECT
                DISTINCT c.`category_id`,
                (SELECT GROUP_CONCAT(cd1.`name` ORDER BY `level` SEPARATOR ' > ') FROM `" . DB_PREFIX . "category_path` cp LEFT JOIN `" . DB_PREFIX . "category_description` cd1 ON (cp.`path_id` = cd1.`category_id` AND cp. `category_id` != cp.`path_id`) WHERE cp.`category_id` = c.`category_id` AND cd1.`language_id` = '" . (int) $this->config->get('config_language_id') . "' GROUP BY cp.`category_id`) AS `names`,
                (SELECT GROUP_CONCAT(cd1.`category_id` ORDER BY `level` SEPARATOR '_') FROM `" . DB_PREFIX . "category_path` cp LEFT JOIN `" . DB_PREFIX . "category_description` cd1 ON (cp.`path_id` = cd1.`category_id` AND cp. `category_id` != cp.`path_id`) WHERE cp.`category_id` = c.`category_id` AND cd1.`language_id` = '" . (int) $this->config->get('config_language_id') . "' GROUP BY cp.`category_id`) AS `paths`,
                cd2.`name`,
                c.`image`
            FROM `" . DB_PREFIX . "category` c
            LEFT JOIN `" . DB_PREFIX . "category_description` cd2 ON (c.`category_id` = cd2.`category_id`)
            LEFT JOIN `" . DB_PREFIX . "category_to_store` c2s ON (c.`category_id` = c2s.`category_id`)
            WHERE cd2.`language_id` = '" . (int) $this->config->get('config_language_id') . "' AND c2s.`store_id` = '" . (int) $this->config->get('config_store_id') . "'  AND c.`status` = '1'";

        $query = [];

        $query[] = "cd2.`name` LIKE '" . $this->db->escape($search . '%') . "'";

        $sql .= " AND (" . implode(" OR ", $query) . ")";

        $sql .= " ORDER BY c.`sort_order` ASC, LCASE(cd2.`name`) ASC LIMIT 0,5";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * @param string $search
     *
     * @return array
     */
    public function getManufacturers(string $search): array
    {
        $sql = "SELECT m.`manufacturer_id`, m.`name`, m.`image` FROM `" . DB_PREFIX . "manufacturer` m
        LEFT JOIN `" . DB_PREFIX . "manufacturer_to_store` m2s ON (m.`manufacturer_id` = m2s.`manufacturer_id`)
        WHERE m2s.`store_id` = '" . (int) $this->config->get('config_store_id') . "'";

        $query = [];

        $query[] = "m.`name` LIKE '" . $this->db->escape($search . '%') . "'";

        $sql .= " AND (" . implode(" OR ", $query) . ")";

        $sql .= " ORDER BY m.`sort_order` ASC, LCASE(m.`name`) ASC LIMIT 0,5";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * @param string $search
     *
     * @return array
     */
    public function getInformations(string $search): array
    {
        $sql = "SELECT i.`information_id`, id.`title` FROM `" . DB_PREFIX . "information` i
        LEFT JOIN `" . DB_PREFIX . "information_description` id ON (i.`information_id` = id.`information_id`)
        LEFT JOIN `" . DB_PREFIX . "information_to_store` i2s ON (i.`information_id` = i2s.`information_id`)
        WHERE id.`language_id` = '" . (int) $this->config->get('config_language_id') . "' AND i2s.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND i.`status` = '1' ";

        $query = [];

        $query[] = "id.`title` LIKE '" . $this->db->escape($search . '%') . "'";

        $sql .= " AND (" . implode(" OR ", $query) . ")";

        $sql .= " ORDER BY i.`sort_order` ASC, LCASE(id.`title`) ASC LIMIT 0,5";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * Convert a string to lowercase while ensuring compatibility across OpenCart versions.
     *
     * This method converts the provided string to lowercase using the appropriate function
     * based on the OpenCart version to ensure accurate handling of UTF-8 characters.
     *
     * - For OpenCart versions before 4.0.1.0, it uses `utf8_strtolower()`.
     * - For OpenCart versions from 4.0.1.0 up to (but not including) 4.0.2.0,
     *   it uses `\Opencart\System\Helper\Utf8\strtolower()`.
     * - For OpenCart version 4.0.2.0 and above, it uses `oc_strtolower()`.
     *
     * @param string $string The input string that is to be converted to lowercase.
     *
     * @return string The lowercase version of the input string.
     */
    private function _strtolower(string $string): string
    {
        if (version_compare(VERSION, '4.0.1.0', '<')) { // OpenCart versions before 4.0.1.0
            return utf8_strtolower($string);
        } elseif (version_compare(VERSION, '4.0.2.0', '<')) { // OpenCart version 4.0.1.0 up to, but not including, 4.0.2.0
            return \Opencart\System\Helper\Utf8\strtolower($string);
        }

        return oc_strtolower($string); // OpenCart version 4.0.2.0 and above
    }
}
