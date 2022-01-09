<?php
$tid = $this->uri->segment(4);
$UserType=$this->session->userdata('paddy_iUserTypeBackendsession'); 


if ($saveStatus == 'E') {
    $ID = $edit_data[0]->ID;
    $paddy_land_ID = $edit_data[0]->paddy_land_ID;
    //$land_name = $edit_data[0]->land_name;
    $year = $edit_data[0]->year;
    $cultivated_area = $edit_data[0]->cultivated_area;
    $paddy_type_ID = $edit_data[0]->paddy_type_ID;
    // $paddy_type_name = $edit_data[0]->paddy_type_name;
    $season_ID = $edit_data[0]->season_ID;
    // $season_name = $edit_data[0]->season_name;
    $crop_damage = $edit_data[0]->crop_damage;
    $volume_of_harvested = $edit_data[0]->volume_of_harvested;
    $status = $edit_data[0]->status;
}else{
    $ID = "";
    $paddy_land_ID = "";
    $land_name = "";
    $year = "";
    $cultivated_area = "";
    $paddy_type_ID = "";
    $paddy_type_name = "";
    $season_ID = "";
    $season_name = "";
    $crop_damage = "";
    $volume_of_harvested = "";
    $status = "";
}

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
                    Paddy Cultivation & Harveting
                </h1>
            </div> 


            <div class="col-lg-8">                
                <ul id="sparks" class="">
                    <?php if($UserType!=3){ ?>
                    <li class="sparks-info" style="border: 1px solid #c5c5c5; padding-right: 0px; padding: 22px 15px; min-width: auto;">
                        <a href="<?php echo base_url("adminpanel/harvest/harvest/add"); ?>"><h5>Add New</h5></a>
                    </li>
                    <?php } ?>
                    <li class="sparks-info" style="border: 1px solid #c5c5c5; padding-right: 0px; padding: 10px; min-width: auto;">
                        <a href="<?php echo base_url("adminpanel/harvest/harvest/view"); ?>"><h5>View All<span class="txt-color-blue" style="text-align: center"><i class=""></i><?php echo count($list_data); ?></span></h5></a>
                        
                    </li>
                    
                </ul>
            </div> 

        </div>
        <?php
        $showinput = 1;
        if (validation_errors() != "") {
            $showinput = 0;
            ?>
            <div class="alert alert-block alert-info">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading"><i class="fa fa-check-square-o"></i><?php echo validation_errors(); ?></h4>
            </div>
            <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('message_error') != "") {
            $showinput = 0;
            ?>
            <div class="alert alert-block alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading"><i class="fa fa-check-square-o"></i><?php echo $this->session->flashdata('message_error'); ?></h4>
            </div>
            <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('message_saved') != "") {
            $showinput = 0;
            ?>
            <div class="alert alert-block alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading"><i class="fa fa-check-square-o"></i><?php echo $this->session->flashdata('message_saved'); ?></h4>
            </div>
            <?php
        }
        ?>

        <?php if ($saveStatus == 'V') { ?>
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
                                                <th>Paddy Land Name</th>
                                                <th>Year</th>
                                                <th>Cultivated Area</th>
                                                <th>Type of Paddy</th>
                                                <th>Season</th>
                                                <th>Crop Damage</th>
                                                <th>Volume of Harvested</th>
                                                <?php if($UserType!=3){ ?>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Status</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $oddeven_count = 0;
                                            foreach ($list_data as $rowlist) {
                                                $recordid = $rowlist->ID;
                                                $land_name= $rowlist->land_name;
                                                $year= $rowlist->year;
                                                $cultivated_area= $rowlist->cultivated_area;
                                                $paddy_type_name= $rowlist->paddy_type_name;
                                                $season_name= $rowlist->season_name;
                                                $crop_damage= $rowlist->crop_damage;
                                                $volume_of_harvested= $rowlist->volume_of_harvested;
                                                $status= $rowlist->status;
                                                ?>
                                                <tr>
                      
                                                    <td><?php echo $recordid; ?></td>
                                                    <td><?php echo $land_name; ?></td>
                                                    <td><?php echo $year; ?></td>
                                                    <td><?php echo $cultivated_area; ?></td>
                                                    <td><?php echo $paddy_type_name; ?></td>
                                                    <td><?php echo $season_name; ?></td>
                                                    <td><?php echo $crop_damage; ?></td>
                                                    <td><?php echo $volume_of_harvested; ?></td>

                                                    <?php if($UserType!=3){ ?>
                                                   
                                                    <td align='center'> 
                                                        <div class="control-buttons" style="font-size: 15px;">  
                                                            <a href="<?php echo base_url("adminpanel/harvest/harvest/edit/$recordid"); ?>" title="Modify"><i class="glyphicon glyphicon-edit"></i></a>
                                                        </div>
                                                    </td>

                                                    <td align='center'> 
                                                        <div class="control-buttons" style="font-size: 15px;">  
                                                            <a href="<?php echo base_url("adminpanel/harvest/harvest/delete/$recordid"); ?>" title="Modify"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </div>
                                                    </td>
                                                    <td style="text-align:center; vertical-align: middle;">
                                                        <div class="onoffswitch-container" style="margin-top: 0px;">
                                                            <span class="onoffswitch">
                                                               
                                                                <input type="checkbox" class="onoffswitch-checkbox" id="inline_<?php echo $recordid; ?>"  <?php if ($status == 'Y') {echo 'checked="checked"';} ?>>
                                                                   
                                                                       
                                                                <label class="onoffswitch-label" for="inline_<?php echo $recordid; ?>"> 
                                                                    <span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> 
                                                                    <span class="onoffswitch-switch"></span>
                                                                </label> 
                                                            </span>
                                                        </div>

                                                        <script type="text/javascript">

                                                            //                                                                                               
                                                            $('#inline_<?php echo $recordid; ?>').on('change', function (e) {
                                                                if ($(this).prop('checked')) {
                                                                    window.location.href = '<?php echo base_url("adminpanel/harvest/harvest/active_record/$recordid"); ?>';
                                                                } else {
                                                                    window.location.href = '<?php echo base_url("adminpanel/harvest/harvest/deactive_record/$recordid"); ?>';
                                                                }
                                                            });

                                                        </script>
                                                    </td>
                                                <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- end widget content -->

                            </div>
                            <!-- end widget div -->

                        </div>
                        <!-- end widget -->				

                    </article>
                    <!-- WIDGET END -->

                </div>

                <!-- end row -->

                <!-- end row -->

            </section>

        <?php } else { ?>


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


                        <form action="<?php echo base_url("adminpanel/harvest/harvest/save_harvest"); ?>" method="post" id="event-form" class="smart-form" enctype="multipart/form-data">
                            <header>
                                Paddy Land Cultivation & Harvesting
                            </header>


                            <fieldset>
                                <div class="row">

                                    <section class="col col-4">
                                        <label class="label">Paddy Land Name</label>
                                        <label class="select state-success">
                                            <select id="paddy_land_ID" name="paddy_land_ID" aria-invalid="false" class="valid">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($land_data as $row) {

                                                    $lnd_id = $row->ID;
                                                    $lnd_name = $row->land_name;

                                                    if ($paddy_land_ID == $lnd_id) {
                                                        $select_lnd_name = 'selected = selected';
                                                    } else {
                                                        $select_lnd_name = '';
                                                    }

                                                    echo "<option value=\"$lnd_id\" $select_lnd_name>$lnd_name</option>";
                                                }
                                                ?>
                                            </select> <i></i>
                                        </label>
                                    </section>

                                     <section class="col col-4">
                                        <label class="label">Year</label>
                                        <label class="input">
                                            <input type="text" name="year" id="year" value="<?php echo $year; ?>">
                                        </label>
                                    </section>

                                    <section class="col col-4">
                                        <label class="label">Cultivated Area (perch)</label>
                                        <label class="input">
                                            <input type="text" name="cultivated_area" id="cultivated_area" value="<?php echo $cultivated_area; ?>">
                                        </label>
                                    </section>

                                </div>

                                <div class="row">

                                    <section class="col col-4">
                                        <label class="label">Paddy Type</label>
                                        <label class="select state-success">
                                            <select id="paddy_type_ID" name="paddy_type_ID" aria-invalid="false" class="valid">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($paddy_type_data as $row) {

                                                    $ptype_id = $row->ID;
                                                    $ptype_name = $row->paddy_type_name;

                                                    if ($paddy_type_ID == $ptype_id) {
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
                                        <label class="label">Season</label>
                                        <label class="select state-success">
                                            <select id="season_ID" name="season_ID" aria-invalid="false" class="valid">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($season_data as $row) {

                                                    $ses_id = $row->ID;
                                                    $ses_name = $row->season_name;

                                                    if ($season_ID == $ses_id) {
                                                        $select_ses_name = 'selected = selected';
                                                    } else {
                                                        $select_ses_name = '';
                                                    }

                                                    echo "<option value=\"$ses_id\" $select_ses_name>$ses_name</option>";
                                                }
                                                ?>
                                            </select> <i></i>
                                        </label>
                                    </section>

                                    <section class="col col-4">
                                        <label class="label">Crop Damage (Kg)</label>
                                        <label class="input">
                                            <input type="text" name="crop_damage" id="crop_damage" value="<?php echo $crop_damage; ?>">
                                        </label>
                                    </section>

                                </div>

                                <div class="row">

                                    <section class="col col-4">
                                        <label class="label">Volume of Harvested (Kg)</label>
                                        <label class="input">
                                            <input type="text" name="volume_of_harvested" id="volume_of_harvested" value="<?php echo $volume_of_harvested; ?>">
                                        </label>
                                    </section>

                                </div>
                                
                            </fieldset>

                            <footer>
                                <input type="hidden" name="cSaveStatus" value="<?php echo $saveStatus ?>">
                                <input type="hidden" name="ID" value="<?php echo $this->uri->segment(5); ?>">
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

        <?php } ?>

    </div>
</div>  


<script type="text/javascript">
    
   
    function viewlist() {
        // window.location="http://www.location.com/ie.htm";
        document.location = '<?php echo base_url("products/new_event/view_event"); ?>';
    }

</script>

<script src="<?php echo base_url("assets/js/plugin/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.colVis.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.tableTools.min.js"); ?>"></script> 
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatable-responsive/datatables.responsive.min.js"); ?>"></script>



<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {


        var errorClass = 'invalid';
        var errorElement = 'em';

        var $checkoutForm = $('#event-form').validate({
            errorClass: errorClass,
            errorElement: errorElement,
            highlight: function (element) {
                $(element).parent().removeClass('state-success').addClass("state-error");
                $(element).removeClass('valid');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass("state-error").addClass('state-success');
                $(element).addClass('valid');
            },

            // Rules for form validation
            rules: {
                vTitle: {
                    required: true
                },
                fPrice: {
                    required: true
                },
                tDescription: {
                    required: true
                },
                vUnit: {
                    required: true
                },
                iOrder: {
                    required: true
                },
                iCategory: {
                    required: true
                },
                fQuantity: {
                    required: true
                }
                
                <?php if($saveStatus=='A'){ ?>
                ,
                fImage: {
                    required: true
                }
                <?php } ?>
            },

            // Messages for form validation
            messages: {
                vTitle: {
                    required: 'Required'
                },
                fPrice: {
                    required: 'Required'
                },
                tDescription: {
                    required: 'Required'
                },
                vUnit: {
                    required: 'Required'
                },
                iOrder: {
                    required: 'Required'
                }
                ,
                iCategory: {
                    required: 'Required'
                }
                ,
                fQuantity: {
                    required: 'Required'
                }
                <?php if($saveStatus=='A'){ ?>
                ,
                fImage: {
                    required: 'Required'
                }
                <?php } ?>
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });

        /* // DOM Position key index //
         
         l - Length changing (dropdown)
         f - Filtering input (search)
         t - The Table! (datatable)
         i - Information (records)
         p - Pagination (paging)
         r - pRocessing
         < and > - div elements
         <"#id" and > - div with an id
         <"class" and > - div with a class
         <"#id.class" and > - div with an id and class
         
         Also see: http://legacy.datatables.net/usage/features
         */

        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        /* END BASIC */

        /* COLUMN FILTER  */
        var otable = $('#datatable_fixed_column').DataTable({
            //"bFilter": false,
            //"bInfo": false,
            //"bLengthChange": false
            //"bAutoWidth": false,
            //"bPaginate": false,
            //"bStateSave": true // saves sort state using localStorage
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
            }

        });

        // custom toolbar
        $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on('keyup change', function () {

            otable
                    .column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();

        });
        /* END COLUMN FILTER */

        /* COLUMN SHOW - HIDE */
        $('#datatable_col_reorder').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "autoWidth": true,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_col_reorder) {
                    responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_col_reorder.respond();
            }
        });

        /* END COLUMN SHOW - HIDE */

        /* TABLETOOLS */
        $('#datatable_tabletools').dataTable({

            // Tabletools options:
            //   https://datatables.net/extensions/tabletools/button_options
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'B>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "buttons": [
                {extend: 'copy', className: 'btn btn-default'},
                {extend: 'csv', className: 'btn btn-default'},
                {extend: 'excel', className: 'btn btn-default'},
                {extend: 'pdf', className: 'btn btn-default'},
                {extend: 'print', className: 'btn btn-default'},
            ],
            "autoWidth": true,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_tabletools) {
                    responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_tabletools.respond();
            }
        });



        /* END TABLETOOLS */

  
        $("#iUserType").change(function(){
            if ($(this).val()==""){ $(this).css({color: "#FF0000"});}
            else {  $(this).css({color: "#000"});}
        });
        
        $("#iWorkOffice").change(function(){
            if ($(this).val()==""){ $(this).css({color: "#FF0000"});}
            else {  $(this).css({color: "#000"});}
        });
     



    })

</script>
