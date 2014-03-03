<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Cartridge extends Module {

	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Cartrige order',
				'ru' => 'Заказ картриджей',
			),
			'description' => array(
				'en' => 'You can to order a cartrige from this module',
				'ru' => 'Вы можете заказывать картриджи, используя этот модуль',
			),
			'frontend'	=> TRUE,
			'backend'	=> TRUE,
			'skip_xss'	=> TRUE,
			'menu'		=> 'utilities',
			'sections' => array(
			    'cartidge' => array(
				    'name' => 'main_settings',
				    'uri' => 'admin/cartridge',

				),
			    'contractor' => array(
					'name' => 'contractors_menu',
					'uri' => 'admin/cartridge/contractor',
					'shortcuts'	=> array(
						array(
					 	   'name'	=> 'add_contractor',
						   'uri'	=> 'admin/cartridge/contractor/add',
						   'class'	=> 'add'
						)
					)
			    ),
			    'cartridges' => array(
					'name' => 'cartridge_list',
					'uri' => 'admin/cartridge/cartridges',
					'shortcuts'	=> array(
						array(
					 	   'name'	=> 'add_cartridge',
						   'uri'	=> 'admin/cartridge/cartridges/add',
						   'class'	=> 'add'
						)
					)
			    ),
			    'address' => array(
					'name' => 'address',
					'uri' => 'admin/cartridge/address',
			    ),
			),
		);
	}

	public function install()
	{
		$this->dbforge->drop_table('cartridge_settings');
		$this->dbforge->drop_table('cartridge_orders');
		$this->dbforge->drop_table('cartridge_contractors');
		$this->dbforge->drop_table('cartridge_list');
		
		$cartridge_settings = "
			CREATE TABLE ".$this->db->dbprefix('cartridge_settings')." (
			`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`contractor` VARCHAR(255) NULL ,
			`email` VARCHAR(255) NULL ,
			`smpp` VARCHAR(255) NULL ,
			`template` TEXT NULL,
			`items_order` VARCHAR(255) NULL
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = 'Таблица настроек модуля';
		";
		$cartridge_orders = "
			CREATE TABLE ".$this->db->dbprefix('cartridge_orders')." (
			`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_id` VARCHAR(255) NULL ,
			`cartridge_id` VARCHAR(255) NULL ,
			`count_request` VARCHAR(255) NULL ,
			`count_recived` VARCHAR(255) NULL ,
			`comment` VARCHAR(255) NULL ,
			`status` VARCHAR(255) NULL ,
			`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = 'Таблица заказанного';
		";
		$cartridge_contractors = "
			CREATE TABLE ".$this->db->dbprefix('cartridge_contractors')." (
			`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` VARCHAR(255) NULL ,
			`phone` VARCHAR(255) NULL ,
			`mail` VARCHAR(255) NULL ,
			`address` VARCHAR(255) NULL ,
			`active` VARCHAR(255) NULL ,
			`comment` VARCHAR(255) NULL,
			`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`date_close` TIMESTAMP NULL
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = 'Таблица подрядчиков';
		";
		$cartridge_list = "
			CREATE TABLE ".$this->db->dbprefix('cartridge_list')." (
			`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` VARCHAR(255) NULL ,
			`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = 'Таблица наименований картриджей';
		";	
		if($this->db->query($cartridge_settings) and $this->db->query($cartridge_orders) and $this->db->query($cartridge_contractors) and $this->db->query($cartridge_list))
		{
			return TRUE;
		}
	}

	public function uninstall()
	{
		$this->dbforge->drop_table('cartridge_settings');
		$this->dbforge->drop_table('cartridge_orders');
		$this->dbforge->drop_table('cartridge_contractors');
		$this->dbforge->drop_table('cartridge_list');
		return TRUE;
	}


	public function upgrade($old_version)
	{
		return TRUE;
	}

	public function help()
	{
		return "No documentation has been added for this module.<br />Contact the module developer for assistance.";
	}
}
