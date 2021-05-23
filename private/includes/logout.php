<?php 

   if(!isset($_SESSION)) 
   { 
      session_start(); 
   } 

   $_SESSION['status'] = "invalid";
   echo "<script>window.location.href='../../index.php'</script>";
