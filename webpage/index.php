<?php 
	$name_err = NULL;
	$email_err = NULL;
	$username_err = NULL;
	$password_err = NULL;
	$c_password_err = NULL;
	$date_err = NULL;
	$gender_err = NULL;
	$status_err = NULL;
	$address_err = NULL;
	$city_err = NULL;
	$post_code_err = NULL;
	$home_phone_err = NULL;
	$mobile_phone_err = NULL;
	$card_number_err = NULL;
	$card_date_err = NULL;
	$salary_err = NULL;
	$url_err = NULL;
	$gpa_err = NULL;

	$submitted = isset($_POST['submit']);
	if($submitted) {
		$name = 
		$_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$post_code = $_POST['post_code'];
		$home_phone = $_POST['home_phone'];
		$mobile_phone = $_POST['mobile_phone'];
		$card_number = $_POST['card_number'];
		$card_date = $_POST['card_date'];
		$salary = $_POST['salary'];
		$url = $_POST['url'];
		$gpa = $_POST['gpa'];

		// Validation
		// 1.Name
		if(empty($name) || strlen($name)<2 || is_numeric($name))
		   $name_err="Invalid name";
	 
		// 2.Email
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		if(preg_match($regex, $email))
			$email_err = "Invalid email format"; 

		// 3.Username
		if(!$username || !strlen($username)<5)
			$username_err = "Invalid username";

		// 4.Password
		if(!$password || !strlen($password)<8)
			$password_err ="Invalid password";

		// 5.Confirm Password
		if($password != $c_password)
			$c_password_err = "Wrong password";

		// 6.Date of Birth
		$reg="/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).[0-9]{4}$/";
		if(!preg_match($reg,$date)) 
			$date_err = "Invalid date format";

		// 7.Gender
		$gender = ucfirst(strtolower($gender));	// uppercase first letter
		if($gender != "Male" || $gender != "Female")
			$gender_err= "Invalid input";

		// 8.Marital Status
		$status = ucfirst(strtolower($status));
		if($status != "Single" || $status != "Married" || $status != "Divorced" || $status != "Widowed")
			$status_err = "Invalid input";

		// 9.Address
		if(empty($address))
			$address_err = "Address field is required";

		// 10.City
		if(empty($city))
			$city_err = "City field is required";

		// 11.Postal Code
		if(empty($post_code) || !strlen($post_code) == 6 || !is_numeric($post_code))
			$post_code_err = "Invalid input. Post Code must include 6 digit number";

		// 12.Home Phone
		if(empty($home_phone) || !strlen($home_phone) == 9 || !is_numeric($home_phone))
			$home_phone_err =  "Invalid input. Home phone number must include 9 digit number";

		// 13.Mobile Phone 
		if(empty($mobile_phone) || !strlen($mobile_phone) == 9 || !is_numeric($mobile_phone))
			$mobile_phone_err = "Invalid input. Mobile phone number must include 9 digit number";

		// 14.Credit Card Number
		if(empty($card_number) || !strlen($card_number) == 16 || !is_numeric($card_number))
			$card_number_err =  "Invalid input. Credit Card number must include 16 digit number";

		// 15.Card Expiry Date
		$reg="/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).[0-9]{4}$/";
		if(!preg_match($reg,$card_date)) 
			$card_date_err =  "Invalid date format";

		// 16.Monthly Salary 		
		$reg_salary = "/[1-9]{3},[0-9]{3}.[00-99]{2}/";
		if(!preg_match($reg_salary,$salary))
			$salary_err =  "Invalid input format submitted!";

		// 17.URL
		$reg_url =  "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
		if(empty($url) || !preg_match($reg_url,$website)) 
			$url_err = "Invalid URL";

		//18.GPA
		if(empty($gpa) || $gpa > 4.5 || $gpa < 0.0)
			$gpa_err = "Invalid input format submitted";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
			.error {color:red;}
		</style>
	</head>
	<body>
		<h1>Registration Form</h1>
		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		<hr/>
		
		<h2>Please, fill below fields correctly</h2>
		<form action="" method="post">
			<!-- 1. Name -->
			<label for="name">Name</label><br>
			<input type="text" name="name" required /><br>
			<span class="error"><?php echo $name_err .'<br>';?></span>
			<br>

			<!-- 2. Email -->
			<label for="email">Email</label><br>
			<input type="email" name="email" required /><br>
			<span class="error"><?php echo $email_err .'<br>';?></span>
			<br>
			
			<!-- 3. Username -->
			<label for="username">Username</label><br>
			<input type="text" name="username" required /><br>
			<span class="error"><?php echo $username_err .'<br>';?></span>
			<br>

			<!-- 4. Password -->
			<label for="Password">Password</label><br>
			<input type="password" name="password" required /><br>
			<span class="error"><?php echo $password_err .'<br>';?></span>
			<br>

			<!-- 5. Confirm Password -->
			<label for="c_password">Confirm Password</label><br>
			<input type="password" name="c_password" required /><br>
			<span class="error"><?php echo $c_password_err .'<br>';?></span>
			<br>

			<!-- 6. Date of Birth -->
			<label for="birth">Date of Birth</label><br>
			<input type="text" name="birthday" placeholder="dd.MM.yyyy" /><br>
			<span class="error"><?php echo $date_err .'<br>';?></span>
			<br>
			
			<!-- 7. Gender -->
			<label for="gender">Gender</label><br>
			<input type="text" name="gender"><br>
			<span class="error"><?php echo $gender_err .'<br>';?></span>
			<br>
			
			<!-- 8. Maritial Status -->
			<label for="status">Marital Status</label><br>
			<input type="text" name="status"><br>
			<span class="error"><?php echo $status_err .'<br>';?></span>
			<br>
			
			<!-- 9. Address -->
			<label for="address">Address</label><br>
			<input type="text" name="address" required /><br>
			<span class="error"><?php echo $address_err .'<br>';?></span>
			<br>
			
			<!-- 10. City -->
			<label for="city">City</label><br>
			<input type="text" name="city" required /><br>
			<span class="error"><?php echo $city_err .'<br>';?></span>
			<br>
			
			<!-- 11. Postal Code -->
			<label for="post_code">Postal Code</label><br>
			<input type="number" name="post_code" required /><br>
			<span class="error"><?php echo $post_code_err .'<br>';?></span>
			<br>
			
			<!-- 12. Home Phone -->
			<label for="home_phone">Home Phone</label><br>
			<input type="number" name="home_phone" required /><br>
			<span class="error"><?php echo $home_phone_err .'<br>';?></span>
			<br>
			
			<!-- 13. Mobile Phone -->
			<label for="mobile_phone">Mobile Phone</label><br>
			<input type="number" name="mobile_phone" required /><br>
			<span class="error"><?php echo $mobile_phone_err .'<br>';?></span>
			<br>
			
			<!-- 14. Credit Card Number -->
			<label for="card_number">Credit Card Number</label><br>
			<input type="number" name="card_number" required /><br>
			<span class="error"><?php echo $card_number_err .'<br>';?></span>
			<br>
			
			<!-- 15. Credit Card Expire Date -->
			<label for="card_date">Credit Card Expiry Date</label><br>
			<input type="text" name="card_date" placeholder="dd.MM.yyyy" required /><br>
			<span class="error"><?php echo $card_date_err .'<br>';?></span>
			<br>
			
			<!-- 16. Monthly Salary -->
			<label for="salary">Monthly Salary</label><br>
			<input type="number" name="salary" placeholder="UZS 000,000.00" required /><br>
			<span class="error"><?php echo $salary_err .'<br>';?></span>
			<br>
			
			<!-- 17. Website url -->
			<label for="url">Website url</label><br>
			<input type="url" name="url" required /><br>
			<span class="error"><?php echo $url_err .'<br>';?></span>
			<br>
			
			<!-- 18. Overall GPA -->
			<label for="gpa">Overall GPA</label><br>
			<input type="number" name="gpa" required /><br>
			<span class="error"><?php echo $gpa_err .'<br>';?></span>
			<br>

			<input type="submit" value="Register" name="submit">
		</form>
	</body>
</html>