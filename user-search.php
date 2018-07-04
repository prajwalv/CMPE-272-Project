<?php
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Search</title>

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
              <a class="nav-link" href="user.php">Back</a>
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
 <p><strong>Search for users in PV University Directory</strong></p>
  <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label>Search by</label><div class="form-group">
          <div class="input-group">
              <select class="form-control" name="searchby">
                  <option value="fname">Firstname</option>
                  <option value="lname">Lastname</option>
                  <option value="email">Email</option>
                  <option value="hpho">Home Phone</option>
                  <option value="cpho">Cell Phone</option>
                </select>
                  <input type="text" class="form-control" name="keyword" placeholder="Keyword" required >
          </div>
      </div>
         <div class="form-group sign-btn">
          <input type="submit" class="btn" name="search" value="Search">
      </div>
  </form>
        </div>
        
<?php
 if ( isset( $_POST['search'] ) ){
    extract($_POST); 
 $search_query = mysqli_query($conn, "SELECT * FROM users
    WHERE fname LIKE '%{$keyword}%' OR lname LIKE '%{$keyword}%' OR email LIKE '%{$keyword}%' OR hpho LIKE '%{$keyword}%' OR cpho LIKE '%{$keyword}%'");
$count = mysqli_num_rows($search_query);
  if($count==0)
  {
    echo"<p><strong>Your search did not fetch any result.</p></strong>";
  }
  else{
echo '<div class="table table-responsive">';
echo '<table class="table table table-bordered">
<thead>
<tr>
<th scope="col">Firstname</th>
<th scope="col">Lastname</th>
<th scope="col">Email</th>
<th scope="col">Address</th>
<th scope="col">Home Phone No.</th>
<th scope="col">Cell Phone No.</th>
</tr>
</thead>';
echo"<p><br><strong>Dispalying result based on search by keyword "."'".$keyword."'"."</p></strong>";
while($row = mysqli_fetch_array($search_query))
{
echo "<tbody>"; 
echo "<tr>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['lname'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['addr'] . "</td>";
echo "<td>" . $row['hpho'] . "</td>";
echo "<td>" . $row['cpho'] . "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
mysqli_close($conn);
}
}
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
