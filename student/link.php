<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="boostrap/js/bootstrap.bundle.min.js"></script>
    <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirm_password = document.getElementById("confirm_password").value;

      if (password != confirm_password) {
        alert("Passwords do not match!");
        return false;
      }
    }
  </script>
  
</head>
