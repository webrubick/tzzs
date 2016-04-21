<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_api extends API {

	protected $apicode = array(
		90000 => '未登录',
		
		90001 => '用户名为空',
		90002 => '密码为空',
		90003 => '验证码为空',
		90004 => '验证码错误',
		
		90005 => '用户名不存在或密码错误',
		
		90006 => '修改密码失败',


        20000 => '没有更新项',
        20001 => '更新失败',
        
        30000 => '上传装饰图失败',
        30001 => '上传预览图失败',
        30002 => '不合法的操作',
	);

	public function __construct() {
		parent::__construct();
	}

    public function login($user_name, $user_pass, $code = NULL, $verify_code = TRUE) {
        if (!isset($user_name)) { return $this->ex(90001); }
		if (!isset($user_pass)) { return $this->ex(90002); }
		if ($verify_code && !isset($code)) { return $this->ex(90003); }

        if ($verify_code) {
            $login_vercode = get_user_field('admin_login_vercode');
    		if (!isset($login_vercode) || strcasecmp($login_vercode, $code) !== 0) {
    		    return $this->ex(90004);
    		}
        }
		
		$this->load->model('user_model');
		$query_user = $this->user_model->get_by_name($user_name);
		if (empty($query_user)) { return $this->ex(90005); }

		if (md5pass($user_pass, $query_user['salt']) != $query_user['password']) {
			return $this->ex(90005);
		} else {
		    $this->load_sessionaccess();
			return $this->ok(prepare_user_info($query_user));
		}
    }
    
    public function change_pass($user_pass) {
		$this->load_sessionaccess();
		
		if (!is_login()) { return $this->un_login(); }
		if (!isset($user_pass) || empty($user_pass)) { return $this->ex(90002); }
		$uid = get_session_uid();

		$update_pair = $this->generate_user_pass($user_pass);
		// 尝试更新数据库
		$this->load->model('user_model');
		$update_result = $this->user_model->update_by_id($uid, $update_pair);
		if (!$update_result) {
			return $this->ex(90006);
		}

		$user_after_update = array_merge($this->sessionaccess->get_user_info(), $update_pair);
		return $this->ok(prepare_user_info($user_after_update));
	}
	
	public function update_website_info($fields) {
	    $this->load->model('website_info_model');
	    if (empty($fields)) {
	        return $this->ex(20000);
	    }
        $update_result = $this->website_info_model->update_info($fields);
        if (!$update_result) {
			return $this->ex(20001);
		}
		return $this->ok();
	}
	
	public function logout() {
		$this->load_sessionaccess();
	    clear_login();
		return $this->ok();
	}

    private function generate_user_pass($user_pass) {
		$this->load->helper('string');
		$salt = random_string('alnum', 6);
		$password = md5pass($user_pass, $salt);
		return array(
			'password' => $password,
			'salt' => $salt
		);
	}
	
	
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// 上传案例相关
	public function upload_case_subs($reset = FALSE) {
		$this->load_sessionaccess();
	    if (!is_login()) { return $this->un_login(); }
	    
	    $this->load->helper('upload');
	    if ($reset) {
	        $this->check_reset_upload_case();
	    }
		
        $content_path = $this->check_case_content_path();
        
        $subs_index = get_user_field('case_subs_index');
        if (empty($subs_index)) {
            $subs_index = 0;
            set_user_field('case_subs_index', $subs_index);
        }
        
		$save_result = save_subs($this, $content_path, $subs_index);
		if (is_ok_result($save_result)) {
            $subs_index ++;
            set_user_field('case_subs_index', $subs_index);
            $this->append_case_subs($save_result['data']);
			return $this->ok();
		} else {
			return $this->ex(30000);
		}
	}
	
	public function upload_case_preview() {
	    $this->load_sessionaccess();
	    if (!is_login()) { return $this->un_login(); }
	    
	    $this->load->helper('upload');
        $content_path = $this->check_case_content_path();
        $save_result = save_preview($this, $content_path);
        if (is_ok_result($save_result)) {
            set_user_field('case_preview', $save_result['data']);
			return $this->ok();
		} else {
			return $this->ex(30000);
		}
	}
	
	public function add_case($title) {
	    $this->load_sessionaccess();
		
	    if (!is_login()) { return $this->un_login(); }
	    
	    $content_path = get_user_field('case_content_path');
        if (empty($content_path)) {
            return $this->ex(30002);
        }
        $subs_index = get_user_field('case_subs_index');
        if (empty($subs_index)) {
            return $this->ex(30002);
        }
        $case_subs_list = get_user_field('case_subs_list');
	    if (empty($case_subs_list)) {
            return $this->ex(30002);
	    }
	    $case_subs_list = explode(',', $case_subs_list);
	    
	    $this->load->helper('upload');
        $save_result = save_content($this, $content_path, $case_subs_list);
        if (!is_ok_result($save_result)) {
            return $this->ex(30002);
        }
	    
        $preview = get_user_field('case_preview');
        if (empty($preview)) {
            $preview = 'subs/' . $case_subs_list[0];
        }
        
        $ret = array('title' => $title, 'content_path' => $content_path, 'preview' => $preview);
        // print_r($ret);
        // return $this->ex(30002);
        $this->load->api('case_api');
        $api_result = $this->case_api->case_add($ret);
        if (is_ok_result($api_result)) {
            save_success_flag($this, $content_path);
            $this->reset_upload_case();
        }
        return common_result_ok();
	}
	
	private function append_case_subs($file) {
	    $case_subs_list = get_user_field('case_subs_list');
	    if (empty($case_subs_list)) {
            $case_subs_list = $file;
        } else {
            $case_subs_list = $case_subs_list. ','. $file;
        }
        set_user_field('case_subs_list', $case_subs_list);
	}
	
	private function check_case_content_path() {
        $content_path = get_user_field('case_content_path');
        if (empty($content_path)) {
            $content_path = generate_content_path($this);
            set_user_field('case_content_path', $content_path);
        }
        return $content_path;
	}
	
	private function check_reset_upload_case() {
	    $this->load_sessionaccess();
	    $content_path = get_user_field('case_content_path');
        if (!empty($content_path)) {
            del_case_content_path($this, $content_path);
        }
        $this->reset_upload_case();
	}
	
	private function reset_upload_case() {
		$this->load_sessionaccess();
	    set_user_field('case_content_path', NULL);
	    set_user_field('case_subs_index', NULL);
	    set_user_field('case_preview', NULL);
	    set_user_field('case_subs_list', NULL);
	}
	
}


?>