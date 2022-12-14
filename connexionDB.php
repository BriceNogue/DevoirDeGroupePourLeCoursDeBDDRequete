<?php

    //session_start();
    $con = mysqli_connect("localhost","root","","commerce");
    $errors = array();
    $_SESSION['success'] = "";



    if(isset($_POST["reg_user"]))
    {

        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $locationId = mysqli_real_escape_string($con, $_POST['locationId']);
        $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
        $pwd_2 = mysqli_real_escape_string($con, $_POST['pwd_2']);

        // Ensuring that the user has not left any input field blank
        // error messages will be displayed for every blank input
        if (empty($firstname)) { array_push($errors, "Lirstname is required"); }
        if (empty($lastname)) { array_push($errors, "Lastname is required"); }
        if (empty($phone)) { array_push($errors, "Phone is required"); }
        if (empty($locationId)) { array_push($errors, "Location is required"); }
        if (empty($pwd)) { array_push($errors, "Password is required"); }
        if (empty($pwd_2)) { array_push($errors, "Confirm your password"); }

        if ($pwd != $pwd_2) {
            array_push($errors, "The two passwords do not match");
            // Checking if the passwords match
        }

        // If the form is error free, then register the user
        if (count($errors) == 0) {
            
            // Password encryption to increase data security
            //$pwd = md5($pwd);
            
            // Inserting data into table
            $query = "INSERT INTO users(firstname, lastname, phone, locationId, pwd) 
            VALUES ('$firstname','$lastname', '$phone','$locationId','$pwd')";
            
            mysqli_query($con, $query);

            // Storing username of the logged in user,
            // in the session variable
            $_SESSION['phone'] = $phone;
            
            // Welcome message
            $_SESSION['success'] = "You have sign in";
            
            // Page on which the user will be
            // redirected after logging in
            header('location: login.php');
            
        }

    }

    if(isset($_POST["log_user"]))
    {

   // Data sanitization to prevent SQL injection
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$pwd = mysqli_real_escape_string($con, $_POST['pwd']);

	// Error message if the input field is left blank
	if (empty($phone)) {
		array_push($errors, "Entrez votre numer");
	}
	if (empty($pwd)) {
		array_push($errors, "Entrez votre mot de passe");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		//$pwd = md5($pwd);
		
		$query = "SELECT * FROM users WHERE phone = $phone AND pwd = $pwd ";

		$results = mysqli_query($con, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if ($results){
			
			// Storing username in session variable
			$_SESSION['phone'] = $phone;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: index.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "phone or password incorrect");
		}
	}


    }



?>