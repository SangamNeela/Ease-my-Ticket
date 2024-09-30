<?php
session_start();
$name=$_SESSION["name"];
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
              <a class="nav-link" href="AdminHomePage.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="CheckTickets.php">Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Profile</a>
            </li>
          </ul>
        </div>
      </nav>

      <!--     GRID OF IMAGE AND H1 TAG -->
      <div class="row">

        <div class=" col-lg-6">
          <h1>Welcome to EaseMyTicket </h1>
          <a href="CheckTickets.php"><button class="btn btn-outline-primary btn-lg" type="button">Check Tickets</button></a>
          <h1>Welcome <?php echo $name;?></h1>
        </div>

        <div class="  col-lg-6">
          <img src="pexels-ricardo-esquivel-2496606.jpg" alt="not found">
        </div>

      </div>
    </div>
  </section>
</body>
</html>