<?php 
	include ('dbconnection.php');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array();

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the delete() function if delete_btn is clicked
	if (isset($_POST['delete_btn'])) {
		delete();
	}


	// call the login() function if register_btn is clicked
	// call the login() function if login_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

	// Checks if the username and email already exist in the database
		if (count($errors) == 0) {
		$query = "SELECT * FROM users WHERE username='$username'";
		$results = mysqli_query($db, $query);
		$query2 = "SELECT * FROM users WHERE email='$email'";
		$results2 = mysqli_query($db, $query2);
		// Checks if the username exists
		if (mysqli_num_rows($results) >= 1) {
			array_push($errors, "The username already exists. Please choose another one.");
	}	// Checks if the email exists
		if (mysqli_num_rows($results2) >= 1) {
			array_push($errors, "This email is already registered to AutoMeta.");
		}
	}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
//			$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database
			$password = md5($password_1);
			$token = bin2hex(random_bytes(50)); // generate unique token

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, token, user_type, password) 
						  VALUES('$username', '$email', '$token', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: /admin/home.php');
			}else{
				$query = "INSERT INTO users (username, email, token, user_type, password) 
						  VALUES('$username', '$email', '$token', 'user', '$password')";
				mysqli_query($db, $query);


				
				if ($query) { 										//Comment out if testing logging in without sending e-mail
					// Send verification email to user
					sendVerificationEmail($email, $token);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				$_SESSION['verified'] = FALSE;
				header('location: /success.php');			

					header('location: /success.php');
				} else {
					$_SESSION['error_msg'] = "Database error: Could not register user";
				}													//End of comment for testing logging in without e-mail

				}

		}

	}

	
///////////////////////////////////////////////////////////////////////////////
	// DELETE EXISTING USER
	function delete(){
		global $db, $errors;

		// receive all input values from the form
		$username = e($_POST['username']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}

	// Checks if the username exists and if the user is an admin
		if (count($errors) == 0) {
		$query = "SELECT * FROM users WHERE username='$username'";
		$results = mysqli_query($db, $query);
		$query2 = "SELECT * FROM users WHERE username='$username' && user_type='user'";
		$results2 = mysqli_query($db, $query2);
		// Checks if the username exists
		if (mysqli_num_rows($results) == 0) {
			array_push($errors, "Username doesn't exist.");
		}
		elseif (mysqli_num_rows($results2) == 0) {
			array_push($errors, "<strong><i style='color:black'>$username</i>&nbsp is an admin. Admins can't delete other admins.</strong>");
		}
	}
		if (count($errors) == 0) {
			$_SESSION['delete'] = TRUE;
			$_SESSION['deletename'] = $username;
		}
	}

	// Delete the user if "Confirm deletion" button is clicked
	if (isset($_POST['cnfrmdlt'])) {
			$username = $_SESSION['deletename'];
			$query1 = "DELETE FROM users WHERE username='$username'";
			mysqli_query($db, $query1);
			array_push($errors, "<strong style='color:green'>User <i style='color:black'>$username</i> deleted successfully.</strong>");
	}

		// Delete user if there are no errors
	/*	if (count($errors) == 0) {
				$query = "DELETE FROM users WHERE username='$username'";
				mysqli_query($db, $query);
				array_push($errors, "<strong style='color:green'>User <i style='color:black'>$username</i> deleted successfully.</strong>");
		} */

	
//////////////////////////////////////////////////////////////////////////////////


	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password1 = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password1' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					$_SESSION['verified'] = TRUE;  // <--This sets admin as verified user without the email verification
					header('location: /admin/home.php');		  
				}elseif ($logged_in_user['user_type'] == 'user') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: /success.php');
					// checks if logged in basic user is verified
						if ($logged_in_user['verified'] == '0') {
							$_SESSION['verified'] = FALSE;
							$_SESSION['email'] = 'email';
						}
						else {
							$_SESSION['verified'] = TRUE;
						}
				}
				else {
					array_push($errors, "error message for debugging");
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		} else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

// Check if user is logged in as admin or basic user or not at all, and display the ADMIN/USER button or nothing
	function usradmn() {
			$admnbtn = '<a href="/admin/home.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">ADMIN</a>'; // Admin button
			$usrbtn = '<a href="/success.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">USER</a>'; // Admin button
			if (isAdmin() == true){
				echo $admnbtn;
			}
			elseif (isLoggedIn() == true){
				echo $usrbtn;
			}
			else {
			}
		}

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($db, $query);
  
    if (empty($email)) {
      array_push($errors, "Email is required");
    }else if(mysqli_num_rows($results) <= 0) {
      array_push($errors, "Sorry, $email is not associated with any user.");
    }
    // Fetch the token used in verifying the user's email
    $query2 = "SELECT token FROM users WHERE email='$email'";
    $results2 = mysqli_query($db, $query2);
//  $token = mysqli_fetch_assoc($results2);
  
    if (count($errors) == 0) {
        if (mysqli_num_rows($results2) > 0) {
            // output data of each row
        while($row = mysqli_fetch_assoc($results2)) {
             $token2 = $row["token"];

    }
    $to = $email;
    $subject = "Request to reset password";
	$msg = '
We have received a request to reset your password on AutoMeta. If you did not do this, you can just ignore this message.
If you did send the request, you can reset your password by clicking this link http://localhost/reset2.php?token=' . $token2 . ' or copy it into your browsers address bar.

Greetings,
the AutoMeta team
	';
    $headers = "From: AutoMeta@autometa.com" . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
}
    }
	}
	
	/*
  Send users forgotten username to them by email
*/
if (isset($_POST['forgotname'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	// ensure that the user exists on our system
	$query = "SELECT email FROM users WHERE email='$email'";
	$results = mysqli_query($db, $query);

	if (empty($email)) {
		array_push($errors, "Email is required");
	}else if(mysqli_num_rows($results) <= 0) {
		array_push($errors, "Sorry, $email is not associated with any user.");
	}
	// Fetch username associated with the email
	$query2 = "SELECT username FROM users WHERE email='$email'";
	$results2 = mysqli_query($db, $query2);

	if (count($errors) == 0) {
			if (mysqli_num_rows($results2) > 0) {
			while($row = mysqli_fetch_assoc($results2)) {
					 $name = $row["username"];

	}
	$to = $email;
	$subject = "Your username";
$msg = '
Hi!
You asked us to email your forgotten AutoMeta username to you. If you did not, you can ignore this message.
If you did, you are registered as ' . $name . ' into AutoMeta.

Greetings,
the AutoMeta team
';
	$headers = "From: AutoMeta@autometa.com" . "\r\n" .
'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $msg, $headers);
	header('location: pendingname.php?email=' . $email);
}
	}
}


// Resetting user's password
if (isset($_GET['token'])) {
    $_SESSION['token']=mysqli_real_escape_string($db,$_GET['token']);
}

if (isset($_POST['new_password'])) {
	$new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
	$token = $_SESSION['token'];

    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
	if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
	
    if (count($errors) == 0) {
      // select email address of user from the users table 
      $sql = "SELECT email FROM users WHERE token='$token' LIMIT 1";
      $results = mysqli_query($db, $sql);
      $email = mysqli_fetch_assoc($results)['email'];
		
	  // updating user's password to match the new one
      if ($email) {
        $new_pass3 = md5($_POST['new_pass']);
        $sql = "UPDATE users SET password='$new_pass3' WHERE email='$email'";
		$results = mysqli_query($db, $sql);
		$_SESSION['reset'] = "Password reset successful!<br>
		Log in with your new password.";
		header('location: login.php');

      }
    }
  }

?>