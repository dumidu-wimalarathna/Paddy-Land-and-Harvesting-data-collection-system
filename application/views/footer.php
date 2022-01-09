  <!--=============================================-->
  <!--===================footer====================-->


  <!--footer section-->


  <div class="row margin_auto footer_row">

    <div class="container">
      
        <img src="<?php echo base_url('assets/frontend/'); ?>images/logo.png" alt="" class="img-responsive center-block" data-aos="fade-up">
        <h1 class="heading" style="text-align: center; color: #000000; margin-top: 0px;" data-aos="fade-up">
          Paddy Land and Harvesting Data collection system
        </h1>
        <p style="text-align: center; color: #000000;" data-aos="fade-up">
          Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is cultivated as a wetland crop in all the  <br class="hidden-sm hidden-xs">districts in two cultivation seasons.
        </p>

        <!-- ============== -->

        <hr>

        <div class="row margin_auto">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('assets/frontend/'); ?>images/agri_logo.jpg" alt="" class="img-responsive pull-right">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('assets/frontend/'); ?>images/agra_logo.jpg" alt="" class="img-responsive">
          </div>
        </div>

        <hr>

        <p style="text-align: center; color: #999999;"><small>COPYRIGHT ©2021 PADDY LAND AND HARVESTING DATA - SRI LANKA</small></p>

    </div>

  </div>


  <!--footer section-->


  <!--=============================================-->
  <!--===================footer====================-->






  <!--=============================================-->
  <!--===================scroll top====================-->

  <div class="scroll-top-wrapper">
<span class="scroll-top-inner">
<i class="glyphicon glyphicon-arrow-up"></i>
</span>
  </div>

  <!--=============================================-->
  <!--===================scroll top====================-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?php echo base_url('assets/frontend/'); ?>js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url('assets/frontend/'); ?>js/bootstrap.min.js"></script>

  <!-- Script to Activate the Carousel -->
  <script>
      $('.carousel').carousel({
          interval: 5000 //changes the speed
      })
  </script>

  <!-- scroll top -->
  <script src="<?php echo base_url('assets/frontend/'); ?>js/scroll-top.js"></script>
  <!-- scroll top -->


  <!--smooth scroll-->
  <script>
      $(document).ready(function(){
          // Add smooth scrolling to all links
          $("a").on('click', function(event) {

              // Make sure this.hash has a value before overriding default behavior
              if (this.hash !== "") {
                  // Prevent default anchor click behavior
                  event.preventDefault();

                  // Store hash
                  var hash = this.hash;

                  // Using jQuery's animate() method to add smooth page scroll
                  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                  $('html, body').animate({
                      scrollTop: $(hash).offset().top
                  }, 800, function(){

                      // Add hash (#) to URL when done scrolling (default click behavior)
                      window.location.hash = hash;
                  });
              } // End if
          });
      });
  </script>
  <!--smooth scroll-->


       <!--loading effects-->
  <script src="<?php echo base_url('assets/frontend/'); ?>js/aos.js"></script>

   <script>
      AOS.init({
          easing: 'ease-out-back',
          duration: 1000
      });
  </script>

  <script>
      //hljs.initHighlightingOnLoad();

      $('.hero__scroll').on('click', function(e) {
          $('html, body').animate({
              scrollTop: $(window).height()
          }, 1200);
      });
  </script>
  <!--loading effects-->

     <!--jarallax js-->
    <script src="<?php echo base_url('assets/frontend/'); ?>jarallax/jarallax_js.js"></script>
    <!--jarallax js-->

    <!--jarallax-->
    <script type="text/javascript">
        /* init Jarallax */
        $('.jarallax').jarallax({
            speed: 0.5,
            imgWidth: 1366,
            imgHeight: 768
        })
    </script>
    <!--jarallax-->


  <!-- data tables -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/'); ?>data_table/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/'); ?>data_table/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/'); ?>data_table/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/'); ?>data_table/responsive.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/'); ?>data_table/bootstrapValidator.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#responexample').DataTable( {
            responsive: true,
            ccolumnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 10001, targets: 6 },
                { responsivePriority: 2, targets: -2 }
            ]
        } );

    } );
</script>
<!-- data tables -->

<!-- chart js -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script  src="<?php echo base_url('assets/frontend/'); ?>chart/script.js"></script>
<!-- chart js -->
<script>
    

//get the doughnut chart canvas
var ctx1 = $("#yala");
var ctx2 = $("#maha");
var ctx3 = $("#all");


$(function(){

  //get the doughnut chart canvas
  var ctx1 = $("#yala");
  var ctx2 = $("#maha");
  var ctx3 = $("#all");

  //doughnut chart data
  var data1 = {
    labels: ["ACTUAL HARVESTED VOLUME", "CROP DAMAGES"],
    datasets: [
      {
        label: "TeamA Score",
        data: [<?php echo $yala[0]->crop_damage; ?>, <?php echo $yala[0]->volume_of_harvested; ?>],
        backgroundColor: [
          "#f7a41c",
          "#979797"
        ],
        borderColor: [
          "#000000",
          "#000000"
        ],
        borderWidth: [1, 1]
      }
    ]
  };

  //doughnut chart data
  var data2 = {
    labels: ["ACTUAL HARVESTED VOLUME", "CROP DAMAGES"],
    datasets: [
     {
        label: "TeamA Score",
        data: [<?php echo $maha[0]->crop_damage; ?>, <?php echo $maha[0]->volume_of_harvested; ?>],
        backgroundColor: [
          "#f7a41c",
          "#979797"
        ],
        borderColor: [
          "#000000",
          "#000000"
        ],
        borderWidth: [1, 1]
      }
    ]
  };

  //doughnut chart data
  var data3 = {
    labels: ["ACTUAL HARVESTED VOLUME", "CROP DAMAGES"],
    datasets: [
      {
        label: "TeamA Score",
        data: [<?php echo $all[0]->crop_damage; ?>, <?php echo $all[0]->volume_of_harvested; ?>],
        backgroundColor: [
          "#f7a41c",
          "#979797"
        ],
        borderColor: [
          "#000000",
          "#000000"
        ],
        borderWidth: [1, 1]
      }
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      fontSize: 14,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 14
      }
    }
  };

  //create Chart class object
  var chart1 = new Chart(ctx1, {
    type: "doughnut",
    data: data1,
    options: options
  });

  //create Chart class object
  var chart2 = new Chart(ctx2, {
    type: "doughnut",
    data: data2,
    options: options
  });

  //create Chart class object
  var chart3 = new Chart(ctx3, {
    type: "doughnut",
    data: data3,
    options: options
  });
});
    
</script>
<script>
    function load_district(){
        
        var province=$('#province_ID').val();
        var district='';
        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>home/get_district",
                data:{ province:province},
                success:function(response)
                {
                    $('#district_ID').empty();
                    $('#district_ID').append(response)
                }
            }
        );
        
        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>home/get_city",
                data:{ province:province,district:district},
                success:function(response)
                {
                    $('#city_ID').empty();
                    $('#city_ID').append(response)
                }
            }
        );
        
    
    
    
    
    }
    
    function load_city(){
        var province=$('#province_ID').val();
        var district=$('#district_ID').val();
        
        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>home/get_city",
                data:{ province:province,district:district},
                success:function(response)
                {
                    $('#city_ID').empty();
                    $('#city_ID').append(response)
                }
            }
        );
        
    }
    
    
</script>
  </body>
</html>
