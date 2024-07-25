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
    <style>
        td
        {
            font-size:20px;
        }
    </style>
</head>
<body id="home">
<?php include_once('navbar.php');?>

<section class="w3l-contact-info-main mt-5" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content m-t-30">
                    <h4 style="padding-bottom: 20px;text-align: center;color: #6c94b0;">Appointment History</h4>
                        <table border="2" class="table">
                            <thead class="gray-bg" >
                                <tr>
                                    <th>Sl.no</th>
                                <th>Appointment Number</th>
                                <th>Service</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Appointment Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <?php
                                   $userid= $_SESSION['uid'];
 $query=mysqli_query($con,"select customer_registration.cust_id as uid, customer_registration.cust_name,customer_registration.email,customer_registration.phone,book_info.b_id as bid,book_info.service,book_info.AptNumber,book_info.bk_date,book_info.bk_time,book_info.Message,book_info.Booking_date,book_info.bk_status from book_info join customer_registration on customer_registration .cust_id=book_info.cust_id where customer_registration .cust_id='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['AptNumber'];?></td>
<td><?php echo $row['service'];?></td>
<td><?php echo $row['bk_date']?></td> 
<td><?php echo $row['bk_time']?></td> 
<td><?php $status=$row['bk_status'];
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}
?>  </td>   

<td><a href="appointment-detail.php?aptnumber=<?php echo $row['AptNumber'];?>" class="btn btn-primary" style="background-color:#6c94b0;">View</a></td>       
</tr><?php $cnt=$cnt+1; } ?>
                             
                            </tbody>
                        </table>
                    </div> </div>
                
    </div>
   
    </div></div>
</section>
<?php include_once('footer.php');?>
</body>

</html><?php } ?>