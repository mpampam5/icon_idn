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
  return number_format($int, 2, ',', '.');
}
