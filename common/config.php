<?php 

   $host     = "localhost"; 
   $database = "cmc_vellore";
   $user     = "root";
   $password = "secret";
   
   $db  = new Db($host,$user,$password,$database);
   
   $GLOBALS['DB'] = $db;
   
   $user     = "";
   $password = "";

?>
