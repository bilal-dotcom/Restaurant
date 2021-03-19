<?php 
 include("connect.php");
 
session_destroy();
session_unset();
mysqli_close($connect);
echo "<script>window.location.href='index.php'; </script>";


?>
