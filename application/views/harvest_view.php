  <body id="home">



  <!--=============================================-->
  <!--===================header====================-->

<div class="row margin_auto top_section">
  <img src="<?php echo base_url('assets/frontend/'); ?>images/logo.png" alt="" class="img-responsive center-block top_logo" data-aos="fade-up">
  <h1 class="heading" style="text-align: center; color: #ffffff; margin-top: 0px;" data-aos="fade-up">
    Paddy Land and Harvesting Data collection system
  </h1>
  <p style="text-align: center; color: #ffffff;" data-aos="fade-up">
    Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is cultivated as a wetland crop in all the <br class="hidden-sm hidden-xs">districts in two cultivation seasons.
  </p>
</div>


  <!--=============================================-->
  <!--===================header====================-->

<br>
<br>

  <!--=============================================-->
  <!--===================body====================-->



  <!--filter section-->
  <div class="container">
    <div class="content_box">
      <div class="row">

        <form action="<?php echo base_url('home/search_result'); ?>" method="post" id="search_form" name="search_form">

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>Year</label>
                <select class="form-control" id="year" name='year'>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                </select>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>Search Type</label>
                <select class="form-control" id="searchtype" name='searchtype'>
                    <option value="1">Paddy Harvest</option>
                    <option value="2">Paddy Land</option>
                </select>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>Province</label>
                <select class="form-control" id="province_ID" name="province_ID" aria-invalid="false" class="valid" onchange="load_district();">
                  <option value="">Please Select</option>
                  <?php foreach ($province as $row) { ?>
                  <option value="<?php echo $row->ID ?>"><?php echo $row->province_name ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>District</label>
                <select class="form-control" id="district_ID" name="district_ID" aria-invalid="false" class="valid" onchange="load_city();">
                  <option value="">Please Select</option>
                  <?php foreach ($district as $row) { ?>
                  <option value="<?php echo $row->ID ?>"><?php echo $row->district_name ?></option>
                  <?php  } ?>
                </select>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>City</label>
                <select class="form-control" id="city_ID" name="city_ID" aria-invalid="false" class="valid">
                  <option value="">Please Select</option>
                  <?php foreach ($city as $row) {  ?>
                  <option value="<?php echo $row->ID ?>"><?php echo $row->city_name ?></option>
                  <?php  } ?>
                </select>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>Paddy Type</label>
                <select class="form-control" id="paddy_type_ID" name="paddy_type_ID" aria-invalid="false" class="valid">
                  <option value="">Please Select</option>
                  <?php foreach ($paddy_type as $row) { ?>
                  <option value="<?php echo $row->ID ?>"><?php echo $row->paddy_type_name ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>Cultivation Season</label>
                <select class="form-control" id="season_ID" name='season_ID'>
                    <?php foreach ($season as $row) { ?>
                  <option value="<?php echo $row->ID ?>"><?php echo $row->season_name ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
           <label>&nbsp;</label>
           <button type="submit" id="btnid" class="btn btn-default custom_btn" data-aos="fade-up" style="width: 100%;">Search</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!--filter section-->

  <br>
  <br>

  <!--paddy harvest section-->

  <div class="container">
    
    <div class="row">
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="heading" data-aos="fade-up">
          Paddy Harvest - 2020
        </h1>
        <p data-aos="fade-up">
          Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is cultivated as a wetland crop in all the districts in two cultivation seasons.
        </p>
      </div>

      <br>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div class="row">
           
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
              <h1 class="heading" data-aos="fade-up" style="font-size: 20px; text-align: center; margin-bottom: 0px;">
                YALA SEASON
              </h1>
                <canvas id="yala" width="100%" />
                <div id="chartjs-tooltip"></div>
             </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-down">
              <h1 class="heading" data-aos="fade-up" style="font-size: 20px; text-align: center; margin-bottom: 0px;">
                MAHA SEASON
              </h1>
               <canvas id="maha" width="100%" />
                <div id="chartjs-tooltip"></div>
             </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
              <h1 class="heading" data-aos="fade-up" style="font-size: 20px; text-align: center; margin-bottom: 0px;">
                ALL 2020
              </h1>
               <canvas id="all" width="100%" />
                <div id="chartjs-tooltip"></div>
             </div>

        </div>

      </div>

    </div>

  </div>

  <!--paddy harvest section-->
  <br>
  <br>
  <br>
  <br>


   <!--contact us section-->

  <div class="row margin_auto bg_row" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/contact_bg.jpg);">

    <!--jarallax section-->

      <div class="jarallax contact_div" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/contact_bg.jpg);">
        <div class="container" style="padding-bottom: 80px; padding-top: 80px;">
          <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="row margin_auto">
                <h1 class="heading" style="text-align: center; color: #ffffff; margin-top: 0px;" data-aos="fade-up">
                    if you need to get any kind of information, related to the
                </h1>
                <h1 class="heading" style="text-align: center; color: #ffffff; margin-top: 0px; font-size: 40px;" data-aos="fade-up">
                    paddy land and harvesting
                </h1>
                <h1 class="heading" style="text-align: center; color: #ffffff; margin-top: 0px; font-size: 45px;" data-aos="fade-up">
                    contact us
                </h1>
                <h1 class="heading" style="text-align: center; color: #ffffff; margin-top: 0px; font-size: 50px;" data-aos="fade-up">
                    +94 112 694 231 / 3
                </h1>
                </div>
            </div>

          </div>
        </div>

      </div>

    <!--jarallax section-->

  </div>

  <!--contact us section-->

  <br>


  <!--=============================================-->
  <!--===================body====================-->