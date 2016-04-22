<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dx_case extends MY_Controller {

    public function __construct() {
		parent::__construct();
    }
    
    /**
     * 案例列表页面；
     * 
     * 根据currentpage参数，获取一页数据
     */
    public function case_main() {
	    $this->set_index_header('case');
	    
	    $page_size = 12;
	    $currentpage = intval($this->input->get_post('currentpage', TRUE));
		// print_r($currentpage);
		if (!isset($currentpage) || $currentpage <= 0) {
			$currentpage = 1;
		}
	    
	    $this->load->api('case_api');
	    
	    $this->totalnum = 0;
	    $this->dx_cases = NULL;
	    
	    $result = $this->case_api->case_list($currentpage, $page_size);
	    if (is_ok_result($result)) {
	        $this->totalnum = $result['data']['total'];
	        $this->dx_cases = $result['data']['list'];
	    }
	    
	    $this->pagearr = array(
			'currentpage' => $currentpage,
			'totalnum' => $this->totalnum,
			'pagesize' => $page_size,
			'pagenum' => ceil($this->totalnum / $page_size),
		);
	    
	    $this->load->view('cases/case-main', $this);
    }

    /**
     * 案例展示页面；
     */
	public function by_key($key)
	{
	    $this->load->api('case_api');
	    $result = $this->case_api->get_item($key);
	    
	    if (is_ok_result($result) && isset($result['data'])) {
	        $this->dx_case = $result['data'];
	    }
		$this->load->view('cases/case-item', $this);
	}
	
}

?>