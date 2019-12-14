<?php
	session_start();
	include("../common/lib.php");
	include("../lib/class.db.php");
	include("../common/config.php");
	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd)
	{
		case "login_passsword":
			$info["table"]     = "registration";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND Email_ID  LIKE BINARY '".clean($db,$_REQUEST["Email_ID"])."' AND password  LIKE BINARY '".clean($db,$_REQUEST["password"])."'";			
			$res  = $db->select($info);
			if(count($res)>0)
			{
				$_SESSION["registration_id"]   = $res[0]["id"];
				$_SESSION["Email_ID"]      = $res[0]["Email_ID"];
				$_SESSION["Hospital_ID"] = $res[0]["Hospital_ID"];
				//$_SESSION["Patient_ID"] = $res[0]["Patient_ID"];
				$_SESSION["Patient_Name"]  = $res[0]["Patient_Name"];
				$_SESSION["Patient_Initial"]       = $res[0]["Patient_Initial"];
				
				Header("Location: ../patient/registration");
			}
			else
			{
				$message="Login fail,Please verify your userid or password";
				include("index_view.php");
			}
			break;
	    case "login_birth_year":
		      unset($info);
			  unset($data);
			$info["table"]     = "registration";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND Hospital_ID  LIKE BINARY '".clean($db,$_REQUEST["Patient_ID"])."' AND Date_of_Birth  LIKE BINARY '".clean($db,$_REQUEST["Date_of_Birth"])."%'";			
			$res  = $db->select($info);
			if(count($res)>0)
			{
				$_SESSION["registration_id"]   = $res[0]["id"];
				$_SESSION["Email_ID"]      = $res[0]["Email_ID"];
				$_SESSION["Hospital_ID"] = $res[0]["Hospital_ID"];
				//$_SESSION["Patient_ID"] = $res[0]["Patient_ID"];
				$_SESSION["Patient_Name"]  = $res[0]["Patient_Name"];
				$_SESSION["Patient_Initial"]       = $res[0]["Patient_Initial"];
				
				Header("Location: ../patient/registration");
			}
			else 
			{
				  unset($info);
				  unset($data);
				$info["table"]     = "book_a_slot LEFT JOIN registration ON(registration.id=book_a_slot.registration_id)";
				$info["fields"]   = array("registration.*,book_a_slot.Patient_ID");
				$info["where"]    = " 1=1 AND book_a_slot.Patient_ID  LIKE BINARY '".clean($db,$_REQUEST["Patient_ID"])."'
				                          AND registration.Date_of_Birth  LIKE BINARY '".clean($db,$_REQUEST["Date_of_Birth"])."%'";			
				$res  = $db->select($info);
				if(count($res)>0)
				{
					$_SESSION["registration_id"]   = $res[0]["id"];
					$_SESSION["Email_ID"]      = $res[0]["Email_ID"];
					//$_SESSION["Hospital_ID"] = $res[0]["Hospital_ID"];
					$_SESSION["Patient_ID"] = $res[0]["Patient_ID"];
					$_SESSION["Patient_Name"]  = $res[0]["Patient_Name"];
					$_SESSION["Patient_Initial"]       = $res[0]["Patient_Initial"];
					
					Header("Location: ../patient/appointment");
				}
				else
				{
					$message="Login fail,Please verify your userid or password";
					include("index_view.php");
				}
			}
			break;		
		case "logout":
			session_destroy();
			unset($_SESSION["users_id"]);
			unset($_SESSION["email"]);
			unset($_SESSION["first_name"]);
			unset($_SESSION["last_name"]);
			unset($_SESSION["user_type"]);
	
			Header("Location: ../");
			break;
		case "forget_editor":
			include("forget_editor.php");
			break;
		case "forget_pass":
		      $info["table"]     = "users";
				$info["fields"]   = array("*");
				$info["where"]    = " 1=1 AND email  LIKE BINARY '".$_REQUEST["email"]."'";
				$res  = $db->select($info);
				if(count($res)>0)
				{
					$first_name    = $res[0]["first_name"];
					$last_name     = $res[0]["last_name"];
					$email         = $res[0]["email"];
					$password      = $res[0]["password"];
					
					$subject = "Recovery Password from contractortrackerapp";
					
					$body = "Dear $first_name $last_name,<br>
							Your Login information is like below:<br> 
							 Email:$email<br> 
							 password:$password<br><br>
							 
							 Thanks,<br>
							 Contractortrackerapp Team";
					//send email
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: contractortrackerapp <info@contractortrackerapp.com>' . "\r\n";
						
					mail($_REQUEST["email"], $subject, $body, $headers);
					$message ="An email has been sent to your E-mail address";	
				}
				else
				{
				   $message = "No email is found with this address";	
				}
				include("forget_editor.php");
				break;
		default :
		    session_destroy();
			include("index_view.php");
	}
	/*
	  check user plan exits
	*/
	function clean($db,$str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				$str = stripslashes($str);
				$str = str_replace("'","",$str);
				$str = str_replace('"',"",$str);
				//$str = str_replace("-","",$str);
				$str = str_replace(";","",$str);
				$str = str_replace("or 1","",$str);
				$str = str_replace("drop","",$str);
				
				return mysqli_real_escape_string($db->linkid,$str);
		}		
?>