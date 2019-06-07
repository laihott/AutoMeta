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
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: admin/home.php');
			}else{
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', 'user', '$password')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: success.php');				
			}

		}

	}

///////////////////////////////////////////////////////////////////////////////
	// DELETE EXISTING USER
	function delete(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);

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
		// Delete user if there are no errors
		if (count($errors) == 0) {
				$query = "DELETE FROM users WHERE username='$username'";
				mysqli_query($db, $query);
				array_push($errors, "<strong style='color:green'>User <i style='color:black'>$username</i> deleted successfully.</strong>");
		}

	}
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
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin/home.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: success.php');
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
		}else{
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
			$admnbtn = '<a href="admin/home.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">ADMIN</a>'; // Admin button
			$usrbtn = '<a href="success.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">USER</a>'; // Admin button
			if (isAdmin() == true){
				echo $admnbtn;
			}
			elseif (isLoggedIn() == true){
				echo $usrbtn;
			}
			else {
			}
		}

?>