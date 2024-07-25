<!DOCTYPE html>
<html>
<head>
	<title>Feedback Page</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		label {
			margin: 10px;
			font-size: 1.2em;
		}
		input[type=text], textarea {
			padding: 5px;
			margin: 10px;
			font-size: 1.2em;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px gray;
			width: 300px;
			height: 100px;
			resize: none;
		}
		input[type=submit] {
			padding: 5px;
			margin: 10px;
			font-size: 1.2em;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px gray;
			cursor: pointer;
		}
		.success-message {
			color: green;
			font-size: 1.2em;
			margin: 10px;
		}
		.error-message {
			color: red;
			font-size: 1.2em;
			margin: 10px;
		}
	</style>
</head>
<body>
	<h1>Feedback Page</h1>
	<form method="post" action="submit.php">
		<label for="name">Name:</label>
		<input type="text" id="name" name="firstname" placeholder="Enter your name" required>
		
		<label for="email">Service:</label>
		<input type="text" id="email" name="service" placeholder="Enter your email" required>
		
		<label for="message">Feedback:</label>
		<textarea id="message" name="feedback" placeholder="Enter your feedback" required></textarea>
		
		<input type="submit" value="Submit Feedback">
	</form>

	<?php
	// Connect to the database
	$conn = mysqli_connect("localhost", "root", "", "project");
	
	// Check if the form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Get the form data
        $name=$_POST['firstname'];
        $selectedService = $_POST['service'];
        $feed=$_POST['feedback'];
        
        // Insert the feedback into the database
        $sql = "INSERT INTO feedback VALUES ('$name', '$selectedService', '$feed')";
		
		if (mysqli_query($conn, $sql)) {
			echo "<p class='success-message'>Thank you for your feedback!</p>";
		} else {
			echo "<p class='error-message'>There was an error submitting your feedback. Please try again later.</p>";
		}
	}
	
	// Close the database connection
	mysqli_close($conn);
	?>
</body>
</html>
