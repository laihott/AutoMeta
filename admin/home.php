<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>
<!DOCTYPE html>
<?php include('../navbar.php')?>
<html>
<head>
	<title>AutoMeta - Admin Controls</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

	<div class="formheader">
		<h2>Welcome <?php echo $_SESSION['user']['username']; ?></h2>
		<h6>This is your homepage for admin controls.</h6>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					Logged in as:<br>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<a href="home.php?logout='1'" style="color:red; padding-left:10px;">logout</a>
						<br>
						&nbsp; <a href="create_user.php" style="color:darkgreen"> + add user</a><br>
						&nbsp; <a href="delete.php" style="color:#790200"> - delete user</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

</body>
</html>