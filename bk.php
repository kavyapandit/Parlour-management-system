<?php
include('dbconnection.php');
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli("localhost","root","","project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (strlen($_SESSION['uid']==0)) 
{
    header('location:logout.php');
} 
else
{
    if(isset($_POST['submit']))
    {
        $cid=$_SESSION['uid'];
        $aptnumber = mt_rand(100000000, 999999999);
        $selectedService = $_POST['service'];
        $adate=$_POST['bk_date'];
        $atime=$_POST['bk_time'];
        $msg=$_POST['message'];
                                
        $query=mysqli_query($con,"insert into book_info(cust_id, AptNumber, service, bk_date, bk_time, Message) value('$cid', '$aptnumber', '$selectedService', '$adate', '$atime', '$msg' )");
                            
        if ($query)
        {
            $ret=mysqli_query($con,"select AptNumber from book_info where book_info.cust_id='$cid' order by b_id desc limit 1;");
            $result=mysqli_fetch_array($ret);
            $_SESSION['aptno']=$result['AptNumber'];
            header('location:https://buy.stripe.com/test_00g16C4mn38V8gM3cc'); 
        }
        else
        {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
                <div class="cont-details">
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <h2 style="text-align:center;font-weight:bold;font-family: cursive;font-size:30px;text-shadow: 2px 2px #6c94b0">Book your slots!!</h2>
                        <form method="post">
                            <div id="service" style="padding-top: 30px;">
                            <?php
                                // Query to get all categories
                                $sql = "SELECT s_id, s_name FROM service";
                                $result = $conn->query($sql);
                                ?>
                                <!-- HTML for the first dropdown -->
                                <select name="service" id="service">
                                <option value="" name="service">--Select--</option>
                                <label for="service" name="service">Select service:</label>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['s_id']; ?>"><?php echo $row['s_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div style="padding-top: 30px;">
                                <label for="shootdate">Appointment Date</label>
                                <input type="date" class="form-control appointment_date" placeholder="Date" name="bk_date" id='bk_date' required="true"  min="<?php echo date('Y-m-d');?>" >
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Appointment Time</label>
                                <input type="time" class="form-control appointment_time" placeholder="Time" name="bk_time" id='bk_time' required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <textarea class="form-control" id="message" name="message" placeholder="Requirement"></textarea>
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
        </div><br><br>
        <h6 style="margin-left:220px;">Done with payment?<a href="tq.php" class="btn navbar navbar-light" style="background-color:#6c94b0;width:10%;margin-left:10px;margin-top:15px;" type="button">CLICK HERE</a></h6>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html>