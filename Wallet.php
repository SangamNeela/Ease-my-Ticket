<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: Login.php");
}
include ("dbconn.php");
$username= $_SESSION['username'];

if($_SESSION['Bal_NA']==1){
  echo '<div class="alert alert-danger" role="alert"  style="margin-top:50px;">
  Your Balance Is Insufficient to Book A Ticket!!! PLEASE TOP-UP
</div>';
}

$sql="SELECT * FROM users WHERE username ='$username'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    while($r=mysqli_fetch_array($result)){
        $balance=$r['balance'];
    }
}

if(isset($_POST['mySubmit']) && isset($_POST['input-num']))
{
  if(!empty($_POST['input-num']) && $_POST['input-num']>0)
	{
    $num=$_POST['input-num'];
    if($num>1000)
    {
        echo'<script>alert("You cannot recharge more than 1000")</script>';
    }
    else
    {
   
            $sql2="UPDATE users SET balance = balance+$num where username= '$username' ";
            $result2=mysqli_query($conn,$sql2);
            header("location: Wallet.php");
    }
    }
  
  elseif(empty($_POST['input-num']))
  {
    echo'<div class="alert alert-danger"  role="alert" ">
    You Cant Enter Empty Value!!!
  </div>';
  }
  else
  {
    echo '<div class="alert alert-danger" role="alert">
    You Cant Enter Negative Value!!!
  </div>';
  }
}

?>
<html>

<head>
  <title>MyWallet</title>
  <!--   BOOTSTRAP CDN LINK -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Sacramento&display=swap" rel="stylesheet">


  <style>
    .card {
      background-color: #E5D1FA;
    }

    body {
      background-color: #BDCDD6;
    }
    .mybrand-style {
      font-family: 'Sacramento', cursive;
      font-size: 30px;
      color: black;

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
    section{
      padding-top:25px;
    }
  </style>

</head>

<body>
<nav class="navbar  fixed-nav-bar navbar-expand-lg">
        <a class="navbar-brand mybrand-style" href="UserHomePage.php"><b>EaseMyTicket</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link" href="UserHomePage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myListTickets.php">Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Wallet.php">Wallet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile2.php">Profile</a>
            </li>
          </ul>
        </div>
      </nav>
  <section>
  <div class="card  m-4 p-2 w-50 " style="height:19.7rem;">
    <div class=" row">
      <div class="col-lg-5"> <img src="wallet2-img.jpg" class="card-img-top" alt="ntg"></div>
      <div class="card-body col-lg-4">
        <h2 class="card-title" id="balance1"><?php echo $balance; ?></h2>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
    </div>
  </div>

  <div class="card  m-4 p-2  w-50 " style="height:19.7rem;">
    <div class=" row">
      <div class="col-lg-5 "> <img src="wallet2-img.jpg" class="card-img-top" alt="ntg"></div>

      <div class="card-body col-lg-4">
        <h3 class="card-title fs-2 shadow">TOP-UP WALLET</h3></br></br>
        <p class="text-md-start fw-semibold">Enter your Top-Up Number</p>
        <form action="" method="post">
        <div class="input-group mb-3">
            <input type="number" id="myNumber"name="input-num" class="form-control" placeholder="Enter Number"
            aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-dark" type="submit" name="mySubmit" id="button-addon2">Top-Up</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </section>
</body>
</html>