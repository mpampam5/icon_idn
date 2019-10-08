<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto mt-5">
        <div class="row">
          <div class="col-sm-3 p-1">
            <div class="widget-home">
              <h3><?=$member_active?></h3>
              <h5> TOTAL MEMBER AKTIF</h5>
            </div>
          </div>

          <div class="col-sm-3 p-1">
            <div class="widget-home">
              <h3><?=$member_off?></h3>
              <h5> TOTAL MEMBER NONAKTIF</h5>
            </div>
          </div>

          <div class="col-sm-3 p-1">
            <div class="widget-home">
              <h3><?=$marketing_active?></h3>
              <h5> TOTAL MARKETING AKTIF</h5>
            </div>
          </div>

          <div class="col-sm-3 p-1">
            <div class="widget-home">
              <h3><?=$marketing_off?></h3>
              <h5> TOTAL MARKETING NONAKTIF</h5>
            </div>
          </div>

        </div>

      </div>


      <div class="col-lg-10 mx-auto mt-5">


                <div class="col-sm-6 mx-auto">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" id="keyword" placeholder="Cari Member (ICON-ID/NAMA/EMAIL)">
                      <span class="input-group-btn">
                      <button class="btn btn-info btn-icon" id="search" type="button"><i class="fa fa-search"></i></button>
                    </span>
                    </div>
                  </div>
                </div>

                <div id="content-search"></div>



      </div>
    </div>
  </div>
</section>



<script type="text/javascript">
  $(document).on("click","#search",function(e){
    e.preventDefault();
    $("#content-search").hide().fadeIn(500).html(`<p class="spinner text-center"><i class="fa fa-circle-o-notch fa-spin"></i> search...</p>`);
    $.ajax({
      url: "<?=base_url()?>backend/home/json_search", // File tujuan
      type: 'POST', // Tentukan type nya POST atau GET
      data: {keyword: $("#keyword").val()}, // Set data yang akan dikirim
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){
        $("#keyword").val("");
        $("#content-search").html(response.data);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText); // munculkan alert
      }
    });




  });
</script>
