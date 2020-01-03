<?php
include('tmp/connection.php');

function login(){
	$err='';
	$password='';
	$uname='';
	global $conn;
	if(isset($_POST['login'])){
  		$password=$_POST['password'];
        $uname=$_POST['username'];
        $login="SELECT member_password,member_uname FROM members WHERE member_password='$password' AND member_uname='$uname'";
        $run_login=mysqli_query($conn,$login);
        $check_admin=mysqli_num_rows($run_login);
        
        if($check_admin==0){
            $err= "Invalid credentials.Try again";
        }
        elseif($check_admin==1){
            $_SESSION['admin']=$uname;
            header("location:index.php?name=".$uname);
        }
            
    }
}
login();

