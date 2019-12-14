<?php
       session_start();
	   include("common/lib.php");
	   include("lib/class.db.php");
	   include("common/config.php");
	   	   
	   $cmd = $_REQUEST['cmd'];
	 
		switch($cmd)
		{
		   default :					 
				session_destroy();
				unset($_SESSION["users_id"]);
				unset($_SESSION["email"]);
				unset($_SESSION["first_name"]);
				unset($_SESSION["last_name"]);
				unset($_SESSION["type"]);
							
				include("index_view.php");
		}	

?>