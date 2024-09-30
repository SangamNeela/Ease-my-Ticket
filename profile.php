
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<style>
				                
body{margin-top:20px;}
.avatar{
width:200px;
height:200px;
border-radius:300px;
}	
#top{
  display:flex;
}
#anchor{
  text-deccoration:none;
}
#top button a{
  text-decoration:none;
  
  
  color:white;
  font-weight:bold;
}
#top button{
  
  border-radius:10px;
}
</style>






</head>
<?php
session_start();
$user=$_SESSION['username'];
$c=mysqli_connect('localhost','root','','bus');
$q="select * from users where username='$user'";
$d=mysqli_query($c,$q);
while($o=mysqli_fetch_array($d))
{
echo '
<div class="container bootstrap snippets bootdey">
    <div id="top">
    <h1 class="text-primary">My Profile</h1>
    <button style="margin-left:72%;" class="btn btn-primary"><a id="anchor" href="UserHomePage.html">Back to Homepage</a></button>
    </div>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src='.$o['photo'].' class="avatar img-circle img-thumbnail" alt="avatar">
     
          
          <input type="file" class="form-control" style="margin-top:7.5%;">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      
      

        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">User name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value='.$o['username'].' readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value='.$o['first_name'].'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value='.$o['last_name'].'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date Of Birth:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" value='.$o['date_of_birth'].'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" value='.$o['email'].' id="ema" onchange="fun2()">
              <p id=emaveri> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mobile No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value='.$o['phone_number'].'>
            </div>
          </div>
	        <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value='.$o['password'].'>
            </div>
          </div>
	<div>
	<br/>
	<input type="reset" class="btn btn-danger" value="Reset"/>
	<input type="submit" class="btn btn-primary" value="Update" />

	</div>

         
          </div>
        </form>
      </div>
  </div>
</div>
<hr>';
}
?>