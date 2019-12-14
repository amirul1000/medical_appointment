<?php
 session_start();
 include("../../template/header.php");
 include("../../template/registration_menu.php");
?>
<script language="javascript" src="registration.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<?php
  if(!empty($_SESSION['registration_id']))
  {
?>
<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> Profile</a> <br><br>
<?php
  }
 ?> 
 
  
    
    <form method="post"  enctype="multipart/form-data">
    <div class="row">
    <div class="col-lg-12">
    <table border="1" width="100%" style="color: white; background-color: #003366;">
    <tbody><tr>
    <td align="center" width="100%">Patient Details
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Patient Title / Name / Initial
    <span id="Main_rfvName" style="color:Red;">*</span>
    </td>
    <td width="70%">
     
    <div style="display: inline-block; width: 100%;">
   
    <?php
	$enumregistration = getEnumFieldValues('registration','Patient_Title');
?>
<select  name="Patient_Title" id="Patient_Title"    style="height:23px;width:20%;">
<?php
   foreach($enumregistration as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$Patient_Title){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select>
     <input type="text" name="Patient_Name" id="Patient_Name"  value="<?=$Patient_Name?>"  placeholder="PATIENT NAME" style="width:64%;text-transform: uppercase" required>

    <input type="text" name="Patient_Initial"  maxlength="6" id="Patient_Initial"  value="<?=$Patient_Initial?>"  placeholder="INITIAL" style="width:12%;text-transform: uppercase" required> 

    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Gender
    <span id="Main_rfvGender" style="color:Red;">*</span>
    </td>
    <td width="70%">
    <table id="Main_rbtnlGender">
    <tbody><tr>
        <td><input id="Gender_0" type="radio" name="Gender" value="Male" <?php if($Gender=='Male'){ echo "checked";} ?>><label for="Gender_0">Male</label></td>
        <td><input id="Gender_1" type="radio" name="Gender" value="Female" <?php if($Gender=='Female'){ echo "checked";} ?>><label for="Gender_1">Female</label></td>
        <td><input id="Gender_2" type="radio" name="Gender" value="Ambiguous" <?php if($Gender=='Ambiguous'){ echo "checked";} ?>><label for="Gender_2">Ambiguous</label></td>
    </tr>
    </tbody></table>
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>

    <div class="row">
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Date of Birth
    <span id="Main_rfvDOB" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">
    <div style="display: inline-block;">
    <div id="Main_upnlDOB">

            <input type="text" name="Date_of_Birth" id="Date_of_Birth"  value="<?=$Date_of_Birth?>" class="datepicker form-control-static"  style="width:160px;" required>
	    			    
            <span id="Main_lblAge">Age: </span>
            <span id="Main_txtAge"></span>
        
    </div>
    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Marital Status
    <span id="Main_rfvMarital" style="color:Red;">*</span>
    </td>
    <td width="70%">
    <div style="display: inline-block; width: 100%;">
    
    <?php
	$enumregistration = getEnumFieldValues('registration','Marital_Status');
	?>
	<select  name="Marital_Status" id="Marital_Status"  style="height:23px;width:100%;">
	<?php
	   foreach($enumregistration as $key=>$value)
	   { 
	?>
	  <option value="<?=$value?>" <?php if($value==$Marital_Status){ echo "selected"; }?>><?=$value?></option>
	 <?php
	  }
	?> 
	</select>
    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Nationality
    <span id="Main_rfvNation" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">
    <div style="display: inline-block; width: 100%;">
     <?php
		$info['table']    = "country";
		$info['fields']   = array("*");   	   
		$info['where']    =  "1=1 ORDER BY country ASC";
		$rescountry  =  $db->select($info);
	?>
	<select name="Nationality" id="Nationality" style="height:23px;width:100%;" required>
		<option value="">--Select--</option>
		<?php
		   foreach($rescountry as $key=>$each)
		   { 
		?>
		  <option value="<?=$rescountry[$key]['country']?>" <?php if($rescountry[$key]['country']==$Nationality){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
		<?php
		 }
		?> 
	</select>
    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Religion
    <span id="Main_rfvReligion" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">
    <div style="display: inline-block; width: 100%;">
    
    <?php
	$enumregistration = getEnumFieldValues('registration','Religion');
	?>
	<select  name="Religion" id="Religion"    style="height:23px;width:100%;">
	<?php
	   foreach($enumregistration as $key=>$value)
	   { 
	?>
	  <option value="<?=$value?>" <?php if($value==$Religion){ echo "selected"; }?>><?=$value?></option>
	 <?php
	  }
	?> 
	</select>
    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Patient's Occupation
    </td>
    <td width="70%">
    <div style="display: inline-block; width: 100%;">
    <?php
	$enumregistration = getEnumFieldValues('registration','Patients_Occupation');
	?>
	<select  name="Patients_Occupation" id="Patients_Occupation"    style="height:23px;width:100%;">
	<?php
	   foreach($enumregistration as $key=>$value)
	   { 
	?>
	  <option value="<?=$value?>" <?php if($value==$Patients_Occupation){ echo "selected"; }?>><?=$value?></option>
	 <?php
	  }
	?> 
	</select>
   
    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Others
    </td>
    <td width="70%">
    <div id="Main_upnlOccuOthers">

        <input name="ctl00$Main$txtOccuOthers" type="text" maxlength="30" id="Main_txtOccuOthers" disabled="disabled" class="aspNetDisabled" style="width:100%;text-transform: uppercase">
        

    </div>
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Father / Mother / Husband Name
    <span id="Main_rfvFather" style="color:Red;">*</span>
    </td>
    <td width="70%">
    <input type="text" name="Father_Mother_Husband_Name" id="Father_Mother_Husband_Name"  value="<?=$Father_Mother_Husband_Name?>" style="width:100%;text-transform: uppercase" required> 
    </td>
    </tr>
    </tbody></table>
    </div>
     
    <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Relationship
    <span id="Main_rfvRelation" style="color:Red;">*</span>
    </td>
    <td width="70%">
    <?php
		$enumregistration = getEnumFieldValues('registration','Relationship');
	?>
	<select  name="Relationship" id="Relationship" style="height:26px;width:100%;">
	<?php
	   foreach($enumregistration as $key=>$value)
	   { 
	?>
	  <option value="<?=$value?>" <?php if($value==$Relationship){ echo "selected"; }?>><?=$value?></option>
	 <?php
	  }
	?> 
	</select>
    </td>
    </tr>
    </tbody></table>
     </div>
     <div class="col-lg-6">
    <table border="0" width="100%">
    <tbody><tr>
    <td width="30%">Picture
    <span id="Main_rfvRelation" style="color:Red;">*</span>
    </td>
    <td width="70%">
        <span id="preview"></span>
        <input type="file" name="file_picture" id="file_picture"  value="<?=$file_picture?>" class="form-control-static" onchange="displayPreview(event,this.files);" <?php if(empty($Id)){ echo "required";}?>>
        <script language="javascript">
		  function displayPreview(e,files) {
				var file = files[0];//get file
				var sizeKB = file.size / 1024;
				  //$('#preview').append('<img src="'+e.target.result +'"/>');  
				   //alert("Size: " + sizeKB );
				   if(sizeKB>500)
				   {   alert("Image size could not be more than 500KB");
					   $("#file_picture").val("");
				   }
					
				}
		</script>
    </td>
    </tr>
    
    </tbody></table>
    </div>
   
    <div class="row">
    <div class="col-lg-12" align="center">
    <span style="color:#003300;font-weight:normal;"><input id="Main_chkAddrDiff" type="checkbox" name="ctl00$Main$chkAddrDiff" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$Main$chkAddrDiff\&#39;,\&#39;\&#39;)&#39;, 0)"><label for="Main_chkAddrDiff">&nbsp;Click here! If Permanent &amp; Present Address is different</label></span>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div id="Main_pnlPermanentAddress" style="border-color:#003366;border-style:Ridge;">

    <table border="0" width="100%">
    <tbody><tr>
    <td width="100%" colspan="2" style="color: white; background-color: #003366;" height="22" valign="middle" align="center">Permanent Address
    </td>
    </tr>
    <tr>
    <td width="30%">Door No / Street
    <span id="Main_rfvDoor" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">
    	<input type="text" name="PerA_Door_No_Street" id="PerA_Door_No_Street"  value="<?=$PerA_Door_No_Street?>" style="width:100%;text-transform: uppercase">

    </td>
    </tr>
    <tr>
    <td width="30%">Area
    <span id="Main_rfvStreet" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">
    <input type="text" name="PerA_Area" id="PerA_Area"  value="<?=$PerA_Area?>" style="width:100%;text-transform: uppercase">
    </td>
    </tr>
    <tr>
    <td width="30%">Country  
    <span id="Main_rfvCountry" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">    
    <?php
	$info['table']    = "country";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY country ASC";
	$rescountry  =  $db->select($info);
?>
<select  name="PerA_country_id" id="PerA_country_id"   style="height:23px;width:100%;">
	<option value="">--Select--</option>
	<?php
	   foreach($rescountry as $key=>$each)
	   { 
	?>
	  <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$PerA_country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
	<?php
	 }
	?> 
</select>
    </td>
    </tr>
    <tr>
    <td width="30%">State / Province   
    </td>
    <td width="70%">
    <div id="Main_upnlState">
      <input type="text" name="PerA_State" id="PerA_State"  value="<?=$PerA_State?>"  style="height:23px;width:100%;">
    </div>
    </td>
    </tr>
    <tr>
    <td width="30%">District        
    </td>
    <td width="70%">
    <div id="Main_upnlDistrict">
    
      <input type="text" name="PerA_District" id="PerA_District"  value="<?=$PerA_District?>" style="height:23px;width:100%;">
        
    </div>
    </td>
    </tr>
    <tr>
    <td width="30%">Thana    
    </td>
    <td width="70%">
    <div id="Main_upnlTaluk">

         <input type="text" name="PerA_Thana" id="PerA_Thana"  value="<?=$PerA_Thana?>" style="height:23px;width:100%;">
        
    </div>
    </td>
    </tr>
    <tr>
    <td width="30%">Post Code     
    </td>
    <td width="70%">
    <input type="text" name="PerA_Post_Code" id="PerA_Post_Code"  value="<?=$PerA_Post_Code?>" style="width:100%;text-transform: uppercase">

    </td>
    </tr>
    </tbody></table>

    </div>
    </div>
    <div class="col-lg-6">
    <div id="Main_upnlPresentAddress">
    <div id="Main_pnlPresentAddress" style="border-color:#003366;border-style:Ridge;">

    <table border="0" width="100%">
        <tbody><tr>
            <td width="100%" colspan="2" style="color: white; background-color: #003366;" height="22" valign="middle" align="center">Present Address
            </td>
        </tr>
        <tr>
            <td width="30%">Door No / Street
            </td>
            <td width="70%">
                <input type="text" name="PreA_Door_No_Street" id="PreA_Door_No_Street"  value="<?=$PreA_Door_No_Street?>" style="width:100%;text-transform: uppercase">
						 
            </td>
        </tr>
        <tr>
            <td width="30%">Area
            </td>
            <td width="70%">
                <input type="text" name="PreA_Area" id="PreA_Area"  value="<?=$PreA_Area?>" style="width:100%;text-transform: uppercase">
						 
            </td>
        </tr>
        <tr>
            <td width="30%">Country
            </td>
            <td width="70%"> 
					<?php
                    $info['table']    = "country";
                    $info['fields']   = array("*");   	   
                    $info['where']    =  "1=1 ORDER BY country ASC";
                    $rescountry  =  $db->select($info);
                ?>
                <select  name="PreA_country_id" id="PreA_country_id" style="height:23px;width:100%;">
                    <option value="">--Select--</option>
                    <?php
                       foreach($rescountry as $key=>$each)
                       { 
                    ?>
                      <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$PreA_country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                    <?php
                     }
                    ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td width="30%">State / Province
            </td>
            <td width="70%">
                <div id="Main_upnlPreState">                        
                     <input type="text" name="PreA_State" id="PreA_State"  value="<?=$PreA_State?>" style="width:100%;text-transform: uppercase">
						 
                    </div>
            </td>
        </tr>
        <tr>
            <td width="30%">District
            </td>
            <td width="70%">
                <div id="Main_upnlPreDist">                        
                    <input type="text" name="PreA_District" id="PreA_District"  value="<?=$PreA_District?>" style="width:100%;text-transform: uppercase">
						 
                    </div>
            </td>
        </tr>
        <tr>
            <td width="30%">Thana
            </td>
            <td width="70%">
                <div id="Main_upnlPreTaluk">                        
                        <input type="text" name="PreA_Thana" id="PreA_Thana"  value="<?=$PreA_Thana?>" style="width:100%;text-transform: uppercase">
						 
                    </div>
            </td>
        </tr>
        <tr>
            <td width="30%">Post Code
            </td>
            <td width="70%">                
                 <input type="text" name="PreA_Post_Code" id="PreA_Post_Code"  value="<?=$PreA_Post_Code?>"style="width:100%;text-transform: uppercase">
						  
            </td>
        </tr>
    </tbody></table>

    </div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
    <table border="1" width="100%" style="color: white; background-color: #003366;">
    <tbody><tr>
    <td align="center" width="100%">
    <u>Contact Details</u> 
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <table border="1" width="100%">
    <tbody><tr>
    <td width="30%">Mobile No
    <span id="Main_revMobile" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">+88	<input type="text" name="Mobile_No" id="Mobile_No"  value="<?=$Mobile_No?>" style="width:60%;" required>

    e.g:+8801719XXXX9
    </td>
    </tr>
    </tbody></table>
    </div>
    <div class="col-lg-6">
    <table border="1" width="100%">
    <tbody><tr>
    <td width="30%">LandLine No
    </td>
    <td width="70%">
    <input type="text" name="LandLine_No" id="LandLine_No"  value="<?=$LandLine_No?>" style="width:60%;">
    e.g:008816228XXXX
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <table border="1" width="100%">
    <tbody><tr>
    <td width="30%">Email ID
    <span id="Main_rfvEmail" style="color:Red;font-weight:bold;">*</span>
    </td>
    <td width="70%">
    <input type="text" name="Email_ID" id="Email_ID"  value="<?=$Email_ID?>"  style="width:100%;" required>
    </td>
    </tr>
    </tbody></table>
    </div>
    <div class="col-lg-6">
    <table border="1" width="100%">
    <tbody><tr>
    <td height="28" width="100%" style="color: Red">All mails related to Online Transactions for CMC will be  sent to this email id
    </td>
    </tr>
    </tbody></table>
    </div>
    </div>
    <div id="Main_upnlIRO">





    </div>

    <div class="row">
    <div class="col-lg-12" align="center">
    <span id="Main_lblMessage" style="color:Red;font-size:Small;font-weight:bold;"></span>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12" align="center">
    <div id="Main_vSum" style="color:Red;font-style:italic;">

    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12" align="center">
    <input type="hidden" name="cmd" value="add">
	<input type="hidden" name="id" value="<?=$Id?>">	
    <input type="submit" value="Submit"  id="Main_btnSubmit" class="button">
   
    <!--<input type="submit" name="ctl00$Main$btnReset" value="Clear" id="Main_btnReset" class="button">-->
    </div>
    </div>
    </div>
  
   </form>
  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		yearRange: "-90:+0",
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../../template/footer.php");
?>

