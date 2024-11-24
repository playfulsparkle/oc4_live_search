<?php
namespace Opencart\Catalog\Controller\Extension\PsLiveSearch\Module;
/**
 * Class PsLiveSearch
 *
 * @package Opencart\Catalog\Controller\Extension\PsLiveSearch\Module
 */
class PsLiveSearch extends \Opencart\System\Engine\Controller
{
    /**
     * Event handler for `catalog/view/common/header/before`.
     *
     * @param string $route
     * @param array $args
     * @param string $template
     *
     * @return void
     */
    public function eventCatalogViewCommonHeaderBefore(string &$route, array &$args, string &$template): void
    {
        if (!$this->config->get('module_ps_live_search_status')) {
            return;
        }

        $ps_live_search_script = 'extension/ps_live_search/catalog/view/javascript/ps_live_search.js';

        $args['scripts'][$ps_live_search_script] = ['href' => $ps_live_search_script];

        $ps_live_search_style = 'extension/ps_live_search/catalog/view/stylesheet/ps_live_search.css';

        $args['styles'][$ps_live_search_style] = [
            'href' => $ps_live_search_style,
            'rel' => 'stylesheet',
            'media' => 'screen'
        ];
    }

    /**
     * Event handler for `catalog/view/common/search/before`.
     *
     * @param string $route
     * @param array $args
     * @param string $template
     *
     * @return void
     */
    public function eventCatalogViewCommonSearchBefore(string &$route, array &$args, string &$template): void
    {
        if (!$this->config->get('module_ps_live_search_status')) {
            return;
        }

        $this->load->language('extension/ps_live_search/module/ps_live_search');

        $this->load->model('extension/ps_live_search/module/ps_live_search');

        $args['heading_products'] = $this->language->get('heading_products');
        $args['text_showing_results'] = $this->language->get('text_showing_results');
        $args['text_all_results'] = $this->language->get('text_all_results');
        $args['text_no_results'] = $this->language->get('text_no_results');

        $args['language'] = $this->config->get('config_language');
        $args['input_delay'] = (int) $this->config->get('module_ps_live_search_input_delay');
        $args['input_min_chars'] = (int) $this->config->get('module_ps_live_search_input_min_chars');

        $headerViews = $this->model_extension_ps_live_search_module_ps_live_search->replaceSearchViews($args);

        $template = $this->replaceViews($route, $template, $headerViews);
    }

    public function autocomplete()
    {
        $json = [
            'products' => [
                'status' => (bool) $this->config->get('module_ps_live_search_product_status'),
                'data' => []
            ]
        ];

        if (isset($this->request->get['search'])) {
            $search = $this->request->get['search'];
        } else {
            $search = '';
        }

        $this->load->model('extension/ps_live_search/module/ps_live_search');
        $this->load->model('tool/image');

        if ($this->config->get('module_ps_live_search_product_status')) {
            $productResults = $this->model_extension_ps_live_search_module_ps_live_search->getProducts($search);

            foreach ($productResults as $productResult) {
                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($productResult['price'], $productResult['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if ((float) $productResult['special']) {
                    $special = $this->currency->format($this->tax->calculate($productResult['special'], $productResult['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $special = false;
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format((float) $productResult['special'] ? $productResult['special'] : $productResult['price'], $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('module_ps_live_search_product_image') && is_file(DIR_IMAGE . html_entity_decode($productResult['image'], ENT_QUOTES, 'UTF-8'))) {
                    $thumb = $this->model_tool_image->resize(html_entity_decode($productResult['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('module_ps_live_search_product_image_width'), $this->config->get('module_ps_live_search_product_image_height'));
                } else {
                    $thumb = '';
                }

                if ($this->config->get('module_ps_live_search_product_description') && $this->config->get('module_ps_live_search_product_description_length') > 0) {
                    $description = $this->_substr(trim(strip_tags(html_entity_decode($productResult['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('module_ps_live_search_product_description_length')) . '..';
                } else {
                    $description = '';
                }

                $json['products']['data'][] = [
                    'href' => str_replace('&amp;', '&', $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $productResult['product_id'])),
                    'name' => strip_tags($productResult['name']),
                    'description' => $description,
                    'price' => $price,
                    'special' => $special,
                    'tax' => $tax,
                    'thumb' => $thumb,
                    'thumb_width' => $this->config->get('module_ps_live_search_product_image_width'),
                    'thumb_height' => $this->config->get('module_ps_live_search_product_image_height'),
                ];
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json, JSON_UNESCAPED_SLASHES));
    }

    /**
     * Retrieves the contents of a template file based on the provided route.
     *
     * This method checks if an event template buffer is provided. If so, it returns that buffer.
     * If not, it constructs the template file path based on the current theme settings and checks
     * for the existence of the template file. If the file exists, it reads and returns its contents.
     * It supports loading templates from both the specified theme directory and the default template directory.
     *
     * @param string $route The route for which the template is being retrieved.
     *                      This should match the naming convention for the template files.
     * @param string $event_template_buffer The template buffer that may be passed from an event.
     *                                       If provided, this buffer will be returned directly,
     *                                       bypassing file retrieval.
     *
     * @return mixed Returns the contents of the template file as a string if it exists,
     *               or false if the template file cannot be found or read.
     */
    protected function getTemplateBuffer(string $route, string $event_template_buffer): mixed
    {
        if ($event_template_buffer) {
            return $event_template_buffer;
        }

        if (defined('DIR_CATALOG')) {
            $dir_template = DIR_TEMPLATE;
        } else {
            if ($this->config->get('config_theme') == 'default') {
                $theme = $this->config->get('theme_default_directory');
            } else {
                $theme = $this->config->get('config_theme');
            }

            $dir_template = DIR_TEMPLATE . $theme . '/template/';
        }

        $template_file = $dir_template . $route . '.twig';

        if (file_exists($template_file) && is_file($template_file)) {
            $template_file = $this->modCheck($template_file);

            return file_get_contents($template_file);
        }

        if (defined('DIR_CATALOG')) {
            return false;
        }

        $dir_template = DIR_TEMPLATE . 'default/template/';
        $template_file = $dir_template . $route . '.twig';

        if (file_exists($template_file) && is_file($template_file)) {
            $template_file = $this->modCheck($template_file);

            return file_get_contents($template_file);
        }

        // Support for OC4 catalog
        $dir_template = DIR_TEMPLATE;
        $template_file = $dir_template . $route . '.twig';

        if (file_exists($template_file) && is_file($template_file)) {
            $template_file = $this->modCheck($template_file);

            return file_get_contents($template_file);
        }

        return false;
    }

    /**
     * Checks and modifies the provided file path based on predefined directory constants.
     *
     * This method checks if the file path starts with specific directory constants (`DIR_MODIFICATION`,
     * `DIR_APPLICATION`, and `DIR_SYSTEM`). Depending on these conditions, it modifies the file path to
     * point to the appropriate directory under `DIR_MODIFICATION`.
     *
     * - If the file path starts with `DIR_MODIFICATION`, it checks if it should point to either the
     *   `admin` or `catalog` directory based on the definition of `DIR_CATALOG`.
     * - If `DIR_CATALOG` is defined, the method checks for the file in the `admin` directory.
     *   Otherwise, it checks in the `catalog` directory.
     * - If the file path starts with `DIR_SYSTEM`, it checks for the file in the `system` directory
     *   within `DIR_MODIFICATION`.
     *
     * The method ensures that the returned file path exists before modifying it.
     *
     * @param string $file The original file path to check and modify.
     * @return string|null The modified file path if found, or null if it does not exist.
     */
    protected function modCheck(string $file): mixed
    {
        if (defined('DIR_MODIFICATION')) {
            if ($this->startsWith($file, DIR_MODIFICATION)) {
                if (defined('DIR_CATALOG')) {
                    if (file_exists(DIR_MODIFICATION . 'admin/' . substr($file, strlen(DIR_APPLICATION)))) {
                        $file = DIR_MODIFICATION . 'admin/' . substr($file, strlen(DIR_APPLICATION));
                    }
                } else {
                    if (file_exists(DIR_MODIFICATION . 'catalog/' . substr($file, strlen(DIR_APPLICATION)))) {
                        $file = DIR_MODIFICATION . 'catalog/' . substr($file, strlen(DIR_APPLICATION));
                    }
                }
            } elseif ($this->startsWith($file, DIR_SYSTEM)) {
                if (file_exists(DIR_MODIFICATION . 'system/' . substr($file, strlen(DIR_SYSTEM)))) {
                    $file = DIR_MODIFICATION . 'system/' . substr($file, strlen(DIR_SYSTEM));
                }
            }
        }

        return $file;
    }

    /**
     * Checks if a given string starts with a specified substring.
     *
     * This method determines if the string $haystack begins with the substring $needle.
     *
     * @param string $haystack The string to be checked.
     * @param string $needle The substring to search for at the beginning of $haystack.
     *
     * @return bool Returns true if $haystack starts with $needle; otherwise, false.
     */
    protected function startsWith(string $haystack, string $needle): bool
    {
        if (strlen($haystack) < strlen($needle)) {
            return false;
        }

        return (substr($haystack, 0, strlen($needle)) == $needle);
    }

    /**
     * Replaces specific occurrences of a substring in a string with a new substring.
     *
     * This method searches for all occurrences of a specified substring ($search) in a given string ($string)
     * and replaces the occurrences at the positions specified in the $nthPositions array with a new substring ($replace).
     *
     * @param string $search The substring to search for in the string.
     * @param string $replace The substring to replace the found occurrences with.
     * @param string $string The input string in which replacements will be made.
     * @param array $nthPositions An array of positions (1-based index) indicating which occurrences
     *                            of the search substring to replace.
     *
     * @return mixed The modified string with the specified occurrences replaced, or the original string if no matches are found.
     */
    protected function replaceNth(string $search, string $replace, string $string, array $nthPositions): mixed
    {
        $pattern = '/' . preg_quote($search, '/') . '/';
        $matches = [];
        $count = preg_match_all($pattern, $string, $matches, PREG_OFFSET_CAPTURE);

        if ($count > 0) {
            foreach ($nthPositions as $nth) {
                if ($nth > 0 && $nth <= $count) {
                    $offset = $matches[0][$nth - 1][1];
                    $string = substr_replace($string, $replace, $offset, strlen($search));
                }
            }
        }

        return $string;
    }

    /**
     * Replaces placeholders in a template with corresponding values from the views array.
     *
     * This method retrieves the template content based on the given route and template name,
     * then replaces specified search strings with their corresponding replace strings.
     * If positions are specified, the method performs replacements only at those positions.
     *
     * @param string $route The route associated with the template.
     * @param string $template The name of the template to be processed.
     * @param array $views An array of associative arrays where each associative array contains:
     *                     - string 'search': The string to search for in the template.
     *                     - string 'replace': The string to replace the 'search' string with.
     *                     - array|null 'positions': (Optional) An array of positions
     *                     where replacements should occur. If not provided,
     *                     all occurrences will be replaced.
     *
     * @return mixed The modified template content after performing the replacements.
     */
    protected function replaceViews(string $route, string $template, array $views): mixed
    {
        $output = $this->getTemplateBuffer($route, $template);

        foreach ($views as $view) {
            if (isset($view['positions']) && $view['positions']) {
                $output = $this->replaceNth($view['search'], $view['replace'], $output, $view['positions']);
            } else {
                $output = str_replace($view['search'], $view['replace'], $output);
            }
        }

        return $output;
    }

    /**
     * Get the substring of a string while ensuring compatibility across OpenCart versions.
     *
     * This method returns a substring of the provided string. It utilizes different
     * substring functions based on the OpenCart version being used to ensure
     * accurate handling of UTF-8 characters.
     *
     * - For OpenCart versions before 4.0.1.0, it uses `utf8_substr()`.
     * - For OpenCart versions from 4.0.1.0 up to (but not including) 4.0.2.0,
     *   it uses `\Opencart\System\Helper\Utf8\substr()`.
     * - For OpenCart version 4.0.2.0 and above, it uses `oc_substr()`.
     *
     * @param string $string The input string from which the substring is to be calculated.
     * @param int $offset The starting position of the substring.
     * @param int|null $length The length of the substring; if null, returns the rest of the string.
     *
     * @return string The substring of the input string.
     */
    private function _substr(string $string, int $offset, ?int $length = null): string
    {
        if (version_compare(VERSION, '4.0.1.0', '<')) { // OpenCart versions before 4.0.1.0
            return utf8_substr($string, $offset, $length);
        } elseif (version_compare(VERSION, '4.0.2.0', '<')) { // OpenCart version 4.0.1.0 up to, but not including, 4.0.2.0
            return \Opencart\System\Helper\Utf8\substr($string, $offset, $length);
        }

        return oc_substr($string, $offset, $length); // OpenCart version 4.0.2.0 and above
    }
}
