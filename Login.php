<!DOCTYPE html>
<?php
    session_start();
    include "dbconn.php";
    // Check if form submitted and username and password are set
    if(!isset($_SESSION['username'])){
      if (isset($_POST['username']) && isset($_POST['password'])) {
        // Get the username and password inputs from the form
        $username_input = $_POST['username'];
        $password_input = $_POST['password'];
        $_SESSION['username']=$username_input;
        // echo $username_input;
        // echo $password_input;

  
        // Prepare and execute the SQL query to retrieve the user record
        $sql = "SELECT * FROM users WHERE username = '".$username_input."' AND password = '".$password_input."'";
        $result = mysqli_query($conn, $sql);
        
        


        // Check if the query returned any results
        if (mysqli_num_rows($result) > 0) {
          // Username and password match a record in the database
          echo "Login successful!";
          //check for jon_enable in db


          // $sql2="UPDATE ticket SET job_enable=1 WHERE username= '$username_input' ";
          // mysqli_query($conn,$sql2);
          // $sql3="UPDATE ticket SET job_enable=0 WHERE NOT username  = '$username_input'";
          // mysqli_query($conn,$sql3);

          header("Location: UserHomePage.php");
          
        } else {
          // Username and/or password do not match a record in the database
          
          echo '<div class="alert alert-danger" role="alert">
          Enter Your UserName or Password Correctly!!!
        </div>';
        }
      }
    }
    else{
      header("Location: UserHomePage.php");
    }


    // Close the database connection
    ?>
<html>

<head>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
            background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    form {
      background-color:#F7F7F7;
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      padding-right: 30px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h2 {
      text-align: center;
      margin-top: 50px;
    }

    label {
      display: block;
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      margin-right: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #393053;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    button:hover {
      background-color: #635985;
    }

  .forgotpassword {
      display: block;
      text-align: right;
      font-size: 14px;
      color: #666;
      text-decoration: none;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <h2>User Login</h2>
  <!-- Login form -->
  <form action="#" method="POST">
    <label >Username:</label>
    <input type="text" id="username" name="username">
    <label >Password:</label>
    <input type="password" id="password" name="password">

    <button type="submit" >Login</button>
    <a href="#" class="forgotpassword">Forgot password?</a>
    <!-- <a href="AdminLogin.php" class="forgotpassword">Admin Login</a> -->
  </form>
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                