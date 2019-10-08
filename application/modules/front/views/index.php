

  <div class="tp-fullscreen-container revolution">
    <div class="tp-fullscreen">
      <ul>
        <li data-transition="fade"> <img src="<?=base_url()?>temp/front/images/art/slider-bg1.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <h1 class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Selamat Datang!</h1>
          <div class="tp-caption large sfr" data-x="30" data-y="348" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Di <?=ucwords(profile("title"))?></div>
        </li>
        <li data-transition="fade"> <img src="<?=base_url()?>temp/front/images/art/slider-bg2.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <div class="tp-caption large text-center sfl" data-x="center" data-y="283" data-speed="900" data-start="800" data-easing="Sine.easeOut">Buat Foto kamu jadi menarik</div>
          <div class="tp-caption medium text-center sfr" data-x="center" data-y="363" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Dengan Photographer handal dan berpengalaman</div>
        </li>
        <li data-transition="fade"> <img src="<?=base_url()?>temp/front/images/art/slider-bg3.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <div class="tp-caption medium text-center sfb" data-x="center" data-y="293" data-speed="900" data-start="800" data-easing="Sine.easeOut">Dapatkan Voucher diskon dengan harga menarik</div>
          <div class="tp-caption large text-center sfb" data-x="center" data-y="387" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Hanya di <?=ucwords(profile("title"))?></div>
        </li>
      </ul>
      <div class="tp-bannertimer tp-bottom"></div>
    </div>
    <!-- /.tp-fullscreen-container -->
  </div>
  <!-- /.revolution -->

  <div class="light-wrapper">
    <div class="container inner">
      <h3 class="section-title text-center">Tentang kami</h3>
      <blockquote class="text-center">
        <?=profile("tentang")?>
      </blockquote>

    </div>
  </div>






  <div class="black-wrapper">
    <div class="container portfolios">
      <h3 class="portfolio-title text-center">Portofolio</h3>

      <div class="blog grid-view col3">
    <div class="blog-posts text-boxes">
      <div class="isotope row" style="position: relative; height: 6083.45px;">
        <div class="col-sm-6 col-md-4 grid-view-post">
          <div class="post">
            <figure class="main"><a href="blog-post.html"><img src="<?=base_url()?>temp/front/images/art/b1.jpg" alt=""></a></figure>
            <div class="box text-center">
              <div class="category cat12"><span><a href="#">Couple</a></span></div>
            </div>
            <!-- /.box -->
          </div>
        </div>
        <!-- /column -->

        <div class="col-sm-6 col-md-4 grid-view-post">
          <div class="item post">
            <figure class="main"><a href="blog-post.html"><img src="<?=base_url()?>temp/front/images/art/b2.jpg" alt=""></a></figure>
            <div class="box text-center">
              <div class="category cat12"><span><a href="#">Prawedding</a></span></div>
            </div>
            <!-- /.box -->

          </div>
          <!-- /.post -->
        </div>
        <!-- /column -->

        <div class="col-sm-6 col-md-4 grid-view-post">
          <div class="item post">
            <figure class="main"><a href="blog-post.html"><img src="<?=base_url()?>temp/front/images/art/b2.jpg" alt=""></a></figure>
            <div class="box text-center">
              <div class="category cat12"><span><a href="#">GROUP</a></span></div>
            </div>
            <!-- /.box -->

          </div>
          <!-- /.post -->
        </div>
        <!-- /column -->



      </div>
      <!-- /.isotope -->
    </div>
    <!-- /.blog-posts -->

  </div>


    </div>
  </div>


  <div class="light-wrapper">
    <div class="container inner">
      <h3 class="section-title text-center">Paket Voucher</h3>
      <div class="row">
        <?php foreach ($paket as $paket): ?>
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <h3 class="panel-title"><?=strtoupper($paket->nama_paket)?></h3>
                <div class="price"> <span class="price-currency">Rp.</span> <span class="price-value"><?=format_rupiah($paket->harga_paket)?></span> <span class="price-currency">/ <?=$paket->jangka_waktu?> tahun</span> </div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                <table class="table">
                  <tbody><tr>
                    <td>Cukup bayar <strong>Rp.<?=format_rupiah($paket->harga_harian)?></strong> Tiap Kali Datang</td>
                  </tr>
                  <tr>
                    <td>
                      <p style="padding:20px;"><?=ucfirst($paket->keterangan)?></p>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"> <a href="<?=site_url("daftar/$paket->id_paket")?>" class="btn" role="button">Dapatkan Voucher</a></div>
            </div>
            <!--/.pricing -->
          </div>
          <!--/column -->
        <?php endforeach; ?>
      </div>
      <!--/.row -->

    </div>
    <!--/.container -->
  </div>
  <!-- /.dark-wrapper -->
