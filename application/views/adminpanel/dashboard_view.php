<style>
    #main {
        height: 100vh;
        background-image:url('<?php echo base_url('assets/img/top_bg.jpg'); ?>');
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center;
    }
    
    .alert-info {
        border-color: transparent;
        text-align: right;
        color: #ffffff;
        background-color: transparent;
    }
    
    .alert-info h4{
        text-align: right !important;
    }
    
    .heading {
        font-size: 30px;
        font-weight: 900;
        color: #000000;
        text-transform: uppercase;
    }
    
    .btn-primary {
        color: #000000;
        background-color: #f7a41c;
        border-color: #f7a41c;
        font-weight: 900 !important;
        padding: 10px !important;
        height: auto !important;
        border-radius: 5px;
        webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }
    
    .btn-primary:hover {
        color: #f7a41c;
        background-color: #000000;
        border-color: #000000;
    }
</style>

<?php
$userid=$this->session->userdata('paddy_userbackendsession');
$usertype = $this->session->userdata('paddy_iUserTypeBackendsession');


$hour = date('H', time());
$gritting = "";
if ($hour =='00') {
    $gritting = "Good Morning";
} elseif ($hour >= 1 && $hour <= 11) {
    $gritting = "Good Morning";
} else if ($hour > 11 && $hour <= 16) {
    $gritting = "Good Afternoon";
} else if ($hour > 16 && $hour <= 23) {
    $gritting = "Good Evening";
} else {
    
}


?>

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">


    </div>

    <div id="content">
        <div class="alert alert-info alert-block">
               
                <h4 style="text-align: center;" class="alert-heading"><?php echo $gritting . " , " . $this->session->userdata('paddy_vFirstNamebackendsession'); ?></h4>
        </div>
        
        <div class="row margin_auto top_section">
          <img src="https://4meli.com/paddy_harvesting_system/assets/frontend/images/logo.png" alt="" class="img-responsive center-block top_logo" data-aos="fade-up">
          <h1 class="heading" style="text-align: center; color: #ffffff; margin-top: 0px;" data-aos="fade-up">
            WELCOME TO THE <br>Paddy Land and Harvesting Data collection system - cms
          </h1>
        </div>
        
        <br>
        <br>
    

    
        <div class="row">
            
            <div class="col-lg-offset-2 col-sm-8">
                
            <a href="<?php echo base_url('adminpanel/harvest/harvest/add'); ?>">
                <div class="col-sm-4">
                    <button type="submit" onclick="gcaptcha();" class="btn btn-primary" style="width: 100%;">
                                Cultivation and Harvesting
                    </button>
                </div>
            </a>
            
            <a href="<?php echo base_url('adminpanel/lands/paddyland/add'); ?>">
                <div class="col-sm-4">
                    <button type="submit" onclick="gcaptcha();" class="btn btn-primary" style="width: 100%;">
                               Paddy Lands
                    </button>
                </div>
            </a>
            
            <a href="<?php echo base_url('adminpanel/owner/owner/add'); ?>">
                <div class="col-sm-4">
                   <button type="submit" onclick="gcaptcha();" class="btn btn-primary" style="width: 100%;">
                                Paddy Lands Owners
                    </button>
                </div>
            </a>
                
                
            </div>

            
            
        </div>
    <!-- END MAIN CONTENT -->
    
    
    
  
    
   
    
    </div>
</div>

<!-- END MAIN PANEL -->

