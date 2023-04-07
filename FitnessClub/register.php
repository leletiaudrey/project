<?php

// Establish a database connection
$conn = mysqli_connect('localhost','root','','Fitness_db');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $package = $_POST['package'];
    $registration_date = date('Y-m-d');

    // Prepare the SQL statement
    $sql = "INSERT INTO registration (name, email, phone, gender, age, address, package, registration_date) 
        VALUES ('$name', '$email', '$phone', '$gender', '$age', '$address', '$package', '$registration_date')";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        $success_msg = "Registration successful!";
    } else {
        $error_msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration Form</title>
</head>
<body>
	<h2>User Registration Form</h2>
	<?php
	// Display success or error message if set
	if(isset($success_msg)) {
	    echo '<p style="color:green;">'.$success_msg.'</p>';
	} else if(isset($error_msg)) {
	    echo '<p style="color:red;">'.$error_msg.'</p>';
	}
	?>
	<form method="post" action="">
		<p>
			<label for="name">Name:</label>
			<input type="text" name="name" required>
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="email" name="email" required>
		</p>
		<p>
			<label for="phone">Phone:</label>
			<input type="text" name="phone" required>
		</p>
		<p>
			<label for="gender">Gender:</label>
			<select name="gender" required>
				<option value="">Select Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
			</select>
		</p>
		<p>
			<label for="age">Age:</label>
			<input type="number" name="age" required>
		</p>
		<p>
			<label for="address">Address:</label>
			<textarea name="address" required></textarea>
		</p>
		<p>
			<label for="package">Package:</label>
			<input type="text" name="package" required>
		</p>
		<p>
			<input type="submit" name="submit" value="Submit">
		</p>
	</form>
</body>
</html>
