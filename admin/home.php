<!DOCTYPE html>
<html>
<head>
	<title>yty</title>
</head>
<body>
<h1>Home page</h1>
 <?php
        if(isset($_GET['email'])){
          $mail=$_GET['email'];
          echo $mail;
        }
       ?>
</body>
</html>