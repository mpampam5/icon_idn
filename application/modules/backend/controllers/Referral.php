<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/controllers/Referral.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-09-02 22:33:01 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Referral extends Backend{

	private $table = "referral";

	public function __construct()
  {
    parent::__construct();
    $this->load->library(array("datatables"));
    $this->load->model("Referral_model","model");
  }


	function _rules()
	{
		$this->form_validation->set_rules("kode_referral","Kode Referral","trim|xss_clean|max_length[50]|required");
		$this->form_validation->set_rules("id_paket","Paket","trim|xss_clean|required");
    $this->form_validation->set_rules("is_active","Is Active","trim|xss_clean|required");
		$this->form_validation->set_rules("keterangan","Keterangan","trim|xss_clean");
		$this->form_validation->set_error_delimiters('<p class="form-text text-danger">','</p>');
	}


	function index()
  {
    $this->temp_backend->set_title('Referral');
    $this->temp_backend->view('content/referral/index');
  }


	function json()
  {
    header('Content-Type: application/json');
    echo $this->model->json();
  }


	function detail($id)
  {
    if ($row = $this->model->get_where($this->table,['id_referral'=>$id])) {
      	$this->temp_backend->set_title('Referral');
        $data = [
									'kode_referral'	=>	$row->kode_referral,
									'id_paket'	=>	$row->id_paket,
									'keterangan'	=>	$row->keterangan,
									'created'	=>	$row->created,
									'is_active'	=>	$row->is_active,
									'is_delete'	=>	$row->is_delete,
								];
      $this->temp_backend->view('content/referral/detail',$data);
    }else {
      $this->_error404();
    }
  }


function add()
{
    $this->temp_backend->set_title('Referral');
      $data = [
                'button' => 'tambah',
                'action' => site_url('backend/referral/add_action'),
								'kode_referral'	=>	set_value('kode_referral',$this->_kode()),
								'id_paket'	=>	set_value('id_paket'),
								'keterangan'	=>	set_value('keterangan'),
                'is_active'	=>	set_value('is_active'),
							];

    $this->temp_backend->view('content/referral/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $insert = [
										'kode_referral'	=>	$this->input->post('kode_referral',true),
										'id_paket'	=>	$this->input->post('id_paket',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
										'created'	=>	date('Y-m-d H:i:s'),
										'is_active'	=>	$this->input->post('is_active',true),
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
  if ($row = $this->model->get_where($this->table,['id_referral'=>$id])) {
    $this->temp_backend->set_title('Referral');

      $data = [
                'button' => 'edit',
                'action' => site_url('backend/referral/update_action/'.$id),
								'kode_referral'	=>	set_value('kode_referral',$row->kode_referral),
								'id_paket'	=>	set_value('id_paket',$row->id_paket),
								'keterangan'	=>	set_value('keterangan',$row->keterangan),
								'is_active'	=>	set_value('is_active',$row->is_active),
							];

    $this->temp_backend->view('content/referral/form',$data);
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
										'kode_referral'	=>	$this->input->post('kode_referral',true),
										'id_paket'	=>	$this->input->post('id_paket',true),
										'keterangan'	=>	$this->input->post('keterangan',true),
										'is_active'	=>	$this->input->post('is_active',true),
									];

        if ($this->model->get_update($this->table,$update,["id_referral"=>$id])) {
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
    if ($this->model->get_delete($this->table,["id_referral"=>$id])) {
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


function _kode()
{

	$q = $this->db->query("SELECT MAX(RIGHT(kode_referral,4)) AS kd_reff FROM referral WHERE DATE(created)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_reff)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Makassar');
        return "REF".date('dmy').$kd;
}

} //End Class Referral
