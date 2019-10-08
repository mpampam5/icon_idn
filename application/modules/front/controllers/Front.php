<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("template");
    $this->load->helper("front");
  }

  function index()
  {
    $this->template->set_title("Home");
    $data['paket']  = $this->db->get_where("paket",["is_delete"=>0])->result();
    $this->template->view("index",$data);
  }

}
