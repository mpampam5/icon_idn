<section class="breadcrumbs">
   <div class="container">
     <ol class="breadcrumb">
       <li><a href="<?=site_url('backend')?>">Home</a></li>
       <li><a href="<?=site_url('backend/tb_member')?>"><?=ucfirst($temp_title)?></a></li>
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
                           <td colspan="2">
                             <?php if ($is_verifikasi==1): ?>
                                <span class="text-success" style="font-size:12px;"><i class="fa fa-check-square"></i> Terverifikasi</span>
                             <?php else: ?>
                                <span class="text-danger" style="font-size:12px;"><i class="fa fa-close"></i> Belum Terverifikasi</span>
                           <?php endif; ?>
                         </td>
                         </tr>
                         <tr>
                            <th>ICON-ID</th>
                            <td>
                              <b class="text-info"><?=$kode_registrasi?></b>
                            </td>
                         </tr>

													<tr>
                             <th>Nik</th>
                             <td><?=$nik?></td>
                          </tr>

													<tr>
                             <th>Nama</th>
                             <td><?=$nama?></td>
                          </tr>

													<tr>
                             <th>Email</th>
                             <td><?=$email?></td>
                          </tr>

													<tr>
                             <th>Telepon</th>
                             <td><?=$telepon?></td>
                          </tr>

													<tr>
                             <th>Alamat</th>
                             <td><?=$alamat?></td>
                          </tr>

													<tr>
                             <th>Jenis Kelamin</th>
                             <td><?=$jenis_kelamin?></td>
                          </tr>

													<tr>
                             <th>Tanggal Lahir</th>
                             <td><?=ucfirst($tempat_lahir)?>, <?=date("d-m-Y", strtotime($tanggal_lahir))?> <span class="text-info">( <?=umur(date("d-m-Y", strtotime($tanggal_lahir)))?> Tahun)</span></td>
                          </tr>
                          

													<tr>
                             <th>Mulai Bergabung</th>
                             <td><?=date('d-m-Y H:i',strtotime($created))?></td>
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
