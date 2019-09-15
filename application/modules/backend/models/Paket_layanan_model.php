<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/models/Paket_layanan_model.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-08-31 00:40:57 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Paket_layanan_model extends MY_Model{

	private $table = "paket_layanan";


	function json()
	{
		$this->datatables->select('id_layanan,layanan,format(harga,0) as harga,harga_per_kepala,paket_layanan.id_kategori,kategori');
		$this->datatables->from($this->table);
		$this->datatables->join('kategori',"paket_layanan.id_kategori=kategori.id_kategori","left");
    $this->datatables->add_column('action',
                                  '<a href="'.site_url("backend/paket_layanan/detail/$1").'" id="detail" class="btn btn-link p-a-5 text-info" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-file"></i></a>
                                  <a href="'.site_url("backend/paket_layanan/update/$1").'" id="update" class="btn btn-link p-a-5 text-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="'.site_url("backend/paket_layanan/delete/$1").'" id="hapus" class="btn btn-link p-a-5 text-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>',
                                  'id_layanan');
    return $this->datatables->generate();
	}


	function detail_kategori($id)
	{
		return  $this->db->select('id_layanan,layanan,format(harga,0) as harga,harga_per_kepala,paket_layanan.id_kategori,kategori,keterangan')
											->from($this->table)
											->join('kategori',"paket_layanan.id_kategori=kategori.id_kategori","left")
											->where('id_layanan',$id)
											->get()
											->row();
	}




} /*End Class Paket_layanan_model*/
