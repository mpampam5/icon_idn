<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Paket.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-08-31 00:52:28 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Paket extends Backend{

	private $table = "paket";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Paket_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("nama_paket","Nama Paket","trim|xss_clean|max_length[150]|required");
		$this->form_validation->set_rules("harga_paket","Harga Paket","trim|xss_clean|required|numeric");
		$this->form_validation->set_rules("harga_harian","Harga Harian","trim|xss_clean|required|numeric");
		$this->form_validation->set_rules("jangka_waktu","Jangka Waktu","trim|xss_clean|required|numeric");
		$this->form_validation->set_rules("keterangan","Keterangan","trim|xss_clean|required");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Paket Member');
    $this->temp_backend->view('content/paket/index');
  }


	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }


	function detail($id)
  {
    if ($row = $this->model->get_where($this->table,['id_paket'=>$id])) {
      	$this->temp_backend->set_title('Paket Member');
        $data = [
									'nama_paket'	=>	$row->nama_paket,
									'harga_paket'	=>	$row->harga_paket,
									'harga_harian'	=>	$row->harga_harian,
									'jangka_waktu'	=>	$row->jangka_waktu,
									'keterangan'	=>	$row->keterangan,
									'created'	=>	$row->created,
									'modified'	=>	$row->modified,
									'is_delete'	=>	$row->is_delete,
								];
      $this->temp_backend->view('content/paket/detail',$data);
    }else {
      $this->_error404();
    }
  }


function add()
{
    $this->temp_backend->set_title('Paket Member');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/paket/add_action'),
								'nama_paket'	=>	set_value('nama_paket'),
								'harga_paket'	=>	set_value('harga_paket'),
								'harga_harian'	=>	set_value('harga_harian'),
								'jangka_waktu'	=>	set_value('jangka_waktu'),
								'keterangan'	=>	set_value('keterangan'),
							];

    $this->temp_backend->view('content/paket/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'nama_paket'	=>	$this->input->post('nama_paket',true),
										'harga_paket'	=>	$this->input->post('harga_paket',true),
										'harga_harian'	=>	$this->input->post('harga_harian',true),
										'jangka_waktu'	=>	$this->input->post('jangka_waktu',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
										'created'	=>	date("Y-m-d H:i:s"),
                    'is_delete'	=>	0,
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
  if ($row = $this->model->get_where($this->table,['id_paket'=>$id])) {
    $this->temp_backend->set_title('Paket Member');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/paket/update_action/'.$id),
								'nama_paket'	=>	set_value('nama_paket',$row->nama_paket),
								'harga_paket'	=>	set_value('harga_paket',$row->harga_paket),
								'harga_harian'	=>	set_value('harga_harian',$row->harga_harian),
								'jangka_waktu'	=>	set_value('jangka_waktu',$row->jangka_waktu),
								'keterangan'	=>	set_value('keterangan',$row->keterangan),
							];

    $this->temp_backend->view('content/paket/form',$data);
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
										'nama_paket'	=>	$this->input->post('nama_paket',true),
										'harga_paket'	=>	$this->input->post('harga_paket',true),
										'harga_harian'	=>	$this->input->post('harga_harian',true),
										'jangka_waktu'	=>	$this->input->post('jangka_waktu',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
										'modified'	=>	date("Y-m-d H:i:s"),
									];

        if ($this->model->get_update($this->table,$update,["id_paket"=>$id])) {
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
    if ($this->model->get_update($this->table,['is_delete'=>1],["id_paket"=>$id])) {
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




} //End Class Paket
