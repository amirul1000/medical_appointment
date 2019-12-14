<?php
 include("../../template/header.php");
?>
<div class="container">
 <div class="portlet box blue">
           
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><h3><?=ucwords(str_replace("_"," ","Profile"))?></h3>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  
						 
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
								
							for($i=0;$i<count($arr);$i++)
							{	
						 ?>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                             <div class="card">
                             <table class="table" align="center">
							  <tr><td>Email</td><td><?=$arr[$i]['email']?></td></tr>
                              <tr><td>Title</td><td><?=$arr[$i]['title']?></td></tr>
                              <tr><td>First Name</td><td><?=$arr[$i]['first_name']?></td></tr>
                              <tr><td>Last Name</td><td><?=$arr[$i]['last_name']?></td></tr>
                              <tr><td>designation</td><td><?=$arr[$i]['designation']?></td></tr>
                              <tr><td>In special</td><td><?=$arr[$i]['in_special']?></td></tr>
                              <tr><td>Bio</td><td><?=$arr[$i]['bio']?></td></tr>
                              <tr><td>Degree</td><td><?=$arr[$i]['degree']?></td></tr>
                              <tr><td>Institutute</td><td><?=$arr[$i]['institutute']?></td></tr>
                              <tr><td>Passing year</td><td><?=$arr[$i]['passing_year']?></td></tr>
                              <tr><td>Experience</td><td><?=$arr[$i]['experience']?></td></tr>
                              <tr><td>Success stories</td><td><?=$arr[$i]['success_stories']?></td></tr>
                              <tr><td>File Picture</td><td>
                                 <?php
								    if(is_file('../../'.$arr[$i]['file_picture'])&&file_exists('../../'.$arr[$i]['file_picture']))
									{
								 ?>
                                  <img src="../../<?=$arr[$i]['file_picture']?>" style="width:100px;height:100px;">
                                  <?php
									}
								  ?>	
                              </td></tr>
                              <tr><td>cell_phone</td><td><?=$arr[$i]['cell_phone']?></td></tr>
                              <tr><td>land_phone</td><td><?=$arr[$i]['land_phone']?></td></tr>
                              <tr><td>Company</td><td><?=$arr[$i]['company']?></td></tr>
                              <tr><td>Address</td><td><?=$arr[$i]['address']?></td></tr>
                              <tr><td>City</td><td><?=$arr[$i]['city']?></td></tr>
                              <tr><td>State</td><td><?=$arr[$i]['state']?></td></tr>
                              <tr><td>Zip</td><td><?=$arr[$i]['zip']?></td></tr>
                              <tr><td>Country</td><td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "country";	
										$info2['fields']   = array("country");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['country_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['country'];	
					                ?>
							  </td></tr>
						
						</table>
                        </div>						
					 </div>		
                     </div>
				    <?php
							}
				  ?>
                  
                  <style>
					#navlist li
					{
						float:left;
						display: inline;
						list-style-type: none;
						padding-right: 20px;
					}
				   </style>
				  <?php              
						  unset($info);
		
						   $info["table"] = "users";
						   $info["fields"] = array("count(*) as total_rows"); 
						   $info["where"]   = "1  $whrstr ORDER BY id DESC";
						  
						   $res  = $db->select($info);  
		
									
							$numrows = $res[0]['total_rows'];
							$maxPage = ceil($numrows/$rowsPerPage);
							$self = 'index.php?cmd=list';
							$nav  = '';
							
							$start    = ceil($pageNum/5)*5-5+1;
							$end      = ceil($pageNum/5)*5;
							
							if($maxPage<$end)
							{
							  $end  = $maxPage;
							}
							
							for($page = $start; $page <= $end; $page++)
							//for($page = 1; $page <= $maxPage; $page++)
							{
								if ($page == $pageNum)
								{
									$nav .= "<li>$page</li>"; 
								}
								else
								{
									$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
								} 
							}
							if ($pageNum > 1)
							{
								$page  = $pageNum - 1;
								$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
						
							   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
							} 
							else
							{
								$prev  = '<li>&nbsp;</li>'; 
								$first = '<li>&nbsp;</li>'; 
							}
						
							if ($pageNum < $maxPage)
							{
								$page = $pageNum + 1;
								$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
						
								$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
							} 
							else
							{
								$next = '<li>&nbsp;</li>'; 
								$last = '<li>&nbsp;</li>'; 
							}
							
							if($numrows>1)
							{
							  echo '<ul id="navlist">';
							   echo $first . $prev . $nav . $next . $last;
							  echo '</ul>';
							}
						?>     
                  
                  			
		</div>
</div>		

<?php
include("../../template/footer.php");
?>









