<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Backend{

 

  function index()
  {
    $this->temp_backend->set_title('home');
    $this->temp_backend->view('index');
  }

  function table()
  {
    $tables = $this->db->list_tables();
    foreach ($tables as $table)
    {
      echo "<a href=".base_url("backend/home/field/$table")." >$table</a></br>";
    }
  }

  function field($table)
  {

    if ($this->db->table_exists($table))
        {
          $fields = $this->db->field_data($table);
          $data = array();
          foreach ($fields as $field)
          {
                  $data[]= array(
                                'primary_key' => $field->primary_key,
                                'name' => $field->name, 
                                'type' => $field->type,
                                'max_length' => $field->max_length
                                );
                              }
                              // $data[$i]['name']." - ".$data[$i]['type']." - ".$data[$i]['primary_key']." - ".$data[$i]['max_length']."</br>";
         for ($i=0; $i <count($data) ; $i++) { 
           $column[] = $data[$i]['name'];
         }

         echo implode(',',$column);

        }else{
          echo "table tidak ditemukan";
        }
   
  }




}
