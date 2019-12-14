<?php
 $assets_url = '../../v4.0.1/theme'; 
?>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?=$assets_url?>/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?=$assets_url?>/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="<?=$assets_url?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />

<div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","book_a_slot"))?> details</b>
                </div>
            </div>

            <div class="portlet-body">
      <div class="table-responsive">	
          <table class="table" width="100%">
         <?php
                $info["table"] = "book_a_slot";
				$info["fields"] = array("book_a_slot.*"); 
				$info["where"]   = "1  AND id='".$_REQUEST['id']."'";
                $arr =  $db->select($info);
                
                for($i=0;$i<count($arr);$i++)
                {
         ?>
                 <tr><td>Registration</td>
			  <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "registration";	
										$info2['fields']   = array("*");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['registration_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['Patient_Title'].' '.$res2[0]['Patient_Name'].' '.$res2[0]['Patient_Initial'];	
					                ?>
							   </td></tr>
			  <tr><td>Department</td>
			  <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "department";	
										$info2['fields']   = array("dept_name");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['department_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['dept_name'];	
					                ?>
							   </td></tr>
			  <tr><td>Doctor Users</td>
			  <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = users;	
										$info2['fields']   = array("email");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['doctor_users_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['first_name'].' '.$res2[0]['last_name'].' '.$res2[0]['email'];	
					                ?>
							   </td></tr>
			  <tr><td>Patient ID</td>
			  <td><?=$arr[$i]['Patient_ID']?></td></tr>
			  <tr><td>Request Date</td>
			  <td><?=$arr[$i]['request_date']?></td></tr>
			  <tr><td>Request Time</td>
			  <td><?=$arr[$i]['request_time']?></td></tr>
			  <tr><td>Subject</td>
			  <td><?=$arr[$i]['subject']?></td></tr>
			  <!--<tr><td>Doctor Fee</td>
			  <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = doctor_type;	
										$info2['fields']   = array("fee_type");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['doctor_type_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['fee_type'];	
					                ?>
							   </td></tr>-->
			  <tr><td>Fee Type</td>
			  <td><?=$arr[$i]['fee_type']?></td></tr>
			  <tr><td>Fee Amount</td>
			  <td><?=$arr[$i]['fee_amount']?></td></tr>
			  <tr><td>Description</td>
			  <td><?=$arr[$i]['description']?></td></tr>
			  <tr><td>Doctor Comments</td>
			  <td><?=$arr[$i]['doctor_comments']?></td></tr>
			  <tr><td>Created At</td>
			  <td><?=$arr[$i]['created_at']?></td></tr>
			  <tr><td>Updated At</td>
			  <td><?=$arr[$i]['updated_at']?></td></tr>
			  <tr><td>Status</td>
			  <td><?=$arr[$i]['status']?></td></tr>
			  
        <?php
               }
        ?>
        </table>
        </div>
     </div>				
</div>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=$assets_url?>/assets/global/plugins/respond.min.js"></script>
<script src="<?=$assets_url?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=$assets_url?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=$assets_url?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=$assets_url?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>

<script src="<?=$assets_url?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>