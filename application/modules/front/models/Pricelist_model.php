<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricelist_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  function get_data()
  {
    return $this->db->select("kategori.kategori,
                              kategori.is_delete,
                              paket_layanan.id_layanan,
                              paket_layanan.layanan,
                              paket_layanan.harga,
                              paket_layanan.harga_per_kepala,
                              paket_layanan.keterangan,
                              paket_layanan.id_kategori")
                    ->from("paket_layanan")
                    ->join("kategori","kategori.id_kategori = paket_layanan.id_kategori","left")
                    // ->where("kategori.is_delete !=",1);
                    ->order_by("kategori.kategori","DESC")
                    ->get()
                    ->result();
  }

}
