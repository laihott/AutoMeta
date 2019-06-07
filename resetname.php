<?php include('functions.php'); ?>
<!DOCTYPE html>
<?php include('navbar.php') ?>	
<html>
<head>
	<title>AutoMeta - Forgotten Username</title>
    <meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

<div class="formheader"><h2>Forgot your username?</h2>
<h6>Enter your email address and we will send you your username</h6>
</div>

	<form action="resetname.php" method="post">
    <?php echo display_error(); ?>
        <hr>

		<div class="input-group">
			<label>Your email address</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<button type="submit" name="forgotname" class="loginbtn">Send</button>
        </div>
        
        <a href="reset.php">Forgot your password instead?</a>
    </form>

</body>
</html>