<section class="breadcrumbs">
   <div class="container">
     <ol class="breadcrumb">
       <li><a href="<?=site_url('backend')?>">Home</a></li>
       <li><a href="<?=site_url('backend/referral')?>"><?=ucfirst($temp_title)?></a></li>
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
                       <table class="table table-bordered">

													<tr>
                             <th>Kode Referral</th>
                             <td><?=$kode_referral?></td>
                          </tr>

													<tr>
                             <th>Id Paket</th>
                             <td><?=$id_paket?></td>
                          </tr>

													<tr>
                             <th>Keterangan</th>
                             <td><?=$keterangan?></td>
                          </tr>

													<tr>
                             <th>Created</th>
                             <td><?=$created?></td>
                          </tr>

													<tr>
                             <th>Is Active</th>
                             <td><?=$is_active?></td>
                          </tr>

													<tr>
                             <th>Is Delete</th>
                             <td><?=$is_delete?></td>
                          </tr>

												</table>
                     </div>
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
