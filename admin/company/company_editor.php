<?php
 include("../template/header.php");
?>
<script language="javascript" src="company.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","company"))?></b>
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

								 <form name="frm_company" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Company Name</td>
						 <td>
						    <input type="text" name="company_name" id="company_name"  value="<?=$company_name?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td valign="top">Address</td>
						 <td>
						    <textarea name="address" id="address"  class="form-control-static" style="width:200px;height:100px;"><?=$address?></textarea>
						 </td>
				     </tr><tr>
						 <td>Country</td>
						 <td>
						    <input type="text" name="country" id="country"  value="<?=$country?>" class="form-control-static">
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
						 <td>File Company Logo</td>
						 <td><input type="file" name="file_company_logo" id="file_company_logo"  value="<?=$file_company_logo?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>File Report Logo</td>
						 <td><input type="file" name="file_report_logo" id="file_report_logo"  value="<?=$file_report_logo?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>File Report Background</td>
						 <td><input type="file" name="file_report_background" id="file_report_background"  value="<?=$file_report_background?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Report Footer</td>
						 <td>
						    <input type="text" name="report_footer" id="report_footer"  value="<?=$report_footer?>" class="form-control-static">
						 </td>
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

