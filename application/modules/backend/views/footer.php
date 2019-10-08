


  <!-- footer -->
  <!-- <footer id="footer">
    <div class="container">
      <div class="footer-bottom">
        <p>Copyright &copy; 2017 <a href="https://themeforest.net/item/gameforest-responsive-gaming-html-theme/5007730" target="_blank">Gameforest</a>. All rights reserved.</p>
      </div>
    </div>
  </footer> -->

        <div class="modal fade" id="modalGue" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body" id="modalContent" style="max-height: 487px; overflow-y: auto;"></div>
              </div>
            </div>
        </div>



  <!-- theme js -->
  <script src="<?=config_item('sty_back')?>js/theme.min.js"></script>

  <script type="text/javascript">

  $(document).on('click','#resetpwd',function(e){
    e.preventDefault();
    $('.modal-dialog').removeClass('modal-lg')
                      .removeClass('modal-md')
                      .addClass('modal-sm');
    $('#modalContent').hide().fadeIn(3000).load($(this).attr('href'));
    $("#modalTitle").text('Form Ubah Password');
    $("#modalGue").modal('show');
  });

  $(document).on('click','#sign-out',function(e){
    e.preventDefault();
    $('.modal-dialog').removeClass('modal-lg')
                      .removeClass('modal-md')
                      .addClass('modal-sm');
    $("#modalTitle").text('Konfirmasi Keluar');
    $('#modalContent').html(`
                            <p>Apakah Anda Yakin Ingin Keluar?</p>
                            <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>Batal</button>
                            <a href='`+$(this).attr('href')+`' class='btn btn-primary btn-sm'>Ya, saya yakin</a>
                          `);
    $("#modalGue").modal('show');
  });


    $('#modalGue').on('hide.bs.modal', function () {
        setTimeout(function(){
            $('#modalTitle, #modalContent').html('');
          }, 500);
    });

    $('.table').on('draw.dt', function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
  </script>


</body>
</html>
