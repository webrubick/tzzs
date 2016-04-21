<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * 默认加载了一些辅助类：url；
 *
 */
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// 需要base url
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('exhtml');
        
        
        $this->index_tab = '';
        
        $this->load->model('website_info_model');
        $this->website = $this->website_info_model->get_info();
        // print_r($this->website);
        $this->website['website_logo_small'] = 'public/img/logo_200x225.png';
        $this->website['website_logo_middle'] = 'public/img/logo_200x225.png';
        // $this->website = array(
        //         'website_name' => '鼎鑫设计装饰',
        //         'com_address' => '江苏省泰兴市济川路12号3楼',
        //         'com_postcode' => '225453',
        //         'contact' => '0523-87781789',
                
                
        //         'beian_no' => '苏ICP备16009335号-1',
        //         'beian_url' => 'http://www.miitbeian.gov.cn/',
                
                
        //         'com_keywords' => '',
        //         'com_description' => '',
                
        //         'website_home_bg' => 'public/img/home-gallery-1.jpg',
        //         'website_logo_small' => 'public/img/logo_200x225.png',
        //         'website_logo_middle' => 'public/img/logo_200x225.png',
        //     );
	}

    public function set_index_header($tab="index") {
        $this->index_tab = $tab;
    }
    
    
    public function check_state_common($request_method, $need_login = FALSE, $redirect = '') {
		if (isset($request_method)) {
			$cur_req_method = $this->input->method(TRUE);
			$request_method = strtoupper($request_method);
			if ($cur_req_method != $request_method) {
				ishow_404('required method is \''.$request_method.'\', but now is \''.$cur_req_method.'\'');
			}
		}
		if ($need_login) {
		    $this->load_sessionaccess();
			if (!is_login()) {
				// 如果没有登录
				if ($redirect == '') {
				    if (isset($this->unlogin_url)) {
				        $redirect = $this->unlogin_url;
				    }
				}
				redirect(base_url($redirect));
			}
		}
	}
	
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// 用户登录相关
	public function load_sessionaccess() {
	    if (isset($this->sessionaccess)) {
	        return;
	    }
	    $this->load->library('sessionaccess');
	    $user_info = get_sim_user_info();
        if (isset($user_info) && !empty($user_info)) {
			foreach ($user_info as $key => $value) {
	        	$this->$key = $value;
	        }
        }
	}
	
	public function check_state_api($request_method) {
		if (isset($request_method)) {
			$cur_req_method = $this->input->method(TRUE);
			$request_method = strtoupper($request_method);
			if ($cur_req_method != $request_method) {
				echo json_encode(common_result(404, 'Not Found'));
				exit(EXIT_UNKNOWN_FILE);
			}
		}
	}

	public function check_param_api($param_name) {
		$val = $this->input->get_post($param_name, TRUE);
		if (!isset($val)) {
			echo json_encode(common_result(400, '缺少参数 \''.$param_name.'\''));
			exit(EXIT_USER_INPUT);
		}
		return $val;
	}

}

?>