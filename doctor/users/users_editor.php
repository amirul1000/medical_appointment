<?php
 include("../template/header.php");
?>
<script language="javascript" src="users.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","users"))?></b>
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

								 <form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                          <tr>
                                             <td>Department</td>
                                             <td><?php
                                                $info['table']    = "department";
                                                $info['fields']   = array("*");   	   
                                                $info['where']    =  "1=1 ORDER BY id DESC";
                                                $resdepartment  =  $db->select($info);
                                            ?>
                                            <select  name="department_id" id="department_id"   class="form-control-static">
                                                <option value="">--Select--</option>
                                                <?php
                                                   foreach($resdepartment as $key=>$each)
                                                   { 
                                                ?>
                                                  <option value="<?=$resdepartment[$key]['id']?>" <?php if($resdepartment[$key]['id']==$department_id){ echo "selected"; }?>><?=$resdepartment[$key]['dept_name']?></option>
                                                <?php
                                                 }
                                                ?> 
                                            </select></td>
					  					</tr>
										 <tr>
                                             <td>Email</td>
                                             <td>
                                                <input type="text" name="email" id="email"  value="<?=$email?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Password</td>
                                             <td>
                                                <input type="text" name="password" id="password"  value="<?=$password?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Title</td>
                                             <td>
                                                <input type="text" name="title" id="title"  value="<?=$title?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>First Name</td>
                                             <td>
                                                <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Last Name</td>
                                             <td>
                                                <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Designation</td>
                                             <td>
                                                <input type="text" name="designation" id="designation"  value="<?=$designation?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td valign="top">In Special</td>
                                             <td>
                                                <textarea name="in_special" id="in_special"  class="form-control-static" style="width:200px;height:100px;"><?=$in_special?></textarea>
                                             </td>
                                         </tr><tr>
                                             <td valign="top">Bio</td>
                                             <td>
                                                <textarea name="bio" id="bio"  class="form-control-static" style="width:200px;height:100px;"><?=$bio?></textarea>
                                             </td>
                                         </tr><tr>
                                             <td>Degree</td>
                                             <td>
                                                <input type="text" name="degree" id="degree"  value="<?=$degree?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td valign="top">Institutute</td>
                                             <td>
                                                <textarea name="institutute" id="institutute"  class="form-control-static" style="width:200px;height:100px;"><?=$institutute?></textarea>
                                             </td>
                                         </tr><tr>
                                             <td>Passing Year</td>
                                             <td>
                                                <input type="text" name="passing_year" id="passing_year"  value="<?=$passing_year?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td valign="top">Experience</td>
                                             <td>
                                                <textarea name="experience" id="experience"  class="form-control-static" style="width:200px;height:100px;"><?=$experience?></textarea>
                                             </td>
                                         </tr><tr>
                                             <td valign="top">Success Stories</td>
                                             <td>
                                                <textarea name="success_stories" id="success_stories"  class="form-control-static" style="width:200px;height:100px;"><?=$success_stories?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>File Picture</td>
                                             <td><input type="file" name="file_picture" id="file_picture"  value="<?=$file_picture?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>cell_phone</td>
                                             <td>
                                                <input type="text" name="cell_phone" id="cell_phone"  value="<?=$cell_phone?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>land_phone</td>
                                             <td>
                                                <input type="text" name="land_phone" id="land_phone"  value="<?=$land_phone?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Company</td>
                                             <td>
                                                <input type="text" name="company" id="company"  value="<?=$company?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Address</td>
                                             <td>
                                                <input type="text" name="address" id="address"  value="<?=$address?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>City</td>
                                             <td>
                                                <input type="text" name="city" id="city"  value="<?=$city?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>State</td>
                                             <td>
                                                <input type="text" name="state" id="state"  value="<?=$state?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Zip</td>
                                             <td>
                                                <input type="text" name="zip" id="zip"  value="<?=$zip?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                                 <td>Country</td>
                                                 <td><?php
                        $info['table']    = "country";
                        $info['fields']   = array("*");   	   
                        $info['where']    =  "1=1 ORDER BY country ASC";
                        $rescountry  =  $db->select($info);
                    ?>
                    <select  name="country_id" id="country_id"   class="form-control-static">
                        <option value="">--Select--</option>
                        <?php
                           foreach($rescountry as $key=>$each)
                           { 
                        ?>
                          <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                        <?php
                         }
                        ?> 
                    </select></td>
                                          </tr><!--<tr>
                                             <td>Created At</td>
                                             <td>
                                                <input type="text" name="created_at" id="created_at"  value="<?=$created_at?>" class="datepicker form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Updated At</td>
                                             <td>
                                                <input type="text" name="updated_at" id="updated_at"  value="<?=$updated_at?>" class="datepicker form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>User Type</td>
                                             <td><?php
                        $enumusers = getEnumFieldValues('users','user_type');
                    ?>
                    <select  name="user_type" id="user_type"   class="form-control-static">
                    <?php
                       foreach($enumusers as $key=>$value)
                       { 
                    ?>
                      <option value="<?=$value?>" <?php if($value==$user_type){ echo "selected"; }?>><?=$value?></option>
                     <?php
                      }
                    ?> 
                    </select></td>
                                      </tr><tr>
                                             <td>Status</td>
                                             <td><?php
                        $enumusers = getEnumFieldValues('users','status');
                    ?>
                    <select  name="status" id="status"   class="form-control-static">
                    <?php
                       foreach($enumusers as $key=>$value)
                       { 
                    ?>
                      <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
                     <?php
                      }
                    ?> 
                    </select></td>
                                      </tr>-->
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

