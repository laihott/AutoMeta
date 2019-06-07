<?php include 'functions.php'; ?>
<!DOCTYPE html>
<?php include 'navbar.php'; ?>
<html>
<head>
	<title>AutoMeta</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>


<div class="formheader">
    <h2>Enter a new password</h2>
</div>

	<form action="reset2.php" method="post">		
	<?php echo display_error(); ?>
        <hr>

		<!-- form validation messages -->
		<div class="input-group">
			<label>New password</label>
			<input type="password" name="new_pass">
		</div>
		<div class="input-group">
			<label>Confirm new password</label>
			<input type="password" name="new_pass_c">
		</div>
		<div class="input-group">
			<button type="submit" name="new_password" class="loginbtn">Submit</button>
		</div>
    </form>
    
</body>
</html>