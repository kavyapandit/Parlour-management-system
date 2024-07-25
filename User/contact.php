<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

    
    // Get the form data
    $name=$_POST['firstname'];
    $ser = $_POST['service'];
    $feed=$_POST['feedback'];
    
    $query=mysqli_query($con, "INSERT INTO feedback(cust_name,service,feedback) VALUES ('$name','$ser','$feed'  )");
        if ($query)
        {
            echo "<script>alert('You have successfully registered.');</script>";
            
        }
        else
        {
        
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
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
    <script src="1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
</head>
<body id="home">
<?php include_once('navbar.php');?>
  <form class="form-inline mt-4">
        <div class="card text-bg-dark mt-5">
            <img src="images/bg2.jpeg" class="card-img" style="width:1530px;height:350px;opacity: 0.8;">
            <div class="card-img-overlay">
                <h5 class="card-title" style="text-align: center;font-size: 90px;"><b>FEEDBACK</b></h5>
                <p style="padding-left: 320px;font-size:50px;font-style: italic;">SHARE YOUR EXPERIENCE WITH US!!!!!!</p>
            </div>
        </div>
        <div class="text-emphasis bg-subtle mt-5 ml-5">
            
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text"  name="firstname" class="form-control" id="validationCustom01" value="" required="true" pattern="[a-zA-Z ]+" title="Please enter a valid name (letters and spaces only)" >
                </div>

                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Service</label>
                    <input type="text" name="service" class="form-control" id="validationCustom01" value="" required>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Feedback</label>
                    <textarea name="feedback" class="form-control"  rows="2" cols="25" width="100%" required></textarea>
                </div>

                <div class="col-12 mt-3">
                <a href="feed-thank.php" class="btn navbar navbar-light" style="background-color:#6c94b0;" type="button">Give Feedback</a>
                </div>
        </div>

    </form>
    <?php include_once('footer.php');?>
</body>
</html>