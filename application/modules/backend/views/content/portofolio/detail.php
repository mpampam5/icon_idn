<link rel="stylesheet" href="<?=config_item('sty_back')?>plugins/datatables/dataTables.bootstrap4.min.css">
<script src="<?=config_item('sty_back')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=config_item('sty_back')?>plugins/datatables/dataTables.bootstrap4.min.js"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<style media="screen">
  .table-detail tr th,td {
    padding: 5px;
    font-size: 13px;
  }
</style>
<section class="breadcrumbs">
   <div class="container">
     <ol class="breadcrumb">
       <li><a href="<?=site_url('backend')?>">Home</a></li>
       <li><a href="<?=site_url('backend/portofolio')?>"><?=ucfirst($temp_title)?></a></li>
       <li class="active">Detail</li>
     </ol>
   </div>
 </section>

 <section>
   <div class="container">
     <div class="row">
       <div class="col-lg-10 mx-auto">
         <div class="card">
             <div class="card-header">
               <h5 class="card-title">Detail <?=ucfirst($temp_title)?> & upload gambar</h5>
             </div>

               <div class="card-block">
                   <div class="row">
                     <div class="col-md-12">
                       <table class="table-detail">

													<tr>
                             <th>Nama</th>
                             <td>: <?=$nama?></td>
                          </tr>

													<tr>
                             <th>Keterangan</th>
                             <td>: <?=$keterangan?></td>
                          </tr>

												</table>
                     </div>


                     <div class="col-sm-6">
                              <div class="form-group">
                                <input type="file" name="foto_personal" id="upload-foto" class="file-upload-default" accept="image/JPEG" style="visibility:hidden">
                                <div class="input-group col-xs-12">
                                  <input type="text" name="foto_personal" id="image-foto" class="form-control file-upload-info" readonly placeholder="Upload Image">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" id="btn-upload-foto" type="button">Upload</button>
                                  </span>
                                </div>
                              </div>
                      </div>


                      <div class="col-sm-12">
                        <table id="table" class="table table-bordered" >
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name File</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                        </table>
                      </div>

                   </div>
               </div>


             <div class="card-footer">
               <a href="<?=site_url("backend")?>" class="btn btn-sm btn-info"><i class="fa fa-home"></i></a>
               <a href="<?=site_url('backend/'.$this->uri->segment(2))?>"  class="btn btn-sm btn-default"> kembali</a>
             </div>

           </div>
       </div>
     </div>
   </div>
 </section>



 <script type="text/javascript">

 $(document).ready(function() {
       $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
       {
           return {
               "iStart": oSettings._iDisplayStart,
               "iEnd": oSettings.fnDisplayEnd(),
               "iLength": oSettings._iDisplayLength,
               "iTotal": oSettings.fnRecordsTotal(),
               "iFilteredTotal": oSettings.fnRecordsDisplay(),
               "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
               "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
           };
       };

         var t = $("#table").dataTable({
             initComplete: function() {
                 var api = this.api();
                 $('#table_filter input')
                         .off('.DT')
                         .on('keyup.DT', function(e) {
                             if (e.keyCode == 13) {
                                 api.search(this.value).draw();
                     }
                 });
             },
             oLanguage: {
                 sProcessing: "Memuat Data..."
             },
             processing: true,
             serverSide: true,
             ajax: {"url": "<?=base_url()?>backend/portofolio/json_image/<?=$id_portofolio?>", "type": "POST"},
             columns: [
                 {
                     "data": "id_image",
                     "orderable": false
                 },
 								{"data":"name",
                 render:function(data,type,meta,row)
                 {
                   return '<a class="text-primary" data-fancybox="gallery" href="<?=base_url()?>temp/file/'+data+'">'+data+'</a>';
                 }
                },
                 {
                     "data" : "action",
                     "orderable": false,
                     "className" : "text-center"
                 }
             ],
             order: [[0, 'desc']],
             rowCallback: function(row, data, iDisplayIndex) {
                 var info = this.fnPagingInfo();
                 var page = info.iPage;
                 var length = info.iLength;
                 var index = page * length + (iDisplayIndex + 1);
                 $('td:eq(0)', row).html(index);
             }
         });
 });


 $(document).on('click','#hapus',function(e){
   e.preventDefault();
   $('.modal-dialog').removeClass('modal-lg')
                     .removeClass('modal-md')
                     .addClass('modal-sm');
   $('#modalContent').html(`
                           <p>Apakah Anda Yakin Ingin Menghapus?</p>
                           <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>Batal</button>
                           <button type='button' class='btn btn-primary btn-sm' id='ya-hapus' data-id=`+$(this).attr('alt')+`  data-url=`+$(this).attr('href')+`>Ya, saya yakin</button>
                         `);
   $("#modalTitle").text('Konfirmasi Hapus');
   $("#modalGue").modal('show');
 });

 $(document).on('click','#ya-hapus',function(e){
   $(this).prop('disabled',true)
           .text('Memproses...');
   var id = $(this).attr('data-id');
   $.ajax({
           url:$(this).data('url'),
           type:'post',
           cache:false,
           dataType:'json',
           success:function(json){
             $('#modalGue').modal('hide');
             $("li[data-id='"+id+"']").remove();
             $('#alert').hide().fadeIn(1000).html(`<div class="alert `+json.alert_class+`">
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                     `+json.alert+`
                                                     <div>`);
             $('#table').DataTable().ajax.reload();
             $('.alert').delay(5000).show(10, function(){
               $('.alert').fadeOut(1000, function(){
                 $('.alert').remove();
               });
             })
           }
         });
 });



 $(function () {
      var fileupload = $("#upload-foto");
      var button = $("#btn-upload-foto");
      button.click(function () {
          fileupload.click();
      });
      fileupload.change(function () {
          var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
          // $("#data-info").text(fileName);

          var file_data = $('#upload-foto').prop('files')[0];
          var form_data = new FormData();
          $("#image-foto").val(fileName);
          $("#btn-upload-foto").html('Memproses...');

          form_data.append('foto_personal', file_data);

          $.ajax({
              url: '<?=site_url("backend/portofolio/do_upload/$id_portofolio")?>',
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              type: 'post',
              success: function(json){
                if (json.success==true) {
                  button.html('Upload');
                  $("#image-foto").val("");
                  $('#alert').hide().fadeIn(1000).html(`<div class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                          `+json.alert+`
                                                          <div>`);
                  $('#table').DataTable().ajax.reload();
                  $('.alert').delay(5000).show(10, function(){
                    $('.alert').fadeOut(1000, function(){
                      $('.alert').remove();
                    });
                  })

                }else {
                  $("#image-foto").val("");
                  button.html('Upload');
                  $('#alert').hide().fadeIn(1000).html(`<div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                          `+json.alert+`
                                                          <div>`);
                  // $('#table').DataTable().ajax.reload();
                  $('.alert').delay(5000).show(10, function(){
                    $('.alert').fadeOut(1000, function(){
                      $('.alert').remove();
                    });
                  })
                }
              }
          });

      });
  });
 </script>
