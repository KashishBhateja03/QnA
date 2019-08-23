<?php
error_reporting(0);
session_start();
include('config/config.php');
include('model/my_class.php');
$obj = new QueryMaster();

if(isset($_POST['submit']))
{
   $p=$_SESSION['uid'];
   $p1="id='$p'";
   $select1=$obj->select_data($con,'user',"*",$p1,'');
   $row1 = $select1->fetch_assoc();

  $field=array("quest"=>$_POST['question'],"qtype"=>$_POST['Catergory'],"cby"=>$row1['name'],"con"=>date('Y/m/d'));
  $insert=$obj->insert_data($con,'question',$field);

  if($insert)
  {
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
        <li class="tab"><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>
  </nav><br><br>
 	<!-- Side Panel -->
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="jumbotron">
           <form  method="post">
             <h6><b>Please Type your Question to find more an more Answer</b></h6>
             <div>
             <input type="text" name="question" placeholder="Please enter your question here...">
              </div>
              <div class="form-group">
                <label for="sel1">Select Catergory:</label>
                    <select class="form-control" id="sel1" name="Catergory">
                    <option value="">Select</option>
                    <option value="Medical">Medical</option>
                    <option value="Technical">Technical</option>
                    <option value="Non-Tech">Non-Tech</option>
                    </select>
              </div>
              <div>
             <button type="submit" name="submit" class="btn btn-success">Add Question</button>
           </div>
           </form>
         </div>
      </div>
      
    </div>
    
  </div>

	
</body>
</html>