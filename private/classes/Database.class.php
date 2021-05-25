<?php

   // starting the session to be able to use the session vars
   session_start();

   class Database {

      // class properties
      private $host = 'localhost';
      private $username = 'root';
      private $password = '';
      private $db_name = 'devcrud';

      // connection method that will return a connection if called
      public function connection() {
         $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
         return $conn;
      }

      // login method that accepts data from login page an validate the data if the user is registered in the system
      public function login($username, $password) {

         // putting the query to sql variable and using the username and password properties to check if there's result
         // also hasing the password with md5 encryption because the registered password is encrypted to that it needs to be compare to a encrypted password also
         $sql = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";

         // running the query with the help of connection method and passing the sql query
         $sqlValidate = $this->connection()->query($sql);

         // sqlValidate is the resulf of the query above, putting the num_rows var to the numRows
         $numRows = $sqlValidate->num_rows;


         // if numRows has a value that greater than zero, it means that there's a user registered with those passed credentials from the login page
         if($numRows > 0) {

            // putting "valid" value to the session var status, so that later it can be used to validate the user authentication
            $_SESSION['status'] = "valid";
            // redirecting the user to home page, if the login is successful
            echo "<script>window.location.href='./pages/home.php'</script>";

         // if the numRows has that value of zero, it means that the user whose trying to login is not authorized because he/she didn't provide the valid data
         } else  {
            // setting the session status var to invalid to hinder them to access the system
            $_SESSION['status'] = "invalid";
            // showing an alert
            echo "<script>alert('Incorrect credentials')</script>";
         }
      }

      // this is where someone will register to be able to access the system
      // accepting parameters from the registration page
      public function register($username, $email, $password) {
         // intergrating the paramaters to the query and putting it in the sql var, hashing the password with md5
         $sql = "INSERT INTO users VALUES (null, '$username', '$email', md5('$password'))";
         // running the query with the help of connection method
         $sqlValidate = $this->connection()->query($sql);

         echo "<script>alert('Registered Successfully!')</script>";
         echo "<script>window.location.href='/devcrud/index.php'</script>";
      }
   }