<?php
	
	session_start();
	$username="";
	$email="";
	$errorsReg=array();
	$errorsLog=array();
	$connect=mysqli_connect('localhost','root','','Project');
	
	#Registration
	if(isset($_POST['submit'])){
		$username=mysqli_real_escape_string($connect,$_POST['usernameR']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$password1=mysqli_real_escape_string($connect,$_POST['password1']);
		$password2=mysqli_real_escape_string($connect,$_POST['password2']);
		$queryError=mysqli_query($connect,"SELECT * FROM UserInfo WHERE username='$username' OR email='$email'");
		if(mysqli_num_rows($queryError)>0){
			array_push($errorsReg,"Username/email already exists");
		}
		if($password1!=$password2){
			array_push($errorsReg,"The passwords do not match");
		}
		if(empty($username)){
			array_push($errorsReg,"Username is required");
		}
		if(empty($email)){
			array_push($errorsReg,"Email is required");
		}
		if(empty($password1)){
			array_push($errorsReg,"Password is required");
		}
		if(!count($errorsReg)){
			$password=md5($password1); 
			$queryRegister="INSERT INTO UserInfo (username,email,password) VALUES ('$username','$email','$password');";
			mysqli_query($connect,$queryRegister);
			$_SESSION['username']=$username;
			header('location: Home.php');
		}
	}

	#Logging In
	if(isset($_POST['login'])){
		$username=mysqli_real_escape_string($connect,$_POST['usernameL']);
		$password=mysqli_real_escape_string($connect,$_POST['password']);
		if(empty($username)){
			array_push($errorsLog,"Username is required");
		}
		if(empty($password)){
			array_push($errorsLog,"Password is required");
		}
		if(!count($errorsLog)){
			$password=md5($password);
			$queryLogin="SELECT * FROM UserInfo WHERE username='$username' AND password='$password';";
			$loginCheck=mysqli_query($connect,$queryLogin);
			if(mysqli_num_rows($loginCheck)==1){
				$_SESSION['username']=$username;
				header('location: Home.php');
			}
			else{
				array_push($errorsLog,"Check your username and password");
			}
		}
	}

	#Logging Out
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: Login.php');
	}

?>