<?php
 include("../template/header.php");
?>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Profile"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  
								  $whrstr .= "AND id='".$_SESSION['users_id']."'";
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "users";
								$info["fields"] = array("users.*"); 
								$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
									
								$arr =  $db->select($info);
								
								
						 ?>
							  <tr><td>Department</td><td> <?php
									    unset($info2);        
										$info2['table']    = "department";	
										$info2['fields']   = array("dept_name");	   	   
										$info2['where']    =  "1 AND id='".$arr[0]['department_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['dept_name'];	
					                ?></td></tr>
                              <tr><td>Doctor Fee</td><td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "doctor_type";	
										$info2['fields']   = array("*");	   	   
										$info2['where']    =  "1 AND id='".$arr[0]['doctor_type_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['fee_type'].' '.$res2[0]['fee_amount'];	
					                ?>
							  </td></tr>      
                              <tr><td>Email</td><td><?=$arr[0]['email']?></td></tr>
                              <tr><td>Password</td><td><?=$arr[0]['password']?></td></tr>
                              <tr><td>Title</td><td><?=$arr[0]['title']?></td></tr>
                              <tr><td>First Name</td><td><?=$arr[0]['first_name']?></td></tr>
                              <tr><td>Last Name</td><td><?=$arr[0]['last_name']?></td></tr>
                              <tr><td>designation</td><td><?=$arr[0]['designation']?></td></tr>
                              <tr><td>in_special</td><td><?=$arr[0]['in_special']?></td></tr>
                              <tr><td>Bio</td><td><?=$arr[0]['bio']?></td></tr>
                              <tr><td>Degree</td><td><?=$arr[0]['degree']?></td></tr>
                              <tr><td>Institutute</td><td><?=$arr[0]['institutute']?></td></tr>
                              <tr><td>Passing year</td><td><?=$arr[0]['passing_year']?></td></tr>
                              <tr><td>Experience</td><td><?=$arr[0]['experience']?></td></tr>
                              <tr><td>Success stories</td><td><?=$arr[0]['success_stories']?></td></tr>
                              <tr><td>File Picture</td><td>
                                 <?php
								    if(is_file('../../'.$arr[0]['file_picture'])&&file_exists('../../'.$arr[0]['file_picture']))
									{
								 ?>
                                  <img src="../../<?=$arr[0]['file_picture']?>" style="width:100px;height:100px;">
                                  <?php
									}
								  ?>	
                              </td></tr>
                              <tr><td>cell_phone</td><td><?=$arr[0]['cell_phone']?></td></tr>
                              <tr><td>land_phone</td><td><?=$arr[0]['land_phone']?></td></tr>
                              <tr><td>Company</td><td><?=$arr[0]['company']?></td></tr>
                              <tr><td>Address</td><td><?=$arr[0]['address']?></td></tr>
                              <tr><td>City</td><td><?=$arr[0]['city']?></td></tr>
                              <tr><td>State</td><td><?=$arr[0]['state']?></td></tr>
                              <tr><td>Zip</td><td><?=$arr[0]['zip']?></td></tr>
                              <tr><td>Country</td><td>
		                            <?php
									    unset($info2);        
										$info2['table']    = country;	
										$info2['fields']   = array("country");	   	   
										$info2['where']    =  "1 AND id='".$arr[0]['country_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['country'];	
					                ?>
							  </td></tr>
                              <tr><td>Created At</td><td><?=$arr[0]['created_at']?></td></tr>
                              <tr><td>Updated At</td><td><?=$arr[0]['updated_at']?></td></tr>
                              <tr><td>User Type</td><td><?=$arr[0]['user_type']?></td></tr>
                              <tr><td>Status</td><td><?=$arr[0]['status']?></td></tr>
			  
							  <tr><td>Action</td><td nowrap >
								  <a href="index.php?cmd=edit&id=<?=$arr[0]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <!--<a href="index.php?cmd=delete&id=<?=$arr[0]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> -->
							 </td></tr>
						
						</table>
						</div>
					 </div>				
				
		</div>
<?php
include("../template/footer.php");
?>









