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
		 case "report":
		       $whrstr = "";
				if(!empty($_REQUEST['registration_id']))
				{
					$whrstr .= "AND registration_id='".$_REQUEST['registration_id']."'";
				}
				if(!empty($_REQUEST['doctor_users_id']))
				{
					$whrstr .= "AND doctor_users_id='".$_REQUEST['doctor_users_id']."'";
				}
				if(!empty($_REQUEST['department_id']))
				{
					$whrstr .= "AND book_a_slot.department_id='".$_REQUEST['department_id']."'";
				}
				if(!empty($_REQUEST['request_date_from']) && !empty($_REQUEST['request_date_to']))
				{
					$whrstr .= "AND request_date BETWEEN '".$_REQUEST['request_date_from']."' AND '".$_REQUEST['request_date_to']."'";
				}
				else if(!empty($_REQUEST['request_date_from']))
				{
					$whrstr .= "AND request_date = '".$_REQUEST['request_date']."'";
				}				
				if(!empty($_REQUEST['age_from']) && !empty($_REQUEST['age_to']))
				{
					$whrstr .= "AND registration.Age BETWEEN '".$_REQUEST['age_from']."' AND '".$_REQUEST['age_to']."'";
				}
				else if(!empty($_REQUEST['age_from']))
				{
					$whrstr .= "AND registration.Age = '".$_REQUEST['age_from']."'";
				}
				
				
				if(!empty($_REQUEST['doctor_type_id']))
				{
					$whrstr .= "AND book_a_slot.doctor_type_id='".$_REQUEST['doctor_type_id']."'";
				}
				
				if(!empty($_REQUEST['status']))
				{
					$whrstr .= "AND book_a_slot.status='".$_REQUEST['status']."'";
				}
				
					unset($info);
					unset($data);		  
				$info["table"] = "book_a_slot LEFT JOIN registration ON(book_a_slot.registration_id=registration.id)
				                              LEFT JOIN department ON(book_a_slot.department_id=department.id)
											  LEFT JOIN users ON(book_a_slot.doctor_users_id=users.id)";
											  //LEFT JOIN doctor_type ON(book_a_slot.doctor_type_id=doctor_type.id)";
				$info["fields"] = array("book_a_slot.*,registration.*"); 
				$info["where"]   = "1   $whrstr ORDER BY book_a_slot.request_date DESC";
							
				
				$arr =  $db->select($info);
				 // get the HTML
				unset($info);
				unset($data);
			  $info["table"] = "company";
			  $info["fields"] = array("company.*"); 
			  $info["where"]   = "1";
			  $rescompany =  $db->select($info);
				ob_start();
				include(dirname(__FILE__).'/report_pdf.php');
				$html = ob_get_clean();
				
			 if($_REQUEST['btn_submit']=='Pdf')
			 {
		   
				include("../../mpdf60/mpdf.php");					
					$mpdf=new mPDF('','A4'); 
				
				//$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
				//$mpdf->mirrorMargins = true;

			   $mpdf->SetDisplayMode('fullpage');
				//==============================================================
				$mpdf->autoScriptToLang = true;
				$mpdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
				$mpdf->autoVietnamese = true;
				$mpdf->autoArabic = true;
				
				$mpdf->autoLangToFont = true;
				
				$mpdf->setAutoBottomMargin = 'stretch'; 
				
				/* This works almost exactly the same as using autoLangToFont:
					$stylesheet = file_get_contents('../lang2fonts.css');
					$mpdf->WriteHTML($stylesheet,1);
				*/
				$mpdf->SetWatermarkImage('../../'.$rescompany[0]['file_report_background'], 0.20, 'F');
				$mpdf->showWatermarkImage = true;
				
				$stylesheet = file_get_contents('../../mpdf60/lang2fonts.css');
				$mpdf->WriteHTML($stylesheet,1);
				
				$mpdf->WriteHTML($html);
				//$mpdf->AddPage();
				
				
										
				$mpdf->Output($filePath);
				$mpdf->Output();
				//$mpdf->Output( $filePath,'S');
				exit;	
			 }
			 else
			 {
				include("report_editor.php");	 
			 }
		      break;  
	     default :    
		       include("report_editor.php");		         
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
