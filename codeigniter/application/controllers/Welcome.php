<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function index($lang = null)
	{
		//Loading url helper			 
		$this->load->helper('url');
		$this->load->library('session');

		if($lang == null){
			$lang = "en";
		}

        $newdata = array(
		        'sessionId' => session_id(),
		        'lang'  => $lang
		);
		$this->session->set_userdata($newdata);
		
		$sessionId = $this->session->userdata('sessionId');

		$data = array('lang' => $lang, 'sessionId' => $sessionId);
		$this->load->view('welcome_message', $data);
	}
}
