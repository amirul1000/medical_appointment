<?php
 include("../../template/header.php");
 include("../../template/registration_menu.php");
?>
<script language="javascript" src="book_a_slot.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<script type="text/javascript" src="../../js/selectize.js"></script>
<link rel='stylesheet' href='../../css/selectize.css'>
<link rel='stylesheet' href='../../css/selectize.default.css'>
<style type="text/css">
    .selectize-input {
      width: 100% !important;
      height: 62px !important;
    }
</style>

<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <?php
    if(isset($_SESSION['reg_msg']))
	{
	  echo "<div align=\"center\">".$_SESSION['reg_msg']."</div>";
	  unset($_SESSION['reg_msg']);	
	}
  ?>
 
  <div class="portlet box blue">
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
                                             <td>Fee Type</td>  
                                             <td>
                                                  Any of those<input type="radio" name="doctor_type" id="any" value="" <?php if(empty($doctor_type_id)){ echo "checked";} ?>> &nbsp;&nbsp;
                                                   <?php
                                                         unset($info);
                                                        $info["table"] = "doctor_type";
                                                        $info["fields"] = array("doctor_type.*"); 
                                                        $info["where"]   = "1";
                                                        $arrfee =  $db->select($info);
                                                        for($i=0;$i<count($arrfee);$i++)
                                                        {
                                                   ?>
                                                   <?=$arrfee[$i]['fee_type']?>
                                                   <input type="radio" name="doctor_type" id="doctor_type_<?=$arrfee[$i]['id']?>" value="<?=$arrfee[$i]['id']?>" <?php if(!empty($doctor_type_id) && $doctor_type_id=$arrfee[$i]['id']){ echo "checked";} ?>> &nbsp;&nbsp;
                                                   <?php
                                                        }
                                                   ?> 		
                                             </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                Department
                                              </td>
                                              <td>
                                                    <div id="spinner3"></div>
                                                    <input type="text" name="department" id="department_id"  value="<?=$department_id?>">
                                                    <script>
                                                           $(document).ready(function() {
                                                               
                                                             
                                                               $('#department_id')
                                                                      .selectize({
                                                                              plugins: ['remove_button'],
                                                                              persist: true,
                                                                              create: false,
                                                                              closeAfterSelect: true,
                                                                              maxItems: 1,
                                                                              hideSelected: true,
                                                                              openOnFocus: true,
                                                                              closeAfterSelect: true,
                                                                              maxOptions: 100,
                                                                              selectOnTab: true,
                                                                              valueField: 'id',
                                                                              placeholder: 'Department ...',
                                                                              labelField: 'title',
                                                                              searchField: 'title',
                                                                               onInitialize: function() {
                                                                                    this.trigger('change', this.getValue(), true);
                                                                                },
                                                                                onChange: function(value, isOnInitialize) {
                                                                                        if(value=="")
                                                                                        {
                                                                                            return;
                                                                                        }
                                                                                        if($("#department_id").val()!=="")
                                                                                        {
                                                                                            
                                                                                        }
                                                                                        
                                                                                },	
                                                                              options: [
                                                                      
                                                                                ],
                                                                                                                
                                                                                  });
                                        
                                                         function load_department_id()
                                                                {
                                                                      $("#div_slot").html("");
                                                                    
                                                                        var xhr; 
                                                                    
                                                                        searchbar = $('#department_id');  
                                                                        var $select = searchbar.selectize();
                                                                        var control = $select[0].selectize;
                                                                        //control.clear(); 
                                                                        //control.clearOptions(); 
                                                                        
                                                                        control.on('change', function() {
                                                                                 // var test = selectize.getValue();
                                                                                  doctor_users_id();
                                                                            });
                                                                       
                                        
                                                                        $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                                       
                                                                        xhr && xhr.abort();
                                                                            xhr = $.ajax({
                                                                                url: 'index.php?cmd=department',
                                                                                success: function(results) {
                                                                                       var data_source = eval(results);                                    
                                                                                        for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                                        {   
                                                                                            control.addOption({
                                                                                                            id: data_source[i].id,
                                                                                                            title: data_source[i].dept_name,
                                                                                                            url: ''
                                                                                                        });
                                                                                        }
                                                                                       
                                                                                        $("#spinner3").html('');
                                        
                                                                                },
                                                                                error: function() {
                                                                                     callback();
                                                                                }
                                                                            })
                                                                }
                                        
                                                           load_department_id(); 
                                        
                                                           });
                                                          </script>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                Doctor
                                              </td>
                                              <td>
                                                    <div id="spinner3"></div>
                                                    <input type="text" name="doctor_users" id="doctor_users_id"  value="<?=$doctor_users_id?>">
                                                    <script>
                                                         //  $(document).ready(function() {
                                                               
                                                             
                                                               $('#doctor_users_id')
                                                                      .selectize({
                                                                              plugins: ['remove_button'],
                                                                              persist: true,
                                                                              create: false,
                                                                              closeAfterSelect: true,
                                                                              maxItems: 1,
                                                                              hideSelected: true,
                                                                              openOnFocus: true,
                                                                              closeAfterSelect: true,
                                                                              maxOptions: 100,
                                                                              selectOnTab: true,
                                                                              valueField: 'id',
                                                                              placeholder: 'Doctor ...',
                                                                              labelField: 'title',
                                                                              searchField: 'title',
                                                                               onInitialize: function() {
                                                                                    this.trigger('change', this.getValue(), true);
                                                                                },
                                                                                onChange: function(value, isOnInitialize) {
                                                                                        if(value=="")
                                                                                        {
                                                                                            return;
                                                                                        }
																						else
																						{
																					       $.ajax({
																									url: 'index.php?cmd=doctor_type&doctor_id='+value,
																									success: function(results) {
																										   var data_source = eval(results);   
																										   //console.log(data_source);  
																											$("#doctor_type_"+data_source[0].doctor_type_id).prop('checked', value);
																											//(data_source[0].doctor_type_id);
																											$("#doctor_fee").val(data_source[0].doctor_fee);
																									},
																									error: function() {
																										 callback();
																									}
																								})		
																							
																							
																						}
                                                                                },	
                                                                              options: [
                                                                      
                                                                                ],
                                                                                                                
                                                                                  });
                                        
                                                         function doctor_users_id()
                                                                {
                                                                        $("#div_slot").html("");
                                                                    
                                                                        var xhr; 
                                                                    
                                                                        searchbar = $('#doctor_users_id');  
                                                                        var $select = searchbar.selectize();
                                                                        var control = $select[0].selectize;
                                                                        control.clear(); 
                                                                        control.clearOptions(); 
																		
                                                                        $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                                       
                                                                        xhr && xhr.abort();
                                                                            xhr = $.ajax({
                                                                                url: 'index.php?cmd=doctors&department_id='+$("#department_id").val()+'&doctor_type='+$('input[name=doctor_type]:checked').val(),
                                                                                success: function(results) {
                                                                                       var data_source = eval(results);                                    
                                                                                        for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                                        {   
                                                                                            control.addOption({
                                                                                                            id: data_source[i].id,
                                                                                                            title: data_source[i].first_name+' '+data_source[i].last_name,
                                                                                                            url: ''
                                                                                                        });
                                                                                        }
                                                                                       
                                                                                        $("#spinner3").html('');
                                        
                                                                                },
                                                                                error: function() {
                                                                                     callback();
                                                                                }
                                                                            })
                                                                }
                                        
                                                           //doctor_users_id(); 
                                        
                                                          // });
                                                          </script>
                                              </td>
                                          </tr>
                                          <tr>
                                             <td>Doctor fee</td>
                                             <td>
                                                <input type="text" name="doctor_fee" id="doctor_fee"  value="<?=$doctor_fee?>" class="form-control-static" onkeydown="return false" required>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td>Request Date</td>
                                             <td>
                                                <input type="text" name="request_date" id="request_date"  value="<?=$request_date?>" onChange="loadSlot();" class="datepicker form-control-static">
                                                Days range<select name="range" id="range_id" onChange="loadSlot();">
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5" selected>5</option>
                                                  <option value="6">6</option>
                                                  <option value="7">7</option>
                                                  <option value="8">8</option>
                                                  <option value="9">9</option>
                                                  <option value="10">10</option>
                                                </select> 
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Request Time</td>
                                             <td>
                                                <input type="text" name="request_time" id="request_time"  value="<?=$request_time?>" class="form-control-static" onkeydown="return false" required>
                                                 <br><br>
                                                 <div id="div_slot">
                                                 </div>                                    
                                               <?php
                                                /*  unset($info);
                                                  unset($data);
                                                $info["table"] = "slot";
                                                $info["fields"] = array("slot.*"); 
                                                $info["where"]   = "1   $whrstr ORDER BY display_order_no ASC";
                                                $arr =  $db->select($info);
                                                
                                                for($i=0;$i<count($arr);$i++)
                                                {*/
                                               ?>
                                                 <!--<button onClick="setSlot(event,'<?=$arr[$i]['slot_time']?>');" class="btn"><?=$arr[$i]['slot_time']?></button>-->
        
                                              <?php
                                                //}
                                              ?>	 
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
                                         </tr><!--<tr>
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
                                          </tr><tr>
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
    function setSlot(e,slot,request_date)
	 {
		 e.preventDefault();
		 $("#request_time").val(slot);
		 $("#request_date").val(request_date);
		 
		 return false;
	 }
	 
	 function loadSlot()
	 {
		 
		if($("#department_id").val() == "")
		{
			alert("Department is a required field");
			return; 
		}
		if($("#doctor_users_id").val() == "")
		{
			alert("Doctor is a required field");
			return; 
		}
		
		request_date = $("#request_date").val();
		
		$("#div_slot").html("");
	    $.ajax({
				url: 'index.php?cmd=load_slot&department_id='+$("#department_id").val()+'&doctor_users_id='+$("#doctor_users_id").val()+'&request_date='+request_date+'&range='+$("#range_id").val(),
				success: function(html) {
					    $("#div_slot").html(html);
						$("#spinner3").html('');
				},
				error: function() {
					 callback();
				}
			})	 
	 
	 }
	 
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
 //include("../../template/footer.php");
?>

