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
	     
           case "print":
                      // get the HTML
					    ob_start();
					    include(dirname(__FILE__).'/print_template.php');
					    $html = ob_get_clean();
						
					
		           
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
						$mpdf->SetWatermarkImage('../../images/logo.png', 0.20, 'F');
						$mpdf->showWatermarkImage = true;
						
						$stylesheet = file_get_contents('../../mpdf60/lang2fonts.css');
						$mpdf->WriteHTML($stylesheet,1);
						
						$mpdf->WriteHTML($html);
						//$mpdf->AddPage();
						
						
												
						$mpdf->Output($filePath);
						$mpdf->Output();
						//$mpdf->Output( $filePath,'S');
						exit;	
				  break;
			case "send_email":
			        // get the HTML
					ob_start();
					include(dirname(__FILE__).'/print_template.php');
					$html = ob_get_clean();
					
					$subject = "Your Appointment";
					$body = $html;
					//send email
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: Doctor <info@doc.com>' . "\r\n";
						
					mail($_SESSION["Email_ID"], $subject, $body, $headers);
					$msg ="An email has been sent to your E-mail address ".$_SESSION["Email_ID"];	
					include("view_appointment.php");			  
			     break;	  
		    default:
		   
		        include("view_appointment.php");			  
	   }