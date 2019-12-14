<link href="../../patient/css/stylesheet.css" rel="stylesheet">
<link href="../../patient/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="../../patient/css/style.css" type="text/css" rel="stylesheet">
     
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

  <div class="portlet box blue">
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
                          <tr>
                             <td>Request Date</td>
                             <td>
                                <input type="text" name="request_date" id="request_date"  value="<?=$_REQUEST['request_date']?>" onChange="loadSlot();" class="datepicker form-control-static">
                                Days range<select name="range" id="range_id" onChange="loadSlot();">
                                 <?php
								   for($i=1;$i<=90;$i++)
								   {
								 ?>
                                  <option value="<?=$i?>" <?php if($i==10){ echo "selected"; }?>><?=$i?></option>
                                 <?php
								   }
								  ?> 
                                </select> 
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <br><br>
                                 <div id="div_slot">
                                 </div> 
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
		 window.opener.$("#request_time").val(slot);
		 window.opener.$("#request_date").val(request_date);
		 window.close();
		 return false;
	 }
	 function loadSlot()
	 {
		
		request_date = $("#request_date").val();
		
		$("#div_slot").html("");
	    $.ajax({
				url: 'index.php?cmd=load_slot&department_id='+<?=$_REQUEST['department_id']?>+'&doctor_users_id='+<?=$_REQUEST['doctor_users_id']?>+'&request_date='+request_date+'&range='+$("#range_id").val(),
				success: function(html) {
					    $("#div_slot").html(html);
						$("#spinner3").html('');
				},
				error: function() {
					 callback();
				}
			})	 
	 
	 }
	 
	 $( document ).ready(function() {
        loadSlot();
     });
	
	 
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

