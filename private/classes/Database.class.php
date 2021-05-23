<?php

   session_start();

   class Database {
      private $host = 'localhost';
      private $username = 'root';
      private $password = '';
      private $db_name = 'devcrud';


      public function connection() {
         $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
         return $conn;
      }

      public function login($username, $password) {
         $sql = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
         $sqlValidate = $this->connection()->query($sql);

         $numRows = $sqlValidate->num_rows;

         if($numRows > 0) {
            $_SESSION['status'] = "valid";
            echo "<script>window.location.href='./pages/home.php'</script>";

         } else  {
            $_SESSION['status'] = "invalid";
            echo "<script>alert('Incorrect credentials')</script>";
         }
      }

      public function register($username, $email, $password) {
         $sql = "INSERT INTO users VALUES (null, '$username', '$email', md5('$password'))";
         $sqlValidate = $this->connection()->query($sql);

         echo "<script>alert('Registered Successfully!')</script>";
         echo "<script>window.location.href='/devcrud/index.php'</script>";
      }
   }