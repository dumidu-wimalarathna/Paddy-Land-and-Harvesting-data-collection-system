<!-- PAGE FOOTER -->
<div class="page-footer">
        <div class="row">
                <div class="col-xs-12 col-sm-6" >
                    <span class="txt-color-white">COPYRIGHT ©2021 PADDY LAND AND HARVESTING DATA COLLECTION SYSTEM</span>
                </div>

                <?php 
                    $last_act= get_last_activity();
                    $d=strtotime($last_act);
                    $x=date("Y-m-d h:i:s",$d); 
                    $y=date("Y-m-d H:i:s");
                    $z= strtotime($y);
                    $diff= round(abs($z-$d) / 60); 
                ?>
                <div class="col-xs-12 col-sm-6 text-right hidden-xs">
                        <div class="txt-color-white inline-block">
                                <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong><?php if($diff > 60){$h=round($diff/60);$m=round($diff%60);echo $h.' hrs and '.$m.' mins ago';}else{echo $diff.' mins ago';} ?>  &nbsp;</strong> </i>
                                
                        </div>
                </div>
        </div>
</div>
<!-- END PAGE FOOTER -->


<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->


		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url("assets/js/app.config.js"); ?>"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo base_url("assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"); ?>"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url("assets/js/bootstrap/bootstrap.min.js"); ?>"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo base_url("assets/js/notification/SmartNotification.min.js"); ?>"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo base_url("assets/js/smartwidgets/jarvis.widget.min.js"); ?>"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo base_url("assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"); ?>"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo base_url("assets/js/plugin/sparkline/jquery.sparkline.min.js"); ?>"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url("assets/js/plugin/jquery-validate/jquery.validate.min.js"); ?>"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url("assets/js/plugin/masked-input/jquery.maskedinput.min.js"); ?>"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo base_url("assets/js/plugin/select2/select2.min.js"); ?>"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo base_url("assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"); ?>"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url("assets/js/plugin/msie-fix/jquery.mb.browser.min.js"); ?>"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo base_url("assets/js/plugin/fastclick/fastclick.min.js"); ?>"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url("assets/js/app.min.js"); ?>"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?php echo base_url("assets/js/speech/voicecommand.min.js"); ?>"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo base_url("assets/js/smart-chat-ui/smart.chat.ui.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/smart-chat-ui/smart.chat.manager.min.js"); ?>"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
                <script src="<?php echo base_url("assets/js/plugin/jquery-form/jquery-form.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/plugin/flot/jquery.flot.cust.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/plugin/flot/jquery.flot.resize.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/plugin/flot/jquery.flot.time.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/plugin/flot/jquery.flot.tooltip.min.js"); ?>"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="<?php echo base_url("assets/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"); ?>"></script>
		
		<!-- Full Calendar -->
		<script src="<?php echo base_url("assets/js/plugin/moment/moment.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/plugin/fullcalendar/fullcalendar.min.js"); ?>"></script>
                
                <script src="<?php echo base_url("assets/js/plugin/morris/raphael.min.js"); ?>"></script>
                <script src="<?php echo base_url("assets/js/plugin/morris/morris.min.js"); ?>"></script>
<!--                <script type="text/javascript">
			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			pageSetUp();
		</script>-->
                <script src="<?php echo base_url("assets/js/plugin/highChartCore/highcharts-custom.min.js"); ?>"></script>
                <script src="<?php echo base_url("assets/js/plugin/highchartTable/jquery.highchartTable.min.js"); ?>"></script>
                <script type="text/javascript">

                $(document).ready(function() {
                    pageSetUp();
                    $('table.highchart').highchartTable();
                    
                    $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
			$('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Expand this branch').on('click', function(e) {
                            var children = $(this).parent('li.parent_li').find(' > ul > li');
                            if (children.is(':visible')) {
                                    children.hide('fast');
                                    $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
                            } else {
                                    children.show('fast');
                                    $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
                            }
                            e.stopPropagation();
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