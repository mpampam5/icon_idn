<?php defined('BASEPATH') OR exit('No direct script access allowed');

function session($str)
{
  $ci=get_instance();
  return $ci->session->userdata($str);
}

function setting($field){
  $ci=get_instance();
  $row = $ci->db->get_where("setting",["id"=>999])->row();
  return $row->$field;
}

function cmb_menu($id="")
{
  $ci =get_instance();
  $query = $ci->db->query("SELECT * FROM  menus WHERE is_parent=0 ORDER BY sort ASC");
  $str = "";
  $str.='<select class="form-control" id="is_parent" name="is_parent">';
  if ($id=="") {
    $str.='<option value="0">Ya</option>';
  }else {
    $str .="<option value='0'";
    $str .= $id==0?" selected='selected'":'';
    $str .=">Ya</option>";
  }
  foreach ($query->result() as $row) {
      $str.= '<option value="'.$row->id.'"';
      $str.= $id==$row->id?"selected='selected'":'';
      $str.= '>'.ucfirst($row->name).'</option>';
  }
  $str.='</select>';
  return $str;
}

function cmb_dimanis($id,$name,$table,$id_field,$field,$pk)
{
  $ci =get_instance();

  $query = $ci->db->get($table);
  $str ="";
  $str.= '<select class="form-control" id="'.$id.'" name="'.$name.'">';
  if ($pk==null) {
    $str.='<option value="">--pilih--</option>';
  }

  foreach ($query->result() as $row) {
      $str.='<option value="'.$row->$id_field.'"';
      $str.= $pk==$row->$id_field?"selected='selected'":'';;
      $str.= '>'.strtolower($row->$field).'</option>';
  }

  $str.= "</select>";

  return $str;
}


function get_add_member($str,$id)
{
  $ci =get_instance();
  if ($str=="marketing") {
    $query = $ci->db->select("id_marketing,nama")
                ->from("tb_marketing")
                ->where("id_marketing",$id)
                ->get()
                ->row();
    $str_values = $query->nama;
  }elseif ($str=="admin") {
    $query = $ci->db->select("id_users,last_name,first_name")
                ->from("users")
                ->where("id_users",$id)
                ->get()
                ->row();
    $str_values = $query->first_name." ".$query->last_name;
  }


  return $str_values;
}



function umur($tgl_lahir,$delimiter='-') {
    list($hari,$bulan,$tahun) = explode($delimiter, $tgl_lahir);
    $selisih_hari = date('d') - $hari;
    $selisih_bulan = date('m') - $bulan;
    $selisih_tahun = date('Y') - $tahun;
    if ($selisih_hari < 0 || $selisih_bulan < 0) {
        $selisih_tahun--;
    }
    return $selisih_tahun;
}



function format_rupiah($int)
{
  return number_format($int, 0, ',', '.');
}

function member_add($from_add,$id_person)
{
  $ci =get_instance();
  if ($from_add=="admin") {
      $query = $ci->db->get_where('users',["id_users"=>$id_person])->row();
      $first_name = $query->first_name;
      $last_name = $query->last_name;
      return $first_name." ".$last_name;
  }elseif ($from_add=="marketing") {
    $query = $ci->db->get_where('tb_marketing',["id_marketing"=>$id_person])->row();
    return $query->nama;
  }else {
    return "-";
  }
}

function hitung_masa_berlaku($id_paket)
{
  $ci =get_instance();
  $query = $ci->db->get_where('paket',["id_paket"=>$id_paket])->row();
  return $query->jangka_waktu * 365;
}
