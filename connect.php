<?php
// Database credentials
$host = "localhost";
$db_name = "bus";
$username = "root";
$password = "";

// Create a MySQLi instance
$conn =mysqli_connect($host, $username, $password, $db_name);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: ");
}
else{
// Check if the form is submitted
    // Get the form data
    
    $filename=$_FILES["img-file"]["name"];
    $tempname=$_FILES["img-file"]["tmp_name"];
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);
	
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $DOB = $_POST['date_of_birth'];
    // USER NAME CREATION
    $username=$first_name.rand(1000,9999);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number, date_of_birth,username,balance,photo)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$DOB','$username',0,'$folder')";
    

    // Execute the statement
    if(mysqli_query($conn,$sql)) {
        $click_cont="You Have REGISTERED.Click Continue";
    } else {
        echo "Error: Could not add user. ";
    }
}
mysqli_close($conn);
?>
<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
        <title>User</title>
        <style>
             body {
             font-family: Arial, sans-serif;
             background-color: #E5D1FA;
            }
            .username{
            background-color: #F5EAEA;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 0 auto;
            }
            
         .ease{
        font-family: 'Sacramento', cursive;
        font-size:30px;
        }

         h3 {
         text-align: center;
        color: #333;
        }

        p{
        text-align: center;
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        }

        .highlight{
         background-color:yellow;
        }

        .my-button {
        text-align: center;
        background-color: #393053;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        }

        .my-button:hover {
        background-color: #635985;
        }
           
        </style>
    </head>
    <body>
            <div class="username">
            <span class="ease"><b>EaseMyTicket</b></span>
            <h3>You Are Now Connected With Us</h3>
           <p>Your UserName Is: <span class="highlight"> <?php echo"$username";?></span></p>
           <div style="margin-left:200px;"> <a href="Login.php" alt=""><button type="button" class="my-button">Continue</button></a></div>
        </div>
    </body>

</html>