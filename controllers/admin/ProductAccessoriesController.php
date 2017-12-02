<?php
require_once _PS_MODULE_DIR_ . 'productaccessories/classes/Model.php';
class ProductAccessoriesController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap  = true;
        $this->table      = 'product_accessories';
        $this->identifier = 'id_combination';
        $this->className  = 'ProductAccessoriesModel';
        parent::__construct();

        $id_lang = $this->context->language->id;

        $this->_select .= 'id_combination, id_product, product_ids';
        $this->fields_list = [
            'id_product'        => [
                'title' => $this->l('Id product'),
                'type'  => 'text',
                'align' => 'center',
                'class' => 'fixed-width-xs',
                'orderby'  => 'true'
            ],
            'product_ids' => [
                'title'  => $this->l('Product Id-s'),
                'type'   => 'text',
                'align'  => 'center',
                'class'  => 'fixed-width-xs',
            ]
        ];
        
        $this->actions = ['edit', 'delete'];

        $this->bulk_actions = array(
            'delete' => array(
                'text'    => $this->l('Delete selected'),
                'icon'    => 'icon-trash',
                'confirm' => $this->l('Delete selected items ?'),
            ),
        );
        $this->fields_form = [
            'legend' => [
                'title' => $this->l('Add or remove product accessories'),
            ],
            'input'  => [
                'id_product'   => [
                    'type'     => 'text',
                    'label'    => $this->l('Id of product'),
                    'name'     => 'id_product',
                    'required' => true,
                    'lang' => false
                ],
                'product_ids'  => [
                    'type'     => 'text',
                    'label'    => $this->l('Id-s of accessories'),
                    'name'     => 'product_ids',
                    'required' => true,
                    'hint'     => 'Separated by comma',
                    'lang' => false
                ],                
            ],
            'submit' => [
                'title' => $this->l('Save'),
            ],
        ];
    }
}
?>