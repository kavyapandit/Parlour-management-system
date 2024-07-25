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
  if(isset($_POST['submit']))
    {
      $cid=$_GET['viewid'];
      $status=$_POST['status'];
      $query=mysqli_query($con, "update book_info set bk_status='$status' where b_id='$cid'");
      if ($query) 
      {
        echo "<script type='text/javascript'> document.location ='all-appointment.php'; </script>";
      }
      else
      {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
      }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>View Appointment</title>

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
					<h3 class="title1">View Appointment</h3>
					<div class="table-responsive bs-example widget-shadow">
						
						<h4>View Appointment:</h4>
						<?php
$cid=$_GET['viewid'];
$ret=mysqli_query($con,"select customer_registration.cust_name,customer_registration.email,customer_registration.phone,book_info.b_id as bid,book_info.service,book_info.AptNumber,book_info.bk_date,book_info.bk_time,book_info.Message,book_info.Booking_date,book_info.bk_status from book_info join customer_registration on customer_registration.cust_id=book_info.cust_id where book_info.b_id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<table class="table table-bordered">
							<tr>
    <th>Appointment Number</th>
    <td><?php  echo $row['AptNumber'];?></td>
  </tr>
  <tr>
<th>Name</th>
    <td><?php  echo $row['cust_name'];?></td>
  </tr>

<tr>
    <th>Email</th>
    <td><?php  echo $row['email'];?></td>
  </tr>
   <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row['phone'];?></td>
  </tr>
  
   <tr>
    <th>Appointment Date</th>
    <td><?php  echo $row['bk_date'];?></td>
  </tr>
 
<tr>
    <th>Appointment Time</th>
    <td><?php  echo $row['bk_time'];?></td>
  </tr>
  
  
  <tr>
    <th>Apply Date</th>
    <td><?php  echo $row['Booking_date'];?></td>
  </tr>
  

<tr>
    <th>Status</th>
    <td> <?php  
if($row['bk_status']=="")
{
  echo "Not Updated Yet";
}

if($row['bk_status']=="Selected")
{
  echo "Selected";
}

if($row['bk_status']=="Rejected")
{
  echo "Rejected";
}

     ;?></td>
  </tr>
						</table>
						<table class="table table-bordered">
							<?php if($row['bk_status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 


  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Selected" selected="true">Selected</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
<tr>
    <th>Status</th>
    <td><?php echo $row['bk_status']; ?></td>
  </tr>


						</table>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		
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