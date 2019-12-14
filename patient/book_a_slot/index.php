<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['registration_id'])) 
	   {
	     Header("Location: ../../");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
		           unset($info);
				   unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1  AND id='".$_REQUEST['doctor_users']."'";
				$arrdoctor =  $db->select($info);
				$doctor_type_id = $arrdoctor[0]['doctor_type_id'];
				  unset($info);
				  unset($data);
				$info["table"] = "doctor_type";
				$info["fields"] = array("doctor_type.*"); 
				$info["where"]   = "1 AND id='$doctor_type_id'";
				$arrfee =  $db->select($info);
				$fee_type      = $arrfee[0]['fee_type'];
				$fee_amount    = $arrdoctor[0]['doctor_fee'];
				
				  unset($info);
				  unset($data);
				$info['table']    = "book_a_slot";
				$data['registration_id']   = $_SESSION['registration_id'];
				$data['department_id']   = $_REQUEST['department'];
				$data['doctor_users_id']   = $_REQUEST['doctor_users'];
				if(empty($_REQUEST['id']))
				{
					
					$Patient_ID = getPatientID($db);
					$data['Patient_ID']  = $Patient_ID;
				}
				$data['doctor_type_id']   = $doctor_type_id;
				$data['fee_type']   = $fee_type;
				$data['fee_amount']   = $fee_amount;
                $data['request_date']   = $_REQUEST['request_date'];
                $data['request_time']   = $_REQUEST['request_time'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];				
                //$data['doctor_users_id']   = $_REQUEST['doctor_users_id'];
                //$data['doctor_comments']   = $_REQUEST['doctor_comments'];
				if(empty($_REQUEST['id']))
				{
					$data['created_at']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['updated_at']   = date("Y-m-d H:i:s");
				}
                $data['status']   = 'approved';
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
					 $Id = $db->lastInsert($result); 
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				/////////////////////////////////////////////
				   unset($info);
				   unset($data);
				$info["table"] = "book_a_slot";
				$info["fields"] = array("book_a_slot.*"); 
				$info["where"]   = "1 AND id='".$Id."'";
				$arr =  $db->select($info);
				$Patient_ID = $arr[0]['Patient_ID'];
				$_SESSION['Patient_ID'] = $Patient_ID;
				/////////////////////////////////////////			
				     unset($info);
					 unset($data);
					$info['table']    = "registration";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$_SESSION['registration_id'];
					
					//$info['debug']    = true;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$Hospital_ID    = $res[0]['Hospital_ID'];
					$Patient_Title    = $res[0]['Patient_Title'];
					$Patient_Name    = $res[0]['Patient_Name'];
					$Patient_Initial    = $res[0]['Patient_Initial'];
					$password    = $res[0]['password'];
					
					$Mobile_No    = $res[0]['Mobile_No'];
					$Email_ID    = $res[0]['Email_ID'];
					$LandLine_No    = $res[0]['LandLine_No'];
					$LandLine_No    = $res[0]['LandLine_No'];
					$Date_of_Birth  = $res[0]['Date_of_Birth'];
					$status    = $res[0]['status'];
					
				//Email	
				$subject = "Appointment information";
				$msg = "Your Appointment information is ".$_REQUEST['status'].":<br> 
						 request_date:".$_REQUEST['request_date']."<br> 
						 request_time:".$_REQUEST['request_time']."<br>
						 Email:".$Email_ID."<br> 
						 password:".$password."<br>
						 Hospital ID:".$Hospital_ID."<br><br>						 
						 
						 Print your appointment with<br>
						 Patient ID:".$Patient_ID."<br>
						 Birth Year:".date("Y",strtotime($Date_of_Birth));
						 
				$body = "Dear ".$Patient_Title." ".$Patient_Name." ".$Patient_Initial.",<br>
						 ".$msg."<br>
						 Thanks,<br>
						 XYZ Team";				  
				//send email
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: Doctor <info@doc.com>' . "\r\n";
					
				//mail($Email_ID, $subject, $body, $headers);
				//$message ="An email has been sent to your E-mail address";
				
				//SMS
				if(strlen($Mobile_No)>0)
				 {
					 //$str_text =   str_replace(" ", "%20",strip_tags( $body));
					// $link = "http://202.74.240.169/sending_sms_win/Default.aspx?login_name=pata&mobileno=".$Mobile_No."&msg=".$str_text;
					 //$out = file_get_contents($link);
				 }
				$msg = "Email and SMS has been sent to patient.<br>".$msg;
				
				include("book_a_slot_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "book_a_slot";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$registration_id    = $res[0]['registration_id'];
					$department_id   = $res[0]['department_id'];
				    $doctor_users_id   = $res[0]['doctor_users_id'];
					$doctor_type_id   = $res[0]['doctor_type_id'];
					$fee_type   = $res[0]['fee_type'];
					$fee_amount   = $res[0]['fee_amount'];				
					$request_date    = $res[0]['request_date'];
					$request_time    = $res[0]['request_time'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					//$doctor_users_id    = $res[0]['doctor_users_id'];
					//$doctor_comments    = $res[0]['doctor_comments'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("book_a_slot_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "book_a_slot";
				$info['where']    = "id='$Id' AND registration_id='".$_SESSION['registration_id']."'";
				if($Id)
				{
					$db->delete($info);
				}
				include("book_a_slot_list.php");						   
				break; 
				
		 case "department":
		        $info["table"] = "department";
				$info["fields"] = array("department.*"); 
				$info["where"]   = "1 ORDER BY dept_name ASC";
				$arr =  $db->select($info);
		 		
				echo json_encode($arr);
		 		break;
		 case "doctors":
		         if(!empty($_REQUEST['doctor_type']))
				 {
					 $whrstr = "AND doctor_type_id='".$_REQUEST['doctor_type']."'";
				 }
		       	$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1 $whrstr AND department_id='".$_REQUEST['department_id']."' 
				                          ORDER BY first_name ASC";
				$arr =  $db->select($info);
		 		
				echo json_encode($arr);
		 		break;	
		 case "load_slot":
				  $department_id  = $_REQUEST['department_id'];
				  $doctor_users_id = $_REQUEST['doctor_users_id'];
				  $request_date   = $_REQUEST['request_date'];
				  $range   = $_REQUEST['range'];
				  
				  
				  unset($info);
				  unset($data);
				$info["table"] = "slot";
				$info["fields"] = array("slot.*"); 
				$info["where"]   = "1 ORDER BY display_order_no ASC";
				$slot_all_arr =  $db->select($info);
					
			     $str = "Choice your date time from available slot:<br>";
				
				  for($k=0;$k<$range;$k++)
				  {	
				  
						 if($k>0)
						 {  
						 	$request_date = date("Y-m-d",strtotime($request_date. " + 1 day"));
						 }
					
						  unset($info);
						  unset($data);
						$info["table"] = "book_a_slot";
						$info["fields"] = array("book_a_slot.*"); 
						$info["where"]   = "1 AND department_id='".$department_id."'
											  AND doctor_users_id='".$doctor_users_id."'
											  AND request_date='".$request_date."'";
						$slot_doctor =  $db->select($info);
						//debug($slot_doctor);
						$str .= "<div>".$request_date.":";
						for($i=0;$i<count($slot_all_arr);$i++)
						{
							$disabled = "";
							for($j=0;$j<count($slot_doctor);$j++)
							{
							   if($slot_all_arr[$i]['slot_time'] == $slot_doctor[$j]['request_time']
								   && $slot_doctor[$j]['status'] == 'approved')
								   {
									   $disabled = "disabled";
									   break;
								   }
							}
							$str .= '<button onClick="setSlot(event,\''.$slot_all_arr[$i]['slot_time'].'\',\''.$request_date.'\');"  class="btn" '.$disabled.'>'.$slot_all_arr[$i]['slot_time'].'</button>&nbsp;';
						}
						$str .= "<div><br>";
				  }
				echo $str;
		      break;
		 case "doctor_type":
		           unset($info);
				   unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1  AND id='".$_REQUEST['doctor_id']."'";
				$arrdoctor =  $db->select($info);
				//$doctor_type_id = $arrdoctor[0]['doctor_type_id'];
				//$arr[0]['doctor_type_id'] = $doctor_type_id;
				echo json_encode($arrdoctor);
				  /*unset($info);
				  unset($data);
				$info["table"] = "doctor_type";
				$info["fields"] = array("doctor_type.*"); 
				$info["where"]   = "1 AND id='$doctor_type_id'";
				$arrfee =  $db->select($info);
				$fee_type      = $arrfee[0]['fee_type'];
				$fee_amount    = $arrfee[0]['fee_amount'];*/ 
		      break; 	  
		 case 'book_a_slot_details': 
				include("book_a_slot_details.php");						   
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
				include("book_a_slot_list.php");
				break; 
          case "search_book_a_slot":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("book_a_slot_list.php");
				break;  								   
						
	     default :    
		       include("book_a_slot_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'book_a_slot'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 
function getPatientID($db)
 {	
	$sql    = "SELECT UUID()";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return substr(str_replace("-","",$row[0]['UUID()']),0,10);
 } 	  	  	 
?>
