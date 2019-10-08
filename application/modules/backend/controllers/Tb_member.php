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
		$this->form_validation->set_rules("nik","Nik","trim|xss_clean|max_length[30]|required|numeric");
		$this->form_validation->set_rules("nama","Nama","trim|xss_clean|max_length[150]|required");

		$this->form_validation->set_rules("telepon","Telepon","trim|xss_clean|max_length[20]|required|numeric");
		$this->form_validation->set_rules("alamat","Alamat","trim|xss_clean|required");
		$this->form_validation->set_rules("jenis_kelamin","Jenis Kelamin","trim|xss_clean|required");
		$this->form_validation->set_rules("tempat_lahir","Tempat Lahir","trim|xss_clean|max_length[100]|required");
		$this->form_validation->set_rules("tanggal_lahir","Tanggal Lahir","trim|xss_clean|required");
		$this->form_validation->set_rules("id_paket","Paket","trim|xss_clean|required");
		$this->form_validation->set_rules("is_active","Active","trim|xss_clean|required");
		// $this->form_validation->set_rules("image","Image","trim|xss_clean|max_length[50]");
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

	function email($id)
  {
    if ($this->send_id_card($id)==1) {
      echo '<p class="text-success"> <i class="fa fa-check"></i> Berhasil mengirim</p>';
    }else {
      echo '<p class="text-danger"> <i class="fa fa-close"></i> Gagal mengirim</p>';
    }
  }

	function view_voucher($id)
  {
		if ($row = $this->model->get_detail_members($id)) {
			$data['row'] = $row;
	    $this->load->view('backend/content/email/template_email',$data,false);
		}
  }


	function detail($id)
  {
    if ($row = $this->model->get_detail_members($id)) {
      	$this->temp_backend->set_title('Member');
        $data = [
									'id_member' => $row->id_member,
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
									'paket'=> $row->nama_paket,
									'is_active'=> $row->is_active,
									'masa_aktif'=> $row->masa_aktif,
									'from_add'=> $row->from_add,
									'id_personals'=> $row->id_personals,
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
								'id_paket'	=>	set_value('id_paket'),
								'is_active'	=>	set_value('is_active'),
								'from_add'	=>	set_value('from_add'),
								'id_personals'	=>	set_value('id_personals'),
							];

    $this->temp_backend->view('content/tb_member/form',$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
			$this->form_validation->set_rules("from_add","&nbsp;","trim|xss_clean|required");
			$this->form_validation->set_rules("id_personals","&nbsp;","trim|xss_clean|numeric|required");
			$this->form_validation->set_rules("email","Email","trim|xss_clean|max_length[100]|required|valid_email|callback__cekEmail");
      $this->_rules();
      if ($this->form_validation->run()) {
				$paket = $this->input->post("id_paket");
				$days = hitung_masa_berlaku($paket);
				$created	=	date("Y-m-d h:i:s");
				$time_expire = date('Y-m-d h:i:s', strtotime("+$days days", strtotime($created)));
        $insert = [
										'nik'	=>	$this->input->post('nik',true),
										'nama'	=>	$this->input->post('nama',true),
										'email'	=>	$this->input->post('email',true),
										'telepon'	=>	$this->input->post('telepon',true),
										'alamat'	=>	$this->input->post('alamat',true),
										'jenis_kelamin'	=>	$this->input->post('jenis_kelamin',true),
										'tempat_lahir'	=>	$this->input->post('tempat_lahir',true),
										'tanggal_lahir'	=>	date("Y-m-d",strtotime($this->input->post('tanggal_lahir',true))),
										'created'	=>	date("Y-m-d h:i:s")
									];

        	$this->model->get_insert($this->table,$insert);

					$last_id = $this->db->insert_id();

					$insert_trans = array('kode_registrasi' => $this->_kode(),
																'id_member'	=> $last_id,
																'id_paket'	=> $paket,
																'masa_aktif'	=> $time_expire,
																'is_active'	=> $this->input->post("is_active"),
																'is_verifikasi' => 1,
																'created'	=>	date("Y-m-d h:i:s"),
																'from_add'	=>	$this->input->post("from_add"),
																'id_personals' => $this->input->post("id_personals")
																);

					$this->model->get_insert("trans_member",$insert_trans);

          $json['alert']   = '<div id="alert" class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check"></i> Berhasil Menambahkan.
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


function update($id)
{
  if ($row = $this->model->get_detail_members($id)) {
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
								'id_paket'	=>	set_value('id_paket',$row->id_paket),
								'is_active'	=>	set_value('is_active',$row->is_active),
								'created'	=>	set_value('is_active',$row->created),
								'from_add'	=>	set_value('from_add',$row->from_add),
								'id_personals'	=>	set_value('id_personals',$row->id_personals),
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
			$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email|callback__cekEmailedit['.$id.']');
      $this->_rules();
      if ($this->form_validation->run()) {
				$paket = $this->input->post("id_paket");
				$days = hitung_masa_berlaku($paket);
				$created	=	$this->input->post("created");
				$time_expire = date('Y-m-d h:i:s', strtotime("+$days days", strtotime($created)));


        $update = [
										'nik'	=>	$this->input->post('nik',true),
										'nama'	=>	$this->input->post('nama',true),
										'email'	=>	$this->input->post('email',true),
										'telepon'	=>	$this->input->post('telepon',true),
										'alamat'	=>	$this->input->post('alamat',true),
										'jenis_kelamin'	=>	$this->input->post('jenis_kelamin',true),
										'tempat_lahir'	=>	$this->input->post('tempat_lahir',true),
										'tanggal_lahir'	=>	$this->input->post('tanggal_lahir',true),
										'modified'	=>	date("Y-m-d h:i:s"),
									];

        	$this->model->get_update($this->table,$update,["id_member"=>$id]);

					$update_trans = array('id_paket'	=> $paket,
																'masa_aktif'	=> $time_expire,
																'is_active'	=> $this->input->post("is_active"),
																'modified'	=>	date("Y-m-d h:i:s"),
																);
					$this->model->get_update("trans_member",$update_trans,["id_member"=>$id]);

          $json['alert']   = '<div id="alert" class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check"></i> Berhasil Mengedit.
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


function delete($id)
{
  if ($this->input->is_ajax_request()) {
    $this->model->get_update("trans_member",['is_delete'=>1],["id_member"=>$id]);
      $json['alert']   = '<div id="alert" class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check"></i> Berhasil Menghapus.
                          <div>';
    echo json_encode($json);
  }
}

function _kode()
{

	$q = $this->db->query("SELECT MAX(RIGHT(kode_registrasi,4)) AS kd_reff FROM trans_member WHERE DATE(created)=CURDATE()");
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
        return "ICON".date('dmy').$kd;
}

function _cekEmail($str)
{
	$query = $this->db->select("trans_member.id_member,
															trans_member.is_delete,
															tb_member.email")
										->from("trans_member")
										->join("tb_member","tb_member.id_member = trans_member.id_member")
										->where("email",$str)
										->where("is_delete","0")
										->get();

	if ($query->num_rows() > 0) {
			$this->form_validation->set_message('_cekEmail', '{field} sudah ada');
			return FALSE;
	}else {
			return TRUE;
	}
}

function _cekEmailedit($str,$id)
{
	$query = $this->db->select("trans_member.id_member,
															trans_member.is_delete,
															tb_member.email")
										->from("trans_member")
										->join("tb_member","tb_member.id_member = trans_member.id_member")
										->where("trans_member.id_member!=",$id)
										->where("email",$str)
										->where("is_delete","0")
										->get();

	if ($query->num_rows() > 0) {
			$this->form_validation->set_message('_cekEmailedit', '{field} sudah ada');
			return FALSE;
	}else {
			return TRUE;
	}
}


function marketing(){
        $personal  = $this->db->get_where('tb_marketing',array('is_delete'=>"0","is_active"=>"1"));
        echo '<option value="">-- Pilih --</option>';
        foreach ($personal->result() as $k)
        {
            echo "<option value='$k->id_marketing'>$k->nama</option>";
        }
    }

} //End Class Tb_member
