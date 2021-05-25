<?php 

	 // log out page, pusing the user here when they click the logot btn to removed their auth
   if(!isset($_SESSION)) 
   { 
      session_start(); 
   } 

   $_SESSION['status'] = "invalid";
   echo "<script>window.location.href='../../index.php'</script>";
