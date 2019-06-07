<?php include('../functions.php');

if (!isAdmin()) {
	header('location: ../login.php');
}
?>
<!DOCTYPE html>
<?php include('../navbar.php');?>
<html>
<head>
	<title>AutoMeta - Admin/Delete User</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

	<div class="formheader">
		<h2>Admin - delete user</h2>
        <h6>Here you can delete a user. Other admins can't be deleted.</h6>
    </div>
	<form method="post" action="delete.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
            <button type="submit" class="dltbtn" name="delete_btn">Delete user</button>
		</div>
		<?php if (isset($_SESSION['delete'])) : ?> <!-- Show Cancel & Confirm deletion buttons if no errors were encountered -->
			<div class="input-group" style="text-align:center">
				<strong>Are you sure want to delete the user? This can't be undone.</strong><br>
				<button type="submit" class="cnclbtn" name="cncldlt">Cancel</button>
				<button type="submit" class="dltbtn2" name="cnfrmdlt">Confirm deletion</button>
			</div>
			<?php unset($_SESSION['delete']); ?>
		<?php endif ?>


		<a href="home.php" name="back">< Back to admin homepage</a>
    </form>

</body>
</html>