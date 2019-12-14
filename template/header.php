    <!DOCTYPE html>
    <!-- saved from url=(0058) -->
    <html xmlns="http://www.w3.org/1999/xhtml">
    <?php
       $site_url = 'http://'.$_SERVER['HTTP_HOST'].'/cmc_vellore';
    ?>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
    CMC Vellore
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    



    <link href="<?=$site_url?>/patient/css/stylesheet.css" rel="stylesheet">
    <link href="<?=$site_url?>/patient/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
	 <link href="<?=$site_url?>/patient/css/style.css" type="text/css" rel="stylesheet">
 
    </head>


    <body>
    

    


    <div class="aspNetHidden">





    </div>

    <div class="outterWrapper">
    <div class="container-fluid">
    <div class="row DivMainBg" align="center">

    <div class="hidden-xs hidden-sm">
    <img id="imgheaderBG" src="<?=$site_url?>/patient/images/banner.jpg" style="height:150px;">
    </div>
    </div>
    <div class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">


    <a class="navbar-brand" href="<?=$site_url?>/">Home</a>
    <a class="navbar-brand" href="<?=$site_url?>/patient">Patient</a>
    <?php
	  if(!empty($_SESSION['registration_id'])) 
	   {
	?>
    <a class="navbar-brand" href="<?=$site_url?>/patient/?cmd=logout">Logout</a>
    <?php
	   }
	?>   
    <a class="navbar-brand" href="<?=$site_url?>/doctor">Doctor</a>
    <a class="navbar-brand" href="<?=$site_url?>/admin">Admin</a>
    <a class="navbar-brand" href="<?=$site_url?>/patient/doctor_info">Doctor info</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    </div>
    </div>
    </div>

    </div>
    <div class="DivMaingContentBg">
     <?php
	   if(isset($_SESSION['Hospital_ID']))
	   {
		   echo "Hospital ID:".$_SESSION['Hospital_ID']."<br>";
	   }
	   if(isset($_SESSION['Patient_ID']))
	   {
		   echo "Patient ID:".$_SESSION['Patient_ID'];
	   }
	 ?>