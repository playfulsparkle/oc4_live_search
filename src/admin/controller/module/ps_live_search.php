<?php
namespace Opencart\Admin\Controller\Extension\PsLiveSearch\Module;
/**
 * Class PsLiveSearch
 *
 * @package Opencart\Admin\Controller\Extension\PsLiveSearch\Module
 */
class PsLiveSearch extends \Opencart\System\Engine\Controller
{
    /**
     * @var string The support email address.
     */
    const EXTENSION_EMAIL = 'support@playfulsparkle.com';

    /**
     * @var string The documentation URL for the extension.
     */
    const EXTENSION_DOC = 'https://github.com/playfulsparkle/oc4_live_search.git';

    /**
     * @return void
     */
    public function index(): void
    {
        $this->load->language('extension/ps_live_search/module/ps_live_search');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true),
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/ps_live_search', 'user_token=' . $this->session->data['user_token'], true),
        ];


        $separator = version_compare(VERSION, '4.0.2.0', '>=') ? '.' : '|';

        $data['action'] = $this->url->link('extension/ps_live_search/module/ps_live_search' . $separator . 'save', 'user_token=' . $this->session->data['user_token']);
        $data['fix_event_handler'] = $this->url->link('extension/ps_live_search/module/ps_live_search' . $separator . 'fixEventHandler', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module');

        $data['module_ps_live_search_status'] = $this->config->get('module_ps_live_search_status');
        $data['module_ps_live_search_input_delay'] = $this->config->get('module_ps_live_search_input_delay');
        $data['module_ps_live_search_input_min_chars'] = $this->config->get('module_ps_live_search_input_min_chars');

        $data['module_ps_live_search_product_status'] = $this->config->get('module_ps_live_search_product_status');
        $data['module_ps_live_search_product_description'] = $this->config->get('module_ps_live_search_product_description');
        $data['module_ps_live_search_product_description_length'] = $this->config->get('module_ps_live_search_product_description_length');
        $data['module_ps_live_search_product_image'] = $this->config->get('module_ps_live_search_product_image');
        $data['module_ps_live_search_product_image_width'] = $this->config->get('module_ps_live_search_product_image_width');
        $data['module_ps_live_search_product_image_height'] = $this->config->get('module_ps_live_search_product_image_height');

        $data['text_contact'] = sprintf($this->language->get('text_contact'), self::EXTENSION_EMAIL, self::EXTENSION_EMAIL, self::EXTENSION_DOC);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/ps_live_search/module/ps_live_search', $data));
    }

    public function save(): void
    {
        $this->load->language('extension/ps_live_search/module/ps_live_search');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/ps_live_search/module/ps_live_search')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            if ((int) $this->request->post['module_ps_live_search_input_delay'] < 100) {
                $json['error']['input-input-delay'] = $this->language->get('error_input_delay_min');
            }

            if ((int) $this->request->post['module_ps_live_search_input_min_chars'] < 1) {
                $json['error']['input-input-min-chars'] = $this->language->get('error_input_min_chars');
            }

            if ((int) $this->request->post['module_ps_live_search_product_description_length'] < 0) {
                $json['error']['input-product-description-length'] = $this->language->get('error_product_description_length_min');
            } else if ((int) $this->request->post['module_ps_live_search_product_description_length'] > 200) {
                $json['error']['input-product-description-length'] = $this->language->get('error_product_description_length_max');
            }

            if ((int) $this->request->post['module_ps_live_search_product_image_width'] < 16) {
                $json['error']['input-product-image-width'] = $this->language->get('error_product_image_width_min');
            } else if ((int) $this->request->post['module_ps_live_search_product_image_width'] > 128) {
                $json['error']['input-product-image-width'] = $this->language->get('error_product_image_width_max');
            }

            if ((int) $this->request->post['module_ps_live_search_product_image_height'] < 16) {
                $json['error']['input-product-image-height'] = $this->language->get('error_product_image_height_min');
            } else if ((int) $this->request->post['module_ps_live_search_product_image_height'] > 128) {
                $json['error']['input-product-image-height'] = $this->language->get('error_product_image_height_max');
            }

            if ($json) {
                $json['error']['warning'] = $this->language->get('error_form');
            }
        }

        if (!$json) {
            $this->load->model('setting/setting');

            $this->model_setting_setting->editSetting('module_ps_live_search', $this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function install(): void
    {
        if ($this->user->hasPermission('modify', 'extension/ps_live_search/module/ps_live_search')) {
            $this->load->model('setting/setting');

            $data = [
                'module_ps_live_search_input_delay' => 100,
                'module_ps_live_search_input_min_chars' => 1,
                'module_ps_live_search_product_status' => 1,
                'module_ps_live_search_product_description' => 1,
                'module_ps_live_search_product_description_length' => 100,
                'module_ps_live_search_product_image' => 1,
                'module_ps_live_search_product_image_width' => 64,
                'module_ps_live_search_product_image_height' => 64
            ];

            $this->model_setting_setting->editSetting('module_ps_live_search', $data);

            $this->load->model('setting/event');

            $this->_registerEvents();
        }
    }

    public function uninstall(): void
    {
        if ($this->user->hasPermission('modify', 'extension/ps_live_search/module/ps_live_search')) {
            $this->load->model('setting/event');

            $this->_unregisterEvents();
        }
    }

    public function fixEventHandler(): void
    {
        $this->load->language('extension/ps_live_search/module/ps_live_search');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/ps_live_search/module/ps_live_search')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/event');

            $this->_unregisterEvents();

            if ($this->_registerEvents() > 0) {
                $json['success'] = $this->language->get('text_success');
            } else {
                $json['error'] = $this->language->get('error_event');
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    private function _unregisterEvents(): void
    {
        $this->model_setting_event->deleteEventByCode('module_ps_live_search');
    }

    private function _registerEvents(): int
    {
        $separator = version_compare(VERSION, '4.0.2.0', '>=') ? '.' : '|';

        if (version_compare(VERSION, '4.0.1.0', '>=')) {
            $result = $this->model_setting_event->addEvent([
                'code' => 'module_ps_live_search',
                'description' => '',
                'trigger' => 'catalog/view/common/header/before',
                'action' => 'extension/ps_live_search/module/ps_live_search' . $separator . 'eventCatalogViewCommonHeaderBefore',
                'status' => '1',
                'sort_order' => '0'
            ]);
            $result = $this->model_setting_event->addEvent([
                'code' => 'module_ps_live_search',
                'description' => '',
                'trigger' => 'catalog/view/common/search/before',
                'action' => 'extension/ps_live_search/module/ps_live_search' . $separator . 'eventCatalogViewCommonSearchBefore',
                'status' => '1',
                'sort_order' => '0'
            ]);
        } else {
            $result = $this->model_setting_event->addEvent(
                'module_ps_live_search',
                'catalog/view/common/header/before',
                'extension/ps_live_search/module/ps_live_search' . $separator . 'eventCatalogViewCommonHeaderBefore'
            );
            $result = $this->model_setting_event->addEvent(
                'module_ps_live_search',
                'catalog/view/common/search/before',
                'extension/ps_live_search/module/ps_live_search' . $separator . 'eventCatalogViewCommonSearchBefore'
            );
        }

        return $result;
    }
}
