<?php
 include("../template/header.php");
?>
<script language="javascript" src="book_a_slot.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


      <form method="post">
                  <div style="padding-left:100px;">
	                <h3 class="form-section">Name</h3>
                    <div class="form-group">
                          <div class="row">                            
                             <div class="col-md-3 col-sm-3">
                                   Patient<br>
                                  <?php
									$info['table']    = "registration";
									$info['fields']   = array("*");   	   
									$info['where']    =  "1=1 ORDER BY id DESC";
									$resregistration  =  $db->select($info);
									?>
									<select  name="registration_id" id="registration_id"   class="form-control-static">
										<option value="">--All--</option>
										<?php
										   foreach($resregistration as $key=>$each)
										   { 
										?>
										  <option value="<?=$resregistration[$key]['id']?>" <?php if($resregistration[$key]['id']==$_REQUEST['registration_id']){ echo "selected"; }?>><?=$resregistration[$key]['Patient_Name']?></option>
										<?php
										 }
										?> 
									</select> 
                             </div>
                             <div class="col-md-3 col-sm-3">
                                 Doctors<br>
                                 <?php
									$info['table']    = "users";
									$info['fields']   = array("*");   	   
									$info['where']    =  "1=1 ORDER BY id DESC";
									$resusers  =  $db->select($info);
								?>
								<select  name="doctor_users_id" id="doctor_users_id"   class="form-control-static">
									<option value="">--All--</option>
									<?php
									   foreach($resusers as $key=>$each)
									   { 
									?>
									  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$_REQUEST['doctor_users_id']){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?></option>
									<?php
									 }
									?> 
								</select>
                             </div>
                          </div>
                      </div>
                      
                      
                      <h3 class="form-section">Department</h3>
                    <div class="form-group">
                          <div class="row">                            
                             <div class="col-md-3 col-sm-3">
                                   Department Name<br>
                                  <?php
									$info['table']    = "department";
									$info['fields']   = array("*");   	   
									$info['where']    =  "1=1 ORDER BY id DESC";
									$resdept  =  $db->select($info);
									?>
									<select  name="department_id" id="department_id"   class="form-control-static">
										<option value="">--All--</option>
										<?php
										   foreach($resdept as $key=>$each)
										   { 
										?>
										  <option value="<?=$resdept[$key]['id']?>" <?php if($resdept[$key]['id']==$_REQUEST['department_id']){ echo "selected"; }?>><?=$resdept[$key]['dept_name']?></option>
										<?php
										 }
										?> 
									</select> 
                             </div>
                             
                          </div>
                      </div>
                      
                      
                      
	                   
                       <h3 class="form-section">Request Date</h3>
                       <div class="form-group"> 
                          <div class="row">
                             <div class="col-md-3 col-sm-3">
                                    From<br>
                                    <input type="text" name="request_date_from" id="request_date_from"  value="<?=$_REQUEST['request_date_from']?>" class="datepicker form-control-static">
                             </div>
                             <div class="col-md-3 col-sm-3">
                                   To<br>
                                   <input type="text" name="request_date_to" id="request_date_to"  value="<?=$_REQUEST['request_date_to']?>" class="datepicker form-control-static">
                             </div>
                          </div>   
					  </div> 
                      
                      
                    <h3 class="form-section">Age</h3>
                    <div class="form-group">
                          <div class="row">                            
                             <div class="col-md-3 col-sm-3">
                                   From<br>
									<select  name="age_from" id="age_from"   class="form-control-static">
										<option value="">--All--</option>
										<?php
										   for($i=1;$i<=90;$i++)
										   { 
										?>
										  <option value="<?=$i?>" <?php if($i==$_REQUEST['age_from']){ echo "selected"; }?>><?=$i?></option>
										<?php
										   }
										?> 
									</select> 
                             </div>
                             <div class="col-md-3 col-sm-3">
                                 To<br>
                                 <?php
									
								?>
								<select  name="age_to" id="age_to"   class="form-control-static">
									<option value="">--All--</option>
									<?php
									   for($i=1;$i<=90;$i++)
									   { 
									?>
									  <option value="<?=$i?>" <?php if($i==$_REQUEST['age_to']){ echo "selected"; }?>><?=$i?></option>
									<?php
									   }
									?> 
								</select>
                             </div>
                          </div>
                      </div>
                      
                      
                   <h3 class="form-section">Doctor fee</h3>
                    <div class="form-group">
                          <div class="row">                            
                             <div class="col-md-3 col-sm-3">
                                   Patient<br>
                                  <?php
									$info['table']    = "doctor_type";
									$info['fields']   = array("*");   	   
									$info['where']    =  "1=1 ORDER BY id DESC";
									$resfee  =  $db->select($info);
									?>
									<select  name="doctor_type_id" id="doctor_type_id"   class="form-control-static">
										<option value="">--All--</option>
										<?php
										   foreach($resfee as $key=>$each)
										   { 
										?>
										  <option value="<?=$resfee[$key]['id']?>" <?php if($resfee[$key]['id']==$_REQUEST['doctor_type_id']){ echo "selected"; }?>><?=$resfee[$key]['fee_type']?></option>
										<?php
										 }
										?> 
									</select> 
                             </div>
                          </div>
                      </div>
                      
                      
                      <h3 class="form-section">Status</h3>
                    <div class="form-group">
                          <div class="row">                            
                             <div class="col-md-3 col-sm-3">
                                   Status<br>
                                  <?php
										$enumbook_a_slot = getEnumFieldValues('book_a_slot','status');
									?>
									<select  name="status" id="status"   class="form-control-static">
                                    <option value="">--All--</option>
									<?php
									   foreach($enumbook_a_slot as $key=>$value)
									   { 
									?>
									  <option value="<?=$value?>" <?php if($value==$_REQUEST['status']){ echo "selected"; }?>><?=$value?></option>
									 <?php
									  }
									?> 
									</select>
                             </div>
                          </div>
                      </div>
                      
					  
                   
                    <div class="form-group"> 
                        <input type="hidden" name="cmd" value="report">
                        <input type="hidden" name="id" value="<?=$Id?>">			
                        <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
                        <input type="submit" name="btn_submit" id="btn_submit" value="Pdf" class="btn red">
                    </div>
                    </div>  
            </form>
           <?=$html?>

  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../template/footer.php");
?>

