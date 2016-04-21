<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Case_api extends API {

	protected $apicode = array(
		10001 => '添加案例：没有数据',
		10002 => '添加案例：添加失败',
		10003 => '添加案例：没有标题',
		10004 => '添加案例：没有内容',
		
		11000 => '删除案例：没有指定要删除的案例',
		11001 => '删除案例：删除失败',

	);

	public function __construct() {
		parent::__construct();
		$this->load->model('case_model');
	}

    /**
     * 数据结构
     * 
     * {
     *      'total' : xxx,
     *      'list' : []
     * }
     */
	public function case_list($page = 1, $page_size = 25) {
	    if ($page_size < 0) {
	        $page_size = 25;
	    }
	    $offset = max(0, $page - 1) * $page_size;
	    
	    $this->load->model('case_model');
		$record_nums = $this->case_model->num_rows();
		$cases = NULL;
		if ($offset < $record_nums) { // 如果已经超过数量，就没必要再查找数据库了
		    $cases = $this->case_model->get_page_data($page_size, $offset);
		}
		return $this->ok(array(
		            'total' => $record_nums,
		            'list' => $cases
		        ));
	}
	
	public function all_list() {
	    $this->load->model('case_model');
		$cases = $this->case_model->get_all();
		return $this->ok($cases);
	}
	
	public function get_item($id) {
	    $this->load->model('case_model');
		$cases = $this->case_model->get_by_id($id);
		return $this->ok($cases);
	}

	// 添加成功后返回最新的列表
	public function case_add($data, $return_list = FALSE) {
		if (!isset($data) || empty($data)) { return $this->ex(10001); }
        
        if (!isset($data['title']) || empty($data['title'])) {
            return $this->ex(10003);
        }
        
        if (!isset($data['content_path']) || empty($data['content_path'])) {
            return $this->ex(10004);
        }
        
        if (!isset($data['preview']) || empty($data['preview'])) {
            $data['preview'] = 'preview.jpg'; // 默认的图片文件名
        }

		$this->load->model('case_model');
		$result = $this->case_model->add($data);
		if (!$result) {
			log_message('error', 'case_add db failed');
			return $this->ex(10002);
		}
		if ($return_list) {
			return $this->case_list();
		}
		return $this->ok();
	}

	public function case_del($id, $return_list = FALSE) {
		if (!isset($id) || empty($id)) { return $this->ex(11000); }

		$this->load->model('case_model');
		$target = $this->case_model->get_by_id($id);
		if (isset($target)) {
		    $result = $this->case_model->del_by_id($id);
		    if (!$result) {
    			return $this->ex(11001);
    		}
    		$this->load->helper('upload');
    		del_case_content_path($this, $target['content_path']);
		}
		if ($return_list) {
			return $this->case_list();
		}
		return $this->ok();
	}

}


?>