<?php include('functions.php'); ?>
<!DOCTYPE html>
<?php include('navbar.php') ?>	
<html>
<head>
	<title>AutoMeta - Reset Password</title>
    <meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

<div class="formheader"><h2>Reset your password</h2>
</div>

	<form action="reset.php" method="post">
    <?php echo display_error(); ?>
        <hr>

		<div class="input-group">
			<label>Your email address</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<button type="submit" name="reset-password" class="loginbtn">Reset</button>
        </div>
		<a href="resetname.php">Forgot your username instead?</a>
    </form>

</body>
</html>