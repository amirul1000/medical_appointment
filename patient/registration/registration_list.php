<?php
 session_start();
 include("../../template/header.php");
 include("../../template/registration_menu.php");
?>
<a href="index.php?cmd=edit" class="btn green"><i class="fa fa-plus-circle"></i> Edit <?=ucwords(str_replace("_"," ","Profile"))?></a> <br><br>
 <div class="portlet box blue">
            <div class="portlet-body">
	         <div class="table-responsive">	
                <table class="table">
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">
					    <?php  
								$info["table"] = "registration";
								$info["fields"] = array("registration.*"); 
								$info["where"]   = "1   AND id='".$_SESSION['registration_id']."'";
								$arr =  $db->select($info);
						 ?>	
				          <table class="table">
                              <tr>
                                 <td colspan="2">
                                    <table border="1" width="100%" style="color: white; background-color: #003366;">
                                    <tbody><tr>
                                    <td align="center" width="100%">Patient Details
                                    </td>
                                    </tr>
                                    </tbody></table>
                                 </td>
                              </tr>
							  <tr><td>Hospital ID</td><td><?=$arr[0]['Hospital_ID']?></td></tr>
                              <tr><td>Patient Title</td><td><?=$arr[0]['Patient_Title']?></td></tr>
                              <tr><td>Patient Name</td><td><?=$arr[0]['Patient_Name']?></td></tr>
                              <tr><td>Patient Initial</td><td><?=$arr[0]['Patient_Initial']?></td></tr>
                              <tr><td>File Picture</td><td>
                                    <?php
								    if(is_file('../../'.$arr[0]['file_picture'])&&file_exists('../../'.$arr[0]['file_picture']))
									{
								 ?>
                                  <img src="../../<?=$arr[0]['file_picture']?>" style="width:100px;height:100px;">
                                  <?php
									}
								  ?>	  
                              </td></tr>
                              <tr><td>Date Of Birth</td><td><?=$arr[0]['Date_of_Birth']?></td></tr>
                              <tr><td>Nationality</td><td><?=$arr[0]['Nationality']?></td></tr>
                              <tr><td>Patients Occupation</td><td><?=$arr[0]['Patients_Occupation']?></td></tr>
                              <tr><td>Father Mother Husband Name</td><td><?=$arr[0]['Father_Mother_Husband_Name']?></td></tr>
                              <tr><td>Gender</td><td><?=$arr[0]['Gender']?></td></tr>
                              <tr><td>Marital Status</td><td><?=$arr[0]['Marital_Status']?></td></tr>
                              <tr><td>Religion</td><td><?=$arr[0]['Religion']?></td></tr>
                              <tr><td>Religion Others</td><td><?=$arr[0]['Religion_Others']?></td></tr>
                              <tr><td>Relationship</td><td><?=$arr[0]['Relationship']?></td></tr>
                               <tr>
                                 <td colspan="2">
                                    <table border="1" width="100%" style="color: white; background-color: #003366;">
                                    <tbody><tr>
                                    <td align="center" width="100%">Permanent Address 
                                    </td>
                                    </tr>
                                    </tbody></table>
                                 </td>
                              </tr>
                              <tr><td>PerA Door No Street</td><td><?=$arr[0]['PerA_Door_No_Street']?></td></tr>
                              <tr><td>PerA Area</td><td><?=$arr[0]['PerA_Area']?></td></tr>
                              <tr><td>PerA Country</td><td>
                                                    <?php
                                                        unset($info2);        
                                                        $info2['table']    = country;	
                                                        $info2['fields']   = array("country");	   	   
                                                        $info2['where']    =  "1 AND id='".$arr[0]['PerA_country_id']."' LIMIT 0,1";
                                                        $res2  =  $db->select($info2);
                                                        echo $res2[0]['country'];	
                                                    ?>
                                               </td></tr>
                              <tr><td>PerA State</td><td><?=$arr[0]['PerA_State']?></td></tr>
                              <tr><td>PerA District</td><td><?=$arr[0]['PerA_District']?></td></tr>
                              <tr><td>PerA Thana</td><td><?=$arr[0]['PerA_Thana']?></td></tr>
                              <tr><td>PerA Post Code</td><td><?=$arr[0]['PerA_Post_Code']?></td></tr>
                              <tr>
                                 <td colspan="2">
                                    <table border="1" width="100%" style="color: white; background-color: #003366;">
                                    <tbody><tr>
                                    <td align="center" width="100%">Present Address 
                                    </td>
                                    </tr>
                                    </tbody></table>
                                 </td>
                              </tr>
                              <tr><td>PreA Door No Street</td><td><?=$arr[0]['PreA_Door_No_Street']?></td></tr>
                              <tr><td>PreA Area</td><td><?=$arr[0]['PreA_Area']?></td></tr>
                              <tr><td>PreA Country</td><td>
                                                    <?php
                                                        unset($info2);        
                                                        $info2['table']    = country;	
                                                        $info2['fields']   = array("country");	   	   
                                                        $info2['where']    =  "1 AND id='".$arr[0]['PreA_country_id']."' LIMIT 0,1";
                                                        $res2  =  $db->select($info2);
                                                        echo $res2[0]['country'];	
                                                    ?>
                                               </td></tr>
                              <tr><td>PreA State</td><td><?=$arr[0]['PreA_State']?></td></tr>
                              <tr><td>PreA District</td><td><?=$arr[0]['PreA_District']?></td></tr>
                              <tr><td>PreA Thana</td><td><?=$arr[0]['PreA_Thana']?></td></tr>
                              <tr><td>PreA Post Code</td><td><?=$arr[0]['PreA_Post_Code']?></td></tr>
                               <tr>
                                 <td colspan="2">
                                    <table border="1" width="100%" style="color: white; background-color: #003366;">
                                    <tbody><tr>
                                    <td align="center" width="100%">Contact Details
                                    </td>
                                    </tr>
                                    </tbody></table>
                                 </td>
                              </tr>
                              <tr><td>Mobile No</td><td><?=$arr[0]['Mobile_No']?></td></tr>
                              <tr><td>Email ID</td><td><?=$arr[0]['Email_ID']?></td></tr>
                              <tr><td>Password</td><td><?=$arr[0]['password']?></td></tr>
                              <tr><td>LandLine No</td><td><?=$arr[0]['LandLine_No']?></td></tr>
                              <tr><td>Status</td><td><?=$arr[0]['status']?></td></tr>
			  
						</table>
						</div>
					 </div>				
				</td>
				</tr>
				</table>
				</div>
			</div>
		</div>
<?php
include("../../template/footer.php");
?>









