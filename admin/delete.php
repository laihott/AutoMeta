<?php include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}
?>
<!DOCTYPE html>
<?php include('../navbar.php');?>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

	<div class="formheader">
		<h2>Admin - delete user</h2>
        <h6>Here you can delete a user. Admins can't be deleted.</h6>
    </div>
	<form method="post" action="delete.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
            <button type="submit" class="dltbtn" name="delete_btn">Delete user</button>
		</div>
    </form>

</body>
</html>