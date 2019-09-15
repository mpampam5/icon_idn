<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Paket_layanan.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-08-31 00:40:57 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Paket_layanan extends Backend{

	private $table = "paket_layanan";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Paket_layanan_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("layanan","Layanan","trim|xss_clean|max_length[100]|required");
		$this->form_validation->set_rules("harga","Harga","trim|xss_clean|numeric");
		$this->form_validation->set_rules("keterangan","Keterangan","trim|xss_clean");
		$this->form_validation->set_rules("id_kategori","Kategori","trim|xss_clean");
    $this->form_validation->set_rules("per_kepala","","trim|xss_clean|numeric");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Paket Layanan');
    $this->temp_backend->view('content/paket_layanan/index');
  }


	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }


	function detail($id)
  {
    if ($row = $this->model->detail_kategori($id)) {
      	$this->temp_backend->set_title('Paket Layanan');
        $data = [
									'layanan'	=>	$row->layanan,
									'harga'	=>	$row->harga,
									'keterangan'	=>	$row->keterangan,
									'kategori'	=>	$row->kategori,
                  'per_kepala'	=>	$row->harga_per_kepala,
								];
      $this->temp_backend->view('content/paket_layanan/detail',$data);
    }else {
      $this->_error404();
    }
  }


function add()
{
    $this->temp_backend->set_title('Paket Layanan');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/paket_layanan/add_action'),
								'layanan'	=>	set_value('layanan'),
								'harga'	=>	set_value('harga'),
								'keterangan'	=>	set_value('keterangan'),
								'id_kategori'	=>	set_value('id_kategori'),
                'per_kepala'	=>	set_value('per_kepala'),
							];

    $this->temp_backend->view('content/paket_layanan/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'layanan'	=>	$this->input->post('layanan',true),
										'harga'	=>	$this->input->post('harga',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
										'id_kategori'	=>	$this->input->post('id_kategori',true),
                    'harga_per_kepala'	=>	$this->input->post('per_kepala',true),
									];

        if ($this->model->get_insert($this->table,$insert)) {
          $json['alert']   = '<div id="alert" class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check"></i> Berhasil Menambahkan.
                              <div>';
        }else {
          $json['alert']   = '<div id="alert" class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-close"></i> Gagal Menambahkan.
                              <div>';
        }

        $json['success'] = true;
      }else {
        foreach ($_POST as $key => $value)
          {
            $json['alert'][$key] = form_error($key);
          }
      }

      echo json_encode($json);
  }
}


function update($id)
{
  if ($row = $this->model->get_where($this->table,['id_layanan'=>$id])) {
    $this->temp_backend->set_title('Paket Layanan');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/paket_layanan/update_action/'.$id),
								'layanan'	=>	set_value('layanan',$row->layanan),
								'harga'	=>	set_value('harga',$row->harga),
								'keterangan'	=>	set_value('keterangan',$row->keterangan),
								'id_kategori'	=>	set_value('id_kategori',$row->id_kategori),
                'per_kepala'	=>	set_value('per_kepala',$row->harga_per_kepala),
							];

    $this->temp_backend->view('content/paket_layanan/form',$data);
  }else {
    $this->_error404();
  }
}


function update_action($id)
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $update = [
										'layanan'	=>	$this->input->post('layanan',true),
										'harga'	=>	$this->input->post('harga',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
										'id_kategori'	=>	$this->input->post('id_kategori',true),
                    'harga_per_kepala'	=>	$this->input->post('per_kepala',true),
									];

        if ($this->model->get_update($this->table,$update,["id_layanan"=>$id])) {
          $json['alert']   = '<div id="alert" class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check"></i> Berhasil Mengedit.
                              <div>';
        }else {
          $json['alert']   = '<div id="alert" class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-close"></i> Gagal Mengedit.
                              <div>';
        }

        $json['success'] = true;
      }else {
        foreach ($_POST as $key => $value)
          {
            $json['alert'][$key] = form_error($key);
          }
      }

      echo json_encode($json);
  }
}


function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if ($this->model->get_delete($this->table,["id_layanan"=>$id])) {
      $json['alert']   = '<div id="alert" class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check"></i> Berhasil Menghapus.
                          <div>';
    }else {
      $json['alert']   = '<div id="alert" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-close"></i> Gagal Menghapus.
                          <div>';
    }
    echo json_encode($json);
  }
}




} //End Class Paket_layanan
