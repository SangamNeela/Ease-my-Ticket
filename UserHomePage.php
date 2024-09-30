<?php
session_start();
$_SESSION['Bal_NA']=0;
$uname=$_SESSION['username'];
include ('dbconn.php');
if(!isset($_SESSION['username'])){
  header("Location: Login.php");
}

// $sql="SELECT join_date from users WHERE username='$uname'";
// $res=mysqli_query($conn,$sql);
// $z=mysqli_fetch_assoc($res);
// $join_date=$z['join_date'];
// date_default_timezone_set('Asia/Kolkata');
// $t=time();
// $day=date("d-m-Y",$t);
// $join_date = date_create($join_date);
// $day = date_create($day);
// $diff = date_diff($join_date,$day);
// $num_of_days = $diff->format('%a');
// $years = $diff->format('%y');
      // if($num_of_days/365==$years){
      //   echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
      //   <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      // </div>';}

?>

<html>

<head>
<title>home page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Sacramento&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
  <style>
    #title {
      background-color: #E8E2E2;
    }

    .fixed-nav-bar {
      padding-left: 20px;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9999;
      width: 100%;
      height: 50px;

    }

    .mybrand-style {
      font-family: 'Sacramento', cursive;
      font-size: 30px;
      color: black;

    }

    .container-fluid {
      padding: 3% 15%;
    }

    img {
      height: 630px;
      width: 430px;
      padding-top: 48px;

    }

    h1 {
      padding-top: 45px;
      font-family: 'Montserrat', sans-serif;
      font-size: 3rem;
    }
  </style>
</head>

<body>
  <section id="title">
    <div class="container-fluid">
      <nav class="navbar  fixed-nav-bar navbar-expand-lg">
        <a class="navbar-brand mybrand-style" href=""><b>EaseMyTicket</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="UserHomePage.php ">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myListTickets.php">Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Wallet.php">Wallet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile2.php?q=1">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
      

      <!--     GRID OF IMAGE AND H1 TAG -->
      <div class="row">

        <div class=" col-lg-6">
          <h1>Welcome to EaseMyTicket</h1>
          <a href="Tickets.php"><button class="btn btn-outline-primary btn-lg" type="button">Book
            Tickets</button></a>
        </div>

        <div class="  col-lg-6">
          <img src="pexels-ricardo-esquivel-2496606.jpg" alt="not found">
        </div>

      </div>
    </div>
  </section>
</body>
</html>