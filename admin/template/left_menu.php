<style>
	  .btn + .btn {
	   margin-left: 0px; 
	}
	
	.btn-block+.btn-block {
	     margin-top: 1px; 
	}
</style>
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<?php
			  $b_name_file = $_SERVER['SCRIPT_NAME'];
			  $b_name_arr  = explode("/",$b_name_file);
			  $b_name      = $b_name_arr[count($b_name_arr)-1-1];
			?>
               <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
                <li class="start">
					<a href="../home">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					</a>
				</li>
				<li class="start active open">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">Menu</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>					
				</li>
                <li <?php if($b_name=="profile") { ?> class="active open" <?php } ?>><a href="../profile/index.php?cmd=list"><i class="icon-rocket"></i>Profile</a></li>
                <?php
				  if($_SESSION["user_type"]=='super')
				  {
				?>
                <li <?php if(  $b_name=="company" || 
				               $b_name=="users" || 
				               $b_name=="department" ||
							   $b_name=="slot" ||
							   $b_name=="doctor_type" 
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">Settings</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                        <li <?php if($b_name=="company") { ?> class="active open" <?php } ?>><a href="../company/index.php?cmd=list"><i class="icon-rocket"></i>Company</a></li>
                        <li <?php if($b_name=="department") { ?> class="active open" <?php } ?>><a href="../department/index.php?cmd=list"><i class="icon-rocket"></i>Department</a></li>
                        <li <?php if($b_name=="slot") { ?> class="active open" <?php } ?>><a href="../slot/index.php?cmd=list"><i class="icon-rocket"></i>Slot</a></li>
                        <li <?php if($b_name=="doctor_type") { ?> class="active open" <?php } ?>><a href="../doctor_type/index.php?cmd=list"><i class="icon-rocket"></i>doctors type</a></li>
                        <li <?php if($b_name=="users") { ?> class="active open" <?php } ?>><a href="../users/index.php?cmd=list"><i class="icon-rocket"></i>Doctors</a></li>
                    </ul>
                </li>
			   <?php
				  }
				?>  
                <li <?php if($b_name=="registration") { ?> class="active open" <?php } ?>><a href="../registration/index.php?cmd=list"><i class="icon-rocket"></i>Registration</a></li>
                <li <?php if($b_name=="book_a_slot") { ?> class="active open" <?php } ?>><a href="../book_a_slot/index.php?cmd=list"><i class="icon-rocket"></i>Booked slot</a></li>
                <li <?php if($b_name=="report") { ?> class="active open" <?php } ?>><a href="../report/index.php?cmd=list"><i class="icon-rocket"></i>Report</a></li>
            </ul>
			<!-- END SIDEBAR MENU -->
           
		</div>
	</div>
