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
                <select class="form-control" id="year" name='year' required>
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
                <select class="form-control" id="searchtype" name='searchtype' required>
                    <option value="1">Paddy Harvest</option>
                    <option value="2">Paddy Land</option>
                </select>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group" data-aos="fade-up">
                <label>Province</label>
                <select class="form-control" id="province_ID" name="province_ID" aria-invalid="false" class="valid" onchange="load_district();" required>
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
                <select class="form-control" id="district_ID" name="district_ID" aria-invalid="false" class="valid" onchange="load_city();" required>
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
                <select class="form-control" id="city_ID" name="city_ID" aria-invalid="false" class="valid" required>
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
                <select class="form-control" id="paddy_type_ID" name="paddy_type_ID" aria-invalid="false" class="valid" required>
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
                <select class="form-control" id="season_ID" name='season_ID' required>
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
          Paddy Harvest - <?php echo date('Y')-1; ?>
        </h1>
        <p data-aos="fade-up">
          Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is cultivated as a wetland crop in all the districts in two cultivation seasons.
        </p>
      </div>
<?php //print_r($yala);  exit();
?>
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
                ALL <?php echo date('Y')-1; ?>
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

  <!-- image section -->
 <div class="container">
    
    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <img src="<?php echo base_url('assets/frontend/'); ?>images/rice.jpg" alt="" class="img-responsive center-block body_img" data-aos="fade-down">
      </div>

       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1 class="heading" data-aos="fade-up" style="margin-top: 0px;">
          RICE
        </h1>
        <p data-aos="fade-up">
          Rice is the single most important crop occupying 34 percent (0.77 /million ha) of the total cultivated area in Sri Lanka. On average 560,000 ha are 
cultivated during maha and 310,000 ha during yala making the average annual extent sown with rice to about 870,000 ha. About 1.8 million farm families are engaged in paddy cultivation island-wide. Sri Lanka currently produces 2.7 million t of rough rice annually and satisfies around 95 percent of the domestic requirement. Rice provides 45% total calorie and 40% total protein requirement of an average Sri Lankan. The per capita consumption of rice fluctuates around 100 kg per year depending on the price of rice, bread and wheat flour.
        </p>
      </div>

    </div>

  </div>
  <!-- image section -->

    <br>
  <br>

  <!--paddy land section-->

  <div class="container">
    
    <div class="row">
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="heading" data-aos="fade-up">
          Paddy land
        </h1>
        <p data-aos="fade-up">
          Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is cultivated as a wetland crop in all the districts in two cultivation seasons.
        </p>
      </div>
      <div class="clearfix"></div>

      <br>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div class="row">
           
             <!-- paddy land table -->
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table display nowrap" id="responexample" style="width:100%">
              <thead style="background-color: #fff;">
                <tr>
                    <th>Owner Name</th>
                    <th>Land Name</th>
                    <th>City</th>
                    <th>Extent of land</th>
                    <th>Year</th>
                    <th>Season</th>
                    <th>Type of paddy</th>
                    <th>Crop damages</th>
                    <th>Volume of Harvested</th>
                    
                </tr>
                </thead>
                <?php /*<tbody class="add_student_table">
                <?php 
                $rawspan_on='';
                    if(count($land)>0){
                        for ($x = 0; $x < count($land); $x++) {
                            $y='';
                            $y=$x;
                            if($y<count($land)-1){$y++;  }
                    
                            if($rawspan_on==1){ ?>
                                <tr>
                                    <td><?php echo $land[$x]->season_name; ?></td>
                                    <td><?php echo $land[$x]->paddy_type_name; ?></td>
                                    <td><?php echo $land[$x]->crop_damage; ?></td>
                                    <td><?php echo $land[$x]->volume_of_harvested; ?></td>
                                </tr>
                            <?php 
                            $rawspan_on='';
                            } else if($land[$x]->landID==$land[$y]->landID){
                                $rawspan_on=1;
                            ?>
                                <tr>
                                    <td rowspan='2'><?php echo $land[$x]->first_name.' '.$land[$x]->last_name; ?></td>
                                    <td rowspan='2'><?php echo $land[$x]->land_name; ?></td>
                                    <td rowspan='2'><?php echo $land[$x]->city_name; ?></td>
                                    <td rowspan='2'><?php echo $land[$x]->land_extend; ?></td>
                                    <td rowspan='2'><?php echo date('Y')-1; ?></td>
                                    <td><?php echo $land[$x]->season_name; ?></td>
                                    <td><?php echo $land[$x]->paddy_type_name; ?></td>
                                    <td><?php echo $land[$x]->crop_damage; ?></td>
                                    <td><?php echo $land[$x]->volume_of_harvested; ?></td>
                                </tr>
                    <?php   }else {  ?>
                                <tr>
                                    <td rowspan='2'><?php echo $land[$x]->first_name.' '.$land[$x]->last_name; ?></td>
                                    <td rowspan='2'><?php echo $land[$x]->land_name; ?></td>
                                    <td rowspan='2'><?php echo $land[$x]->city_name; ?></td>
                                    <td><?php echo $land[$x]->land_extend; ?></td>
                                    <td><?php echo date('Y')-1; ?></td>
                                    <td><?php echo $land[$x]->season_name; ?></td>
                                    <td><?php echo $land[$x]->paddy_type_name; ?></td>
                                    <td><?php echo $land[$x]->crop_damage; ?></td>
                                    <td><?php echo $land[$x]->volume_of_harvested; ?></td>
                                </tr>
                <?php       }  // if condition close
                        }  // for loop close
                    }   //count if close
                    
                ?>
                </tbody>  */ ?>
                <tbody class="add_student_table">
                <?php 
                    if(count($land)>0){
                        for ($x = 0; $x < count($land); $x++) { ?>
                            <tr>
                                    <td><?php echo $land[$x]->first_name.' '.$land[$x]->last_name; ?></td>
                                    <td><?php echo $land[$x]->land_name; ?></td>
                                    <td><?php echo $land[$x]->city_name; ?></td>
                                    <td><?php echo $land[$x]->land_extend; ?></td>
                                    <td><?php echo date('Y')-1; ?></td>
                                    <td><?php echo $land[$x]->season_name; ?></td>
                                    <td><?php echo $land[$x]->paddy_type_name; ?></td>
                                    <td><?php echo $land[$x]->crop_damage; ?></td>
                                    <td><?php echo $land[$x]->volume_of_harvested; ?></td>
                                </tr>
                <?php      
                        }  // for loop close
                    }   //count if close
                    
                ?>
                </tbody>
            </table>
          </div>
            <!-- paddy land table -->

        </div>

      </div>

    </div>

  </div>

  <!--paddy land section-->
  <br>
  <br>

    <!-- image section -->
 <div class="container">
    
    <div class="row">

      <!-- visible mobile -->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 visible-sm visible-xs">
        <img src="<?php echo base_url('assets/frontend/'); ?>images/paddy_land.jpg" alt="" class="img-responsive center-block body_img" data-aos="fade-down">
      </div>
      <!-- visible mobile -->

       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1 class="heading" data-aos="fade-up" style="margin-top: 0px;">
          PADDY LANDS
        </h1>
        <p data-aos="fade-up">
          Paddy crops is cultivated as a wetland crop in all the districts. The total land devoted for paddy is estimated to be about 708,000 Hectares at present. There are two cultivation seasons namely; Maha and Yala which are 
synonymous with two monsoons. Maha Season falls during North-east monsoon from September to March in the following year. Yala season is effective during the period from May to end of August. When the crop is sown and harvested during above periods, the particular season is defined. However, the whole area devoted for paddy is not being cultivated due to number of reasons such as shortage of water during the seasons, prevailing unsettle conditions on the ground, etc.
        </p>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hidden-sm hidden-xs">
        <img src="<?php echo base_url('assets/frontend/'); ?>images/paddy_land.jpg" alt="" class="img-responsive center-block body_img" data-aos="fade-down">
      </div>

    </div>

  </div>
  <!-- image section -->

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
