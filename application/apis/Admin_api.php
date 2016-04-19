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
}


?>