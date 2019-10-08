<section class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?=site_url('backend')?>">Home</a></li>
      <li><a href="<?=site_url('backend/marketing')?>"><?=ucfirst($temp_title)?></a></li>
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
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?=$nama?>">
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
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Aktif</label>
                            <select class="form-control" name="status" id="status">
                              <option <?= $is_active=="1" ? "selected" : ""?> value="1">Aktif</option>
                              <option <?= $is_active=="0" ? "selected" : ""?> value="0">Nonaktif</option>
                            </select>
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?=$alamat?>">
                          </div>
                        </div>

                        <?php if ($button=="tambah"): ?>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?=$username?>">
                            </div>
                          </div>

  												<div class="col-md-6">
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?=$password?>">
                            </div>
                          </div>
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
