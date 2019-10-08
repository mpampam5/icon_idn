<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* modules/backend/models/Tb_member_model.php */
/* MPAMPAM CRUD GENERATOR */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* DIBUAT OLEH MPAMPAM CRUD GENERTOR 2019-09-10 23:05:10 */
/* https://mpampam.com */
/* DI GUNAKAN OLEH USER Muhammad ippank */


class Tb_member_model extends MY_Model{

	private $table = "trans_member";


	function json()
	{

    $where = array(	'is_verifikasi'=> 1,
                    'is_delete !=' => '1'
                    );
		$this->datatables->select('trans_member.id_trans_member,
                                trans_member.kode_registrasi,
                                trans_member.id_member,
                                trans_member.is_active,
                                trans_member.is_verifikasi,
                                trans_member.created,
                                trans_member.is_delete,
                                tb_member.nik,
                                tb_member.nama,
                                tb_member.email,
                                tb_member.telepon'
                              );
		$this->datatables->from($this->table);
    $this->datatables->join("tb_member","tb_member.id_member = trans_member.id_member");
    $this->datatables->where($where);
    $this->datatables->add_column('action',
                                  '
																	<a href="'.site_url("backend/tb_member/detail/$1").'" id="detail" class="btn btn-link p-a-5 text-info" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-file"></i></a>
                                  <a href="'.site_url("backend/tb_member/update/$1").'" id="update" class="btn btn-link p-a-5 text-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="'.site_url("backend/tb_member/delete/$1").'" id="hapus" class="btn btn-link p-a-5 text-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>',
                                  'id_member');
    return $this->datatables->generate();
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
                        ->from($this->table)
                        ->join("tb_member","tb_member.id_member = trans_member.id_member")
												->join("paket","paket.id_paket = trans_member.id_paket")
                        ->where("trans_member.id_member",$id_member)
                        ->where("trans_member.is_delete !=",'1')
                        ->get()
												->row();
}



} /*End Class Tb_member_model*/
