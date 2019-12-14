<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "registration";
				$data['Hospital_ID']   = $_REQUEST['Hospital_ID'];
                $data['Patient_Title']   = $_REQUEST['Patient_Title'];
                $data['Patient_Name']   = $_REQUEST['Patient_Name'];
                $data['Patient_Initial']   = $_REQUEST['Patient_Initial'];
                     
				if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
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
                $data['LandLine_No']   = $_REQUEST['LandLine_No'];
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("registration_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "registration";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
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
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("registration_list.php");
				break; 
        case "search_registration":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("registration_list.php");
				break;  								   
						
	     default :    
		       include("registration_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'registration'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
