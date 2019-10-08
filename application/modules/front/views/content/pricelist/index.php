<style media="screen">
.table-detail{
  width: 100%;
}


.table-detail td{
  padding: 10px;
  /* background:#bbbbbb; */
  border-bottom: 1px solid #bababa;
}


</style>
<div class="light-wrapper">
  <div class="container inner">
    <h3 class="section-title text-center m-t-30">Price List</h3>
    <!-- <p class="text-center">Lengkapi data diri anda untuk mendapatkan voucher.</p> -->
    <div id="alert"></div>
    <div class="row">
      <div class="thin" style="padding:20px;">
        <table class="table-detail">
          <?php foreach ($layanan as $price): ?>
          <tr>
            <td>
              <h5><?=strtoupper($price->layanan)?></h5>
                <i class="budicon-bookmark"></i> <?=strtoupper($price->kategori)?> |
                <b>Rp. <?=format_rupiah($price->harga)?></b> <?=$price->harga_per_kepala==1 ? "/Orang":""?>
                <p  style="padding:10px 0 2px 0;"><i class="budicon-notebook"></i> <?=strtoupper($price->keterangan)?></p>
            </td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
    </div>

  </div>
</div>
