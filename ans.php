<?php
error_reporting(0);
session_start();
include('config/config.php');
include('model/my_class.php');
$obj = new QueryMaster();
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
        <li><a href="logout.php">Logout</a></li>
        <?php
         }
         else
         {
        ?>
        <li><a href="log.php">Login</a></li>
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
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li>
  </ul>
<!--
  <div id="test1" class="col s12">Test 1</div>
  <div id="test2" class="col s12">Test 2</div>
  <div id="test3" class="col s12">Test 3</div>
  <div id="test4" class="col s12">Test 4</div>
 -->
	<!-- Side Panel -->
<?php 
if($_GET['action']=="answer")
{
 $id=$_GET['id'];
 $id1="quest_id='$id'";
 $select=$obj->select_data($con,'question',"*",$id1,'');
 $result=$select->fetch_assoc();



if(isset($_POST['submit']))
{
  $field= array("ans"=>$_POST['ans'],"quest_id"=>$id);
  $insert = $obj->insert_data($con,'answer',$field);
  if($insert)
  {
    echo "<script>alert('Your answer is added successfully..!!')</script>";
    echo "<script>window.location.href='index.php'</script>";
  }
}
$v = 0;
?>

	 <div class="row card">
    <div class="col s12 m8">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $result['qtype']; ?></span>
          <p><?php echo $result['quest']; ?></p>
        </div>
        <?php
        $select1 = $obj->select_data($con,'answer',"*",$id1,'');
        while($result1=$select1->fetch_assoc())
        {
        ?>
        <div>
          <p><?php echo "Answer is:", $result1['ans']; ?></p>
        </div>
        <?php } ?>
        <form method="post">
        <div class="form-group">

          <label for="comment">Submit Your Answer:</label>
            <textarea class="form-control" rows="5" id="comment" name="ans"></textarea>
          </div>
        <div class="card-action">
          <?php 
           if(isset($_SESSION['uid']))
           {
           ?>
            <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
            </button> 
          <?php }
           else
           {
           ?>
            <h6><b>IF you have to Submit your Answer Than Click Here to <a href="log.php">Login</a></b></h6>
         <?php } ?>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php } ?>



</body>
</html>