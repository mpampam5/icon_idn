<style media="screen">
  .table-detail tr th,td {
    padding: 5px;
    font-size: 13px;
  }
</style>

<section class="breadcrumbs">
   <div class="container">
     <ol class="breadcrumb">
       <li><a href="<?=site_url('backend')?>">Home</a></li>
       <li><a href="<?=site_url('backend/marketing')?>"><?=ucfirst($temp_title)?></a></li>
       <li class="active">Detail</li>
     </ol>
   </div>
 </section>

 <section>
   <div class="container">
     <div class="row">
       <div class="col-lg-10 mx-auto">
         <div class="card">
             <div class="card-header">
               <h5 class="card-title">Detail <?=ucfirst($temp_title)?></h5>
             </div>

               <div class="card-block">
                   <div class="row">
                     <div class="col-md-12">
                       <table class="table-detail">

													<tr>
                             <th>Nama</th>
                             <td>: <?=strtoupper($nama)?></td>
                          </tr>

													<tr>
                             <th>Telepon</th>
                             <td>: <?=$telepon?></td>
                          </tr>

													<tr>
                             <th>Email</th>
                             <td>: <?=$email?></td>
                          </tr>

													<tr>
                             <th>Alamat</th>
                             <td>: <?=$alamat?></td>
                          </tr>

													<tr>
                             <th>Username</th>
                             <td>: <?=$username?></td>
                          </tr>

                          <tr>
                             <th>Status</th>
                             <td>:
                               <?php if ($is_active=="1"): ?>
                                 <span class="text-success"> Aktif</span>
                                 <?php else: ?>
                                   <span class="text-danger"> Nonaktif</span>
                               <?php endif; ?>
                             </td>
                          </tr>

                          <tr>
                            <th>Total Add Member</th>
                            <td>:
                              <?php $query = $this->db->get_where("trans_member",
                                                                        [
                                                                          "is_active"=> 1,
                                                                          "is_verifikasi" => 1,
                                                                          "is_delete" => "0",
                                                                          "from_add"=> "marketing",
                                                                          "id_personals" => $id_marketing
                                                                        ]);
                                echo $query->num_rows();
                              ?>
                            </td>
                          </tr>


												</table>
                     </div>


                     <hr>

                     


                   </div>
               </div>


             <div class="card-footer">
               <a href="<?=site_url("backend")?>" class="btn btn-sm btn-info"><i class="fa fa-home"></i></a>
               <a href="<?=site_url('backend/'.$this->uri->segment(2))?>"  class="btn btn-sm btn-default"> kembali</a>
             </div>

           </div>
       </div>
     </div>
   </div>
 </section>
