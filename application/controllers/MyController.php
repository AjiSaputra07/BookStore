<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyController extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        //akan meload view yang bernama welcome_massage
		$this->load->view('welcome_message');
	}
    public function showMessage($myTitle)
	{
        //akan meload view yang bernama my_view
        $data['title'] = $myTitle;
		$this->load->view('my_view', $data);
	}
    public function method2()
    {
        $data['title'] = "Method kedua";
        $data['heading'] = "ini adalah isi heading dari method2";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/content',$data);
        $this->load->view('templates/footer');
    }
}
