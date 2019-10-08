<style media="screen">
    .table{
      background-color: #ffffff!important;
    }
    .table tr td {
      font-size: 12px;
      padding: 2px 3px 2px 3px;
    }
</style>

<table class="table table-bordered">
  <?php foreach ($query->result() as $row): ?>
    <tr>
                  <td><?=$row->kode_registrasi?></td>
                  <td><?=strtoupper($row->nama)?></td>
                  <td><?=strtoupper($row->email)?></td>
                  <td>Masa berlaku Voucher <i class="text-info"><?=date('d-m-Y',strtotime($row->masa_aktif))?></i></td>
                  <td class="text-center">
                    <?php if ($row->is_active==1): ?>
                      <span class="text-success"> Aktif</span>
                      <?php else: ?>
                        <span class="text-danger"> Nonaktif</span>
                    <?php endif; ?>
                  </td>

                  <td>
                    <a href="<?=base_url()?>backend/home/detail/<?=$row->id_member?>" data-toggle="tooltip" data-placement="bottom" id="detail" title="Detail"><i class="fa fa-file text-primary"></i> Detail</a>
                  </td>
                </tr>
  <?php endforeach; ?>
 </table>

<script type="text/javascript">
$(document).on("click","#send-mail",function(e){
  e.preventDefault()
  $(this).html('<i class="fa fa-envelope fa-spin text-success"></i>');
});

  $(document).on("click","#detail",function(e){
    e.preventDefault()
    $('.modal-dialog').removeClass('modal-sm')
                      .removeClass('modal-md')
                      .addClass('modal-lg');
    $('#modalContent').load($(this).attr('href'));
    $("#modalTitle").text('Detail Member');
    $("#modalGue").modal('show');
  });
</script>
