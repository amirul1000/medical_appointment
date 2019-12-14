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
				$info['table']    = "book_a_slot";
				$data['registration_id']   = $_REQUEST['registration_id'];
                $data['request_date']   = $_REQUEST['request_date'];
                $data['request_time']   = $_REQUEST['request_time'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['doctor_users_id']   = $_REQUEST['doctor_users_id'];
                $data['doctor_comments']   = $_REQUEST['doctor_comments'];
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
					$request_date    = $res[0]['request_date'];
					$request_time    = $res[0]['request_time'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					$doctor_users_id    = $res[0]['doctor_users_id'];
					$doctor_comments    = $res[0]['doctor_comments'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("book_a_slot_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "book_a_slot";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("book_a_slot_list.php");						   
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
		       include("book_a_slot_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'book_a_slot'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
