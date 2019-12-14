<div class="row">
<div class="col-lg-12" align="center">
<h3>REGISTRATION FORM</h3>
</div>
</div>
<div class="row">
<div class="col-lg-12 hidden-xs hidden-sm" align="center">
<?php
     unset($info);
	 unset($data);
	$info["table"] = "registration";
	$info["fields"] = array("registration.*"); 
	$info["where"]   = "1   AND id='".$_SESSION['registration_id']."'";
	//$info["debug"]   = true;
	$arr =  $db->select($info);
	if(count($arr)>0)
	{
?>
<a href="<?=$site_url?>/patient/registration" class="rightArrowactive">Registration</a>
<?php
	}
	else
	{
?>
<a href="<?=$site_url?>/patient/registration" class="rightArrow not-active">Registration</a>
<?php		
	}
?>

<?php
      unset($info);
	  unset($data);
	$info["table"] = "book_a_slot";
	$info["fields"] = array("book_a_slot.*"); 
	$info["where"]   = "1   AND registration_id='".$_SESSION['registration_id']."'";
	//$info["debug"]   = true;
	$arr =  $db->select($info);
	if(count($arr)>0)
	{
?>
<a href="<?=$site_url?>/patient/book_a_slot" class="rightArrowactive">Book a Slot</a>
<?php
	}
	else
	{
?>
<a href="<?=$site_url?>/patient/book_a_slot" class="rightArrow not-active">Book a Slot</a>

<?php
	}
?>	


<?php
     
	if(isset($_SESSION['Patient_ID']))
	{
?>
<a href="<?=$site_url?>/patient/appointment" class="rightArrowactive">Appointment Print</a>
<?php
	}
	else
	{
?>
<a href="<?=$site_url?>/patient/appointment" class="rightArrow not-active">Appointment Print</a>
<?php
	}
?>	


<!--<a href="#" class="rightArrow not-active">Payment Confirmation</a>-->
</div>
</div>