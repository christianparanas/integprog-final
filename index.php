<?php 

   require './private/includes/autoloader.inc.php';


   if(isset($_POST['submit'])) {
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      $query = new Database();
      $query->login($username, $password);
   }

   if(!isset($_SESSION)) 
   { 
       session_start(); 
   } 

   if($_SESSION['status'] == "invalid" || empty($_SESSION['status'])){
      $_SESSION['status'] = 'invalid';
   } else {
      $_SESSION['status'] = "valid";
      echo "<script>window.location.href='./pages/home.php'</script>";
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./public/css/index.css">
   <link rel="shortcut icon" href="./public/img/64.png" type="image/x-icon">
   <title>Sign In</title>
</head>
<body>
   <div class="container">
      <div class="header">
         <h2>Log In</h2>
      </div>

      <form action="/devcrud/index.php" method="POST" class="form" autocomplete="off">
         <div class="form-control">
            <input type="text" name="username" placeholder="Username or Email" required>
         </div>

         <div class="form-control">
            <input type="password" name="password" placeholder="Password" required>
         </div>
         <div class="form-control">
            <input type="submit" name="submit" class="submit" value="Sign In">
         </div>
         <a class="createAcc" href="./pages/registration.php">CREATE ACCOUNT</a>
      </form>
   </div>

   <script>
      if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
      }
   </script>

</body>
</html>
