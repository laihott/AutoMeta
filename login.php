<?php include('functions.php') ?>
<!DOCTYPE html>
<?php include('navbar.php') ?>		
<html>
<head>
	<title>AutoMeta - Login</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

	<div class="formheader">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

			<!-- Notification for successful reset -->
			<?php if (isset($_SESSION['reset'])) : ?>
			<div class="success" >
				<h3>
				<?php 
				echo $_SESSION['reset']; 
				unset($_SESSION['reset']);
				?>
				</h3>
			</div>
			<?php endif ?>

		<?php echo display_error(); ?>

		<hr>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="loginbtn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
		<p>
		<a href="reset.php">Forgot your password?</a>
		</p>
		<p>
		<a href="resetname.php">Forgot your username?</a>
		</p>
	</form>

</body>
</html>