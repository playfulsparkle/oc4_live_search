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
                        'text_showing_results': '{{ text_showing_results }}',
                        'text_all_results': '{{ text_all_results }}',
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
        $sql = "SELECT
            p.`product_id`,
            p.`image`,
            p.`tax_class_id`,
            pd.`name`,
            pd.`description`,
            p.`price`,
            (SELECT ps.`price` FROM `" . DB_PREFIX . "product_special` ps WHERE ps.`product_id` = `p`.`product_id` AND ps.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND ((ps.`date_start` = '0000-00-00' OR ps.`date_start` < NOW()) AND (ps.`date_end` = '0000-00-00' OR ps.`date_end` > NOW())) ORDER BY ps.`priority` ASC, ps.`price` ASC LIMIT 1) AS `special`
        FROM `" . DB_PREFIX . "product` p
        LEFT JOIN `" . DB_PREFIX . "product_description` pd ON (p.`product_id` = pd.`product_id`)
        LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`p2s`.`product_id` = p.`product_id`)
        WHERE pd.`language_id` = '" . (int) $this->config->get('config_language_id') . "' AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND p.`status` = '1'";

        $query = [];

        $query[] = "pd.`name` LIKE '" . $this->db->escape($search . '%') . "'";
        $query[] = "pd.`tag` LIKE '" . $this->db->escape('%' . $search . '%') . "'";
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
