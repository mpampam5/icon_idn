<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }


}


/**
 * BACKEND
 */
class Backend extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('logged-in')!=true OR $this->session->userdata('logged-in')==null) {
      redirect('adm-panel','refresh');
    }else {
      $this->load->library(array('temp_backend','form_validation'));
      $this->load->helper(array('backend','menuheader'));
    }
  }

  function contoh($id_member)
  {
    $query = $this->db->select('trans_member.id_trans_member,
                              trans_member.kode_registrasi,
                              trans_member.id_member,
                              trans_member.id_paket,
                              trans_member.is_active,
                              trans_member.is_verifikasi,
                              trans_member.created,
                              tb_member.nik,
                              tb_member.nama,
                              tb_member.email,
                              tb_member.telepon,
                              tb_member.alamat,
                              tb_member.jenis_kelamin,
                              tb_member.tempat_lahir,
                              tb_member.tanggal_lahir,
															paket.nama_paket')
                        ->from("trans_member")
                        ->join("tb_member","tb_member.id_member = trans_member.id_member")
												->join("paket","paket.id_paket = trans_member.id_paket")
                        ->where("trans_member.id_member",$id_member)
                        ->where("trans_member.is_delete !=",'1')
                        ->get()
												->row();
    $data['row'] = $query;
    $template = $this->load->view('backend/content/email/template_email',$data);
  }


  function send_id_card($id_member)
  {
    $query = $this->db->select('trans_member.id_trans_member,
                              trans_member.kode_registrasi,
                              trans_member.id_member,
                              trans_member.id_paket,
                              trans_member.is_active,
                              trans_member.is_verifikasi,
                              trans_member.created,
                              trans_member.masa_aktif,
                              tb_member.nik,
                              tb_member.nama,
                              tb_member.email,
                              tb_member.telepon,
                              tb_member.alamat,
                              tb_member.jenis_kelamin,
                              tb_member.tempat_lahir,
                              tb_member.tanggal_lahir,
															paket.nama_paket')
                        ->from("trans_member")
                        ->join("tb_member","tb_member.id_member = trans_member.id_member")
												->join("paket","paket.id_paket = trans_member.id_paket")
                        ->where("trans_member.id_member",$id_member)
                        ->where("trans_member.is_delete !=",'1')
                        ->get()
												->row();
    $data['row'] = $query;
    $template = $this->load->view('backend/content/email/template_email',$data,TRUE);

    $config['charset']      = 'utf-8';
    $config['protocol']     = "smtp";
    $config['mailtype']     = "html";
    $config['smtp_host']    = "ssl://mail.mpampam.com";//pengaturan smtp
    $config['smtp_port']    = 465;
    $config['smtp_user']    = "info@mpampam.com"; // isi dengan email kamu
    $config['smtp_pass']    = "@@111111qwerty"; // isi dengan password kamu
    $config['smtp_timeout'] = 4; //4 second
    $config['crlf']         ="\r\n";
    $config['newline']      ="\r\n";

    $this->load->library('email',$config);
    //konfigurasi pengiriman

    $this->email->from($config['smtp_user'],"ICON INDONESIA");
    $this->email->to($query->email);
    $this->email->subject("VOUCHER MEMBER");
    $this->email->message($template);
    if ($this->email->send()) {
      return 1;
    }else {
      return 0;
    }
  }

  function _error404()
  {
    $this->temp_backend->set_title('Error 404. Page Not Found');
    $this->temp_backend->view('backend/error/error404');
  }

  function _error403()
  {
    $this->temp_backend->set_title('Error 403. Page Not Permission');
    $this->temp_backend->view('backend/error/error403');
  }



} //end Class Backend
