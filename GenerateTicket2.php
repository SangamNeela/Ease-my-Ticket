<?php
session_start();
include('dbconn.php');
$uname=$_SESSION['username'];
$tid=$_GET['ticketIdValue'];
$sql2="SELECT * from ticket where id='$tid'";
$result2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
    while($z=mysqli_fetch_assoc($result2)){
        $name=$z['username'];
        $bunNumPlate=$z['bus_num_plate'];
        $source=$z['source'];
        $destination=$z['destination'];
        $count=$z['count'];
        $datee=$z['date'];
        $timee=$z['time'];
        $status=$z['status'];
        $fare=$z['fare'];
    }
}
$sql3="SELECT route_no from route where bus_num_plate='$bunNumPlate'";
$result3=mysqli_query($conn,$sql3);
$X=mysqli_fetch_assoc($result3);
$routeNo=$X['route_no'];
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


<div class="container">

    <div class="ticket basic">
        <p>Admit One</p>
    </div>
    <div class="ticket airline">
        <div class="top">
            <h1>EASEMYTICKET</h1>
            <div class="big">
                <p class="from" style="font-size:25px; margin-bottom:5px;"><?php echo $source;?></p>
                <p class="to" style="font-size:20px; margin-top:5px;"><i class="fas fa-arrow-right"></i><?php echo $destination;?></p>
            </div>
            <div class="top--side">
                <i class="fas fa-bus"></i>
                <p style="font-size:14px; margin-bottom:3px;"><?php echo $routeNo;?></p>
                <p style="font-size:14px;"><?php echo $bunNumPlate;?></p>
<!-- 			<p>San Diego</p> -->
            </div>
        </div>
    <div class="bottom" style="background-color:#e0e2e8;">
        <div class="column">
            <div class="row row-1">
            <p><span>Passenger</span><?php echo $name;?></p>
                <p><span>Ticket ID</span><?php echo $tid;?></p>
                <p class="row--right"><span>tickets</span><?php echo $count;?></p>
            </div>
            <div class="row row-2">
                <p><span>Board</span><?php echo $datee;?></p>
                <p class="row--center"><span>Fare</span><?php echo $fare;?></p>
                <p class="row--right"><span>Time</span><?php echo $timee;?></p>
            </div>
            <div class="row row-3" style="margin-left:25%;"><p><?php
            $sql="SELECT * from users where username='$uname'";
            $result9=mysqli_query($conn,$sql);
             if(mysqli_num_rows($result9)>0){
                 while($a=mysqli_fetch_assoc($result9)){
                    if ($a['username']==$uname){
                         echo '<img src="'.$a['photo'].'" alt="ntg" height="100px" width="100px">';
                     }
                 }
                }?></p>
                <!-- <p><span>Passenger</span><?php// echo $uname;?></p> -->
                <!-- <p class="row--center"><span>Seat</span>11E</p> -->
                <!-- <p class="row--right"><span>Group</span>3</p> -->
            </div>
           <strong> <label style="margin-left:80px;"><?php echo 'valid';?> </label></strong>
        </div>
    </div>
</div>
</div>
</body>
</html>