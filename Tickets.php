<!DOCTYPE html>
<?php
            session_start();
            if(!isset($_SESSION['username'])){
              header("Location: Login.php");
            }
            include ("dbconn.php");
            $_SESSION['count']=0;
?>
<html>

<head>
  <title>QR Code Scanner</title>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- including script -->
  <style>

    body {
      background-color: #E8E2E2;
    }

    #preview {
      height: 155px;
      width: 300px;
    }
    

    input[type="text"] {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 30px;
      margin-top: 20px;
      box-sizing: border-box;
      font-size: 16px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 5px;
      color:black;
    }

    img {
      height: 300px;
      width: 707.6px;
    }
    .img2{
      height: 352px;
      width: 707.6px;
    }
    .img-card-header{
      padding: 0px;
    }
    .card-first{
      background-image: url('pexels-sultan-raimosan-6307071.jpg');
      
    }
    button[type="submit"] {

      margin-bottom: 10px;
      padding-top:3px;
    }

    #first {
      padding-left:60px;
      padding-bottom:60px;
      padding-right:60px;
      padding-top:20px;
    }
    #second{
      padding-left:60px;
      padding-bottom:60px;
      padding-right:60px;
      padding-top:20px;
    }
    .highlight {
  border: 2px solid red;
}
  </style>
</head>

<body>
<label name="my-paragraph" style="text-align:center;display:block; margin:0px; color:grey;">scan or enter bus number manually</label>
<script>
  document.getElementById("info")/innerHTML="";
  </script>

  <section id="first">
    <div class="row">
      <div class="col-lg-6">
        <div class="card text-bg-dark">
     <img src="pexels-тамара-левченко-5420712.jpg" class="card-img" alt="#">
     <div class="card-img-overlay">
       <label style="margin:0px; color:#FFDC34">scan here your QR:</label>
        <video id="preview"></video>
       <div class="card-body">
       <strong><p id="output" style="margin-bottom:3px;"></p></strong>
        <button class="btn btn-lg btn-outline-warning" id="start-btn">Start Camera</button>
        <button class="btn btn-lg btn-outline-warning" id="stop-btn">Stop Camera</button>
       </div>
       </div>
       
  </div>
      </div>
  <!-- script -->


      <div class="col-lg-6">
        <div class="card" style="background-color:#F0FFC2;">
          <div class="card-header" >
            <label >Enter BUS PLATE NUMBER Manually:</label>
          </div>
          <div class="card-body ">
          
            <form method="POST" >
              <input placeholder="Eg:AP13Z1234" type="text" id="mytext" name="my-text" >
              <div class="d-grid gap-2 col-6 mx-auto">
              <button type="SUBMIT" name="mysubmit" class="btn btn-lg btn-outline-dark">submit</button>  <br><br>
            </form>
            
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <hr><label name="my-paragraph" style="text-align:center;display:block; margin:0px; color:red; font-size:20px;" id="info"></label>
  
<!-- section 2 -->
  <section id="second">
    <div class="row" style="border:0px;">
      <div class="col">
        <div class="card" style="border:0px;">
           <div class="row">
             <div class="col" style="padding-right:0px;">
               <div class="card-header img-card-header" >
                 <img class="img2"src="pexels-sultan-raimosan-6307071.jpg" alt="#">
               </div>
             </div>
           <div class="col" style="background-color:#F0FFC2;">
             <div class="card-body">
               <label>Pick Point</label>
              <!-- select tag start with form-->
              
              <form action="GenerateTicket.php" method="POST">
              <select name="select1" class="form-select form-select-sm" aria-label=".form-select-sm example" >
              <option selected>Open this select menu</option>
                <?php
                if(isset($_POST['mysubmit'])){
                  echo '<script>
                  document.getElementById("info").innerHTML="Please choose source and destination";
                </script>';
                  $user_input=strtoupper($_POST['my-text']);
                  if(empty($_POST['my-text'])){
                    echo'<div class="alert alert-dark" role="alert">
                    PLEASE! Enter Bus Number
                  </div>';
                  }
                  // elseif($user_input!='288D' || $user_input!='2J'){}
                  else{
                    $user_input=strtoupper($_POST['my-text']);
                    $_SESSION['busplatenum']=$user_input;
                    $sql3="SELECT * fROM route WHERE bus_num_plate= '".$user_input."'";
                    $res=mysqli_query($conn,$sql3);
                    if(mysqli_num_rows($res)>0){
                      while($z=mysqli_fetch_assoc($res)){
                        $user_input=$z['route_no'];
                      }
                    }
                    $user_input=strtoupper($user_input);
                    if($user_input=='288D' || $user_input=='288K'){
                      $_SESSION['route_no']=$user_input;
                      echo $user_input;
                      $sql4="SELECT s.name from stops s LEFT JOIN route_details r ON s.id=r.stop_id WHERE r.route_no='$user_input' ORDER BY r.stop_order ASC";
                     $result = mysqli_query($conn, $sql4);
                     while($s=mysqli_fetch_assoc($result))
                   {
                   ?>
                <option value="<?php echo $s['name']; ?>"><?php echo $s['name']; ?></option>
                <?php }} }}?>
              </select>
               <label>Drop Point</label>
               <select name="select2" class="form-select form-select-sm" aria-label=".form-select-sm example" >
                 <option selected>Open this select menu</option>
                 <?php
                   if(isset($_POST['mysubmit'])){
                    if(empty($_POST['my-text'])){
                      echo'<div class="alert alert-dark" role="alert">
                      PLEASE! Enter Bus Number
                    </div>';
                    }
                    // elseif($user_input!='288D' || $user_input!='2J'){}
                    else{
                      $user_input=strtoupper($_POST['my-text']);
                      $sql3="SELECT * fROM route WHERE bus_num_plate= '".$user_input."'";
                      $res=mysqli_query($conn,$sql3);
                      if(mysqli_num_rows($res)>0){
                        while($z=mysqli_fetch_assoc($res)){
                          $user_input=$z['route_no'];
                        }
                      }
                       $user_input=strtoupper($user_input);
                      if($user_input=='288D' || $user_input=='288K'){
                       $result2 = mysqli_query($conn, $sql4);
                       while($r=mysqli_fetch_assoc($result2))
                     {
                  ?>
                  <option value="<?php echo $r['name']; ?>"><?php echo $r['name']; ?></option> 
                  <?php }}}} ?>
                      
              </select>
              <label>Enter number of Tickets</label>
              <select name="select3" style="width:25%;"class="form-select" aria-label="Default select example" requried>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              </select>
               <br>
                <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" name='generate' class="btn btn-lg btn-outline-dark ">Generate Ticket</button>
                </div>
                </form>
            </div>
         </div>
      </div>
    </div>
   </div>
 </div>
</section>

</body>
<script src="scanner.js"></script>
</html>