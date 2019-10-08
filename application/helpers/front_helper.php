<?php defined('BASEPATH') OR exit('No direct script access allowed');


function profile($field){
  $ci=get_instance();
  $row = $ci->db->get_where("setting",["id"=>999])->row();
  return $row->$field;
}


function format_rupiah($int)
{
  return number_format($int, 0, ',', '.');
}
