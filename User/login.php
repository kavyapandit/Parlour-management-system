<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"SELECT cust_id FROM customer_registration WHERE email='$emailcon' AND password='$password'");
    $ret=mysqli_fetch_array($query);
    if($ret>0)
    {
      $_SESSION['uid']=$ret['cust_id'];
      header('location:bk.php');
    }
    else
    {
    echo "<script>alert('Invalid Details.');</script>";
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
        <div class="container  ">
            <div class="d-grid contact-view ">
                <div class="cont-details ml-5 ">
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <form method="post">
                            <div>
                                <input type="text" class="form-control" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true">
                            
                            </div>
                            <div style="padding-top: 30px;">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                            
                            </div>
                            
                            <div class="twice-two" style="padding-top: 30px;">
                            <a class="link--gray" style="color: blue;" href="forgot.php">Forgot Password?</a>
                            
                            </div>
                            <button type="submit" class="btn btn-contact" name="login">Login</button>
                        </form>
                        <p style="font-size:20px;padding-top:30px;">Don't have an account? <a href="book.php" class="a2">Sign Up!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html>