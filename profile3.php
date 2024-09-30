<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
				                
body{margin-top:20px;
  background-color:#E8E2E2;

}
h1 {
         padding-top: 10px;
         color: green;
         /* font-family: 'Pacifico', cursive; */
         font-size: 3rem;
        }
.mypic{
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
  
  /* color:white; */
  font-weight:bold;
}
#top button{
  margin-left:1150px;
  margin-top:20px;
  border-radius:10px;
}
</style>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous


</head>
<?php
session_start();
$user=$_SESSION['username'];
$c=mysqli_connect('localhost','root','','test');

if($_GET['q']==0)
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$em=$_POST['em'];
$mobile=$_POST['mobile'];
$pwd=$_POST['pwd'];
$q="update users set first_name='$fname',last_name='$lname',email='$em',phone_number=$mobile,date_of_birth='$dob',password='$pwd' WHERE username='$user' ";
mysqli_query($c,$q);
}
$q="select * from users where username='$user'";
$d=mysqli_query($c,$q);
while($o=mysqli_fetch_array($d))
{
echo '
<div class="container bootstrap snippets bootdey">
    <div id="top">
    <h1 class="text-dark fw-bolder">My Profile</h1>
    <a id="anchor" href="UserHomePage.php"><button class="btn btn-outline-secondary">Back to Homepage</button></a>
    </div>
      <hr>
      
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src='.$o['photo'].' class="avatar img-circle img-thumbnail mypic" alt="avatar">
     
          <form action="updatephoto.php" method="post" name="registration-form"  enctype="multipart/form-data">
          <input type="file" name="img-file" required><br>

          <input type="submit" value="Submit">
</form>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      
      

        <h3>Personal info</h3>
        
       <form class="form-horizontal" role="form" action="profile2.php?q=0" method="GET">
          <div class="form-group">
            <label class="col-lg-3 control-label">User name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value='.$o['username'].' readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" value='.$o['first_name'].'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name=lname value='.$o['last_name'].'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date Of Birth:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" name=dob value='.$o['date_of_birth'].'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" value='.$o['email'].' id="ema" name=em onchange="fun2()">
              <p id=emaveri> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mobile No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name=mobile value='.$o['phone_number'].'>
            </div>
          </div>
	        <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name=pwd value='.$o['password'].'>
            </div>
          </div>
	<div>
	<br/>
	<input type="reset" class="btn btn-outline-danger" value="Reset"/>
	<a href="profile2.php?q=0"><input type="submit" class="btn btn-secondary" value="Update" /></a>

	</div>

         
          </div>
        </form>
      </div>
  </div>
</div>
<hr>';

}
?>