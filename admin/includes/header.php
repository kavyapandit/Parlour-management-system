<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
          <a href="index.html">
            <h1 style="font-family:Lucida Handwriting;font-size:30px;text-shadow: 2px 2px #6c94b0;">Diya</h1>
            <span>Women's Beauty parlour</span>
          </a>
        </div>
        <!--//logo-->
       
       
        <div class="clearfix"> </div>
      </div>
   
        <div class="profile_details">  
        <?php
$adid=$_SESSION['aid'];
$ret=mysqli_query($con,"select a_name from admin where a_id='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['a_name'];

?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/admin.png" alt="" width="50" height="50"> </span> 
                  <div class="user-name">
                    <p><?php echo $name; ?></p>
                    <span>Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>