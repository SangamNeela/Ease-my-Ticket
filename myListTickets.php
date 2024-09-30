<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: Login.php");
}
$uname=$_SESSION['username'];
include('dbconn.php');
$sql="SELECT * FROM ticket WHERE username = '".$uname."' order by id DESC";
$result=mysqli_query($conn,$sql);
?>
<html>
    <head>
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
        
        body{
            background-color:#E8E2E2;
        }
        h1 {
         padding-top: 35px;
        font-family: 'Montserrat', sans-serif;
         font-size: 3rem;
        }

        #btnTicket{
          margin-left:570px;
          margin-top:-90px;
          outline:2px solid blue;
          font-weight:bold;
        }
    </style>
    </head>
    <body>
    <h1>Booked Ticktes History</h1><br><br>
        <?php
        while($r=mysqli_fetch_assoc($result)){  ?>
        <div style="width:50%; margin-left:25%;">
        <ol class="list-group list-group">
         <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <?php
                $busnump=$r['bus_num_plate'];
                $sql1="SELECT * from route WHERE bus_num_plate= '$busnump'";
                $result1=mysqli_query($conn,$sql1);
                while($re=mysqli_fetch_assoc($result1)){
                  $routeNo=$re['route_no'];
                }
                ?>
                <?php $id=$r['id']?>
                <div class="fw-bold" style="margin-bottom:3px;"><?php echo $r['source']." ->".$r['destination']."\t(".$r['bus_num_plate']." , ".$routeNo.")"?></div>
                <p style="font-size: 16px; line-height: 0.5; color: #333;"><?php echo $r['date']." , ".$r['time']?></p>
                <p style="font-size: 16px; line-height: 0.5; color: #333;"><?php echo "Ticket id:".$r['id']?></p>
                <p style="font-size: 16px; line-height: 0.5; color: #333;"><?php echo "fare:".$r['fare']?></p>
                <span><p style="font-size: 16px; line-height: 0.5; color: #333;"><?php echo "<strong>status:".$r['status']."</strong>"?></p></span>
                <a href="GenerateTicket2.php?ticketIdValue=<?php echo $id?>"><button type="button" class="btn btn-outline-primary btn-md" id="btnTicket" name="<?php echo $r['id']?>">view-ticket</button></a>
                </div>
            <span class="badge bg-primary rounded-pill" ><?php echo $r['count'];?></span>
         </li>
       
        </ol>
       </div>
       <?php }?>
    </body>
</html>