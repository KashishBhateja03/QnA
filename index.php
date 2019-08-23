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
        <li>    
                     <div class="search_box">
        <form action="SearchProduct.php" method="post">
            <input type="text" name="search" class="text_field" style="width: 80%;" placeholder="Search your question...">
            <button type="submit" name="submit1" class="search-btn btn--lg">Search Now</button>
        </form>
          </div>      
            </li>
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
      $select = $obj->select_data($con,'question',"*",'','');
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
      <?php } ?>
    </div>
</div>
</div>

</body>
</html>