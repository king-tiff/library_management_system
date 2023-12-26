<?php

$con = new mysqli("localhost", "root", "", "eb_lms");

if ($con -> connect_errno) {
    echo "Failed to connect to mysql: ". $con -> connect_error;
    exit(); 
}


?>