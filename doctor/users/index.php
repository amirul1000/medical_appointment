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
				$info['table']    = "users";
				$data['department_id']   = $_REQUEST['department_id'];
				$data['email']   = $_REQUEST['email'];
                $data['password']   = $_REQUEST['password'];
                $data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
				$data['designation']   = $_REQUEST['designation'];
                $data['in_special']   = $_REQUEST['in_special'];
                $data['bio']   = $_REQUEST['bio'];
                $data['degree']   = $_REQUEST['degree'];
                $data['institutute']   = $_REQUEST['institutute'];
                $data['passing_year']   = $_REQUEST['passing_year'];
                $data['experience']   = $_REQUEST['experience'];
                $data['success_stories']   = $_REQUEST['success_stories'];
                     
				if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
				{
					
					if(!file_exists("../../users_images"))
					{ 
					   mkdir("../../users_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					$filePath="../../users_images/".$file;
					move_uploaded_file($_FILES['file_picture']['tmp_name'],$filePath);
					$data['file_picture']="users_images/".trim($file);
				}
				$data['cell_phone']   = $_REQUEST['cell_phone'];
				$data['land_phone']   = $_REQUEST['land_phone'];
                $data['company']   = $_REQUEST['company'];
                $data['address']   = $_REQUEST['address'];
                $data['city']   = $_REQUEST['city'];
                $data['state']   = $_REQUEST['state'];
                $data['zip']   = $_REQUEST['zip'];
                $data['country_id']   = $_REQUEST['country_id'];
                if(empty($_REQUEST['id']))
				{
					$data['created_at']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['updated_at']   = date("Y-m-d H:i:s");
				}
                //$data['user_type']   = $_REQUEST['user_type'];
                //$data['status']   = $_REQUEST['status'];
                
				
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
				
				include("users_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "users";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id']; 
					$department_id    = $res[0]['department_id']; 
					$email    = $res[0]['email'];
					$password    = $res[0]['password'];
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$designation    = $res[0]['designation'];
					$in_special    = $res[0]['in_special'];
					$bio    = $res[0]['bio'];
					$degree    = $res[0]['degree'];
					$institutute    = $res[0]['institutute'];
					$passing_year    = $res[0]['passing_year'];
					$experience    = $res[0]['experience'];
					$success_stories    = $res[0]['success_stories'];
					$file_picture    = $res[0]['file_picture'];
					$cell_phone    = $res[0]['cell_phone'];
					$land_phone    = $res[0]['land_phone'];
					$company    = $res[0]['company'];
					$address    = $res[0]['address'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$country_id    = $res[0]['country_id'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$user_type    = $res[0]['user_type'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("users_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "users";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("users_list.php");						   
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
				include("users_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("users_list.php");
				break;  								   
						
	     default :    
		       include("users_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'users'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
