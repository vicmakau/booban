<?php

session_start();

if(isset($_SESSION["member_email"]))

{
	unset($_SESSION["member_email"]);

		header("location:index.php");

		exit();
}

