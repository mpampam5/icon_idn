<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Backend{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Home_model","model");
  }

  function index()
  {
    $this->temp_backend->set_title('home');
    $data['member_active'] = $this->model->get_members_status(1);
    $data['member_off'] = $this->model->get_members_status(0);
    $data['marketing_active'] = $this->model->get_marketing(1);
    $data['marketing_off'] = $this->model->get_marketing(0);
    $this->temp_backend->view('content/home/index',$data);
  }

  function detail($id)
  {
    if ($row = $this->model->get_detail_members($id)) {
        $data = [ 'id_member' => $row->id_member,
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
                  'from_add'=> $row->from_add,
                  'id_personals' => $row->id_personals,
                  'masa_aktif' => $row->masa_aktif,
                  'nama_paket' => $row->nama_paket
								];
      $this->temp_backend->view('content/home/detail_member',$data,false);
    }else {
      $this->_error404();
    }
  }

  function email($id)
  {
    if ($this->send_id_card($id)==1) {
      echo '<p class="text-success"> <i class="fa fa-check"></i> Berhasil mengirim</p>';
    }else {
      echo '<p class="text-danger"> <i class="fa fa-close"></i> Gagal mengirim</p>';
    }
  }

  function json_search()
  {
    $keyword = $this->input->post('keyword');
    if ($keyword=="") {
      $output ="<p class='text-center text-info' style='font-size:12px'>FORM SEARCH TIDAK BOLEH KOSONG</p>";
    }else {
      $query = $this->model->get_members($keyword);
      $output = "<p class='text-center text-info' style='font-size:12px'>QUERY PENCARIAN : <i style='text-decoration: underline;font-weight:bold'>$keyword</i></p>";
      if ($query->num_rows() > 0) {
        $data['query'] = $query;

        $output .= $this->load->view('content/home/list-search',$data,true);

      }else {
        $output .="<p class='text-center text-info' style='font-size:12px'>DATA MEMBER TIDAK DITEMUKAN</p>";
      }
    }



    $callback = array(
      'data' => $output, // Set array hasil dengan isi dari view.php yang diload tadi
    );
    echo json_encode($callback);
  }




}
