<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) 
{
header('location:logout.php');
}
else
{
	if($_GET['delid'])
	{
		$sid=$_GET['delid'];
		mysqli_query($con,"delete from book_info where b_id ='$sid'");
		echo "<script>alert('Data Deleted');</script>";
		echo "<script>window.location.href='all-appointment.php'</script>";
	}

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>All Appointment</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">All Appointment</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>All Appointment:</h4>
						<table class="table table-bordered"> <thead> <tr> <th>#</th> 
							<th> Appointment Number</th> 
							<th>Name</th>
							<th>Mobile Number</th> 
							<th>Service</th> 
							<th>Appointment Date</th>
							<th>Appointment Time</th>
							<th>Status</th>
							<th>Action</th> </tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select customer_registration.cust_name,customer_registration.email,customer_registration.phone,book_info.b_id as bid,book_info.AptNumber,book_info.service,book_info.bk_date,book_info.bk_time,book_info.Message,book_info.Booking_date,book_info.bk_status from book_info join customer_registration on customer_registration.cust_id=book_info.cust_id");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr> <th scope="row"><?php echo $cnt;?></th> 
						 	<td><?php  echo $row['AptNumber'];?></td> 
						 	<td><?php  echo $row['cust_name'];?></td>
						 	<td><?php  echo $row['phone'];?></td>
							 <td><?php  echo $row['service'];?></td>
						 	<td><?php  echo $row['bk_date'];?></td> 
						 	<td><?php  echo $row['bk_time'];?></td>
						 	<?php if($row['bk_status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['bk_status'];?></td><?php } ?> 
                                       <td><a href="view-appointment.php?viewid=<?php echo $row['bid'];?>" class="btn btn-primary">View</a>
<a href="all-appointment.php?delid=<?php echo $row['bid'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                       	</td> </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>