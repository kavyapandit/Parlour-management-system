<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
    $fname=$_POST['firstname'];
    $email=$_POST['mail'];
    $address=$_POST['addr'];
    $contno=$_POST['phonenumber'];
    $password=$_POST['pass'];

    $ret=mysqli_query($con, "select email from customer_registration where email='$email' || phone='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0)
    {

        echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    }
    else
    {
        $query=mysqli_query($con, "insert into customer_registration(cust_name, email, address, phone, password) value('$fname', '$email', '$address', '$contno','$password' )");
        if ($query)
        {
            echo "<script>alert('You have successfully registered.');</script>";
            header("Location:login.php");
        }
        else
        {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
    
}
?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="par.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Including the bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body id="home">
<?php include_once('navbar.php');?>
<section class="w3l-contact-info-main mt-5" id="contact">
    <div class="contact-sec	">
        <div class="container">
            <div class="d-grid contact-view">
                <div class="cont-details ml-5">
                    <div class="map-content-9 mt-lg-0 mt-4 ">
                        <h3 style="text-align:center;font-weight:bold;font-family: cursive;font-size:30px;text-shadow: 2px 2px #6c94b0">Register with us!!</h3>
                        <form method="post" name="signup">
                            <div style="padding-top: 30px;">
                                <label>Name</label>
                                <input type="text" name="firstname" id="name" placeholder="Name" required="" pattern="[a-zA-Z ]+" title="Please enter a valid name (letters and spaces only)">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Email</label>
                                <input type="email" name="mail" id="email" placeholder="email" required="">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Address</label>
                                <textarea name="addr"  rows="2" cols="25" width="100%" required></textarea>
                            <div style="padding-top: 30px;">
                                <label>Phone number</label>
                                <input type="text" placeholder="PhoneNumber" required="" name="phonenumber"  pattern="\d{3}\d{3}\d{4}" maxlength="10" title="Please enter valid phone number">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Password</label>
                                <input type="password" name="pass" placeholder="Password" required="true">
                            </div>
                            <button type="submit" class="btn btn-contact" name="submit">Signup</button>
                        </form>
                        <p style="font-size:20px;padding-top:30px;">Have an account? <a href="login.php" class="a2">Login!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html>