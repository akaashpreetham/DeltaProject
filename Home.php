<?php

	include('SignIn.php');
	if(empty($_SESSION['username']))
		header('location: PLogin.php');

?>

<!DOCTYPE html>

<html>

	<head>

		<title>NITTER | <?php echo $_SESSION['username'];?></title>
		<link rel="stylesheet" type="text/css" href="StyleHome.css">
		<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
		<!--Insert jQuery code to hide events

		<script src="jquery-3.2.1"></script>
		<script>

			$(document).ready(function(){
			    $("#hide").click(function(){
			        $("#Events").hide();
			        $("#EventsHead").show();
			        $('#hide').show();
			    });
			});

		</script>-->
		<!--Password security, Notifications-->

	</head>

	<body>

		<div id="TopPanel">

			<div id="Logo">

				<a href="Home.php">N</a>

			</div>

			<div id="Description">

				<p>Ask questions. Plan events. Stay connected.</p>
				<h3><?php echo $_SESSION['username'];?></h3>

			</div>

			<div id="LogoutDiv">

				<button id="Logout" name="logout"><a href="Home.php?logout='1'">Logout</a></button>

			</div>

		</div>

		<div id="QuestionBox">

			<form method="post" action="<?php echo htmlspecialchars('Home.php');?>">
				<h3>What's up, <span><?php echo $_SESSION['username'];?></span>?</h3>
				<textarea name='PostContent'></textarea>
				<button name='PostButton'>Post</button>
			</form>

		</div>

		<div id="Events">

			<h2 id="EventsHead">Events</h2>
			<div id="AddEvent">

				<textarea></textarea>
				<button>Add Event</button>

			</div>

		</div>

		<?php

			if(isset($_POST['PostButton'])&&!empty($_POST['PostContent'])){
				$content=$_POST['PostContent'];
				$username=$_SESSION['username'];
				$connect=mysqli_connect('localhost','root','','project');
				$postQuery="INSERT INTO posts(post,username) VALUES('$content','$username');";
				mysqli_query($connect,$postQuery);
			}

		?>


		<?php

			$connection=mysqli_connect('localhost','root','','project');
			$postCheck=mysqli_query($connection,"SELECT post,posttime,username FROM posts ORDER BY posttime DESC;");
			while($postResult=mysqli_fetch_array($postCheck)){

				$post=$postResult['post'];
				$un=$postResult['username'];
				$postTime=$postResult['posttime'];
				echo "<div class='post'><h2>$un</h2><h5>$postTime</h5><p>$post</p></div>";

			}

		?>

	</body>

</html>
