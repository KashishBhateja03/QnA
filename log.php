<?php
error_reporting(0);
session_start();
include('config/config.php');
include('model/my_class.php');
$obj = new QueryMaster();

if(isset($_POST['submit']))
{

   $fild_value=array("name"=>$_POST['username'],"email"=>$_POST['email'],"password"=>$_POST['pass']);
   $insert= $obj->insert_data($con,'user',$fild_value);
   if($insert)
   {
    echo "<script>window.location.href='log.php'</script>";
   }

}

if(isset($_POST['submit1']))
{
    $email=$_POST['email'];
    $pass= $_POST['pass'];
    $id="email='$email' AND password='$pass'";
    $select= $obj->select_data($con,'user','*',$id,'');
    $row=$select->fetch_assoc();
    $count = mysqli_num_rows($select);

    if($count==1)
    {
        $_SESSION['uid']=$row['id'];
        echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
     echo "<script>alert('Something went wrong')</script>";
     echo "<script>window.location.href='log.php'</script>";

    }

}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login, singup and recovery forms</title>
  <link rel="stylesheet" href="./stylelog.css">
</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <form class="vldform vldauth" method="POST">
    <h1>Log in</h1>
    <input class="vldform__textbox" type="text" name="email" placeholder="Email" required>
    <input class="vldform__textbox" type="password" name="pass" id="" placeholder="Password" required>
    <input class="vldform__button" type="submit" name="submit1" value="Log in">
    <p class="vldform__signup">Don't have account?
      <a class="vldform__signuplink" href="#" onclick="showregform()">Sign up</a>
    </p>
  </form>
  <form class="vldform vldreg" method="POST">
      <h1>Sign up</h1>
      <input class="vldform__textbox" type="text" name="username" placeholder="Name" required>
      <input class="vldform__textbox" type="email" name="email" id="" placeholder="Email" required>
      <input class="vldform__textbox" type="password" name="pass" id="" placeholder="Password" required>
      <input class="vldform__button" type="submit" name="submit" value="Sign up">
      <p class="vldform__signup">You already have account?
        <a href="#" onclick="showauthform()">Log in</a>
      </p>
  </form>

  <form class="vldform vldrecpass" action="recovery.php" method="POST">
    <h1>Password recovery</h1>
    <input class="vldform__textbox" type="email" name="email" id="" placeholder="Email" required>
    <input class="vldform__button" type="submit" value="Recovery">
  </form>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>