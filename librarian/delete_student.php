<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($con,"delete from member where member_id='$id'");
header('location:member.php');
?>