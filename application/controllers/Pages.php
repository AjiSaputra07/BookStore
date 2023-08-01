<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Buku');
		$this->load->model('Model_Penerbit');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
        $data['title'] = "beranda";
        $this->load->view('templates/header',$data);
        $this->load->view('beranda');
        $this->load->view('templates/footer');
	}
    public function daftar_buku()
    {
		// $data['data_buku']
		// $data['data_buku'] = $this->db->get('tb_buku')->result_array();
		// $this->load->model->('Model_buku');
        $data['title'] = "daftar-buku";
		$data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
		$data['data_penerbit'] = $this->Model_Penerbit->get_all_penerbit()->result_array();
        $this->load->view('templates/header',$data);
        $this->load->view('daftar_buku');
		$this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }
	public function daftar_penerbit()
    {
        $data['title'] = "daftar-penerbit";
		$data['data_penerbit'] = $this->Model_Penerbit->get_all_penerbit()->result_array();
        $this->load->view('templates/header',$data);
        $this->load->view('daftar_penerbit');
		$this->load->view('templates/modal_penerbit');
        $this->load->view('templates/footer');
    }

	public function simpan_buku()
	{
		$data = array(
			'judul_buku' => $this->input->post('judulBuku'),
			'tahun_terbit' => $this->input->post('tahunTerbit'),
			'kode_penerbit' => $this->input->post('kodePenerbit')
		);
		$this->Model_buku->simpan_buku($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Tersimpan </div>');

		redirect('Pages/daftar_buku');
	}

	public function simpan_penerbit()
	{
		// $this->load->model->('Model_penerbit');
		
		$data = array(
			'nama_penerbit' => $this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit')
		);
		$this->Model_Penerbit->simpan_penerbit($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Tersimpan </div>');

		redirect('Pages/daftar_penerbit');
	}

	public function hapus_buku()
	{
		$kode = $this->uri->segment(3);
		$this->Model_Buku->hapus_buku($kode);
		$this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Dihapus </div>');

		redirect('Pages/daftar_buku');
	}

	public function hapus_penerbit()
	{
		$kode = $this->uri->segment(3);
		$this->Model_Penerbit->hapus_penerbit($kode);
		// $this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Dihapus </div>');

		redirect('Pages/daftar_penerbit');
	}

	public function show_edit_page()
	{
		$kode = $this->uri->segment(3);
		$this->load->model('Model_penerbit');
		$this->load->model('Model_buku');
		// data untuk mengisi inputan sesuai dengan data di database
		$data['data_buku'] = $this->Model_buku->get_buku_by_kode($kode)->row_array();
		//data untuk mengisi pilihan di select
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
		$data['title'] = "Daftar Penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('edit_buku');
		$this->load->view('templates/footer');	
	}

	public function show_edit_page2()
	{
		$kode = $this->uri->segment(3);
		$this->load->model('Model_penerbit');
		// data untuk mengisi inputan sesuai dengan data di database
		//data untuk mengisi pilihan di select
		$data['data_penerbit'] = $this->Model_penerbit->get_penerbit_by_kode($kode)->row_array();
		$data['title'] = "Daftar Penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('edit_penerbit');
		$this->load->view('templates/footer');	
	}

	public function update_buku()
	{
		$data = array(	
			'kode_buku' => $this->input->post('kodeBuku'),
			'judul_buku' => $this->input->post('judulBuku'),
			'tahun_terbit' => $this->input->post('tahunTerbit'),
			'kode_penerbit' => $this->input->post('kodePenerbit')
		);
		$this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Diupdate </div>');
		$kode = $this->input->post('kodeBuku');
		$this->Model_buku->update_buku($data, $kode);

		redirect('Pages/daftar_buku');
	}

	public function update_penerbit()
	{
		$data = array(	
			'kode_penerbit' => $this->input->post('kodePenerbit'),
			'nama_penerbit' => $this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit')
		);
		$kode = $this->input->post('kodePenerbit');
		$this->Model_Penerbit->update_penerbit($data, $kode);
		
		$this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Diupdate </div>');

		redirect('Pages/daftar_penerbit');
	}
}