<?php 

   // requiring the Database class, so that we can be able to use it here
   require '../private/classes/Database.class.php';

   // checking if the session is set, if not start it
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    // checking if the register submit btn is click or set, if true get the passed data from registration form
   if(isset($_POST['submit'])) {

      // trim the data to get rid the extra white spaces 
      $username = trim($_POST['username']);
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);

      // init a db obj
      $query = new Database();

      // padding the trimmed data from registration page
      $query->register($username, $email, $password);
   }

   // checking if the connection is valid or empty, if not, redirect ot homepage
   if($_SESSION['status'] == "invalid" || empty($_SESSION['status'])){
      $_SESSION['status'] = 'invalid';
   } else {
      $_SESSION['status'] = "valid";
      echo "<script>window.location.href='./home.php'</script>";
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/d340964368.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../public/css/registration.css">
   <link rel="shortcut icon" href="../public/img/64.png" type="image/x-icon">
   <title>Sign In</title>
</head>
<body>
   <div class="container">
      <div class="header">
         <h2>Create account</h2>
      </div>

      <form action="#" class="form" autocomplete="off" method="POST">
         <div class="form-control">
            <input type="text" name="username" id="username" placeholder="Username" required>
         </div>

         <div class="form-control">
            <input type="email" name="email" id="email" placeholder="Email" required>
         </div>

         <div class="form-control" id="pw1">
            <input type="password" name="password" id="password" placeholder="Password" required>
         </div>

         <div class="form-control" id="pw2">
            <input type="password" name="password2" class="password2" id="password2" placeholder="Confirm Password" required>
         </div>

         <div class="form-control">
            <input type="submit" name="submit" class="submit" id="submit" value="Sign Up">
         </div>

         <div class="options">
            <div class="create">
               <h4>Already have an account? <span><a href="../index.php">Sign In!</a></span></h4>
            </div>
         </div>
      </form>
   </div>

   <script type="text/javascript" src="../public/js/registration.js"></script>
   <script>
      if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
      }
   </script>

</body>
</html>
