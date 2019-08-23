<?php 
session_start();
include('config/config.php');
include('model/my_class.php');

session_destroy();

echo "<script>window.location.href='index.php'</script>";
?>