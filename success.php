<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		header('location: login.php');
	}

?>
<!DOCTYPE html>
<?php include('navbar.php') ?>
<html>
<head>
	<title>AutoMeta - User Profile</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

	<div class="formheader">
		<h2>Welcome <?php echo $_SESSION['user']['username']; ?></h2>
	</div>
	<div class="content">

	<!-- Notification for successful verifying of email address-->
	<?php if (isset($_SESSION['message'])): ?>
        <div class="error <?php echo $_SESSION['type'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>
        </div>
		<?php endif;?>		
		<!-- Notification for successful login -->
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
<!-- Notification if the user hasn't verified his/hers email address-->
		<?php if (!$_SESSION['verified']): ?>
          <div class="error">
            You need to verify your email address!
            Sign into your email account and click
            on the verification link sent to your e-mail address.
          </div>
        <?php else: ?>
          <button class="btn">I'm verified!!!</button>
        <?php endif;?>


		<!-- logged in user information -->
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="success.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

</body>
</html>