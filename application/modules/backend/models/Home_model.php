<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_members_status($status)
  {
      return $this->db->select('trans_member.id_trans_member,
                                trans_member.kode_registrasi,
                                trans_member.id_member,
                                trans_member.is_active,
                                trans_member.is_verifikasi')
                          ->from("trans_member")
                          ->where("trans_member.is_delete !=",'1')
                          ->where("is_active",$status)
                          ->get()
                          ->num_rows();
  }

  function get_marketing($active)
  {
    return $this->db->get_where("tb_marketing",["is_delete"=>"0","is_active"=>"$active"])->num_rows();
  }

  function get_members($keyword)
  {
      return $this->db->select('trans_member.id_trans_member,
                                trans_member.kode_registrasi,
                                trans_member.id_member,
                                trans_member.id_paket,
                                trans_member.is_active,
                                trans_member.is_verifikasi,
                                trans_member.created,
                                trans_member.masa_aktif,
                                trans_member.from_add,
  															trans_member.id_personals,
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
                          ->where("trans_member.is_delete !=",'1')
                          ->like("trans_member.kode_registrasi",$keyword)
                          ->or_like("tb_member.nama",$keyword)
                          ->or_like("tb_member.email",$keyword)
                          ->get();
  }


  function get_detail_members($id_member)
  {
      return $this->db->select('trans_member.id_trans_member,
                                trans_member.kode_registrasi,
                                trans_member.id_member,
                                trans_member.id_paket,
                                trans_member.is_active,
                                trans_member.is_verifikasi,
                                trans_member.created,
                                trans_member.from_add,
                                trans_member.id_personals,
                                trans_member.masa_aktif,
                                trans_member.from_add,
  															trans_member.id_personals,
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
  }

}
