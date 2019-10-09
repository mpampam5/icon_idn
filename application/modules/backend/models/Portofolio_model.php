<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/models/Portofolio_model.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-10-09 22:22:26 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Portofolio_model extends MY_Model{

	private $table = "portofolio";


	function json()
	{
		$this->datatables->select('id_portofolio,nama');
		$this->datatables->from($this->table);
    $this->datatables->add_column('action',
                                  '<a href="'.site_url("backend/portofolio/detail/$1").'" id="detail" class="btn btn-link p-a-5 text-info" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-file"></i> detail & tambah gambar</a>
                                  <a href="'.site_url("backend/portofolio/update/$1").'" id="update" class="btn btn-link p-a-5 text-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="'.site_url("backend/portofolio/delete/$1").'" id="hapus" class="btn btn-link p-a-5 text-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>',
                                  'id_portofolio');
    return $this->datatables->generate();
	}


  function json_image($id)
  {
    $this->datatables->select('id_image,id_portofolio,name');
    $this->datatables->from("image");
    $this->datatables->where("id_portofolio",$id);
    $this->datatables->add_column('action',
                                  '<a href="'.site_url("backend/portofolio/delete_image/$1").'" id="hapus" class="btn btn-link p-a-5 text-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>',
                                  'id_image');
    return $this->datatables->generate();
  }




} /*End Class Portofolio_model*/
