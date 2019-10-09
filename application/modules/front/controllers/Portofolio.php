<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("template");
    $this->load->helper("front");
  }

  function detail($id,$titile="")
  {

    if ($query = $this->db->get_where("portofolio",["id_portofolio"=>$id])->row()) {
      $this->template->set_title("Portofolio");
      $data['porto']  = $query;
      $this->template->view("content/portofolio/index",$data);
    }else {
      $this->load->view("error/error404");
    }




  }

}
