<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>

	<style type="text/css">
		
		body{
			background-image: url(backg_image.JPG)
		}
		h1{
			color: #6695c1; text-shadow: -2px 3px 9px;
			padding-left: 10%; padding-top: 2%;
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
			padding-left: 12%
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
		
		h2{
			color: #black; text-shadow: -2px 3px 9px;
			padding-left: 15%;
			position: relative; 
			font-size: 35px
		}

	</style>
</head>


<body>


<form method="POST" action="">

	<h1>Sign in </h1><br>

	<div >
		<label>E-Mail:</label> <input type="email" name="e_mail"><br><br>
		<label>Password:</label> <input type="password" name="pass"><br><br>
	</div>

	<div class="submit_button">
		<input type="Submit" name="sub" value="Sign in" class="submit_button_inner"><br><br><br> 
	</div>

	<h4>New User? Sign up <a href="form.php"> Here </a>.</h4>

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

	if (isset($_POST['e_mail'])) {
	    $email = $_POST['e_mail'];
	    $passw = MD5($_POST['pass']);

	    $query = "SELECT * FROM users WHERE e_mail = '$email' 
	    		and password = '$passw' ";
	    
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		if($result->num_rows == 0) {
		    echo "Id not found";
		}else {
		    echo "<h2>Hello<h2> " . $row['firstname'] . " !";
		}

		$conn->close();
	}
	// Database ends
 ?>

</body>
</html>