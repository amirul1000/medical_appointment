<?php
    unset($info);
	unset($data);
  $info["table"] = "company";
  $info["fields"] = array("company.*"); 
  $info["where"]   = "1";
  $rescompany =  $db->select($info);
?>
<table class="table" align="center" width="100%">    
    <tr>
        <td width="30%">
           <img src="../../<?=$rescompany[0]['file_company_logo']?>" style="width:100px;">
        </td>
        <td align="center">      
          <h3><?=$rescompany[0]['company_name']?></h3>
          <?=$rescompany[0]['address']?><br>
          <?=$rescompany[0]['city']?>,<?=$rescompany[0]['state']?>,<?=$rescompany[0]['zip']?>,<?=$rescompany[0]['country']?><br>
        </td>
        <td  width="30%">
        </td>
    </tr>
</table>
<?php
       unset($info2);        
	$info2["table"] = "book_a_slot LEFT JOIN registration ON(book_a_slot.registration_id=registration.id)";
	$info2['fields']   = array("registration.*,book_a_slot.*");	   	   
	$info2['where']    =  "1 AND Patient_ID='".$_SESSION['Patient_ID']."' LIMIT 0,1";
	$arrpatient  =  $db->select($info2);
?>

<br><br><br>
 <!--mpdf
					
                    <htmlpageheader name="firstpage" style="display:none">
                    </htmlpageheader>
                    
                    <htmlpageheader name="otherpages" style="display:none;">
                        <span style="float:left;">Patient ID:<?=$arrpatient[0]['Patient_ID']?> </span>
						<span  style="padding:5px;"> &nbsp; &nbsp; &nbsp;
						 &nbsp; &nbsp; &nbsp;</span>
                        <span style="float:right;"></span>         
                    </htmlpageheader>  
                    
                    <sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
                    <sethtmlpageheader name="otherpages" value="on" />
                    
                    
                      <htmlpagefooter name="myfooter"  style="display:none">                          
                   		 <div align="center">
                         	    <?=$rescompany[0]['report_footer']?> 
                                   <br><span style="padding:10px;">Page {PAGENO} of {nbpg}</span> 
                         </div>
					
					</htmlpagefooter>
					
					<sethtmlpagefooter name="myfooter" value="on" />
                    
                    
                    <style>
                    
                    
                    @page :first {
                    header: firstpage;
                    }
                    
                    @page {
                    header: otherpages;
                    }
                    
                    @page {
                    footer: myfooter;
                    }
                    </style>
                    
                  mpdf--> 
                  
	
<table align="center">
    <tr><td colspan="2" align="center"><img src="../../<?=$arrpatient[0]['file_picture']?>" style="width:100px;height:100px;"></td></tr>
    <tr><td>Patient ID</td><td><?=$arrpatient[0]['Patient_ID']?></td></tr>
    <tr><td>Patient Name</td><td><?=$arrpatient[0]['Patient_Title']?> <?=$arrpatient[0]['Patient_Name']?> <?=$arrpatient[0]['Patient_Initial']?></td></tr>
    <tr><td>Date Of Birth</td><td><?=$arrpatient[0]['Date_of_Birth']?></td></tr>
</table>                  
                  
                  
<br><br><br>
                 
                  
<table class="table">
      <tr><td>Department</td><td>
	       <?php
                unset($info2);        
                $info2['table']    = "department";	
                $info2['fields']   = array("*");	   	   
                $info2['where']    =  "1 AND id='".$arrpatient[0]['department_id']."' LIMIT 0,1";
                $res2  =  $db->select($info2);
                echo $res2[0]['dept_name'];	
            ?></td></tr>
      <tr><td>Subject</td><td><?=$arrpatient[0]['subject']?></td></tr>
      <tr><td>Description</td><td><?=$arrpatient[0]['description']?></td></tr>
      <tr><td>Appointment Date</td><td><?=$arrpatient[0]['request_date']?></td></tr>      
      <tr><td>Appointment Time</td><td><?=$arrpatient[0]['request_time']?></td></tr>
      <tr><td>Fee type</td><td><?=$arrpatient[0]['fee_type']?></td></tr>
      <tr><td>Fee amount</td><td><?=$arrpatient[0]['fee_amount']?></td></tr>
      <tr><td>Doctor </td><td>
            <?php
                unset($info2);        
                $info2['table']    = "users";	
                $info2['fields']   = array("*");	   	   
                $info2['where']    =  "1 AND id='".$arrpatient[0]['doctor_users_id']."' LIMIT 0,1";
                $res2  =  $db->select($info2);
                echo $res2[0]['first_name'].' '.$res2[0]['last_name'];	
            ?>
       </td></tr>
      <tr><td>Doctor's Comment</td><td><?=$arrpatient[0]['doctor_comments']?></td></tr>
      <tr><td>Status</td>   <td><?=$arrpatient[0]['status']?></td></tr>

</table>
						