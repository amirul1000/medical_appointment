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


<br><br><br>
 <!--mpdf
					
                    <htmlpageheader name="firstpage" style="display:none">
                    </htmlpageheader>
                    
                    <htmlpageheader name="otherpages" style="display:none;">
                        <span style="float:left;">Invoice no:<?=$arr[0]['invoice_no']?></span>
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
<table class="table">
        <tr bgcolor="#ABCAE0">
            <td>SLNO</td>
            <td>Patient ID</td>
            <td>Patient Name and Address</td>
            <td>Patient Photograph</td>
            <td>Date of Birth</td>
            <td>Appoint date and Time</td> 
            <td>Fee amount</td>  
            <td>Remarks</td>     
        </tr>
		 <?php
            
                for($i=0;$i<count($arr);$i++)
                {
                
                   $rowColor;
        
                    if($i % 2 == 0)
                    {
                        
                        $row="#C8C8C8";
                    }
                    else
                    {
                        
                        $row="#FFFFFF";
                    }
                
         ?>
            <tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
            <td><?php echo $i+1;?></td>
            <td><?=$arr[$i]['Hospital_ID']?></td>
            <td><?=$arr[$i]['Patient_Title']?> <?=$arr[$i]['Patient_Name']?> <?=$arr[$i]['Patient_Initial']?> <br>
			     <?=$arr[$i]['PerA_Door_No_Street']?> <?=$arr[$i]['PerA_Area']?></td>
            <td>
				   <?php
                    if(is_file('../../'.$arr[$i]['file_picture'])&&file_exists('../../'.$arr[$i]['file_picture']))
                    {
                 ?>
                  <img src="../../<?=$arr[$i]['file_picture']?>" style="width:100px;height:100px;">
                  <?php
                    }
                  ?>	  
              </td>
            <td><?=$arr[$i]['Date_of_Birth']?></td>
            <td><?=$arr[$i]['request_date']?> <?=$arr[$i]['request_time']?></td> 
            <td><?=$arr[$i]['fee_amount']?></td>  
            <td><?=$arr[$i]['fee_type']?></td>     
            </tr>
        <?php
                  }
				  
				   unset($info);
				   unset($data);
				 $info["table"] = "book_a_slot LEFT JOIN registration ON(book_a_slot.registration_id=registration.id)
				                              LEFT JOIN department ON(book_a_slot.department_id=department.id)
											  LEFT JOIN users ON(book_a_slot.doctor_users_id=users.id)";
											  //LEFT JOIN doctor_type ON(book_a_slot.doctor_type_id=doctor_type.id)";
				$info["fields"] = array("sum(book_a_slot.fee_amount) as total"); 
				$info["where"]   = "1   $whrstr";
				$arr =  $db->select($info);
				$total = $arr[0]['total'];
        ?>
        <tr><td colspan="6" align="right">Sub Total</td><td><b><?=$total?></b></td></tr>    
</table>