<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Marketing.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-09-22 19:49:53 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Marketing extends Backend{

	private $table = "tb_marketing";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Marketing_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("nama","Nama","trim|xss_clean|max_length[150]|required");
		$this->form_validation->set_rules("telepon","Telepon","trim|xss_clean|max_length[30]|required|numeric");
		$this->form_validation->set_rules("email","Email","trim|xss_clean|max_length[100]|required|valid_email");
		$this->form_validation->set_rules("alamat","Alamat","trim|xss_clean|required");
    $this->form_validation->set_rules("status","Status","trim|xss_clean|required");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Marketing');
    $this->temp_backend->view('content/marketing/index');
  }


	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }


	function detail($id)
  {
    if ($row = $this->model->get_where($this->table,['id_marketing'=>$id])) {
      	$this->temp_backend->set_title('Marketing');
        $data = [
									'id_marketing' => $row->id_marketing,
									'nama'	=>	$row->nama,
									'telepon'	=>	$row->telepon,
									'email'	=>	$row->email,
									'alamat'	=>	$row->alamat,
									'username'	=>	$row->username,
									'password'	=>	$row->password,
                  'is_active'	=>	$row->is_active,
								];
      $this->temp_backend->view('content/marketing/detail',$data);
    }else {
      $this->_error404();
    }
  }


function add()
{
    $this->temp_backend->set_title('Marketing');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/marketing/add_action'),
								'nama'	=>	set_value('nama'),
								'telepon'	=>	set_value('telepon'),
								'email'	=>	set_value('email'),
								'alamat'	=>	set_value('alamat'),
                'is_active'	=>	set_value('is_active'),
								'username'	=>	set_value('username'),
								'password'	=>	set_value('password'),
							];

    $this->temp_backend->view('content/marketing/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->form_validation->set_rules("username","Username","trim|xss_clean|max_length[100]|required|alpha_numeric");
      $this->form_validation->set_rules("password","Password","trim|xss_clean|max_length[255]|required|min_length[5]");
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'nama'	=>	$this->input->post('nama',true),
										'telepon'	=>	$this->input->post('telepon',true),
										'email'	=>	$this->input->post('email',true),
										'alamat'	=>	$this->input->post('alamat',true),
                    'is_active'	=>	$this->input->post('status',true),
										'username'	=>	$this->input->post('username',true),
										'password'	=>	password_hash($this->input->post('password'),PASSWORD_DEFAULT),
										'created'	=>	date("Y-m-d h:i:s")
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
  if ($row = $this->model->get_where($this->table,['id_marketing'=>$id])) {
    $this->temp_backend->set_title('Marketing');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/marketing/update_action/'.$id),
								'nama'	=>	set_value('nama',$row->nama),
								'telepon'	=>	set_value('telepon',$row->telepon),
								'email'	=>	set_value('email',$row->email),
								'alamat'	=>	set_value('alamat',$row->alamat),
                'is_active'	=>	set_value('is_active',$row->is_active),
							];

    $this->temp_backend->view('content/marketing/form',$data);
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
										'telepon'	=>	$this->input->post('telepon',true),
										'email'	=>	$this->input->post('email',true),
										'alamat'	=>	$this->input->post('alamat',true),
                    'is_active'	=>	$this->input->post('status',true),
										'modified'	=>	date("Y-m-d h:i:s"),
									];

        if ($this->model->get_update($this->table,$update,["id_marketing"=>$id])) {
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
    if ($this->model->get_update($this->table,['is_delete'=>'1'],["id_marketing"=>$id])) {
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


function reset_pass($id)
{
  if ($row = $this->model->get_where($this->table,['id_marketing'=>$id])) {
    $data['action'] = site_url("backend/marketing/reset_pass_act/$row->id_marketing");
    $data['username'] = $row->username;
    $this->temp_backend->view('content/marketing/reset_pass',$data,false);
  }else {
    echo "error 404";
  }
}

function reset_pass_act($id)
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->form_validation->set_rules("password","Password","trim|xss_clean|max_length[255]|required|min_length[5]");
  		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
      if ($this->form_validation->run()) {
        $update = [
										'password'	=>	password_hash($this->input->post('password'),PASSWORD_DEFAULT),
									];

          $this->model->get_update($this->table,$update,["id_marketing"=>$id]);

          $json['alert']   = '<div id="alert" class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check"></i> Berhasil Mereset Password.
                              <div>';

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


} //End Class Marketing
