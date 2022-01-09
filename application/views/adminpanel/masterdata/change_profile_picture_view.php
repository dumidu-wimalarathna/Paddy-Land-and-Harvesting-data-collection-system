<?php
$UserType=$this->session->userdata('paddy_iUserTypeBackendsession');
?>
<style>

    #sparks li h5 {
        color: #555;
        float: left;
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

    /*change place holder colour*/
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: red;
    }
    ::-moz-placeholder { /* Firefox 19+ */
        color: red;
    }
    :-ms-input-placeholder { /* IE 10+ */
        color: red;
    }
    :-moz-placeholder { /* Firefox 18- */
        color: red;
    }


        #iUserType{
            color: #FF0000;
        }
        option:not(first-child) {
            color: #000;
        }
        
        #iWorkOffice{
            color: #FF0000;
        }
        option:not(first-child) {
            color: #000;
        }


</style>


<div id="main" role="main">
    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
<!--            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> -->
        </span>

        <!-- breadcrumb -->
<!--        <ol class="breadcrumb">
            <li>Home</li><li>Administration</li><li>Users</li>
        </ol>-->
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
                    My Profile
                </h1>
            </div> 


            <div class="col-lg-8">                
                <ul id="sparks" class="">
                   
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

     <div class="jarviswidget" id="user_register" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
                                    <h2>Change Profile Picture</h2>

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


                                        <form action="<?php echo base_url('adminpanel/master/user_profile/save_profile_pic'); ?>" method="post" id="changepic-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                                                    <header>
                                                            Profile Picture
                                                    </header>
                                                    
                                                    <div class="row">
                                                        
                                                     
                                                    
                                                    <div class="col col-sm-12">
                                                        
                                                         
                                                    <fieldset >
                                                        <div class="form-group">
                 
                                                            <div class="row">

                                                                <section class="col col-6">
                                                                    <div class="input input-file">                                                                       
                                                                        <input type="file" id="fProfilePic" name="fProfilePic" class="form-control valid" aria-invalid="false">                                                                        
                                                                    </div>
                                                                </section>
                                                              </div>             
                                                        </div>
                                                    </fieldset>
                                                        
                                                    </div>
                                                    
                                                        
                                                    
                                                    </div>

                                                  
                                                    <footer>
                                                       
                                                        <input type="hidden" id="uploadpath" name="uploadpath" value="assets/img/profile_pic">
                                                        <button id="button1id" name="button1id" type="submit" class="btn btn-primary">
                                                                Ok
                                                        </button>
                                                       
                                                    </footer>

                                                        
                                            </form>

                                    </div>
                                    <!-- end widget content -->

                            </div>
                            <!-- end widget div -->

                    </div>
    </div>
</div>  




<script src="<?php echo base_url("assets/js/plugin/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.colVis.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.tableTools.min.js"); ?>"></script> 
<script src="<?php echo base_url("assets/js/plugin/datatables/dataTables.bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugin/datatable-responsive/datatables.responsive.min.js"); ?>"></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/dataTables.buttons.min.js"); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/buttons.flash.min.js"); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/jszip.min.js"); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/pdfmake.min.js"); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/vfs_fonts.js"); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/buttons.html5.min.js"); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/js/buttons.html5.min.js"); ?>"></script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {


        var errorClass = 'invalid';
        var errorElement = 'em';

        var $checkoutForm = $('#changepic-form').validate({
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
                
                fProfilePic: {
                    required: true
                }
            },

            // Messages for form validation
            messages: {

                fProfilePic: {
                    required: 'Please slect a picture'
                }
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
