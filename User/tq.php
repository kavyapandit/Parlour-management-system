<?php 
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['uid']==0)) 
{
    header('location:logout.php');
} 
else
{
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
            <div>
                <h4 class="w3ls_head" style="text-align:center;font-weight:bold;font-family: cursive;font-size:30px;text-shadow: 2px 2px #6c94b0">Thank you for applying. Your Appointment no is <?php echo $_SESSION['aptno'];?> </h4>
                <br><br>
                <h4 class="w3ls_head" style="text-align:center;font-weight:bold;font-family: cursive;font-size:20px;">We will get back to you shortly</h4>
                <div class="g-3" style="text-align:center;"><br><br>
                <a href="booking-history.php" class="btn btn-primary btn-md" style="background-color:#6c94b0;" type="button">Booking History</a>
                <a href="invoice-history.php" class="btn btn-secondary btn-md" style="background-color:#6c94b0;" type="button">View Invoice</a>
                </div>
            </div>
            <div>
            <br><br>  
            </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html><?php } ?>