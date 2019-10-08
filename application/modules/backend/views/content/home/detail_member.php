<style media="screen">
  .table-detail tr th,td {
    padding: 5px;
    font-size: 13px;
  }
</style>

<div class="row">
  <div class="col-sm-10">
    <table class="table-detail">
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
         <td>:
           <b class="text-info"><?=$kode_registrasi?></b>
         </td>
      </tr>

       <tr>
          <th>Nik</th>
          <td>: <?=$nik?></td>
       </tr>

       <tr>
          <th>Nama</th>
          <td>: <?=$nama?></td>
       </tr>

       <tr>
          <th>Email</th>
          <td class="text-primary"><?=$email?></td>
       </tr>

       <tr>
          <th>Telepon</th>
          <td>: <?=$telepon?></td>
       </tr>

       <tr>
          <th>Alamat</th>
          <td>: <?=$alamat?></td>
       </tr>

       <tr>
          <th>Jenis Kelamin</th>
          <td>: <?=$jenis_kelamin?></td>
       </tr>

       <tr>
          <th>Tanggal Lahir</th>
          <td>: <?=ucfirst($tempat_lahir)?>, <?=date("d-m-Y", strtotime($tanggal_lahir))?> <span class="text-info">( <?=umur(date("d-m-Y", strtotime($tanggal_lahir)))?> Tahun)</span></td>
       </tr>

       <tr>
          <th>Paket</th>
          <td>: <span class="text-warning"><?=$paket?></span></td>
       </tr>

       <tr>
         <th>Status</th>
         <td>:
           <?php if ($is_active==1): ?>
             <span class="text-success"> Aktif</span>
             <?php else: ?>
               <span class="text-danger"> Nonaktif</span>
           <?php endif; ?>
         </td>
       </tr>

       <tr>
          <th>Mulai Bergabung</th>
          <td>: <?=date('d-m-Y H:i',strtotime($created))?></td>
       </tr>

       <tr>
          <th>Masa aktif</th>
          <td>: <?=date('d-m-Y',strtotime($masa_aktif))?></td>
       </tr>

       <tr>
          <th>Ditambahkan Oleh</th>
          <td>: <?=$from_add?>&nbsp;<span class="text-info">"<?=member_add($from_add,$id_personals)?>"</span></td>
       </tr>

     </table>
  </div>

  <div class="col-sm-12 m-t-10">
    <div id="response" class="m-b-3"></div>
    <button type="button" class="btn btn-info btn-sm btn-default" class="close" data-dismiss="modal" aria-label="Close">Tutup</button>
    <a href="<?=site_url("backend/tb_member/view_voucher/$id_member")?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-id-card"></i> Lihat voucher</a>
    <button type="button" id="sendemail" data-url="<?=site_url("backend/home/email/$id_member")?>" name="button" class="btn btn-info btn-sm btn-success"> <i class="fa fa-envelope"></i> Send Voucher</button>
  </div>
</div>

<script type="text/javascript">
$( document ).on( 'click', '#sendemail', function (e) {
  e.preventDefault();
  //hide response if it's visible
  $('#response').hide();
  $(this).prop('disabled',true).html('<i class="fa fa-envelope fa-spin"></i> Memproses...');
  $.ajax( {
      type: 'post',
      url: $(this).attr('data-url'),
      success: function ( result )
      {
        $("#sendemail").prop('disabled',false).html('<i class="fa fa-envelope"></i> Send Voucher');
        $( '#response' ).html( result ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
      },
      error: function ( result )
      {
        $("#sendemail").prop('disabled',false)
                    .html('<i class="fa fa-envelope"></i> Send Voucher');
          $( '#response' ).html( 'Server unavailable now: please, retry later.' ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
      }
  } );
} );
</script>
