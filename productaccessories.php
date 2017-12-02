<?php 
if (!defined('_PS_VERSION_'))
{
  exit;
}
class ProductAccessories extends Module
{
    public function __construct()
    {
        $this->name = 'productaccessories';
        $this->tab = 'administration';
        $this->version = '1.0';
        $this->author = 'Karl-Kaspar Kuleša';
        $this->need_instance = true;
        $this->bootstrap = true;
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->display = 'view';
        parent::__construct();
        $this->displayName = $this->l('Product Accessories Custom List');
        $this->description = $this->l('Product Accessories list for admin front end use');
    }

    public function install()
    {
        if (parent::install()) {
        	$this->registerHook('ProductAccessories');
            $this->installDb();
        	$this->installTab();
            return true;
        }
        return false;

    }

    public function uninstall()
    {
    	$this->uninstallTab();
        return parent::uninstall();
    }

    public function hookProductAccessories($params)
    {

    }

    public function installDb()
    {
        $sql = Db::getInstance()->execute("CREATE TABLE IF NOT EXISTS ". _DB_PREFIX_ ."product_accessories (
              `id_combination` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `id_product` int(10) unsigned NOT NULL UNIQUE,
              `product_ids` varchar(255),
              PRIMARY KEY(`id_combination`),
              KEY `id_combination` (`id_combination`)
            ) ENGINE=". _MYSQL_ENGINE_ ." DEFAULT CHARSET=utf8
        ");
        if ($sql)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function uninstallDb()
    {

    }
	public function installTab()
	{
		$id_tab = (int)Tab::getIdFromClassName('ProductAccessories');
		if ($id_tab == 0)
		{
			$tab = new Tab();
			$tab->active = 1;
			$tab->class_name = 'ProductAccessories';
			$tab->name = array();
			foreach (Language::getLanguages(true) as $lang)
				$tab->name[$lang['id_lang']] = 'Product Accessories';

			$tab->id_parent = (int)Tab::getIdFromClassName('AdminAdmin');
			$tab->module = $this->name;
			return $tab->add();
		}
	}
	public function uninstallTab()
	{
		$id_tab = (int)Tab::getIdFromClassName('ProductAccessories');
		if ($id_tab)
		{
			$tab = new Tab($id_tab);
			return $tab->delete();
		}
		else
			return false;
	}
}