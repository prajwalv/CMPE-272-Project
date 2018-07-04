<?php
include ("function.php");
updateLastVisited('Parking');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking</title>

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
    <header class="parking-header">
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
          <h2 class="mt-4">Parking</h2>
          <div class="d-flex justify-content-between">
          <!--	<img src="./img/towerhall.jpg" class="img-responsive">-->
				 <div>
				 	 <p align="justify">Welcome to the PV University campus. It’s a very busy place. Daily activity draws from more than 45,000 students, 24,000 employees and up to 10,000 daily visitors. Special events like football or basketball game days, concerts, graduation etc. bring even more people to campus. Given the space limitations our student transportation options are offered according to the following criteria:<br>
1. Undergraduate, graduate student<br>
2. Resident of Campus Accommodation or off campus.<br>
The lower cost options of busing, biking, car sharing or taxis might work for you.</p>
			      </div>
			  </div>
			  <br><br>
			 
			      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div class="wrapper">
  <span class="square">
     <a class="tenth before after" href="/app/review.php?wid=1&pid=6&service=Parking">Click here to review this service</a>
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
$title1="Parking";

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