<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	 /*  debug($_SESSION);
	   debug($_REQUEST);
	    debug($_FILES);*/
	   
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "registration";
				if(empty($_REQUEST['id']))
				{
					$data['Hospital_ID']   = getHospitalID($db);
					$_SESSION['Hospital_ID'] = $data['Hospital_ID'];
				}
				$data['Patient_Title']   = $_REQUEST['Patient_Title'];
                $data['Patient_Name']   = $_REQUEST['Patient_Name'];
                $data['Patient_Initial']   = $_REQUEST['Patient_Initial'];
                     
				if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0 && check_file_extension($_FILES))
				{
					
					if(!file_exists("../../registration_images"))
					{ 
					   mkdir("../../registration_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					$filePath="../../registration_images/".$file;
					move_uploaded_file($_FILES['file_picture']['tmp_name'],$filePath);
					$data['file_picture']="registration_images/".trim($file);
				}
                $data['Date_of_Birth']   = $_REQUEST['Date_of_Birth'];
                $data['Nationality']   = $_REQUEST['Nationality'];
                $data['Patients_Occupation']   = $_REQUEST['Patients_Occupation'];
                $data['Father_Mother_Husband_Name']   = $_REQUEST['Father_Mother_Husband_Name'];
                $data['Gender']   = $_REQUEST['Gender'];
                $data['Marital_Status']   = $_REQUEST['Marital_Status'];
                $data['Religion']   = $_REQUEST['Religion'];
                $data['Religion_Others']   = $_REQUEST['Religion_Others'];
                $data['Relationship']   = $_REQUEST['Relationship'];
                $data['PerA_Door_No_Street']   = $_REQUEST['PerA_Door_No_Street'];
                $data['PerA_Area']   = $_REQUEST['PerA_Area'];
                $data['PerA_country_id']   = $_REQUEST['PerA_country_id'];
                $data['PerA_State']   = $_REQUEST['PerA_State'];
                $data['PerA_District']   = $_REQUEST['PerA_District'];
                $data['PerA_Thana']   = $_REQUEST['PerA_Thana'];
                $data['PerA_Post_Code']   = $_REQUEST['PerA_Post_Code'];
                $data['PreA_Door_No_Street']   = $_REQUEST['PreA_Door_No_Street'];
                $data['PreA_Area']   = $_REQUEST['PreA_Area'];
                $data['PreA_country_id']   = $_REQUEST['PreA_country_id'];
                $data['PreA_State']   = $_REQUEST['PreA_State'];
                $data['PreA_District']   = $_REQUEST['PreA_District'];
                $data['PreA_Thana']   = $_REQUEST['PreA_Thana'];
                $data['PreA_Post_Code']   = $_REQUEST['PreA_Post_Code'];
                $data['Mobile_No']   = $_REQUEST['Mobile_No'];
                $data['Email_ID']   = $_REQUEST['Email_ID'];
				$data['password']   = rand(100,99999999);
                $data['LandLine_No']   = $_REQUEST['LandLine_No'];
				$data['Age']   = floor(strtotime(date('Y-m-d H:i:s'))-strtotime($_REQUEST['Date_of_Birth']))/31536000+1;
				
				if(empty($_REQUEST['id']))
				{
					$data['created_at']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['updated_at']   = date("Y-m-d H:i:s");
				}
                $data['status']   = 'active';
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					$db->insert($info);
					$_SESSION['registration_id'] = $db->lastInsert($result);
					 
					////////////////////////email////////////////////////// 
					$subject = "Your login information";
					
					$msg = "Your Login information is like below:<br> 
							 Email:".$_REQUEST['Email_ID']."<br> 
							 password:".$data['password']."<br>
							 Hospital_ID:".$data['Hospital_ID']."<br>
							 Birth Year:".date("Y",strtotime($_REQUEST['Date_of_Birth']))."<br>";
					
					$body = "Dear ".$_REQUEST['Patient_Name'].",<br>
							   ".$msg."
							 Thanks,<br>
							 XYZ Team";
					//send email
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: Doctor <info@doc.com>' . "\r\n";
						
					mail($_SESSION["Email_ID"], $subject, $body, $headers);
					$_SESSION['reg_msg'] ="An email has been sent to your E-mail address with the following cedential.<br>".$msg."<br>
					                       After being approved by doctor you will get another patient id
										   to print your appointment.";	
					////\\\\\\\\\\\\\\\\\\\\\\\\\\\\email\\\\\\\\\\\\\\\\\\\\\\\\\\\\					   
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$_SESSION['registration_id'] = $Id;
					
					$db->update($info);
				}
				
				Header("Location:../book_a_slot");						   
				break;    
		case "edit": 
				$Id               = $_SESSION['registration_id'];
				if( !empty($Id ))
				{
					$info['table']    = "registration";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
					
					//$info['debug']    = true;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$Hospital_ID    = $res[0]['Hospital_ID'];
					$Patient_Title    = $res[0]['Patient_Title'];
					$Patient_Name    = $res[0]['Patient_Name'];
					$Patient_Initial    = $res[0]['Patient_Initial'];
					$file_picture    = $res[0]['file_picture'];
					$Date_of_Birth    = $res[0]['Date_of_Birth'];
					$Nationality    = $res[0]['Nationality'];
					$Patients_Occupation    = $res[0]['Patients_Occupation'];
					$Father_Mother_Husband_Name    = $res[0]['Father_Mother_Husband_Name'];
					$Gender    = $res[0]['Gender'];
					$Marital_Status    = $res[0]['Marital_Status'];
					$Religion    = $res[0]['Religion'];
					$Religion_Others    = $res[0]['Religion_Others'];
					$Relationship    = $res[0]['Relationship'];
					$PerA_Door_No_Street    = $res[0]['PerA_Door_No_Street'];
					$PerA_Area    = $res[0]['PerA_Area'];
					$PerA_country_id    = $res[0]['PerA_country_id'];
					$PerA_State    = $res[0]['PerA_State'];
					$PerA_District    = $res[0]['PerA_District'];
					$PerA_Thana    = $res[0]['PerA_Thana'];
					$PerA_Post_Code    = $res[0]['PerA_Post_Code'];
					$PreA_Door_No_Street    = $res[0]['PreA_Door_No_Street'];
					$PreA_Area    = $res[0]['PreA_Area'];
					$PreA_country_id    = $res[0]['PreA_country_id'];
					$PreA_State    = $res[0]['PreA_State'];
					$PreA_District    = $res[0]['PreA_District'];
					$PreA_Thana    = $res[0]['PreA_Thana'];
					$PreA_Post_Code    = $res[0]['PreA_Post_Code'];
					$Mobile_No    = $res[0]['Mobile_No'];
					$Email_ID    = $res[0]['Email_ID'];
					$LandLine_No    = $res[0]['LandLine_No'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("registration_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "registration";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("registration_list.php");						   
				break; 
						   
         case "list" : 
				include("registration_list.php");
				break; 
	     default :    
		       $Id               = $_SESSION['registration_id'];
				if( !empty($Id ))
				{
					$info['table']    = "registration";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
					
					//$info['debug']    = true;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$Hospital_ID    = $res[0]['Hospital_ID'];
					$Patient_Title    = $res[0]['Patient_Title'];
					$Patient_Name    = $res[0]['Patient_Name'];
					$Patient_Initial    = $res[0]['Patient_Initial'];
					$file_picture    = $res[0]['file_picture'];
					$Date_of_Birth    = $res[0]['Date_of_Birth'];
					$Nationality    = $res[0]['Nationality'];
					$Patients_Occupation    = $res[0]['Patients_Occupation'];
					$Father_Mother_Husband_Name    = $res[0]['Father_Mother_Husband_Name'];
					$Gender    = $res[0]['Gender'];
					$Marital_Status    = $res[0]['Marital_Status'];
					$Religion    = $res[0]['Religion'];
					$Religion_Others    = $res[0]['Religion_Others'];
					$Relationship    = $res[0]['Relationship'];
					$PerA_Door_No_Street    = $res[0]['PerA_Door_No_Street'];
					$PerA_Area    = $res[0]['PerA_Area'];
					$PerA_country_id    = $res[0]['PerA_country_id'];
					$PerA_State    = $res[0]['PerA_State'];
					$PerA_District    = $res[0]['PerA_District'];
					$PerA_Thana    = $res[0]['PerA_Thana'];
					$PerA_Post_Code    = $res[0]['PerA_Post_Code'];
					$PreA_Door_No_Street    = $res[0]['PreA_Door_No_Street'];
					$PreA_Area    = $res[0]['PreA_Area'];
					$PreA_country_id    = $res[0]['PreA_country_id'];
					$PreA_State    = $res[0]['PreA_State'];
					$PreA_District    = $res[0]['PreA_District'];
					$PreA_Thana    = $res[0]['PreA_Thana'];
					$PreA_Post_Code    = $res[0]['PreA_Post_Code'];
					$Mobile_No    = $res[0]['Mobile_No'];
					$Email_ID    = $res[0]['Email_ID'];
					$LandLine_No    = $res[0]['LandLine_No'];
					$status    = $res[0]['status'];
					
				 }
		       include("registration_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
    $sql    = "SHOW TABLE STATUS LIKE 'registration'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 }
 function getHospitalID($db)
 {	  
		//unset($info);
		//unset($data);
    /*$info['table']    = "registration";
	$info['fields']   = array("max(Hospital_ID) as Hospital_ID");   	   
	$info['where']    =  "1";
   
	$res  =  $db->select($info);
	return $res[0]['Hospital_ID']+1;*/
	
	$sql    = "SELECT UUID()";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return substr(str_replace("-","",$row[0]['UUID()']),0,10);
 } 	  
 
function check_file_extension($_files)
{
  foreach($_files as $key=>$name)
  {
	 if(strlen($_files[$key]['name'])>0 && $_files[$key]['size']>0)
	 {
			 unset($arr);			
			 $arr = explode(".",$_files[$key]['name']);			
			 $extension = strtolower($arr[count($arr)-1]);			
			 if(!( $extension == "pdf" || $extension == "png"  || $extension == "jpg" || $extension == "jpeg"))
			 {
				 $_SESSION['extension'] = $extension;
				// echo '<font color="red"><h3>Error:'.$extension .' is not supported file</h3></font>';
				 return false;
			 }
	 }
	// echo $arr[count($arr)-1];
  } 
  return true;
}
 	 
?>