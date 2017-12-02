<?php
require_once 'CustomObjectModel.php';
class ProductAccessoriesModel extends ProductAccessoriesCustomObjectModel
{
    public static $definition = [
        'table'     => 'product_accessories',
        'primary'   => 'id_combination',
        'multilang' => false,
        'fields'    => [
            'id_combination'=> ['type' => self::TYPE_INT, 'validate' => 'isInt'],
            'id_product'    => ['type' => self::TYPE_STRING, 'db_type' => 'int', 'lang' => false],
            'product_ids'   => ['type' => self::TYPE_STRING, 'db_type' => 'varchar', 'lang' => false]
        ],
    ];
    public $id_combination;
    public $id_product;
    public $product_ids;
}
