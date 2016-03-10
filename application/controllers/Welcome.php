<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct() {
		parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $this->set_index_header('index');
		$this->load->view('index.php', $this);
	}
	
	public function dx_about() {
	    $this->set_index_header('about');
		$this->load->view('about', $this);
	}
	
	public function dx_case() {
	    $this->set_index_header('case');
		$this->load->view('case-main', $this);
	}
	
	public function dx_contact() {
	    $this->set_index_header('contact');
		$this->load->view('contact', $this);
	}
}
