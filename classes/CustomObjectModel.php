<?php

class ProductAccessoriesCustomObjectModel extends ObjectModel 
{
    public function getDatabaseColumns()
    {
        $definition = ObjectModel::getDefinition($this);

        $sql = 'SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA="' . _DB_NAME_ . '" AND TABLE_NAME="' . _DB_PREFIX_ . $definition['table'] . '"';

        $columns['self'] = Db::getInstance()->executeS($sql, true, false);

        $sql = 'SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA="' . _DB_NAME_ . '" AND TABLE_NAME="' . _DB_PREFIX_ . $definition['table'] . '_lang"';
        $columns['lang'] = Db::getInstance()->executeS($sql, true, false);


        return $columns;
    }
}
