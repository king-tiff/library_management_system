<?php include('../librarian/header.php'); ?>
<?php //include('session.php');
session_start();

// Check if session exists
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
  }
$username = $_SESSION['username'];
?>
<?php include('navbar.php'); ?>
<?php include('link.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">		
                       
				<?php include('../librarian/slider.php'); ?>
				
				
			</div>		
			</div>
		</div>
    </div>
<?php //include('footer.php') ?>