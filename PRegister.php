<?php include('SignIn.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>NITTER</title>
	<link rel="stylesheet" type="text/css" href="PStyleLogin.css">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
	<script src="jquery-3.2.1.min.js"></script>
	<script>
		/*$(document).ready(function(){
			$('#FieldL').hide();
			$('#ChoiceR').css("background-color","rgba(0,0,0,0.8");
			$('#ChoiceL').click(function(){
					$('#ChoiceL').css("background-color","rgba(0,0,0,0.8)");
					$('#ChoiceR').css("background-color","#003153");					
					$('#FieldR').hide();
					$('#FieldL').show();
				}
			);
			$('#ChoiceR').click(function(){
					$('#ChoiceR').css("background-color","rgba(0,0,0,0.8");
					$('#ChoiceL').css("background-color","#003153");	
					$('#FieldL').hide();
					$('#FieldR').show();
				}
			);
		});
	</script>
	<!--Make the site responsive and add <meta> tag-->
</head>
<body>
	<h1 id="NITTER"><a href="PRegister.php">Nitter</a></h1>
	<p id="About">ASK|ANSWER|SOCIALIZE</p>
	<div class="Form">
		<div id="Choice">
			<a href="#" id="ChoiceR">Register</a>
			<a href="#" id="ChoiceL">Login</a>
		</div>
		<form class="Fields" id="FieldR" method="post" action="<?php echo htmlspecialchars('PRegister.php');?>">
			<div class="formelements">
				<label>Username:</label>
				<input type="text" name="usernameR">
			</div>
			<div class="formelements">
				<label>Email:</label>
				<input type="text" name="email">
			</div>
			<div class="formelements">
				<label>Password:</label>
				<input type="password" name="password1">
			</div>
			<div class="formelements">
				<label>Confirm Password:</label>
				<input type="password" name="password2">
			</div>
			<div class="formelements">
				<button id="btn" name="submit">Sign Up</button>
			</div>
		</form>
		<form class="Fields" id="FieldL" method="post" action="<?php echo htmlspecialchars("PRegister.php");?>">
			<div class="formelements">
				<label>Username:</label>
				<input type="text" name="username">
			</div>
			<div class="formelements">
				<label>Password:</label>
				<input type="password" name="password">
			</div>
			<div class="formelements">
				<button id="btn" name="login">Log In</button>
			</div>
		</form>
	</div>
</body>
</html>