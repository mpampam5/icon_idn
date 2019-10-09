

<style media="screen">
  .captcha img{
    width: 100%;
  }

  label{
    display: inline;
  }

  #content-image{
    /* min-height: 250px; */
    /* background-color: rgba(0, 0, 0, 0.64); */
    /* background-color: #343434; */
    position:relative;
    padding: 5px;
    border-radius: 5px 5px 5px 5px;
  }

  #cover-images{
    background-color: rgba(28, 28, 28, 0.43);
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center;
    min-height: 200px;
    /* opacity: 0.7; */
    border-radius: 5px 5px 5px 5px;
  }

  .overlay-image {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #000000;
  border-radius: 5px 5px 5px 5px;
  z-index: 999;
}

#content-image:hover .overlay-image {
  opacity: 0.8;
}


.text-overlay {
  color: white;
  font-size: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

</style>
<div class="light-wrapper">
  <div class="container inner">
    <h3 class="section-title text-center m-t-30">Portofolio - <?=ucfirst($porto->nama)?></h3>
    <?php if ($porto->keterangan!=""): ?>
      <p class="text-center"><?=$porto->keterangan?></p>
    <?php endif; ?>

    <div class="row" style="padding:10px;">
      <?php $for_image = $this->db->get_where("image",["id_portofolio"=>$porto->id_portofolio]); ?>
      <?php foreach ($for_image->result() as $images): ?>
        <div class="col-md-3">
          <a href="<?=base_url()?>temp/file/<?=$images->name?>" class="fancybox-media" data-rel="portfolio" >
          <div id="content-image">
            <div class="overlay-image">
                <span class="text-overlay"><i class="budicon-camera-1"></i></span>
            </div>
            <div id="cover-images" style="background-image:url('<?=base_url()?>temp/file/<?=$images->name?>')"></div>
          </div>
        </a>
        </div>
      <?php endforeach; ?>




    </div>

  </div>
</div>
