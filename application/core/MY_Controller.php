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
        
        $this->website = array(
                'website_name' => '鼎鑫设计装饰',
                'com_address' => '江苏省泰兴市济川路12号3楼',
                'com_postcode' => '225453',
            );
	}

}

?>