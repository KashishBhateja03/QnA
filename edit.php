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
<div class="container">
	<div class="row">
			<div class="col s1 m2">
				<div class="jumbotron">
					<h4><b>Category</b></h4><br>
					<div style="margin-left: 20px;">
                    <a href="edit.php?action=Medical">Medical</a><br><br>
                    <a href="edit.php?action=Technical">Technical</a><br><br>
                    <a href="edit.php?action=Non-Tech">Non-Tech</a><br><br><br>
                   </div>
				</div>
			</div>
    <div class="col s3 ">
    		<?php 
       if($_GET['action']=="Medical")
       {
        $id1=$_GET['action'];
        $p="qtype='$id1'";
      $select = $obj->select_data($con,'question',"*",$p,'');
      while($result = $select->fetch_assoc())
      {
	?>
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $result['qtype']; ?></span>
          <p><?php echo $result['quest']; ?></p>
          <h6>Asked By:<?php echo $result['cby'];?></h6>
        </div>
        <div class="card-action">
          <a href="ans.php?id=<?php echo $result['quest_id'];?>&&action=answer">Answer</a>
          <h6>Date : <?php echo $result["con"];?></h6>
        </div>
      </div>
      <?php } } ?>

          <?php 
       if($_GET['action']=="Technical")
       {
        $id2=$_GET['action'];
        $p1="qtype='$id2'";
      $select = $obj->select_data($con,'question',"*",$p1,'');
      while($result = $select->fetch_assoc())
      {
  ?>
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $result['qtype']; ?></span>
          <p><?php echo $result['quest']; ?></p>
          <h6>Asked By:<?php echo $result['cby'];?></h6>
        </div>
        <div class="card-action">
          <a href="ans.php?id=<?php echo $result['quest_id'];?>&&action=answer">Answer</a>
          <h6>Date : <?php echo $result["con"];?></h6>
        </div>
      </div>
      <?php } } ?>

          <?php 
       if($_GET['action']=="Non-Tech")
       {
        $id3=$_GET['action'];
        $p2="qtype='$id3'";
      $select = $obj->select_data($con,'question',"*",$p2,'');
      while($result = $select->fetch_assoc())
      {
  ?>
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $result['qtype']; ?></span>
          <p><?php echo $result['quest']; ?></p>
          <h6>Asked By:<?php echo $result['cby'];?></h6>
        </div>
        <div class="card-action">
          <a href="ans.php?id=<?php echo $result['quest_id'];?>&&action=answer">Answer</a>
          <h6>Date : <?php echo $result["con"];?></h6>
        </div>
      </div>
      <?php } } ?>
    </div>
</div>
</div>

</body>
</html>