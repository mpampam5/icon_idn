<div class="row">
  <div class="col-sm-12">
    <form id="form" action="<?=$action?>">
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" readonly value="<?=$username?>">
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="password">
      </div>


      <button type="button" class="btn btn-info btn-sm btn-default" class="close" data-dismiss="modal" aria-label="Close">Tutup</button>
      <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm"> Reset Password</button>
    </form>
  </div>
</div>


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
                              $("#modalGue").modal('hide');
                              $('#alert').hide().fadeIn(1000).html(json.alert);
                              $('.form-group').removeClass('.has-error')
                                              .removeClass('.has');
                                $('.alert').delay(5000).show(10, function(){
                                  $('.alert').fadeOut(1000, function(){
                                    $('.alert').remove();
                                  });
                                })
                          }else {
                            $.each(json.alert, function(key, value) {
                              var element = $('#' + key);
                              $("#submit").prop('disabled',false)
                                          .text('Reset Password');
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
