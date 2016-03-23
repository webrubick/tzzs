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
        $this->website = array(
                'website_name' => '鼎鑫设计装饰',
                'com_address' => '江苏省泰兴市济川路12号3楼',
                'com_postcode' => '225453',
                'contact' => '0523-87781789',
                
                
                'beian_no' => '苏ICP备16009335号-1',
                'beian_url' => 'http://www.miitbeian.gov.cn/',
                
                
                'com_keywords' => '',
                'com_description' => '',
                
                'website_home_bg' => 'public/img/home-gallery-1.jpg',
                'website_logo_small' => 'public/img/logo_200x225.png',
                'website_logo_middle' => 'public/img/logo_200x225.png',
            );
	}

    public function set_index_header($tab="index") {
        $this->index_tab = $tab;
    }

}

?>