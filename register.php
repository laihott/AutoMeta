<?php include('functions.php') ?>
<!DOCTYPE html>
<?php include('navbar.php') ?>		
<html>
<head>
	<title>AutoMeta - Register</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>
	<div class="formheader">
		<h2>Register to AutoMeta</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<hr>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="loginbtn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>