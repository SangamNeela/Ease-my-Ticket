<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: Login.php");
  }
if(isset($_POST['generate']) && isset($_POST['select1']) && isset($_POST['select2'])){
    $count=$_SESSION['count'];
    $from=$_POST['select1'];
	$to=$_POST['select2'];
    $_SESSION['to']=$to;
    $numoftickets=$_POST['select3'];
	$uname= $_SESSION['username'];
    // echo $uname;
    $busplatenum=$_SESSION['busplatenum'];
	// date_default_timezone_set('Asia/Kolkata');
	// $t=time();
	// $day=date("d-m-y",$t);
	// $timee=date("H:i:s",$t);
    
    $busno=$_SESSION['route_no'];
    include ("dbconn.php");
    $sql="SELECT * FROM users WHERE username= '".$uname."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($n=mysqli_fetch_assoc($result)){
            $balance =$n['balance'];
        }
    }
    $sql9="SELECT * FROM users WHERE username= '".$uname."'";
    $result9=mysqli_query($conn,$sql9);

    

    //to calculate the fare 
    $sql1="SELECT r.stop_order,s.name fROM route_details AS r LEFT JOIN stops AS s ON r.stop_id=s.id AND r.route_no='$busno' where s.name='$from'";
    $re=mysqli_query($conn,$sql1);
    while($obj=mysqli_fetch_array($re))
    {
        $fromsn=$obj['stop_order'];
    }
    $sql1="SELECT r.stop_order,s.name fROM route_details AS r LEFT JOIN stops AS s ON r.stop_id=s.id AND r.route_no='$busno' where s.name='$to'";
    $re=mysqli_query($conn,$sql1);
    while($obj=mysqli_fetch_array($re))
    {
        $tosn=$obj['stop_order'];
    }
     $fromsn=$fromsn-$tosn;
     if($fromsn<0){
         $fromsn=-1*$fromsn;
     }
    $fromsn=$fromsn*5*$numoftickets;

    // check wheather the balance is sufficient with user
    
     if($balance<$fromsn){
        $_SESSION['Bal_NA']=1;
        header("Location: Wallet.php");
     }
    else{
        if($count==0){
            include('count.php');
            $day=$_SESSION['day'];
            $timee=$_SESSION['timee'];
            $sql2="INSERT INTO ticket(username,bus_num_plate,source,destination,count,date,time,status,fare) VALUES('$uname','$busplatenum','$from','$to','$numoftickets','$day','$timee','valid','$fromsn')";
            $result2=mysqli_query($conn,$sql2);
            //updating balance after the ticked is booked
            $balance=$balance-$fromsn;
            $sql7="UPDATE users SET balance='$balance' where username='$uname'";
            mysqli_query($conn,$sql7);
            echo '<script>alert("deductted")</script>';
            
            }
    }
    
    //to fetch ticket id
    $sql3="select * from ticket";
    $result3=mysqli_query($conn,$sql3);
    while($x=mysqli_fetch_assoc($result3))
    {
        $tid=$x['id'];
    }


    $day=$_SESSION['day'];
    $timee=$_SESSION['timee'];
}
?>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Sacramento&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
		*{
			text-decoration: none;
		}
		.navbar{
			background: #e0e2e8;
      font-family: 'Sacramento',cursive;
      padding-right: 15px;
      padding-left: 15px;
      font-color:black;
		}
		.navdiv{
			display: flex;
      align-items: center;
      justify-content: space-between;
		}
		.logo a{
			font-size: 35px;
      font-weight: 600;
      color: black;
		}
		
		button{
			background-color:#ffcc05 ;
      margin-left: 10px;
      border-radius: 10px;
      border:1px solid;

      padding: 10px;
      width: 150px;
		}
		button a{
			color: black;
      font-weight: bold ;
      font-size: 15px;
		}
	</style>
</head>
<body>
<div class="container">
<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="#">EaseMyTicket</a> </div>
			<ul>
				<button><a href="UserHomePage.php">BACK TO HOME</a></button>
			</ul>
		</div>
	</nav>
    <div class="ticket basic">
        <p>Admit One</p>
    </div>
    <div class="ticket airline" style="margin-top:20px;">
        <div class="top">
            <h1>EASEMYTICKET</h1>
            <div class="big">
                <p class="from" style="font-size:25px; margin-bottom:5px;"><?php echo $from;?></p>
                <p class="to" style="font-size:20px; margin-top:5px;"><i class="fas fa-arrow-right"></i><?php echo $to;?></p>
            </div>
            <div class="top--side">
                <i class="fas fa-bus"></i>
                <p style="font-size:14px; margin-bottom:3px;"><?php echo $busno; ?></p>
                <p style="font-size:14px;"><?php echo $busplatenum; ?></p>
<!-- 			<p>San Diego</p> -->
            </div>
        </div>
    <div class="bottom" style="background-color:#e0e2e8;">
        <div class="column">
            <div class="row row-1">
            <p><span>Passenger</span><?php echo $uname;?></p>
                <p><span>Ticket ID</span><?php echo $tid; ?></p>
                <p class="row--right"><span>tickets</span><?php echo $numoftickets;?></p>
            </div>
            <div class="row row-2">
                <p><span>Board</span><?php echo $day;?></p>
                <p class="row--center"><span>Fare</span><?php echo $fromsn;?></p>
                <p class="row--right"><span>Time</span><?php echo $timee;?></p>
            </div>
            <div class="row row-3" style="margin-left:25%;"><p><?php
             if(mysqli_num_rows($result)>0){
                 while($a=mysqli_fetch_assoc($result9)){
                    if ($a['username']==$uname){
                         echo '<img src="'.$a['photo'].'" alt="ntg" height="100px" width="100px">';
                     }
                 }
                }?></p>
                <!-- <p><span>Passenger</span><?php echo $uname;?></p> -->
                <!-- <p class="row--center"><span>Seat</span>11E</p> -->
                <!-- <p class="row--right"><span>Group</span>3</p> -->
            </div>
           <strong> <label style="margin-left:80px;color:green;font-family:arial;margin-top:10px;"><?php echo 'Valid';?> </label></strong>
        </div>
    </div>
</div>
</div>
</body>
</html>