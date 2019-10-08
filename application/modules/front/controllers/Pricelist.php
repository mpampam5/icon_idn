<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricelist extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("template");
    $this->load->helper(array("front"));
    $this->load->model("Pricelist_model","model");
  }

  function index()
  {
    $this->template->set_title("Pricelist");
    $data['layanan']  = $this->model->get_data();
    $this->template->view("content/pricelist/index",$data);
  }

}
