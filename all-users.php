<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All Users</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">PV University</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="list-of-users.php">Back</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header with Background Image -->
    <header class="users">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 text-center text-white mt-4">PV University</h1>
           <h5 style=" color:black; text-align: center;" >The Heart & Future Of The Valley</h5>
          </div>
        </div>
      </div>
    </header>
    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-sm-8">
          <h1 class="mt-4"></h1>
<?php
function display_users($get_url,$url,$name){
$ch = curl_init($get_url);
$options = array(
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => array('Content-type: application/json'));
curl_setopt_array( $ch, $options );
$result = curl_exec($ch);
$str=json_decode($result, true);
echo '<h3>Displaying Users of <a href="'.$url.'">'.$name."</a></h3>";
echo "<table class='table table-bordered  table-hover w-auto'>
    <thead>
        <tr>
            <th>FirstName</th>
             <th>LastName</th>
             <th>Email</th>
        </tr>
    </thead>";
foreach ($str as $key => $value) {
$fname=$value[0];
$lname=$value[1];
$email=$value[2];
  echo "<tbody>";
    echo "<tr>";
    echo "<th scope='row'>" . $fname . "</th>";
    echo "<th scope='row'>" . $lname . "</th>";
     echo "<th scope='row'>". $email . "</th>";
    echo "</tr>";
}
  echo "</tbody>";
    echo "</table>";
}
$get_url="http://rangarajulabs.com/getusers.php";
$url="http://rangarajulabs.com/";
$name="rangarajulabs";
display_users($get_url,$url,$name);
$get_url="http://setmeon.com/getusers.php";
$url="http://setmeon.com/";
$name="setmeon";
display_users($get_url,$url,$name);

?>
 </div>
      <!-- /.row -->

    </div>
<br><br><br><br>    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">© Copyright 2018 PV University</p>
        <p class="m-0 text-center text-white">Disclaimer: This website is a part of an academic project. All the images, texts and names used in this website are imaginary and doesn't signify or represent any human or institution.</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
