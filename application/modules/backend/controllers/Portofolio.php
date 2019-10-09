<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Portofolio.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-10-09 22:22:26 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Portofolio extends Backend{

	private $table = "portofolio";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Portofolio_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("nama","Nama","trim|xss_clean|max_length[255]|required");
		$this->form_validation->set_rules("keterangan","Keterangan","trim|xss_clean");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Portofolio');
    $this->temp_backend->view('content/portofolio/index');
  }


	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }


  function json_image($id)
  {
    header('Content-Type: application/json');
    echo $this->model->json_image($id);
  }


	function detail($id)
  {
    if ($row = $this->model->get_where($this->table,['id_portofolio'=>$id])) {
      	$this->temp_backend->set_title('Portofolio');
        $data = [
                  'id_portofolio'	=>	$row->id_portofolio,
									'nama'	=>	$row->nama,
									'keterangan'	=>	$row->keterangan,
								];
      $this->temp_backend->view('content/portofolio/detail',$data);
    }else {
      $this->_error404();
    }
  }


function add()
{
    $this->temp_backend->set_title('Portofolio');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/portofolio/add_action'),
								'nama'	=>	set_value('nama'),
								'keterangan'	=>	set_value('keterangan'),
							];

    $this->temp_backend->view('content/portofolio/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'nama'	=>	$this->input->post('nama',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
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
  if ($row = $this->model->get_where($this->table,['id_portofolio'=>$id])) {
    $this->temp_backend->set_title('Portofolio');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/portofolio/update_action/'.$id),
								'nama'	=>	set_value('nama',$row->nama),
								'keterangan'	=>	set_value('keterangan',$row->keterangan),
							];

    $this->temp_backend->view('content/portofolio/form',$data);
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
										'nama'	=>	$this->input->post('nama',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
									];

        if ($this->model->get_update($this->table,$update,["id_portofolio"=>$id])) {
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
    if ($this->model->get_delete($this->table,["id_portofolio"=>$id])) {
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


function delete_image($id)
{
  if ($this->input->is_ajax_request()) {
    $row = $this->model->get_where("image",['id_image'=>$id]);
    $Path = "./temp/file/".$row->name;
    if (file_exists($Path)){
        unlink($Path);
    }

    if ($this->model->get_delete("image",["id_image"=>$id])) {
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


function do_upload($id)
      {
        if ($this->input->is_ajax_request()) {
            $json = array('success' =>false , "alert"=> array(), "file_name"=>array());
            $image = "portofolio_".date("dmyHis").".".pathinfo($_FILES['foto_personal']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = "./temp/file/";
            $config['allowed_types'] = 'jpg';
            $config['overwrite'] = true;
            $config['max_size']  = '1024';
            $config['file_name']  = "$image";


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_personal')){
                $json['header_alert'] = "error";
                $json['alert'] = "File tidak valid, format file harus jpg & ukuran maksimal 1mb";
            }else {
                $this->model->get_insert("image",["id_portofolio"=>$id,"name"=>$image]);
                $json['header_alert'] = "success";
                $json['file_name'] = $image;
                $json['alert'] = "File upload successfully.";
                $json['success'] = true;
            }

            echo json_encode($json);

      }
    }




} //End Class Portofolio
