<style>
  ul.list-kontakt{
    list-style:none;
  }

  ul.list-kontakt  li {
    padding-left: 0!important;
    margin-left: 0!important;
  }
</style>

<div class="offset"></div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.531628644773!2d119.44146671435125!3d-5.178754853714392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee38c2cd0c22f%3A0x860a943978070e98!2sICON%20Studio%20Photography!5e0!3m2!1sid!2sid!4v1570556332877!5m2!1sid!2sid" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
<div class="light-wrapper">
  <div class="container inner">
    <div class="row">
      <!--/column -->

      <aside class="col-sm-4">
        <div class="sidebox widget">
          <h3 class="widget-title">Address</h3>
          <p><?=profile("alamat")?></p>
        </div>
        <!-- /.widget -->

      </aside>


      <aside class="col-sm-4">
        <div class="sidebox widget">
          <h3 class="widget-title" style="padding-left:20px;">Kontak</h3>
          <ul class="list-kontakt">
            <li><i class="icon-phone-1"></i> <?=profile("telepon")?> (Whatsapp)</li>
            <li><i class="icon-mail-alt"></i> <?=profile("email")?></li>
            <li><a href="<?=profile("facebook")?>" target="_blank"><i class="icon-facebook-squared-1"></i> <?=profile("title_facebook")?></a></li>
            <li><a href="<?=profile("instagram")?>" target="_blank"><i class="icon-s-instagram"></i> <?=profile("title_instagram")?></a></li>
          </ul>



        </div>
        <!-- /.widget -->

      </aside>
      <!--/column -->

    </div>
    <!--/.row -->

  </div>
  <!--/.container -->
</div>
