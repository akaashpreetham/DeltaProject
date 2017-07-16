<?php 

	include('Home.php');
	
	if(isset($_POST['PostButton'])&&!empty($_SESSION['username'])){
		$content=$_POST['PostContent'];
		$username=$_SESSION['username'];
		$connect=mysqli_connect('localhost','root','','project');
		$postQuery="INSERT INTO posts(post,username) VALUES('$content','$username');";
		mysqli_query($connect,$postQuery);
		header('location: Home.php');
	}

?>
