<?php
	 include("../../template/header.php");
	 include("../../template/registration_menu.php");
?>
<a href="index.php?cmd=send_email" class="btn green"><i class="fa fa-plus-circle"></i> Send to my email</a>
<a href="index.php?cmd=print" class="btn green"><i class="fa fa-plus-circle"></i> Print with pdf</a> 
<br><br>
<?php 
     if(isset($msg))
	 {
		 echo "<div align=\"center\">".$msg."</div>";
	 }
?>
<div class="portlet box blue">
        <div class="portlet-body">
            <div class="table-responsive">
                <?php
					include("print_template.php");
				?>
            </div>
        </div>
</div>
<?php
 	include("../../template/footer.php");
?>









