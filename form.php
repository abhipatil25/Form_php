<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<style type="text/css">
		
		body{
			background-image: url(backg_image.JPG)
		}
		h1{
			color: #6695c1; text-shadow: -2px 3px 9px;
			padding-left: 2%; padding-top: 2%;
			position: relative; 
			font-size: 45px
		}
		label{
			display: inline-block;
			color: #46aba5;
			padding-left: 4%;
			width: 80px
		}
		h4{
			color: #065F5A;
			padding-left: 9%
		}
		input {
			background: #fff;
			color: #525865;
			border-radius: 4px;
			border: 1px solid #d1d1d1;
			box-shadow: inset 1px 2px 8px rgba(0, 0, 0, 0.07);
			font-family: inherit;
			font-size: 1em;
			line-height: 1.45;
			outline: none;
			padding: 0.6em 1.45em 0.7em;
			-webkit-transition: .18s ease-out;
			-moz-transition: .18s ease-out;
			-o-transition: .18s ease-out;
			transition: .18s ease-out;
		}
		input:hover {
			box-shadow: inset 1px 2px 8px rgba(0, 0, 0, 0.02);
		}
		input:focus {
			color: #4b515d;
			border: 1px solid #B8B6B6;
			box-shadow: inset 1px 2px 4px rgba(0, 0, 0, 0.01), 0px 0px 8px rgba(0, 0, 0, 0.2);
		}
		.submit_button{
			position: relative;
			padding-left: 40ex;
			padding-top: 15px
		}
		.submit_button_inner {
			font-size: 20px;
			color: #black;
		}
		a:active{
			background-color: white
		}
		a:link{
			color: black;
			text-decoration: underline
		}		
		a:visited{
			color: #A3ABAA
		}

	</style>
</head>


<body>

<form method="POST" action="">

	<h1>REGISTRATION FORM</h1><br>

	<div >
		<label>First Name:</label> <input type="text" name="f_name" ><br><br>
		<label>Last Name:</label> <input type="text" name="l_name"><br><br>
		<label>E-Mail:</label> <input type="email" name="e_mail"><br><br>
		<label>Password:</label> <input type="password" name="pass"><br><br>
	</div>

	<div class="submit_button">
		<input type="Submit" name="sub" class="submit_button_inner"><br><br><br> 
	</div>

	<h4>Already Registered? Sign in <a href="form sign in.php">Here</a>.</h4>
	
	<p style="font-size: 13px;position: absolute; bottom: 5px">&copy abhishek 2018</p>

</form>

<?php 

	// Database starts
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "abhi_users";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection Failed: " . $conn->connect_error);
	}

	if (isset($_POST['f_name'])) {
		$fname = $_POST['f_name']; 
	    $lname = $_POST['l_name'];
	    $passw = MD5($_POST['pass']);
	    $email = $_POST['e_mail'];

		$sql = "INSERT INTO users (firstname, lastname, password, e_mail)
		VALUES ('$fname', '$lname', '$passw', '$email')";

		if(mysqli_query($conn, $sql)){
			echo("<h1>Thankyou for registration !<h1>");
		}else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	// Database ends
 ?>

</body>
</html>