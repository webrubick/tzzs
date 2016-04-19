<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    protected $unlogin_url = 'admin/login';

    public function __construct() {
		parent::__construct();
    }
    
    public function index() {
	    $this->dx_case();
    }
	
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	/**
	 * 管理员登录
	 */
	public function login() {
        $this->load_sessionaccess();
        
	    if (is_login()) {
	        redirect('admin');
	    } else {
	        $this->load->view('admin/login', $this);
	    }
	}
	
	public function login_ajax() {
	    $this->check_state_api('POST');

		// 获取所有的数据
		$post = $this->input->post(NULL, TRUE);
		$user_name = isset($post['user_name']) ? trim($post['user_name']) : NULL;
		$password = isset($post['password']) ? trim($post['password']) : NULL;

		$this->load->api('admin_api');
		$api_result = $this->admin_api->login($user_name, $password, NULL, FALSE);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('admin');
		}
		echo json_encode($api_result);
	}

    /**
     * 获取登录验证图片
     */
    public function login_vercode() {
        $this->load->library('checkcode');
	    $this->checkcode->show(function ($verify_code) {
	    	$this->session->set_userdata('admin_login_vercode', $verify_code);
	    });
    }
    
    
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // 修改管理员密码
    public function edit_password() {
        $this->check_state_common('GET', TRUE);
	    $this->load->view('admin/edit-pwd', $this);
    }
    
    public function edit_password_ajax() {
        $this->check_state_api('POST');

		// 获取所有的数据
		$post = $this->input->post(NULL, TRUE);
		$password = isset($post['password']) ? trim($post['password']) : NULL;
		
		$this->load->api('admin_api');
		$api_result = $this->admin_api->change_pass($password);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('admin/edit_password');
		}
		echo json_encode($api_result);
    }
    
    
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // 管理案例
    public function dx_case() {
        $this->check_state_common('GET', TRUE);
        
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
	    
	    $this->load->view('admin/case-list', $this);
    }
    
    public function add_case() {
        $this->check_state_common('GET', TRUE);
        $this->load->view('admin/add-case', $this);
    }
    
    public function add_case_ajax() {
        $this->check_state_api('POST');

		// 获取所有的数据
		$post = $this->input->post(NULL, TRUE);
		
		$api_result = NULL;
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('admin/case');
		}
		echo json_encode($api_result);
    }
    
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // 网站信息管理
    public function website_info() {
        $this->check_state_common('GET', TRUE);
	    $this->load->view('admin/index', $this);
    }
    
    public function website_info_ajax() {
        $this->check_state_api('POST');

		// 获取所有的数据
		$post = $this->input->post(NULL, TRUE);
		
		$api_result = NULL;
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('admin/website_info');
		}
		echo json_encode($api_result);
    }
    
    // 管理后台注销登陆
	public function logout() {
		$this->check_state_common('GET', FALSE);
		
		$this->load->api('admin_api');
		$api_result = $this->admin_api->logout();
		// 登出的时候，最好根据用户的类型，返回要跳转的地址
		// 如果没有登录
		redirect(base_url($this->unlogin_url));
	}
}

?>