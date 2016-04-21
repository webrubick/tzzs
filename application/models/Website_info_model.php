<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_info_model extends MY_Model {
	
	// 表名
	const TABLE_NAME = 'tab_website_info';
	const PK = 'domain';
	const DOMAIN = 'dx-sj.com';

	protected $COLS = array(
		'domain', 'com_name', 'website_name', 'com_address', 'com_postcode', 'contact', 
		'com_keywords', 'com_description', 'com_service_aim', 'com_service_aim_desc', 'com_desire', 
		'beian_url', 'beian_no', 'website_home_bg', 
		'create_time', 'update_time'
	);
	protected $INSERT_COLS = array(
		'com_name', 'website_name', 'com_address', 'com_postcode', 'contact', 
		'com_keywords', 'com_description', 'com_service_aim', 'com_service_aim_desc', 'com_desire', 
		'beian_url', 'beian_no', 'website_home_bg'
	);
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * 获取本站信息
	 */
	public function get_info() {
	    $this->setTable($this::TABLE_NAME);
	    return $this->getSingle(array('domain' => $this::DOMAIN));
	}
	
	/**
	 * 修改本站信息
	 */
	public function update_info($fields) {
	    $fields = array_filter_by_key($fields, $this->INSERT_COLS);
	    $this->setTable($this::TABLE_NAME);
		return $this->editData(array('domain' => $this::DOMAIN), $fields);
	}
	
}

?>