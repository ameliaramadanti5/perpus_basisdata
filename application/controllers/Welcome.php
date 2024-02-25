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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
	parent::__construct();
	$this->load->model('MSudi');
	}
	
	public function index()
	{
		  // Set a default value for $content
		  $data['content'] = 'beranda'; // Replace 'welcome_content' with the actual content view name you want to load.

		  // Load the 'welcome_message' view with the $data array
		  $this->load->view('welcome_message', $data);
	}
	public function buku()
	{
		// Memuat model MSudi
		$this->load->model('MSudi');


		$data['MasterDataBuku'] = $this->MSudi->GetData('tbl_buku');
		$data['content'] = 'buku/Vbuku';
		$this->load->view('welcome_message', $data);
	}
	public function penerbit()
	{
		$data['MasterDataPenerbit'] = $this->MSudi->GetData('tbl_penerbit');
		$data['content'] = 'buku/VPenerbit';
		$this->load->view('welcome_message', $data);
	}

	public function addbuku()
	{
		$add['id_buku'] = $this->input->post('id_buku');
		$add['kategori'] = $this->input->post('kategori');
		$add['nama_buku'] = $this->input->post('nama_buku');
		$add['harga'] = $this->input->post('harga');
		$add['stok'] = $this->input->post('stok');
		$add['penerbit'] = $this->input->post('penerbit');
		$this->MSudi->AddData('tbl_buku', $add);
		redirect(site_url('Welcome/buku'));
	}

	public function updatebuku()
	{
		$a = $this->input->post('id_buku');
		$update['kategori'] = $this->input->post('kategori');
		$update['nama_buku'] = $this->input->post('nama_buku');
		$update['harga'] = $this->input->post('harga');
		$update['stok'] = $this->input->post('stok');
		$update['penerbit'] = $this->input->post('penerbit');


		$this->MSudi->UpdateData('tbl_buku', 'id_buku', $a, $update);


		redirect(site_url('Welcome/buku'));
	}

	public function deletebuku()
	{
		$a = $this->uri->segment(3);

		$this->MSudi->DeleteData('tbl_buku', 'id_buku', $a);

		redirect(site_url('Welcome/buku'));
	}

	// controller penerbit

	public function addpenerbit()
	{
		$add['id_penerbit'] = $this->input->post('id_penerbit');
		$add['nama'] = $this->input->post('nama');
		$add['alamat'] = $this->input->post('alamat');
		$add['kota'] = $this->input->post('kota');
		$add['telepon'] = $this->input->post('telepon');
		$this->MSudi->AddData('tbl_penerbit', $add);
		redirect(site_url('Welcome/penerbit'));
	}

	public function updatepenerbit()
	{
		$a = $this->input->post('id_penerbit');
		$update['nama'] = $this->input->post('nama');
		$update['alamat'] = $this->input->post('alamat');
		$update['kota'] = $this->input->post('kota');
		$update['telepon'] = $this->input->post('telepon');


		$this->MSudi->UpdateData('tbl_penerbit', 'id_penerbit', $a, $update);


		redirect(site_url('Welcome/penerbit'));
	}

	public function deletepenerbit()
	{
		$a = $this->uri->segment(3);

		$this->MSudi->DeleteData('tbl_penerbit', 'id_penerbit', $a);

		redirect(site_url('Welcome/penerbit'));
	}

	public function pencarianbuku()
	{
		$cari = $this->input->post('txt_cari');
		$data['DataCariBuku'] = $this->MSudi->DataCariBuku($cari)->result();
		$data['content'] = 'pencarian/caribuku';
		$this->load->view('welcome_message', $data);
	}

	public function pencarianpenerbit()
	{

		$cari = $this->input->post('txt_cari');
		$data['DataCariPenerbit'] = $this->MSudi->DataCariPenerbit($cari)->result();
		$data['content'] = 'pencarian/caripenerbit';
		$this->load->view('welcome_message', $data);
	}

	public function pengadaan()
	{
		// Load model dan data
		$this->load->model('MSudi');
		$data['Pengadaan'] = $this->MSudi->GetDataWhereLessThan('tbl_buku', 10);
		// Tampilkan view dengan data
		$data['content'] = 'pengadaan';
		$this->load->view('welcome_message', $data);
	}
}
