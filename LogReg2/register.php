<?php
       
	define('HOST','den1.mysql5.gear.host');
    define('USER','userinformation1');
    define('PASS','Ox750!N-4Omp');
	define('DB','userinformation1');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
    $username = $_GET['username'];
	$password = $_GET['password'];
	
	$email = $_GET['email'];
	if ($username == '' || $password == '' || $email == '') {
		echo 'please fill all values';
	} else {
		$sql = "SELECT * FROM userinformation WHERE username='$username' OR email='$email'";
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		if (isset($check)) {
			echo 'username or email already exist';
		} else {
			$sql = "INSERT INTO userinformation (username,password,email) VALUES ('$username','$password','$email')";
			if (mysqli_query($con,$sql)) {
				echo 'successfully registered';	
			}
			else{
				echo "Error description: " . mysqli_error($con);
				//echo mysqli_query($con,$sql) . "oops! Please try again!" . "password=" . $password . "username=" . $username . "email=" . email;
		
			}
		}
		
		mysqli_close($con);
	}