<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 区域
 */
class Case_model extends MY_Model {
	
	// 表名
	const TABLE_NAME = 'tab_cases';
	const PK = 'id';

	protected $COLS = array(
		'id', 'title', 'content_path', 'preview', 'create_time', 'update_time'
	);
	
	protected $INSERT_COLS = array(
		'title', 'content_path', 'preview'
	);
	
	public function __construct() {
		parent::__construct();
	}
	
	public function num_rows($conditions = NULL) {
		$this->db->select('id');
        return $this->db->get($this::TABLE_NAME)->num_rows();
	}
	
	public function get_page_data($page_size, $offset = 0, $conditions = NULL) {
		$sql = "select * from " . $this::TABLE_NAME . " order by update_time desc limit {$offset},{$page_size}";
	    $this->db->select($this->COLS);
        return $this->db->query($sql)->result_array();
	}

	public function get_all() {
		$this->db->select($this->COLS);
		return $this->getData();
	}
	
	public function get_by_id($id) {
	    $this->db->select($this->COLS);
		return $this->by_pk($id)->getSingle();
	}

	/**
	 * 增加数据
	 *
	 * @return	insert_id or false 
	 * @see CI_DB_result::insert  db->insert_id()
	 */
	public function add($data) {
	    $data = $this->filter_cols($data);
		$result = $this->addData($data);
		return isset($result);	
	}

	/**
	 * 删除指定房源
	 *
	 * @param	string	$id 区域ID
	 * @return	bool	TRUE on success, FALSE on failure
	 * @see CI_DB_query_builder::delete
	 */
	public function del_by_id($id) {
		$result = $this->delData($id, $this::TABLE_NAME, $this::PK);
		return $result === FALSE ? FALSE : TRUE;
	}

	/**
	 * 删除所有
	 *
	 * @return	bool	TRUE on success, FALSE on failure
	 * @see CI_DB_query_builder::delete
	 */
	public function del_all() {
		$result = $this->delAll();
		return $result === FALSE ? FALSE : TRUE;
	}
	
}

?>