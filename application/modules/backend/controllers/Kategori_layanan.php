<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Kategori_layanan.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-08-31 00:37:42 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Kategori_layanan extends Backend{

	private $table = "kategori";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Kategori_layanan_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("kategori","Kategori","trim|xss_clean|max_length[100]|required");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Kategori Layanan');
    $this->temp_backend->view('content/kategori_layanan/index');
  }


	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }




function add()
{
    $this->temp_backend->set_title('Kategori Layanan');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/kategori_layanan/add_action'),
								'kategori'	=>	set_value('kategori'),
							];

    $this->temp_backend->view('content/kategori_layanan/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'kategori'	=>	$this->input->post('kategori',true),
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
  if ($row = $this->model->get_where($this->table,['id_kategori'=>$id])) {
    $this->temp_backend->set_title('Kategori Layanan');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/kategori_layanan/update_action/'.$id),
								'kategori'	=>	set_value('kategori',$row->kategori),
							];

    $this->temp_backend->view('content/kategori_layanan/form',$data);
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
										'kategori'	=>	$this->input->post('kategori',true),
									];

        if ($this->model->get_update($this->table,$update,["id_kategori"=>$id])) {
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
    if ($this->model->get_update($this->table,["id_kategori"=>$id])) {
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




} //End Class Kategori_layanan
