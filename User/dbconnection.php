<?php<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";$con=mysqli_connect("localhost", "root", "", "project");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>
