<?php
session_start();
error_reporting(0);
include('dbconnection.php');
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
    <?php include_once('navbar.php');?><br><br>
    <section class="w3l-recewnt-work-hobbies "> 
      <div class="recent-work">
          <div class="container">
            <div class="row about-about">
                <?php
                                $ret=mysqli_query($con,"select * from  package");
                                    $cnt=1;
                                    while ($row=mysqli_fetch_array($ret)) 
                                    {
                                    ?>
                                    <div class="card-group col-sm-4 mt-5">
                                      <div class="card">
                                        <div class="card card-image"style="background-image: url(images/<?php echo $row['pk_img']?>);">
                                          <div class="text-white text-center d-flex align-items-center rgba-white-strong py-5 px-4">
                                            <div>
                                              <h3 class="card-title"><strong><?php echo $row['pk_name'];?></strong></h3>
                                              <p style="font-size:20px;"><?php echo $row['pk_description'];?></p>
                                              <a class="btn btn-pink" href="book.php"style="background-color:#6c94b0;"><i class="fas fa-clone left"></i> BOOK</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                <?php 
                    $cnt=$cnt+1;
                    }?>
            </div>
          </div>
      </div>
    </section>
    <?php include_once('footer.php');?>
  </body>
</html>