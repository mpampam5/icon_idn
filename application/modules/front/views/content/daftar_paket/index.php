<link rel="stylesheet" href="<?=base_url()?>temp/front/bootstrap-datepicker/bootstrap-datepicker.min.css">

<style media="screen">
  .captcha img{
    width: 100%;
  }

  label{
    display: inline;
  }
</style>
<div class="light-wrapper">
  <div class="container inner">
    <h3 class="section-title text-center m-t-30">Dapatkan Voucher</h3>
    <p class="text-center">Lengkapi data diri anda untuk mendapatkan voucher.</p>
    <div id="alert"></div>
    <div class="row">
      <div class="thin" style="padding:20px;">
          <form action="<?=$action?>" id="form" autocomplete="off">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label id="nik">NIK</label>
                    <input type="text" class="form-control" name="nik">
                    <p class="info-e">Penting! no identitas harus valid</p>
                  </div>
                  <!--/.form-field -->
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <label id="nama">Nama</label>
                    <input type="text" class="form-control" name="nama">
                    <p class="info-e">Penting! masukkan nama sesuai kartu identitas</p>
                  </div>
                  <!--/.form-field -->
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <label id="email">Email</label>
                    <input type="text" class="form-control" name="email">
                    <p class="info-e">Penting! masukkan email yang aktif</p>
                  </div>
                  <!--/.form-field -->
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <label id="telepon">No.telepon</label>
                    <input type="text" class="form-control" name="telepon">
                    <p class="info-e">Penting! masukkan no yang aktif</p>
                  </div>
                  <!--/.form-field -->
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label id="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control"  name="tempat_lahir">
                    <p class="info-e">Penting! masukkan tempat lahir sesuai kartu identitas</p>
                  </div>
                  <!--/.form-field -->
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label id="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tgl_lahir"  name="tanggal_lahir">
                    <p class="info-e">Penting! masukkan tanggal lahir sesuai kartu identitas</p>
                  </div>
                  <!--/.form-field -->
                </div>

                <div class="col-sm-6">
                  <div class="form-field">
                    <div class="form-group">
                      <label id="jenis_kelamin">Jenis Kelamin</label>
                      <label class="custom-select">
                        <select  name="jenis_kelamin">
                          <option value="">-- pilih jenis kelamin --</option>
                          <option value="pria">Pria</option>
                          <option value="wanita">Wanita</option>
                        </select>
                    <p class="info-e">Penting! pilih jenis kelamin sesuai kartu identitas</p>
                    </label>
                    </div>

                  </div>
                  <!--/.form-field -->
                </div>

                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <div class="form-group">
                      <label id="paket">Paket Voucher</label>
                      <label class="custom-select">
                        <select  name="paket">
                          <option value="">-- pilih paket --</option>
                          <?php foreach ($paket as $paket): ?>
                            <option <?=$status == $paket->id_paket ? "selected":"" ?> value="<?=$paket->id_paket?>"><?=$paket->nama_paket?></option>
                          <?php endforeach; ?>
                        </select>
                    <p class="info-e">Pastikan anda telah mengetahui info tentang paket</p>
                    </label>
                    </div>

                  </div>
                  <!--/.form-field -->
                </div>
                <!--/column -->



                <div class="col-sm-12">
                  <div class="form-group">
                    <label id="alamat">Alamat</label>
                    <textarea cols="80" rows="2" name="alamat"></textarea>
                    <p class="info-e">Penting! masukkan alamat domisili</p>
                  </div>
                </div>

                <div class="col-sm-4 captcha">
                      <div id="captImg">
                        <?=$capt_image ?>
                      </div>
                      <a href="#" id="refreshCaptcha" style="position:block;">
                        <i class="budicon-repeat"></i> Refresh Kode Captcha
                      </a>
                  <br>
                  <div class="form-group">
                    <input type="text" class="form-control m-t-10" id="captcha" name="captcha" placeholder="captcha key">
                  </div>
                </div>


              </div>
              <!--/.row -->


              <!--/.radio-set -->
              <button type="submit" class="btn state-initial" value="sumbit" id="submit"> Dapatkan Voucher</button>
            </form>


            <h5 class="m-t-10">Mengalami masalah mendapatkan voucher? <a href="<?=site_url("kontak")?>">Hubungi admin</a></h5>
      </div>
    </div>

  </div>
</div>
  <script src="<?=base_url()?>temp/front/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#tgl_lahir').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });

    $('#refreshCaptcha').on('click', function(e){
      e.preventDefault()
      $("#captcha").val("");
      $.get('<?php echo base_url().'code-captcha'; ?>', function(data){
          $('#captImg').hide().fadeIn(600).html(data);
      });
  });
});



$("#form").submit(function(e){
  e.preventDefault();
  var me = $(this);
  $("#submit").prop('disabled',true).html('<div class="spinner-border spinner-border-sm text-white"></div> Memproses...');
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
            if (json.captcha_status==true) {
              $("#form")[0].reset();
              $("#form").find('.text-danger').remove();
              $("html, body").animate({ scrollTop: 0 }, "slow");
              $("#submit").prop('disabled',false)
                          .html('Dapatkan Voucher');
              $('#alert').hide().fadeIn(1000).html(`<div class="row alert-show text-center">
                                                      <div class="col-sm-12">
                                                      <div class="alert alert-success" role="alert">
                                                        `+json.alert+`
                                                      </div>
                                                      </div>
                                                    </div>`);
              $('.form-group').removeClass('.has-error')
                              .removeClass('.has-success');
                $('.alert-show').delay(5000).show(10, function(){
                  $('.alert-show').fadeOut(10000, function(){
                    $('.alert-show').remove();
                    $.get('<?php echo base_url().'code-captcha'; ?>', function(data){
                        $('#captImg').hide().fadeIn(600).html(data);
                    });
                  });
                })
            }else {
              $.get('<?php echo base_url().'code-captcha'; ?>', function(data){
                  $('#captImg').hide().fadeIn(600).html(data);
              });
              $("#captcha").val("");
              $("#captcha")
              .closest('.form-group')
              .find('.text-danger').remove();
              $("#captcha").after(json.alert_captcha);
              $("#submit").prop('disabled',false)
                          .html('Dapatkan Voucher');
            }

          }else {
            $("#submit").prop('disabled',false)
                        .html('Dapatkan Voucher');
            $.each(json.alert, function(key, value) {
                var element = $('#' + key);
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
