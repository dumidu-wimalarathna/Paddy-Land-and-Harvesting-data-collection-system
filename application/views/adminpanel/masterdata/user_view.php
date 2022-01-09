<?php

$uname = $this->session->userdata('paddy_vFirstNamebackendsession');
$UserType=$this->session->userdata('paddy_iUserTypeBackendsession');
$tid = $this->uri->segment(5);
$showbutton = $this->uri->segment(4);
//var_dump($arrOffice);
if ($saveStatus == "A") {
    $vUserName = "";
    $vFirstName = "";
    $id = "";
    $vLastName = "";
    $dRegDate = "";
    $cEnable = "";
    $vEmail = "";
    $vContactNo = "";
    $iUserType = "";
    $tAddress = "";
    $iCurrentUser = "";
    $vTitle = "";

    

    
}
if ($saveStatus == 'E') {
    $vTitle = $edit_user[0]->vTitle;
    $vUserName = $edit_user[0]->vUserName;
    $vFirstName = $edit_user[0]->vFirstName;
    $id = $edit_user[0]->id;
    $vLastName = $edit_user[0]->vLastName;
    $dRegDate = $edit_user[0]->dRegDate;
    $cEnable = $edit_user[0]->cEnable;
    $vEmail = $edit_user[0]->vEmail;
    $vContactNo = $edit_user[0]->vContactNo;
    $iUserType = $edit_user[0]->iUserType;
    $tAddress = $edit_user[0]->tAddress;

    
    
}
//echo $saveStatus;
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
                    System Users
                </h1>
            </div> 


            <div class="col-lg-8">                
                <ul id="sparks" class="">
                    <li class="sparks-info" style="border: 1px solid #c5c5c5; padding-right: 0px; padding: 22px 15px; min-width: auto;">
                        <a href="<?php echo base_url("adminpanel/master/user/add_user"); ?>"><h5>Add New</h5></a>
                        
                    </li>
                    <li class="sparks-info" style="border: 1px solid #c5c5c5; padding-right: 0px; padding: 10px; min-width: auto;">
                        <a href="<?php echo base_url("adminpanel/master/user/view_user"); ?>"><h5>View All<span class="txt-color-blue" style="text-align: center"><i class=""></i><?php echo count($list_data); ?></span></h5></a>
                        
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
                                <h2>Current Users</h2>

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

                                                <th>User Full Name</th>
                                                <th>User-name</th>
                                                <th>User Type</th>
                                                <th width='12%'>Phone</th>
                                                <th width='10%'>Modify|Delete</th>
                                                <th width='10%'>Activation</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $oddeven_count = 0;
                                            foreach ($list_data as $rowlist) {
                                                $oddeven_count++;
                                                if ($oddeven_count == 1) {
                                                    $oddeven = 'even pointer';
                                                } else {
                                                    $oddeven = 'odd pointer';
                                                    $oddeven_count = 0;
                                                }

                                                $recordid = $rowlist->id;
                                                $cEnable = $rowlist->cEnable;
                                                if ($cEnable == 'Y') {
                                                    $clicon = 'fa fa-check-circle-o';
                                                    $acTitle = "Deactivate Now";
                                                    $acfunc = "onClick=\"deactiverecord($recordid,'adminpanel/master/user_type/deactive_record')\"";
                                                } else {
                                                    $clicon = 'fa fa-ban';
                                                    $acTitle = "Activate Now";
                                                    $acfunc = "onClick=\"activerecord($recordid,'adminpanel/master/user_type/deactive_record')\"";
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $rowlist->vFirstName; ?> <?php echo $rowlist->vLastName; ?></td>
                                                    <td><?php echo $rowlist->vUserName; ?></td>
                                                    <td><?php echo $rowlist->vAccTypeName; ?></td>
                                                    <td><?php echo $rowlist->vContactNo; ?></td>
                                                    <td align='center'> 
                                                        <div class="control-buttons" style="font-size: 15px;">  
                                                            <a href="<?php echo base_url("adminpanel/master/user/edit_user/$recordid"); ?>" title="Modify"><i class="glyphicon glyphicon-edit"></i></a> &nbsp; &nbsp; &nbsp;
                                                            <?php 
                                                                if ($recordid != '1') {
                                                            ?>
                                                            <!--<a href="<?php echo base_url("adminpanel/master/user/delete_record/$recordid"); ?>" data-toggle="modal"   title="Delete"><i class="glyphicon glyphicon-trash"></i></a>-->
                                                            <a id="smart-mod-eg<?php echo $recordid;?>" href="#" data-toggle="modal"   title="Delete"><i class="glyphicon glyphicon-trash"></i></a> 
                                                            <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $("#smart-mod-eg<?php echo $recordid;?>").click(function(e) {
                                                                    $.SmartMessageBox({
                                                                            title : "Confirmation Required!",
                                                                            content : "Hi <?php echo $uname;?>, do you want to delete the <?php echo $rowlist->vFirstName; ?> <?php echo $rowlist->vLastName; ?>?",
                                                                            buttons : '[No][Yes]'
                                                                    }, function(ButtonPressed) {
                                                                            if (ButtonPressed === "Yes") {

                                                                                document.location = '<?php echo base_url("adminpanel/master/user/delete_record/$recordid"); ?>';
                                                                            }
                                                                            if (ButtonPressed === "No") {

                                                                            }

                                                                    });
                                                                e.preventDefault();
                                                                });
                                                            });
                                                            </script>
                                                                <?php }else {?>
                                                            &nbsp; &nbsp; &nbsp;
                                                                <?php } ?>

                                                        </div>
                                                    </td>
                                                     <?php 
                                                        if ($recordid != '1') {
                                                    ?>
                                                    <td style="text-align:center; vertical-align: middle;">



                                                        <div class="onoffswitch-container" style="margin-top: 0px;">
                                                            <span class="onoffswitch">
                                                               
                                                                <input type="checkbox" class="onoffswitch-checkbox" id="inline_<?php echo $recordid; ?>"  <?php if ($cEnable == 'Y') {echo 'checked="checked"';} ?>>
                                                                   
                                                                       
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
                                                                    window.location.href = '<?php echo base_url("adminpanel/master/user/active_record/$recordid"); ?>';
                                                                } else {
                                                                    window.location.href = '<?php echo base_url("adminpanel/master/user/deactive_record/$recordid"); ?>';
                                                                }
                                                            });

                                                        </script>
                                                    </td>
                                                     <?php }else{ ?>
                                                    <td></td>     
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


                        <form action="<?php echo base_url("adminpanel/master/user/save_user"); ?>" method="post" id="user_register-form" class="smart-form">
                            <header>
                                <?php echo $title; ?>
                            </header>


                            <fieldset>
                                <div class="row">
                                    <section class="col col-1">
                                        <label class="label">Title</label>
                                        <label class="select">
                                            <select name="vTitle" id="vTitle">
                                                <option value="" selected="">Title</option>
                                                <option value="Mr." <?php if ($vTitle == 'Mr.') { ?>selected="selected"<?php } ?>>Mr.</option>
                                                <option value="Miss." <?php if ($vTitle == 'Miss.') { ?>selected="selected"<?php } ?>>Miss.</option>
                                                <option value="Mrs." <?php if ($vTitle == 'Mrs.') { ?>selected="selected"<?php } ?>>Mrs.</option>
                                            </select> <i></i> </label>
                                    </section>

                                    <section class="col col-5">
                                        <label class="label">First Name</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="vFirstName" value="<?php echo $vFirstName; ?>">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Last Name</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="vLastName" value="<?php echo $vLastName; ?>">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    
                                    <section class="col col-6">
                                        <label class="label">E-mail</label>
                                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                            <input type="email" name="vEmail"  value="<?php echo $vEmail ?>">
                                        </label>
                                    </section>
                                   
                                    <section class="col col-6">
                                        <label class="label">Phone</label>
                                        <label class="input"> <i class="icon-append fa fa-phone"></i>
                                            <input type="tel" name="vContactNo"  data-mask="(999) 999-9999" value="<?php echo $vContactNo ?>" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                   
                                    <section class="col col-6">
                                        <label class="label">Address</label>
                                        <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                            <input type="text" name="tAddress"  value="<?php echo $tAddress ?>">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-6"> 
                                        <label class="label">User Type</label>
                                        <label class="select">
                                            <select name="iUserType" id="iUserType" >
                                                <option value="" selected=""  >User Type</option>
                                                <?php
                                                foreach ($iUserTypeArr as $row) {

                                                    $u_type_id = trim($row->id);
                                                    $vAccTypeName = trim($row->vAccTypeName);
                                                    $selTextse = "";
                                                    if ($u_type_id == $iUserType) { //array search
                                                        $selTextse = "selected=\"selected\"";
                                                    } else {
                                                        $selTextse = "";
                                                    }

                                                    echo "<option value=\"$u_type_id\" $selTextse>$vAccTypeName</option>";
                                                }
                                                ?>
                                            </select><i></i>
                                        </label>
                                    </section>

                                </div>
                                <div class="row">
                                    
                                   <section class="col col-6"> 
                                        <label class="label">Activation</label>
                                        <label class="select">
                                            <select id="cEnable" name="cEnable">
                                                <option value="Y" <?php if ($cEnable == 'Y') { ?>selected="selected"<?php } ?>>Active</option>
                                                <option value="N" <?php if ($cEnable == 'N') { ?>selected="selected"<?php } ?>>Deactive</option>
                                            </select> <i></i>
                                        </label>
                                    </section>
                                     
                                </div>
                                
                                <hr>
                                <br>
                                
                                <?php if ($showbutton == 'edit_user') { ?>

                                <div class="row">
                                    <section class="col col-3"> 
                                        <label class="label"> Reset the Username & Password?</label>
                                    </section>
                                    <section class="col col-2"> 
                                        <div class="inline-group "  >
                                            <label class="radio">
                                                <input type="radio" value="Y" name="resetType"  onclick ="show_div('Y')">
                                                <i></i>Yes</label>
                                            <label class="radio">
                                                <input type="radio" value="N"  name="resetType"  checked=" checked" onclick="show_div('N')">
                                                <i></i>No</label>
                                        </div>
                                    </section>

                                </div>
                                <?php } ?> 


                                <div  id="div1" <?php if($showbutton != 'add_user'){ ?> style=" display: none" <?php } ?>>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">User Name</label>
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="vUserName"  value="<?php echo $vUserName ?>" onkeyup="check_username(this.value);">
                                            </label>
                                        </section>
                                        <div id="check">
                                            
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Password</label>
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="pPassword" placeholder="Password" id="pPassword" >
                                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                                        </section>

                                        <section class="col col-6" id="sec1" <?php if($showbutton != 'add_user'){ ?> style=" display: none" <?php } ?>>
                                            <label class="label">Confirm Password</label>
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="pPasswordConfirm" placeholder="Confirm password" >
                                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                                        </section>


                                    </div>
                                </div>



                            </fieldset>

                            <footer>
                                <input type="hidden" name="cSaveStatus" value="<?php echo $saveStatus ?>">
                                <input type="hidden" name="id" value="<?php echo $this->uri->segment(5); ?>">
                                <input type="hidden" name="dRegDate" value="<?php echo date('Y-m-d H:i:s') ?>">
                                <input type="hidden" name="dLastUpDate" value="<?php echo date('Y-m-d H:i:s') ?>">
                                <input type="hidden" name="iCurrentUser" value="0">
                                <input type="hidden" name="editEmail" value="<?php echo $vEmail ?>">

                                <button id="button1id" name="button1id" type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-default" onclick="viewlist()">
                                    Back
                                </button>
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
    
    function check_username(username)
    {//alert(username);

        $.ajax({
                type: "POST",
                data:  {username: username},
                url: "<?php echo base_url() ?>adminpanel/master/user/check_username",   
                
                success: function(data){
                    $('#check').empty();                     
                    if(data==='AV'){
                        $('#check').append(
                            '<section class="col col-6" style="color: red;">'+
                                'Username is already taken'+
                            '</section>'
                        );
                    }else{
                        $('#check').append(
                            '<section class="col col-6" style="color: green;">'+
                                'Username is Available'+
                            '</section>'
                        );
                    }
                }
        });		
    }

    function viewlist() {
        // window.location="http://www.location.com/ie.htm";
        document.location = '<?php echo base_url("adminpanel/master/user/view_user/"); ?>';
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
