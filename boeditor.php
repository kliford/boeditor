
<?php
/**
 * BO Editor - TinyMCE configuration for PrestaShop Back Office.
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class Boeditor extends Module
{
    public function __construct()
    {
        $this->name = 'boeditor';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Bolivan';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('BO Editor', [], 'Modules.Bolivan.Admin');
        $this->description = $this->trans(
            'Classic text editor from PrestaShop 1.7. ',
            [],
            'Modules.Bolivan.Admin'
        );

        $this->ps_versions_compliancy = [
            'min' => '8.0.0',
            'max' => '9.99.99',
        ];
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('actionAdminControllerSetMedia');
    }

    public function hookActionAdminControllerSetMedia($params)
    {
        if (!isset($this->context->controller)) {
            return;
        }

        $this->context->controller->addJS(
            $this->_path . 'views/js/admin-tinymce-config.js'
        );
    }
}
