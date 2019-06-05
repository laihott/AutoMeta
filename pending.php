<?php include 'functions.php'; ?>
<!DOCTYPE html>
<?php include 'navbar.php' ?>
<html>
<head>
	<title>AutoMeta</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
</head>
<body>

<div class="formheader"><h2>Reset email sent</h2></div>

	<form action="login.php" method="post">
        <hr>

        <div class="input-group">
		<p>
			We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
		</p>
	    <p>Please login into your email account and click on the link we sent to reset your password.</p>
        </div>
    </form>

    
</body>
</html>