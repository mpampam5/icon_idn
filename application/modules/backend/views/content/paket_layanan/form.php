<section class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?=site_url('backend')?>">Home</a></li>
      <li><a href="<?=site_url('backend/paket_layanan')?>"><?=ucfirst($temp_title)?></a></li>
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
                            <label>Layanan</label>
                            <input type="text" class="form-control" id="layanan" name="layanan" placeholder="Layanan" value="<?=$layanan?>">
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Harga&nbsp;&nbsp;&nbsp;
                              <label class="custom-control custom-checkbox custom-checkbox-primary">
                                  /kepala
                                  <input type="checkbox" class="custom-control-input" <?=($per_kepala==1)?"checked":""?> value="1" name="per_kepala" id="per_kepala">
                                  <span class="custom-control-indicator"></span>
                              </label>
                            </label>
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?=$harga?>">
                          </div>
                        </div>



												<div class="col-md-12">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="3" cols="80"><?=$keterangan?></textarea>
                          </div>
                        </div>

												<div class="col-md-12">
                          <div class="form-group">
                            <label>Kategori</label>
                            <?=cmb_dimanis("id_kategori","id_kategori","kategori","id_kategori","kategori",$id_kategori)?>

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
