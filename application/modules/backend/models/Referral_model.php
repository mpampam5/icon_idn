<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/models/Referral_model.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-09-02 22:33:01 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Referral_model extends MY_Model{

	private $table = "referral";


	function json()
	{
		$this->datatables->select('referral.id_referral,
                                referral.kode_referral,
                                referral.id_paket,
                                date_format(referral.created,"%d/%m/%Y") as created,
                                referral.is_active,
                                referral.is_delete,
                                paket.nama_paket,
                                paket.is_delete');
		$this->datatables->from($this->table);
    $this->datatables->join('paket',"paket.id_paket = referral.id_paket");
    $this->datatables->where('referral.is_delete',0);
    $this->datatables->add_column('action',
                                  '<a href="'.site_url("backend/referral/detail/$1").'" id="detail" class="btn btn-link p-a-5 text-info" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-file"></i></a>
                                  <a href="'.site_url("backend/referral/update/$1").'" id="update" class="btn btn-link p-a-5 text-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="'.site_url("backend/referral/delete/$1").'" id="hapus" class="btn btn-link p-a-5 text-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>',
                                  'id_referral');
    return $this->datatables->generate();
	}


	




} /*End Class Referral_model*/
