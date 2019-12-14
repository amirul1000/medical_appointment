<?php
 include("../template/header.php");
?>
<script language="javascript" src="registration.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","registration"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_registration" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Hospital ID</td>
						 <td>
						    <input type="text" name="Hospital_ID" id="Hospital_ID"  value="<?=$Hospital_ID?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Patient Title</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','Patient_Title');
?>
<select  name="Patient_Title" id="Patient_Title"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Patient_Title){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr><tr>
						 <td>Patient Name</td>
						 <td>
						    <input type="text" name="Patient_Name" id="Patient_Name"  value="<?=$Patient_Name?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Patient Initial</td>
						 <td>
						    <input type="text" name="Patient_Initial" id="Patient_Initial"  value="<?=$Patient_Initial?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>File Picture</td>
						 <td><input type="file" name="file_picture" id="file_picture"  value="<?=$file_picture?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Date Of Birth</td>
						 <td>
						    <input type="text" name="Date_of_Birth" id="Date_of_Birth"  value="<?=$Date_of_Birth?>" class="datepicker form-control-static">
						 </td>
				     </tr><tr>
						 <td>Nationality</td>
						 <td>
						    <input type="text" name="Nationality" id="Nationality"  value="<?=$Nationality?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Patients Occupation</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','Patients_Occupation');
?>
<select  name="Patients_Occupation" id="Patients_Occupation"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Patients_Occupation){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr><tr>
						 <td>Father Mother Husband Name</td>
						 <td>
						    <input type="text" name="Father_Mother_Husband_Name" id="Father_Mother_Husband_Name"  value="<?=$Father_Mother_Husband_Name?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Gender</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','Gender');
?>
<select  name="Gender" id="Gender"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Gender){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr><tr>
		           		 <td>Marital Status</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','Marital_Status');
?>
<select  name="Marital_Status" id="Marital_Status"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Marital_Status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr><tr>
		           		 <td>Religion</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','Religion');
?>
<select  name="Religion" id="Religion"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Religion){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr><tr>
						 <td>Religion Others</td>
						 <td>
						    <input type="text" name="Religion_Others" id="Religion_Others"  value="<?=$Religion_Others?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Relationship</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','Relationship');
?>
<select  name="Relationship" id="Relationship"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Relationship){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr><tr>
						 <td>PerA Door No Street</td>
						 <td>
						    <input type="text" name="PerA_Door_No_Street" id="PerA_Door_No_Street"  value="<?=$PerA_Door_No_Street?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PerA Area</td>
						 <td>
						    <input type="text" name="PerA_Area" id="PerA_Area"  value="<?=$PerA_Area?>" class="form-control-static">
						 </td>
				     </tr><tr>
							 <td>PerA Country</td>
							 <td><?php
	$info['table']    = "country";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$rescountry  =  $db->select($info);
?>
<select  name="PerA_country_id" id="PerA_country_id"   class="form-control-static">
	<option value="">--Select--</option>
	<?php
	   foreach($rescountry as $key=>$each)
	   { 
	?>
	  <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$PerA_country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>PerA State</td>
						 <td>
						    <input type="text" name="PerA_State" id="PerA_State"  value="<?=$PerA_State?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PerA District</td>
						 <td>
						    <input type="text" name="PerA_District" id="PerA_District"  value="<?=$PerA_District?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PerA Thana</td>
						 <td>
						    <input type="text" name="PerA_Thana" id="PerA_Thana"  value="<?=$PerA_Thana?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PerA Post Code</td>
						 <td>
						    <input type="text" name="PerA_Post_Code" id="PerA_Post_Code"  value="<?=$PerA_Post_Code?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PreA Door No Street</td>
						 <td>
						    <input type="text" name="PreA_Door_No_Street" id="PreA_Door_No_Street"  value="<?=$PreA_Door_No_Street?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PreA Area</td>
						 <td>
						    <input type="text" name="PreA_Area" id="PreA_Area"  value="<?=$PreA_Area?>" class="form-control-static">
						 </td>
				     </tr><tr>
							 <td>PreA Country</td>
							 <td><?php
	$info['table']    = "country";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$rescountry  =  $db->select($info);
?>
<select  name="PreA_country_id" id="PreA_country_id"   class="form-control-static">
	<option value="">--Select--</option>
	<?php
	   foreach($rescountry as $key=>$each)
	   { 
	?>
	  <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$PreA_country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>PreA State</td>
						 <td>
						    <input type="text" name="PreA_State" id="PreA_State"  value="<?=$PreA_State?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PreA District</td>
						 <td>
						    <input type="text" name="PreA_District" id="PreA_District"  value="<?=$PreA_District?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PreA Thana</td>
						 <td>
						    <input type="text" name="PreA_Thana" id="PreA_Thana"  value="<?=$PreA_Thana?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>PreA Post Code</td>
						 <td>
						    <input type="text" name="PreA_Post_Code" id="PreA_Post_Code"  value="<?=$PreA_Post_Code?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Mobile No</td>
						 <td>
						    <input type="text" name="Mobile_No" id="Mobile_No"  value="<?=$Mobile_No?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Email ID</td>
						 <td>
						    <input type="text" name="Email_ID" id="Email_ID"  value="<?=$Email_ID?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>LandLine No</td>
						 <td>
						    <input type="text" name="LandLine_No" id="LandLine_No"  value="<?=$LandLine_No?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumregistration = getEnumFieldValues('registration','status');
?>
<select  name="status" id="status"   class="form-control-static">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr>
										 <tr> 
											 <td align="right"></td>
											 <td>
												<input type="hidden" name="cmd" value="add">
												<input type="hidden" name="id" value="<?=$Id?>">			
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
											 </td>     
										 </tr>
										</table>
										</div>
										</div>
								</form>
							  </td>
							 </tr>
							</table>
			      </div>
			</div>
  </div>
  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../template/footer.php");
?>

