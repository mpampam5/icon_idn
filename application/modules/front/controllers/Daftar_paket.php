<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_paket extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("template");
    $this->load->helper(array("captcha","front"));
  }


  function _rules()
{
  $this->form_validation->set_rules("nik","&nbsp;*","trim|xss_clean|required|numeric|callback__cek_nik");
  $this->form_validation->set_rules("nama","&nbsp;*","trim|xss_clean|htmlspecialchars|required");
  $this->form_validation->set_rules("email","&nbsp;*","trim|xss_clean|htmlspecialchars|required|valid_email|callback__cek_email");
  $this->form_validation->set_rules("telepon","&nbsp;*","trim|xss_clean|required|numeric");
  $this->form_validation->set_rules("tempat_lahir","&nbsp;*","trim|htmlspecialchars|xss_clean|required");
  $this->form_validation->set_rules("tanggal_lahir","&nbsp;*","trim|htmlspecialchars|xss_clean|required");
  $this->form_validation->set_rules("jenis_kelamin","&nbsp;*","trim|xss_clean|htmlspecialchars|required");
  $this->form_validation->set_rules("alamat","&nbsp;*","trim|xss_clean|htmlspecialchars|required");
  $this->form_validation->set_rules("paket","&nbsp;*","trim|xss_clean|htmlspecialchars|required|numeric");
  $this->form_validation->set_rules("captcha","* Captcha Key","trim|xss_clean|required");
  $this->form_validation->set_error_delimiters('<i class="text-danger" style="font-size:10px">','</i>');
}


  function form($id="")
  {
    $this->template->set_title("Dapatkan Voucher");
    $data['capt_image'] = $this->create_captcha();
    $data['action'] = site_url("action-form");
    $data['status'] = $id;
    $data['paket']  = $this->db->get_where("paket",["is_delete"=>0])->result();
    $this->template->view("content/daftar_paket/index",$data);
  }

  function action()
  {
    if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array(),'captcha_status'=>false,'alert_captcha'=>array());
      $this->load->library(array("form_validation"));
      $this->_rules();
      if ($this->form_validation->run()) {
        $json['success'] = true;

        if ($this->input->post("captcha",true) == $this->session->userdata("captcha_word")) {

          $nik                = $this->input->post("nik",true);
          $nama               = $this->input->post("nama",true);
          $email              = $this->input->post("email",true);
          $telepon            = $this->input->post("telepon",true);
          $tempat_lahir       = $this->input->post("tempat_lahir",true);
          $tgl_lahir          = $this->input->post("tanggal_lahir",true);
          $jk                 = $this->input->post("jenis_kelamin",true);
          $alamat             = $this->input->post("alamat",true);
          $paket              = $this->input->post("paket",true);

          $insert_member = [    "nik"             => $nik,
                                "nama"            => $nama,
                                "telepon"         => $telepon,
                                "email"           => $email,
                                "jenis_kelamin"   => $jk,
                                "tempat_lahir"    => $tempat_lahir,
                                "tanggal_lahir"     => date("Y-m-d",strtotime($tgl_lahir)),
                                "alamat"           => $alamat,
                                "created"       => date("Y-m-d H:i:s"),
                            ];

          // insert member
          $this->db->insert("tb_member",$insert_member);
          //
          $last_id = $this->db->insert_id();


          $insert_trans = array('kode_registrasi' => $this->_kode(),
																'id_member'	=> $last_id,
																'id_paket'	=> $paket,
																'is_verifikasi' => 0,
                                "is_delete" => "0",
																'created'	=>	date("Y-m-d h:i:s"),
																);
          $this->db->insert("trans_member",$insert_trans);



          $json['captcha_status'] = true;
          $json['alert'] = "pendaftaran sukses, data yang anda masukkan dalam proses verifikasi.";
        }else {
          $json['alert_captcha'] = '<label class="text-danger" style="font-size:10px"> Kode Captcha tidak valid</label>';
        }
      }else {
        foreach ($_POST as $key => $value)
        {
          $json['alert'][$key] = form_error($key);
        }
      }




      echo json_encode($json);
    }
  }


  function create_captcha()
{
  $vals = array(
        'img_path'      => './temp/captcha/',
        'img_url'       => base_url("temp/captcha/"),
        'img_width'     => '200',
        'img_height'    => 50,
        'expiration'    => 7200,
        'word_length'   => 5,
        'font_size'     => 16,

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(32, 32, 32),
                'border' => array(255, 255, 255),
                'text' => array(255, 161, 0),
                'grid' => array(0, 133, 255)
        )
);

$capt = create_captcha($vals);
$image = $capt["image"];
$this->session->unset_userdata('captcha_word');
$this->session->set_userdata("captcha_word",$capt["word"]);
return $image;
}


function refresh_captcha()
{
  $vals = array(
        'img_path'      => './temp/captcha/',
        'img_url'       => base_url("temp/captcha/"),
        'img_width'     => '200',
        'img_height'    => 50,
        'expiration'    => 7200,
        'word_length'   => 5,
        'font_size'     => 16,

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(32, 32, 32),
                'border' => array(255, 255, 255),
                'text' => array(255, 161, 0),
                'grid' => array(0, 133, 255)
        )
);

  $capt = create_captcha($vals);
  $image = $capt["image"];
  $this->session->unset_userdata('captcha_word');
  $this->session->set_userdata("captcha_word",$capt["word"]);
  echo $image;
}

function _cek_nik($str)
  {
    $where =  array("nik"=>$str,"is_delete"=>  "0");
    $query = $this->db->select("trans_member.id_member,
                                trans_member.is_delete,
                                tb_member.nik")
                      ->from("trans_member")
                      ->join("tb_member","tb_member.id_member = trans_member.id_member")
                      ->where($where)
                      ->get()
                      ->row();
    if ($query) {
      $this->form_validation->set_message('_cek_nik', '{field} sudah terdaftar.');
      return false;
    } else {
      return true;
    }
  }

  function _cek_email($str)
  {
    $where =  array("email"=>$str,"is_delete"=>  "0");
    $query = $this->db->select("trans_member.id_member,
                                trans_member.is_delete,
                                tb_member.email")
                      ->from("trans_member")
                      ->join("tb_member","tb_member.id_member = trans_member.id_member")
                      ->where($where)
                      ->get()
                      ->row();
    if ($query) {
      $this->form_validation->set_message('_cek_email', '{field} sudah terdaftar.');
      return false;
    } else {
      return true;
    }
  }


  function _kode()
    {
      $q = $this->db->query("SELECT MAX(RIGHT(kode_registrasi,4)) AS kd_trans FROM trans_member WHERE DATE(created)=CURDATE()");
          $kd = "";
          if($q->num_rows()>0){
              foreach($q->result() as $k){
                  $tmp = ((int)$k->kd_trans)+1;
                  $kd = sprintf("%04s", $tmp);
              }
          }else{
              $kd = "0001";
          }
          date_default_timezone_set('Asia/Makassar');
          return "ICON".date('dmy').$kd;
    }


}
