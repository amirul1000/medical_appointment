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
				$info['table']    = "company";
				$data['company_name']   = $_REQUEST['company_name'];
                $data['address']   = $_REQUEST['address'];
                $data['country']   = $_REQUEST['country'];
                $data['city']   = $_REQUEST['city'];
                $data['state']   = $_REQUEST['state'];
                $data['zip']   = $_REQUEST['zip'];
                     
				if(strlen($_FILES['file_company_logo']['name'])>0 && $_FILES['file_company_logo']['size']>0)
				{
					
					if(!file_exists("../../company_images"))
					{ 
					   mkdir("../../company_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_company_logo']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_company_logo']['name'])));
					}
					$filePath="../../company_images/".$file;
					move_uploaded_file($_FILES['file_company_logo']['tmp_name'],$filePath);
					$data['file_company_logo']="company_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_report_logo']['name'])>0 && $_FILES['file_report_logo']['size']>0)
				{
					
					if(!file_exists("../../company_images"))
					{ 
					   mkdir("../../company_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_report_logo']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_report_logo']['name'])));
					}
					$filePath="../../company_images/".$file;
					move_uploaded_file($_FILES['file_report_logo']['tmp_name'],$filePath);
					$data['file_report_logo']="company_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_report_background']['name'])>0 && $_FILES['file_report_background']['size']>0)
				{
					
					if(!file_exists("../../company_images"))
					{ 
					   mkdir("../../company_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_report_background']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_report_background']['name'])));
					}
					$filePath="../../company_images/".$file;
					move_uploaded_file($_FILES['file_report_background']['tmp_name'],$filePath);
					$data['file_report_background']="company_images/".trim($file);
				}
                $data['report_footer']   = $_REQUEST['report_footer'];
                
				
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
				
				include("company_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "company";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$company_name    = $res[0]['company_name'];
					$address    = $res[0]['address'];
					$country    = $res[0]['country'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$file_company_logo    = $res[0]['file_company_logo'];
					$file_report_logo    = $res[0]['file_report_logo'];
					$file_report_background    = $res[0]['file_report_background'];
					$report_footer    = $res[0]['report_footer'];
					
				 }
						   
				include("company_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "company";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("company_list.php");						   
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
				include("company_list.php");
				break; 
        case "search_company":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("company_list.php");
				break;  								   
						
	     default :    
		       include("company_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'company'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
