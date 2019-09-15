<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/models/Kategori_layanan_model.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-08-31 00:37:42 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Kategori_layanan_model extends MY_Model{

	private $table = "kategori";


	function json()
	{
		$this->datatables->select('id_kategori,kategori,is_delete');
		$this->datatables->from($this->table);
    $this->datatables->where('is_delete',0);
    $this->datatables->add_column('action',
                                  '
                                  <a href="'.site_url("backend/kategori_layanan/update/$1").'" id="update" class="btn btn-link p-a-5 text-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="'.site_url("backend/kategori_layanan/delete/$1").'" id="hapus" class="btn btn-link p-a-5 text-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>',
                                  'id_kategori');
    return $this->datatables->generate();
	}




} /*End Class Kategori_layanan_model*/
