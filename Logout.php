<?php
session_start();
session_destroy();
echo("<script>location.href = './Login.php';</script>");
// header("Location:Login.php");
?>