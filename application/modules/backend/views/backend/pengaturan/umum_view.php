<table class="table  table-borderless">
<tr>
    <th width="200">Title</th>
    <td>: <?=$title?></td>
</tr>

<tr>
    <th>Domain</th>
    <td class="text-info">: <?=$domain?></td>
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
    <th>Tentang</th>
    <td>: <?=$tentang?></td>
</tr>

<tr>
  <td colspan="2">
    <h5 style="color:#0e79bd;font-size:16px;">Sosial media</h5>
  </td>
</tr>


<tr>
  <th>Instagram</th>
  <td>: <?=$title_instagram?></td>
</tr>

<tr>
  <th>Url Instagram</th>
  <td>: <?=$instagram?></td>
</tr>

<tr>
  <th>Facebook</th>
  <td>: <?=$title_facebook?></td>
</tr>

<tr>
  <th>Url Facebook</th>
  <td>: <?=$facebook?></td>
</tr>
</table>

<hr>

<a href="<?=site_url("backend/pengaturan/umum_form")?>" id="editumum" class="m-t-10 badge badge-warning"><i class="fa fa-pencil-square-o"></i> Edit</a>


<script type="text/javascript">
$(document).on("click","#editumum",function(e) {
    e.preventDefault();
    $('.modal-dialog').removeClass('modal-lg')
                      .removeClass('modal-sm')
                      .addClass('modal-md');
    $('#modalContent').load($(this).attr('href'));
    $("#modalTitle").text('Form Pengaturan Umum');
    $("#modalGue").modal('show');
})
</script>
