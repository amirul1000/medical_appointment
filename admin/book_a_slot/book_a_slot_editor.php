<?php
 include("../template/header.php");
?>
<script language="javascript" src="book_a_slot.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","book_a_slot"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_book_a_slot" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                             <td>Registration</td>
                                             <td>
											 <?php
                                            $info['table']    = "registration";
                                            $info['fields']   = array("*");   	   
                                            $info['where']    =  "1=1 ORDER BY id DESC";
                                            $resregistration  =  $db->select($info);
											?>
											<select  name="registration_id" id="registration_id"   class="form-control-static">
												<option value="">--Select--</option>
												<?php
												   foreach($resregistration as $key=>$each)
												   { 
												?>
												  <option value="<?=$resregistration[$key]['id']?>" <?php if($resregistration[$key]['id']==$registration_id){ echo "selected"; }?>><?=$resregistration[$key]['Patient_Name']?></option>
												<?php
												 }
												?> 
											</select>
                                            </td>
                                          </tr>
                                          <tr>
                                             <td>Request Date</td>
                                             <td>
                                                <input type="text" name="request_date" id="request_date"  value="<?=$request_date?>" class="datepicker form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Request Time</td>
                                             <td>
                                                <input type="text" name="request_time" id="request_time"  value="<?=$request_time?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Subject</td>
                                             <td>
                                                <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td valign="top">Description</td>
                                             <td>
                                                <textarea name="description" id="description"  class="form-control-static" style="width:200px;height:100px;"><?=$description?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                                 <td>Doctor Users</td>
                                                 <td><?php
													$info['table']    = "users";
													$info['fields']   = array("*");   	   
													$info['where']    =  "1=1 ORDER BY id DESC";
													$resusers  =  $db->select($info);
												?>
												<select  name="doctor_users_id" id="doctor_users_id"   class="form-control-static">
													<option value="">--Select--</option>
													<?php
													   foreach($resusers as $key=>$each)
													   { 
													?>
													  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$doctor_users_id){ echo "selected"; }?>><?=$resusers[$key]['email']?></option>
													<?php
													 }
													?> 
												</select></td>
                                          </tr>
                                          <tr>
                                             <td valign="top">Doctor Comments</td>
                                             <td>
                                                <textarea name="doctor_comments" id="doctor_comments"  class="form-control-static" style="width:200px;height:100px;"><?=$doctor_comments?></textarea>
                                             </td>
                                         </tr><tr>
                                             <td>Status</td>
                                             <td><?php
													$enumbook_a_slot = getEnumFieldValues('book_a_slot','status');
												?>
												<select  name="status" id="status"   class="form-control-static">
												<?php
												   foreach($enumbook_a_slot as $key=>$value)
												   { 
												?>
												  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
												 <?php
												  }
												?> 
												</select></td>
                                          </tr>
                                             <tr> 
                                                 <td align="right"></td>
                                                 <td>
                                                    <input type="hidden" name="cmd" value="add">
                                                    <input type="hidden" name="id" value="<?=$Id?>">			
                                                    <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
                                                 </td>     
                                             </tr>
										</table>
										</div>
										</div>
								</form>
							  </td>
							 </tr>
							</table>
			      </div>
			</div>
  </div>
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

