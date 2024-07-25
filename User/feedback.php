<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

    
    // Get the form data
    $name=$_POST['name'];
    $ser = $_POST['Service'];
    $feed=$_POST['feedback'];
    
    $query=mysqli_query($con, "INSERT INTO feedback(cust_name,service,feedback) VALUES ('$name','$ser','$feed'  )");
        if ($query)
        {
            //echo "<script>alert('You have successfully registered.');</script>";
            
        }
        else
        {
        	echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>contact form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<style>
	.container{
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;

}
.container .post{
  display: none;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #666;
  font-weight: 500;
  cursor: pointer;
}
.container .edit:hover{
  text-decoration: underline;
}
	.container .star-widget input{
  display: none;
}
.star-widget label{
  font-size: 40px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
}
#rate-1:checked ~ form header:before{
  content: "I just hate it ";
}
#rate-2:checked ~ form header:before{
  content: "I don't like it ";
}
#rate-3:checked ~ form header:before{
  content: "It is awesome ";
}
#rate-4:checked ~ form header:before{
  content: "I just like it ";
}
#rate-5:checked ~ form header:before{
  content: "I just love it ";}
</style>
</head>
<body>
	<div class="contact-title">
		<h1>FEEDBACK</h1>
		<h2>SHARE YOUR EXPERIENCE WITH US!!!!!!</h2>
	</div>

	<div class="contact-form">
		<form action="https://formsubmit.co/nvkproject2002@gmail.com" method="POST">
			<input name="name" type="text" class="form-control" placeholder="Name" required>
			<br>
			<input name="email" type="email" class="form-control" placeholder="Email" required><br>
			<input name="Service" type="service" class="form-control" placeholder="Service" required><br>
		
				<textarea name="feedback" class="form-control" placeholder="Feedback" row="4" required></textarea><br>
				<label style="color:white;">PLESE RATE YOUR OVERALL EXPERIENCE!!</label>
				<div class="container">
					<div class="star-widget">
						<input type="radio" name="rate" id="rate-5">
						<label for="rate-5" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-4">
						<label for="rate-4" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-3">
						<label for="rate-3" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-2">
						<label for="rate-2" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-1">
						<label for="rate-1" class="fas fa-star"></label>
					</div>
				</div>
				<script>
					const btn = document.querySelector("button");
					const post = document.querySelector(".post");
					const widget = document.querySelector(".star-widget");
					const editBtn = document.querySelector(".edit");
					btn.onclick = ()=>{
						widget.style.display = "none";
						post.style.display = "block";
						editBtn.onclick = ()=>{
						widget.style.display = "block";
						post.style.display = "none";
						}
						return false;
					}
				</script>
			<input type="submit" name="submit" class="send-btn" value="Give Feedback">
		</form> 
	</div>
	
</body>
</html>