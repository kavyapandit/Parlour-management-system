<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
    $name=$_POST['fname'];
    $address=$_POST['add'];
    $phone=$_POST['ph_no'];
    $email=$_POST['mail'];
    
    $ret=mysqli_query($con, "select c_email from cr_bk where c_email='$email' || c_phone='$phone'");
    $result=mysqli_fetch_array($ret);
    if($result>0)
    {

        echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    }
    else
    {
        $query=mysqli_query($con, "insert into cr_bk(c_name, c_address,c_phone, c_email) value('$name', '$address','$phone', '$email' )");
        if ($query)
        {
            echo "<script>alert('You have successfully registered.');</script>";
            header('location:https://buy.stripe.com/test_4gw02y9GHgZLeFaaEG'); 
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
                        <h3 style="text-align:center;font-weight:bold;font-family: cursive;font-size:30px;text-shadow: 2px 2px #6c94b0">REGISTER FOR THE COURSE</h3>
                        <form method="post" name="signup">
                            <div style="padding-top: 30px;">
                                <label>Full Name</label>
                                <input type="text" name="fname" id="fname" placeholder="Name" required="">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Address</label>
                                <textarea name="add"  rows="2" cols="25" width="100%" required></textarea>
                            </div>
                            
                            <div style="padding-top: 30px;">
                                <label>Phone number</label>
                                <input type="text" placeholder="PhoneNumber" required="" name="ph_no"  pattern="[0-9]+" maxlength="10">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Email</label>
                                <input type="email" name="mail" id="email" placeholder="email" required="">
                            </div>
                            <div style="padding-top: 30px;">
                            <label>Scan & pay</label>
                                <img src="images/qr_code.png" height="200px" width="200px">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Pay with card</label>
                            <button type="submit" style="background-color:#6c94b0;" name="submit" style="margin-left:10px;">Click here</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h6 style="margin-left:260px;">Done with payment?<a href="cr-thank.php" class="btn navbar navbar-light" style="background-color:#6c94b0;width:10%;margin-left:10px;margin-top:15px;" type="button">CLICK HERE</a></h6>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html>