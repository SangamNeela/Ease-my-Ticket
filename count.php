<?php
$_SESSION['count']=1;
    date_default_timezone_set('Asia/Kolkata');
	$t=time();
    $_SESSION['day']=date("d-m-y",$t);
    $_SESSION['timee']=date("H:i:s",$t);
?>