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

        <div class="row">
            <div class="col-sm-12">
                <div class="well well-sm">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-11" style="width:100%">
                    <div class="well well-light well-sm no-margin no-padding">

                            <div class="row">

                                    <div class="col-sm-12" style="width:100%">
                                            <div id="myCarousel" class="carousel fade profile-carousel">
                                                    
                                                    <div class="air air-top-left padding-10">
                                                        <h4 class="txt-color-white font-md"><?php echo date('M d , Y', strtotime($profile_data[0]['dRegDate'])); ?></h4>
                                                    </div>
                                                    <ol class="carousel-indicators">
                                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                                            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                            <!-- Slide 1 -->
                                                            <div class="item active">
                                                                    <img src="<?php echo base_url("assets/img/demo/glass.jpg"); ?>" alt="demo user">
                                                            </div>
                                                            <!-- Slide 2 -->
                                                            <div class="item">
                                                                    <img src="<?php echo base_url("assets/img/demo/glass.jpg"); ?>" alt="demo user">
                                                            </div>
                                                            <!-- Slide 3 -->
                                                            <div class="item">
                                                                    <img src="<?php echo base_url("assets/img/demo/glass.jpg"); ?>" alt="demo user">
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>

                                    <div class="col-sm-12">

                                            <div class="row">
                                                <a  href="<?php echo base_url("adminpanel/master/user_profile/change_profile_picture"); ?>">
                                                    <div class="col-sm-3 profile-pic">
                                                        <?php 
                                                            $fProfilePic=$profile_data[0]['fProfilePic'];
                                                            
                                                            if($fProfilePic==''){
                                                                $pic='user.png';
                                                            }else{
                                                                $pic=$fProfilePic;
                                                            }
                                                        ?>
                                                        <img src="<?php echo base_url("assets/img/profile_pic/$pic"); ?>" style="width: 100px; height: 100px;">
                                                            
                                                    </div>
                                                    </a>
                                                    <div class="col-sm-6">
                                                        
                                                            <h1><?php echo $profile_data[0]['vFirstName']; ?> <span class="semi-bold"><?php echo $profile_data[0]['vLastName']; ?></span>
                                                            <br>
                                                            <small><?php echo $profile_data[0]['vAccTypeName']; ?></small></h1>

                                                            <ul class="list-unstyled">
                                                                    <li>
                                                                            <p class="text-muted">
                                                                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo $profile_data[0]['vContactNo']; ?></span>
                                                                            </p>
                                                                    </li>
                                                                    <li>
                                                                            <p class="text-muted">
                                                                                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $profile_data[0]['vEmail']; ?>"><?php echo $profile_data[0]['vEmail']; ?></a>
                                                                            </p>
                                                                    </li>
                                                                    <li>
                                                                            <p class="text-muted">
                                                                                    <i class="fa fa-home"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo $profile_data[0]['tAddress']; ?></span>
                                                                            </p>
                                                                    </li>
                                                                    <li>
                                                                            <p class="text-muted">
                                                                                    <i class="fa fa-user"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo $profile_data[0]['vUserName']; ?></span>
                                                                            </p>
                                                                    </li>
                                                            </ul>
                                                            <br>
                                                            
                                                            <br>
                                                          
                                                            <a href="<?php echo base_url("adminpanel/master/user_profile/edit_user_profile"); ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Change Password</a>
                                                            
                                                            <br>
                                                            <br>
                                                    </div>


                                            </div>

                                    </div>

                            </div>


                            <!-- end row -->

                    </div>

                    </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>  


<script type="text/javascript">
    function addnew() {
        // window.location="http://www.location.com/ie.htm";
        document.location = '<?php echo base_url("master/user/add_user/"); ?>';
    }
    function clearthis() {
        // window.location="http://www.location.com/ie.htm";
        document.location = '<?php echo base_url("master/user/add_user/"); ?>';
    }
    function viewlist() {
        // window.location="http://www.location.com/ie.htm";
        document.location = '<?php echo base_url("master/user/view_user/"); ?>';
    }
    
    
    function show_div(cat)
    {//alert (cat);
        if (cat == 'Y') {
           //alert (cat);
           document.getElementById('div1').style.display = "block";
           document.getElementById('sec1').style.display = "block";

           
        }
        else if (cat == 'N')
        {
             document.getElementById('div1').style.display = "none";
             document.getElementById('sec1').style.display = "none";
        }
    }
    
    function showall (){
        
        document.getElementById('div1').style.display = "block";
           document.getElementById('sec1').style.display = "block";
    }

</script>

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

        var $checkoutForm = $('#user_register-form').validate({
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
                
                
                vFirstName: {
                    required: true
                },
                vLastName: {
                    required: true
                },
                vEmail: {
                    required: true,
                    email: true
                },
                vContactNo: {
                    required: true
                },
                iUserType: {
                    required: true
                },
               
                vUserName: {
                    required: true
                },
                pPassword: {
                    required: true,
                    minlength: 6,
                    maxlength: 40
                },
                pPasswordConfirm: {
                    required: true,
                    minlength: 6,
                    maxlength: 40,
                    equalTo: '#pPassword'
                },
            },

            // Messages for form validation
            messages: {
                vTitle: {
                    required: 'Select title'
                },
                
                
                vFirstName: {
                    required: 'Please enter your first name'
                },
                vLastName: {
                    required: 'Please enter your last name'
                },
                vEmail: {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                vContactNo: {
                    required: 'Please enter your phone number'
                },
                iUserType: {
                    required: 'Please select user type'
                },
              
                vUserName: {
                    required: 'Please enter User Name'
                },
                pPassword: {
                    required: 'Please enter your password'
                },
                pPasswordConfirm: {
                    required: 'Please enter your password one more time',
                    equalTo: 'Please enter the same password as above'
                },
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
