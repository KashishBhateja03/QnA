<?php
error_reporting(0);
session_start();
include('config/config.php');
include('model/my_class.php');
$obj = new QueryMaster();
if(isset($_POST['submit']))
{
   $field=array("name"=>$_POST['name'],"query"=>$_POST['query']);
   $insert=$obj->insert_data($con,'contact',$field);
   if($insert)
   {
    echo "<script>alert('we will contact You soon..!!')</script>";
    echo "<script>window.location.href='index.php'</script>";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>
    <link rel="stylesheet" href="style.css">
            
</head>
<body>
	<!-- Nav -->
	 <nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">QnA</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php
       if(isset($_SESSION['uid']))
       {
       ?>
        <li><a href="logout.php"><b>Logout</b></a></li>
        <?php
         }
         else
         {
        ?>
        <li><a href="log.php"><b>Login</b></a></li>
    <?php } ?>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="index.php">Home</a></li>
        <li class="tab"><a href="askquestion.php">Ask Question</a></li>
        <li class="tab"><a href="#test4">Contact Us</a></li>
      </ul>
    </div>
  </nav><br><br>
 	<!-- Side Panel -->
  <?php
 if(isset($_SESSION['uid']))
 {
   ?>
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="jumbotron">
           <form  method="post">
             <h6 align="center"><b>Contact Us</b></h6>
             <div>
               <input type="text" name="name" placeholder="enter your name...">
             </div>
             <div>
             <input type="text" name="query" placeholder="Please enter your query...">
              </div>
              <div>
             <button type="submit" name="submit" class="btn btn-success">Submit</button>
           </div>
           </form>
         </div>
      </div>
      
    </div>
    
  </div>
<?php }
else
{
 ?>
<h6 align="center"><b>IF you want to contact than please <a href="log.php">Login</a></b></h6>

<?php } ?>

	
</body>
</html>