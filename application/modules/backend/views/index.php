  <link href="<?=config_item('sty_back')?>plugins/morris/morris.css" rel="stylesheet">

  


  <!-- main -->
  <section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li class="active">Uncharted The Lost Legacy First Gameplay Details Revealed</li>
      </ol>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mx-auto">
          <h5 class="m-t-0">Bar Chart</h5>
          <p>Create bar charts using Morris.Bar(options), where options is an object containing the following configuration options.</p>
          <div id="morris-bar-chart"></div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <?=$this->uri->segment(2);?>
      </div>
    </div>
  </section>

  <script src="<?=config_item('sty_back')?>plugins/morris/raphael-2.1.0.min.js"></script>
  <script src="<?=config_item('sty_back')?>plugins/morris/morris.min.js"></script>
  <script>
    (function($) {
      "use strict";



      var bar = new Morris.Bar({
        element: 'morris-bar-chart',
        resize: true,
        data: [{
            y: '2008',
            a: 100,
            b: 90
          },
          {
            y: '2009',
            a: 73,
            b: 45
          },
          {
            y: '2010',
            a: 55,
            b: 42
          },
          {
            y: '2010',
            a: 75,
            b: 65
          },
          {
            y: '2011',
            a: 20,
            b: 40
          },
          {
            y: '2013',
            a: 75,
            b: 65
          },
          {
            y: '2014',
            a: 100,
            b: 90
          }
        ],
        barColors: ['#0E9A49', '#e74c3c'],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['CPU', 'DISK'],
        hideHover: 'auto'
      });

    })(jQuery);
  </script>

  <!-- /main -->
