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

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik" value="<?=$nik?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?=$nama?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?=$telepon?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="3" cols="80"><?=$alamat?></textarea>
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" value="<?=$jenis_kelamin?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?=$tempat_lahir?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?=$tanggal_lahir?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="text" class="form-control" id="image" name="image" placeholder="Image" value="<?=$image?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Created</label>
                            <input type="text" class="form-control" id="created" name="created" placeholder="Created" value="<?=$created?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Modified</label>
                            <input type="text" class="form-control" id="modified" name="modified" placeholder="Modified" value="<?=$modified?>">
                          </div>
                        </div>

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
