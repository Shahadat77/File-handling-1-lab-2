 <?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form Self</title>
</head>
<body>

	<h1>Registration Form Self</h1>

	<?php

		$firstNameErr = $lastNameErr = $genderErr = $emailErr = $userNameErr = $reemailErr = $passWordErr = "";
		$firstName = ""; 
		$lastName = ""; 
		$gender = "";
        $email = "";
        $userName = ""; 

		$reemail  = ""; 
		$passWord = "";

		


		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the first name properly";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the last name properly";
			}
			else {
				$lastName = $_POST['lname'];
			}

			if(empty($_POST['gender'])) {
				$genderErr = "Please select gender";
			}
			else {
				$gender = $_POST['gender'];
			}

			if(empty($_POST['email'])) {
				$emailErr = "Please fill up email properly";
			}
			else {
				$email = $_POST['email'];
			}
            
			if(empty($_POST['uname'])) {
				$userNameErr = "Please fill up the user name properly";
			}
			else {
				$userName . $_SESSION['uname'] = $_POST['uname'];
			}

			if(empty($_POST['reemail'])) {
				$reemailErr = "Please fill up recovery email properly";
			}
			else {
				$reemail = $_POST['reemail'];
			}

			if(empty($_POST['pass'])) {
				$passwordErr = "password can not be empty ";
			}
			else {
				$passWord . $_SESSION['pass'] = $_POST['pass'];
			}

			
		}
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		 
		 
		<h2>Basic Information: </h2>
		<fieldset>
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname" value="<?php echo $firstName; ?>"> 
		<p style="color:red"><?php echo $firstNameErr; ?></p>

		<br>

		<label for="lname">Last Name</label>
		<input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
		<p><?php echo $lastNameErr; ?></p>
		
		<br>
        <label for=" gender: ">Gender:</label> 
		<input type="radio" name="gender" id="male" value="gender">
		<label for="male">Male</label>

		<input type="radio" name="gender" id="female" value="gender">

		<label for="female">Female</label>
		<br>
		<label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>   
		</fieldset>

		<h2>User Account Information</h2>

		 <fieldset>
		 	<label for="uname">User Name:</label>
		<input type="text" name="uname" id="uname"> 
		 <p style="color:red"><?php echo $userNameErr; ?></p>
  
		<br>

		<label for="reemail">Recovery Email:</label>
		<input type="email" name="reemail" id="reemail">
		 <p><?php echo $reemailErr; ?></p> 
		
		<br>

		<label for="pass">Password:</label>
		<input type="password" name="pass" id="pass">
		  <p><?php echo $passWordErr; ?></p>
		 </fieldset>

		
		<input type="submit" value="Submit">

	</form>

	<?php
	extract($_REQUEST);


      $file=fopen("registrationformdata.txt", "a");

      fwrite($file, "First name :");
      fwrite($file, $firstName . "\n");
      fwrite($file, "Last name :");
      fwrite($file, $lastName . "\n");
      fwrite($file, "gender :");
      fwrite($file, $gender . "\n");
      fwrite($file, "Email :");
      fwrite($file, $email . "\n");

      fwrite($file, "User name :");
      fwrite($file, $userName . "\n");
      fwrite($file, "Recovery Email :");
      fwrite($file, $reemail . "\n");
      fwrite($file, "Password :");
      fwrite($file, $passWord . "\n");
      fclose($file);

	?>

</body>
</html>
