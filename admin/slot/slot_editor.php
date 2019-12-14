<?php
 include("../template/header.php");
?>
<script language="javascript" src="slot.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","slot"))?></b>
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

								 <form name="frm_slot" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Display Order No</td>
						 <td>
						    <input type="text" name="display_order_no" id="display_order_no"  value="<?=$display_order_no?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Slot Time</td>
						 <td>
						    <input type="text" name="slot_time" id="slot_time"  value="<?=$slot_time?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td valign="top">Comment</td>
						 <td>
						    <textarea name="comment" id="comment"  class="form-control-static" style="width:200px;height:100px;"><?=$comment?></textarea>
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumslot = getEnumFieldValues('slot','status');
?>
<select  name="status" id="status"   class="form-control-static">
<?php
   foreach($enumslot as $key=>$value)
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

