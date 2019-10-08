
  <!-- /.light-wrapper -->
  <footer class="footer inverse-wrapper">
    <div class="container inner">
      <div class="row text-center">


        <div class="col-sm-12">
          <div class="widget">
            <h4 class="widget-title">Portofolio</h4>
            <ul class="tag-list">
              <li><a href="#" class="btn">Web</a></li>
              <li><a href="#" class="btn">Photography</a></li>
              <li><a href="#" class="btn">Illustation</a></li>
              <li><a href="#" class="btn">Fun</a></li>
              <li><a href="#" class="btn">Blog</a></li>
              <li><a href="#" class="btn">Commercial</a></li>
              <li><a href="#" class="btn">Journal</a></li>
              <li><a href="#" class="btn">Nature</a></li>
              <li><a href="#" class="btn">Still Life</a></li>
            </ul>
          </div>
          <!-- /.widget -->


          <div class="widget">
            <h4 class="widget-title">TEMUKAN KAMI DI</h4>
            <ul class="social">
              <li><a href="<?=profile("instagram")?>" target="_blank"><i class="icon-s-instagram"></i></a></li>
              <li><a href="<?=profile("facebook")?>" target="_blank"><i class="icon-s-facebook"></i></a></li>
              <li><a href="#"><i class="icon-s-twitter"></i></a></li>
              <li><a href="#"><i class="icon-s-youtube"></i></a></li>
            </ul>
            <!-- .social -->

          </div>

        </div>
        <!-- /column -->

      </div>
      <!-- /.row -->
    </div>
    <!-- .container -->

    <div class="sub-footer">
      <div class="container inner">
        <p class="text-center">© <?=date("Y")?> All rights reserved. <a href="<?=site_url()?>"><?=strtoupper(profile("title"))?></a>.</p>
      </div>
      <!-- .container -->
    </div>
    <!-- .sub-footer -->
  </footer>
  <!-- /footer -->


  <?php

    $no = substr(profile("telepon"),1);

    $this->load->library('user_agent');

    $mobile=$this->agent->is_mobile();
    if($mobile){
      $url_wa = "https://wa.me/+62".$no."/?text=";
    }else {
      $url_wa = "https://web.whatsapp.com/send?phone=+62".$no."&amp;text=";
    }
   ?>

  <div id="wacht-baixo">
    <a href="<?=$url_wa?>" onclick="gtag('event', 'WhatsApp', {'event_action': 'whatsapp_chat', 'event_category': 'Chat', 'event_label': 'Chat_WhatsApp'});" target="_blank">
      <img src="<?=base_url()?>temp/wa_tb.png" alt="">
    </a>
  </div>

</main>

<!--/.body-wrapper -->

<script src="<?=base_url()?>temp/front/js/plugins.js"></script>
<script src="<?=base_url()?>temp/front/js/classie.js"></script>
<script src="<?=base_url()?>temp/front/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url()?>temp/front/js/scripts.js"></script>
</body>
</html>
