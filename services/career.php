<?php
include ("function.php");
updateLastVisited('Career');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Career</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
     <link href="/app/css/link.css" rel="stylesheet">

  </head>

  <body>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/index.html">PV University</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/services/service.html">Service Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header with Background Image -->
    <header class="career-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 text-center text-white mt-4">PV University</h1>
           <h5 style=" color:white; text-align: center;" >The Heart and Future of the Silicon Valley</h5>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-4">Career</h2>
          <div class="d-flex justify-content-between">
          <!--	<img src="./img/towerhall.jpg" class="img-responsive">-->
				 <div>
				 	 <p align="justify">Academia aside, universities are about preparing you for work, about making sure you develop the skills needed to carve out a professional niche for yourself. University isn’t just about knowledge for knowledge’s sake; it’s about making sure you know how to take care of yourself.

In pursuit of that, most universities will have careers services, services which make contact with graduate employers in the name of securing relevant work placements and valuable experience to both help you decide what you want to do with your life and make sure you’re equipped to do it.

They might also help you find part-time work; making sure your hours meet statuary requirements and fit around your timetable. They’ll find you work and support you in your pursuit of it.</p>
			      </div>
			  </div>
			  <br><br>
			 
			      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div class="wrapper">
  <span class="square">
     <a class="tenth before after" href="/app/review.php?wid=1&pid=3&service=Career">Click here to review this service</a>
  </span>
</div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">© Copyright 2018 PV University</p>
        <p class="m-0 text-center text-white">Disclaimer: This website is a part of an academic project. All the images, texts and names used in this website are imaginary and doesn't signify or represent any human or institution.</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
 <script type="text/javascript">
 $(document).ready(function () {
             var s="<?php a();?>";
         });
    
</script>
<?php
  function a(){

include("dbconfig.php");

$id1="PV_University";

//product name
$title1="Career";

                    $sql1 = "SELECT * FROM mview WHERE title = '$title1'";
                    $retval1 = mysqli_query($db, $sql1);
                  
$row1 = mysqli_fetch_array($retval1,MYSQLI_ASSOC);
$count1=$row1['count1'];
echo $count1;
$cc=1;


if ($count1 <$cc) {
   $count1=1;
   
 
   $username = mysqli_real_escape_string($db,$id1);
                    $productname = mysqli_real_escape_string($db,$title1);
$count= mysqli_real_escape_string($db,$count1);
                    $sql11 = "INSERT INTO mview (id, title, count1) VALUES ('$username', '$productname','$count')  ";
                 
                    $retval11 = mysqli_query( $db, $sql11 );
                
   
} else {
       $count1=$count1+1;
       $username = mysqli_real_escape_string($db,$id1);
                    $productname = mysqli_real_escape_string($db,$title1);
$count= mysqli_real_escape_string($db,$count1);
$sql12="UPDATE mview SET count1='$count1' WHERE title = '$productname'";
                
                    $retval2 = mysqli_query( $db, $sql12 );
                  
  }         
                

}
?>