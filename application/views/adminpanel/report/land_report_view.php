<?php
$UserType=$this->session->userdata('paddy_iUserTypeBackendsession');
?>

<style>
    
    #sparks li {
    display: inline-block;
    max-height: 47px;
    overflow: hidden;
    text-align: left;
    box-sizing: content-box;
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box;
    width: 95px;
}
    
    #sparks li h5 {
    color: #555;
    float: none;
    font-size: 11px;
    font-weight: 400;
    margin: -3px 0 0 0;
    padding: 0;
    border: none;
    font-weight: 900;
    text-transform: uppercase;
    webkit-transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    transition: all 500ms ease;
    text-align: center;
}
    
    #sparks li span {
    color: #324b7d;
    display: block;
    font-weight: 900;
    margin-top: 5px;
    webkit-transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    transition: all 500ms ease;
}

#sparks li h5:hover{
    color: #999999;
}

#sparks li span:hover{
    color: #ffffff;
}

footer .btn {
        float: right;
        color: #ffffff;
         height: auto; 
        margin: 10px 0 0 5px;
        padding: 4px 43px;
        font: 300 15px/29px 'Open Sans',Helvetica,Arial,sans-serif;
        cursor: pointer;
        border-radius: 5px;
        background-color: #000000;
        font-weight: 900;
        text-transform: uppercase;
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

footer .btn:hover{
    background-color: #f7a41c !important;
    color: #000000;
}

    
</style>


<div id="main" role="main">
    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
           
        </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
           
        </ol>
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right">
        <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
        <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
        <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
        </span> -->

    </div>
    <!-- END RIBBON -->  
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-table fa-fw "></i> 
                    Land Reports
                </h1>
            </div> 



        </div>
       

       
             <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="user_register" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2></h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">


                        <form action="<?php echo base_url("adminpanel/report/land_report/view"); ?>" method="post" id="event-form" class="smart-form" enctype="multipart/form-data">
                            


                            <fieldset>
                                <div class="row">

                                     <section class="col col-4">
                                        <label class="label">Province</label>
                                        <label class="select state-success">
                                            <select id="province_ID" name="province_ID" aria-invalid="false" class="valid" onchange="load_district();">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($provice_list as $row) {

                                                    $ptype_id = $row->ID;
                                                    $ptype_name = $row->province_name;

                                                    if ($ptype_id == $provice) {
                                                        $select_ptype_name = 'selected = selected';
                                                    } else {
                                                        $select_ptype_name = '';
                                                    }

                                                    echo "<option value=\"$ptype_id\" $select_ptype_name>$ptype_name</option>";
                                                }
                                                ?>
                                            </select> <i></i>
                                        </label>
                                    </section>

                                    
                                      <section class="col col-4">
                                        <label class="label">District</label>
                                        <label class="select state-success">
                                           
                                            <select id="district_ID" name="district_ID" aria-invalid="false" class="valid" onchange="load_city();">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($district_list as $row) {

                                                    $districtt_id = $row->ID;
                                                    $district_name = $row->district_name;

                                                    if ($districtt_id == $district_id) {
                                                        $select_ptype_name = 'selected = selected';
                                                    } else {
                                                        $select_ptype_name = '';
                                                    }

                                                    echo "<option value=\"$districtt_id\" $select_ptype_name>$district_name</option>";
                                                }
                                                ?>
                                            </select> <i></i>
                                        </label>
                                    </section>
 <section class="col col-4">
                                        <label class="label">City</label>
                                        <label class="select state-success">
                                            <select id="city_ID" name="city_ID" aria-invalid="false" class="valid">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($citys as $row) {

                                                    $ptype_id = $row->ID;
                                                    $ptype_name = $row->city_name;

                                                    if ($ptype_id == $city_ID) {
                                                        $select_ptype_name = 'selected = selected';
                                                    } else {
                                                        $select_ptype_name = '';
                                                    }

                                                    echo "<option value=\"$ptype_id\" $select_ptype_name>$ptype_name</option>";
                                                }
                                                ?>
                                            </select> <i></i>
                                        </label>
                                    </section>
                                    

                                </div>

                                

                               
                                
                            </fieldset>

                            <footer>
                                <?php if($UserType!=3){ ?>
                                <button id="button1id" name="button1id" type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <?php }
                                ?>
                               
                            </footer>
                        </form>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->	
            
            <section id="widget-grid" class="">
                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-darken" id="user_types" data-widget-editbutton="false">
                            <!-- widget options:
                            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                            data-widget-colorbutton="false"
                            data-widget-editbutton="false"
                            data-widget-togglebutton="false"
                            data-widget-deletebutton="false"
                            data-widget-fullscreenbutton="false"
                            data-widget-custombutton="false"
                            data-widget-collapsed="true"
                            data-widget-sortable="false"

                            -->
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>List</h2>

                            </header>

                            <!-- widget div-->
                            <div>

                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->

                                </div>
                                <!-- end widget edit box -->

                                <!-- widget content -->
                                <div class="widget-body no-padding">

                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>			                
                                            <tr>
                                                <th>ID</th>
                                                <th>Province</th>
                                                <th>District</th>
                                                <th>City</th>
                                                <th>Land Name</th>
                                                <th>Owner Name</th>
                                                <th>Extend</th>
                                                <th>Telephone</th>
                                                <th>NIC</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $oddeven_count = 0;
                                            foreach ($list_data as $rowlist) {   ?>
                                                <tr>
                                                    <td><?php echo $rowlist->ID; ?></td>
                                                    <td><?php echo $rowlist->province_name; ?></td>
                                                    <td><?php echo $rowlist->district_name; ?></td>
                                                    <td><?php echo $rowlist->city_name; ?></td>
                                                    <td><?php echo $rowlist->land_name; ?></td>
                                                    <td><?php echo $rowlist->first_name.' '.$rowlist->last_name; ?></td>
                                                    <td><?php echo $rowlist->land_extend; ?></td>
                                                    <td><?php echo $rowlist->telephone; ?></td>
                                                    <td><?php echo $rowlist->NIC; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- end widget content -->

                            </div>
                            <!-- end widget div -->

                            <footer>
                                <a href="get_land_report" target="_blank">
                                    <button id="button1id" name="button1id" class="btn btn-primary">
                                        Generate Pdf
                                    </button>
                                </a>
                               
                            </footer>

                        </div>
                        <!-- end widget -->				

                    </article>
                    <!-- WIDGET END -->

                </div>

                <!-- end row -->

                <!-- end row -->

            </section>

    

			                 

       

    </div>
</div>  




<script src="<?php echo base_url("assets/js/plugin/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.colVis.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.tableTools.min.js"); ?>"></script> 
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatable-responsive/datatables.responsive.min.js"); ?>"></script>


