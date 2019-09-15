<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Tb_member.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-09-10 23:05:10 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Tb_member extends Backend{

	private $table = "tb_member";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Tb_member_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("nik","Nik","trim|xss_clean|max_length[30]|required");
		$this->form_validation->set_rules("nama","Nama","trim|xss_clean|max_length[150]|required");
		$this->form_validation->set_rules("email","Email","trim|xss_clean|max_length[100]|required");
		$this->form_validation->set_rules("telepon","Telepon","trim|xss_clean|max_length[20]|required");
		$this->form_validation->set_rules("alamat","Alamat","trim|xss_clean|required");
		$this->form_validation->set_rules("jenis_kelamin","Jenis Kelamin","trim|xss_clean|required");
		$this->form_validation->set_rules("tempat_lahir","Tempat Lahir","trim|xss_clean|max_length[100]|required");
		$this->form_validation->set_rules("tanggal_lahir","Tanggal Lahir","trim|xss_clean|required");
		$this->form_validation->set_rules("image","Image","trim|xss_clean|max_length[50]");
		$this->form_validation->set_rules("created","Created","trim|xss_clean");
		$this->form_validation->set_rules("modified","Modified","trim|xss_clean");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Member');
    $this->temp_backend->view('content/tb_member/index');
  }



	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }


	function detail($id)
  {
    if ($row = $this->model->get_detail_members($id)) {
      	$this->temp_backend->set_title('Member');
        $data = [
                  'kode_registrasi' => $row->kode_registrasi,
									'nik'	=>	$row->nik,
									'nama'	=>	$row->nama,
									'email'	=>	$row->email,
									'telepon'	=>	$row->telepon,
									'alamat'	=>	$row->alamat,
									'jenis_kelamin'	=>	$row->jenis_kelamin,
									'tempat_lahir'	=>	$row->tempat_lahir,
									'tanggal_lahir'	=>	$row->tanggal_lahir,
									'created'	=>	$row->created,
                  'is_verifikasi'=> $row->is_verifikasi,
								];
      $this->temp_backend->view('content/tb_member/detail',$data);
    }else {
      $this->_error404();
    }
  }


function add()
{
    $this->temp_backend->set_title('Member');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/tb_member/add_action'),
								'nik'	=>	set_value('nik'),
								'nama'	=>	set_value('nama'),
								'email'	=>	set_value('email'),
								'telepon'	=>	set_value('telepon'),
								'alamat'	=>	set_value('alamat'),
								'jenis_kelamin'	=>	set_value('jenis_kelamin'),
								'tempat_lahir'	=>	set_value('tempat_lahir'),
								'tanggal_lahir'	=>	set_value('tanggal_lahir'),
								'image'	=>	set_value('image'),
								'created'	=>	set_value('created'),
								'modified'	=>	set_value('modified'),
							];

    $this->temp_backend->view('content/tb_member/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'nik'	=>	$this->input->post('nik',true),
										'nama'	=>	$this->input->post('nama',true),
										'email'	=>	$this->input->post('email',true),
										'telepon'	=>	$this->input->post('telepon',true),
										'alamat'	=>	$this->input->post('alamat',true),
										'jenis_kelamin'	=>	$this->input->post('jenis_kelamin',true),
										'tempat_lahir'	=>	$this->input->post('tempat_lahir',true),
										'tanggal_lahir'	=>	$this->input->post('tanggal_lahir',true),
										// 'image'	=>	$this->input->post('image',true),
										'created'	=>	date("Y-m-d h:i:s"),
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
  if ($row = $this->model->get_where($this->table,['id_member'=>$id])) {
    $this->temp_backend->set_title('Member');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/tb_member/update_action/'.$id),
								'nik'	=>	set_value('nik',$row->nik),
								'nama'	=>	set_value('nama',$row->nama),
								'email'	=>	set_value('email',$row->email),
								'telepon'	=>	set_value('telepon',$row->telepon),
								'alamat'	=>	set_value('alamat',$row->alamat),
								'jenis_kelamin'	=>	set_value('jenis_kelamin',$row->jenis_kelamin),
								'tempat_lahir'	=>	set_value('tempat_lahir',$row->tempat_lahir),
								'tanggal_lahir'	=>	set_value('tanggal_lahir',$row->tanggal_lahir),
								'image'	=>	set_value('image',$row->image),
								'created'	=>	set_value('created',$row->created),
								'modified'	=>	set_value('modified',$row->modified),
							];

    $this->temp_backend->view('content/tb_member/form',$data);
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
										'nik'	=>	$this->input->post('nik',true),
										'nama'	=>	$this->input->post('nama',true),
										'email'	=>	$this->input->post('email',true),
										'telepon'	=>	$this->input->post('telepon',true),
										'alamat'	=>	$this->input->post('alamat',true),
										'jenis_kelamin'	=>	$this->input->post('jenis_kelamin',true),
										'tempat_lahir'	=>	$this->input->post('tempat_lahir',true),
										'tanggal_lahir'	=>	$this->input->post('tanggal_lahir',true),
										// 'image'	=>	$this->input->post('image',true),
										'modified'	=>	date("Y-m-d h:i:s"),
									];

        if ($this->model->get_update($this->table,$update,["id_member"=>$id])) {
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
    if ($this->model->get_delete($this->table,["id_member"=>$id])) {
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




} //End Class Tb_member
