<link rel="stylesheet" href="<?=config_item('sty_back')?>plugins/datepicker/css/bootstrap-datepicker.min.css" />
<script type="text/javascript" src="<?=config_item('sty_back')?>plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
<!--
<link rel="stylesheet" href="<?=config_item('sty_back')?>plugins/selectpicker/css/bootstrap-select.min.css" />
<script type="text/javascript" src="<?=config_item('sty_back')?>plugins/selectpicker/js/bootstrap-select.min.js"></script> -->

<section class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?=site_url('backend')?>">Home</a></li>
      <li><a href="<?=site_url('backend/tb_member')?>"><?=ucfirst($temp_title)?></a></li>
      <li class="active"><?=ucfirst($button)?></li>
    </ol>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
              <h5 class="card-title"><?=ucfirst($button)?> <?=ucfirst($temp_title)?></h5>
            </div>
            <form action="<?=$action?>" id="form">
              <div class="card-block">
                  <div class="row">

												<div class="col-md-6">
                          <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik" value="<?=$nik?>">
                          </div>
                        </div>

												<div class="col-md-6">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?=$nama?>">
                          </div>
                        </div>

												<div class="col-md-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
                          </div>
                        </div>

												<div class="col-md-6">
                          <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?=$telepon?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?=$tempat_lahir?>">
                          </div>
                        </div>

												<div class="col-md-6">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off">
                          </div>
                        </div>

												<div class="col-md-6">
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                              <option value=""> -- pilih --</option>
                              <option <?= $jenis_kelamin=="pria" ? "selected" : ""?> value="pria">Pria</option>
                              <option <?= $jenis_kelamin=="wanita" ? "selected" : ""?> value="wanita">Wanita</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Paket</label>
                              <?=cmb_dimanis("id_paket","id_paket","paket","id_paket","nama_paket",$id_paket)?>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Status Aktif</label>
                            <select class="form-control" id="is_active" name="is_active">
                              <option value=""> -- pilih --</option>
                              <option <?= $is_active=='1' ? "selected" : ""?> value="1">Aktif</option>
                              <option <?= $is_active=='0' ? "selected" : ""?> value="0">Nonaktif</option>
                            </select>
                          </div>
                        </div>

                        <?php if ($button=="tambah"): ?>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>di tambahkan oleh</label>
                              <select class="form-control" id="from_add" name="from_add">
                                <option value=""> -- pilih --</option>
                                <option <?= $from_add=='admin' ? "selected" : ""?> value="admin">Admin</option>
                                <option <?= $from_add=='marketing' ? "selected" : ""?> value="marketing">Marketing</option>
                              </select>
                            </div>
                          </div>

                          <div id="personals"></div>
                        <?php endif; ?>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="3" cols="80"><?=$alamat?></textarea>
                          </div>
                        </div>


                        <?php if ($button=="edit"): ?>
                          <input type="hidden" name="created" value="<?=$created?>">
                        <?php endif; ?>



                  </div>
              </div>
            <div class="card-footer">
              <a href="<?=site_url("backend")?>" class="btn btn-sm btn-info"><i class="fa fa-home"></i></a>
              <a href="<?=site_url('backend/'.$this->uri->segment(2))?>"  class="btn btn-sm btn-default"> kembali</a>
              <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm pull-right"> <?=ucfirst($button)?></button>
            </div>
          </form>

          </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">

$(document).ready(function(){
  $("#tanggal_lahir").datepicker({
    format: 'yyyy-mm-dd',
  }).val("<?=$tanggal_lahir?>").on('change', function(){
        $('.datepicker').hide();
    });;
});


<?php if ($button=="tambah"): ?>
$("#from_add").change(function () {
  var from_add = $("#from_add :selected").val();
  // alert(from_add);
  if (from_add=="admin") {
    $('.id_personals').remove();
    $("#personals").after(`<input type="hidden" class="id_personals" name="id_personals" id="id_personals" value="<?=session('id_users')?>">`);
  }else if (from_add=="marketing") {
    $(".id_personals").remove();
    $.get('<?php echo site_url('backend/tb_member/marketing') ?>', function(data){
                        $('#personals').after(`
                                                <div class="col-md-4 id_personals">
                                                  <div class="form-group">
                                                    <label>Pilih marketing</label>
                                                    <select class="form-control" id="id_personals" name="id_personals">
                                                      `+data+`
                                                    </select>
                                                  </div>
                                                </div>
                                              `);
                    });
  }else {
      $(".id_personals").remove();
  }
});
<?php endif; ?>

  $("#form").submit(function(e){
      e.preventDefault();
      var me = $(this);
      $("#submit").prop('disabled',true)
                  .text('Memproses...');
      $('.text-danger').remove();
      $('.form-control').prop('readonly', true);
                  $.ajax({
                        url             : me.attr('action'),
                        type            : 'post',
                        data            :  new FormData(this),
                        contentType     : false,
                        cache           : false,
                        dataType        : 'JSON',
                        processData     :false,
                        success:function(json){
                          if (json.success==true) {
                              $('#alert').hide().fadeIn(1000).html(json.alert);
                              $('.form-group').removeClass('.has-error')
                                              .removeClass('.has');
                                $('.alert').delay(5000).show(10, function(){
                                  $('.alert').fadeOut(1000, function(){
                                    $('.alert').remove();
                                    location.href="<?=site_url('backend/'.$this->uri->segment(2))?>";
                                  });
                                })
                          }else {
                            $.each(json.alert, function(key, value) {
                              var element = $('#' + key);
                              $("#submit").prop('disabled',false)
                                          .text('<?=ucfirst($button)?>');
                              $('.form-control').prop('readonly', false);
                              $(element)
                              .closest('.form-group')
                              .find('.text-danger').remove();
                              $(element).after(value);
                            });
                          }
                        }
                  });
  });
</script>
