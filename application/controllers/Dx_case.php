<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dx_case extends MY_Controller {

    public function __construct() {
		parent::__construct();
    }
    
    public function case_main() {
	    $this->set_index_header('case');
	    
	    $this->load->api('case_api');
	    
	    $this->total_num = 0;
	    $this->dx_cases = NULL;
	    
	    $result = $this->case_api->case_list();
	    if (is_ok_result($result)) {
	        $this->total_num = $result['data']['total'];
	        $this->dx_cases = $result['data']['list'];
	    }
	    
	    $this->load->view('cases/case-main', $this);
    }

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