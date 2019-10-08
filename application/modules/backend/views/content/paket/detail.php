<style media="screen">
  .table-detail tr th,td{
    font-size: 12px;
    padding: 10px;
  }
</style>

<section class="breadcrumbs">
   <div class="container">
     <ol class="breadcrumb">
       <li><a href="<?=site_url('backend')?>">Home</a></li>
       <li><a href="<?=site_url('backend/paket')?>"><?=ucfirst($temp_title)?></a></li>
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
                       <table class="tabel-detail">

													<tr>
                             <th>Nama Paket</th>
                             <td> : <?=$nama_paket?></td>
                          </tr>

													<tr>
                             <th>Harga Paket</th>
                             <td> : Rp.<?=format_rupiah($harga_paket)?></td>
                          </tr>

													<tr>
                             <th>Harga Harian</th>
                             <td> : Rp.<?=format_rupiah($harga_harian)?></td>
                          </tr>

													<tr>
                             <th>Jangka Waktu</th>
                             <td> : <?=$jangka_waktu?> / tahun</td>
                          </tr>

													<tr>
                             <th>Keterangan</th>
                             <td> : <?=$keterangan?></td>
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
