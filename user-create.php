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

    <title>User Create</title>

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

 
 <p>Signup for<a href="index.html" style="{text-decoration:none; text-decoration:none; color:white};"> PV University</a></p>
  <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     <div class="form-group">
          <div class="input-group">
              <input type="text" class="form-control" name="fname" placeholder="Firstname" pattern="[a-zA-Z]{3,}"  title="Must contain at least 3 characters. Only use alphabets." required>
          </div>
      </div>
      <div class="form-group">
          <div class="input-group">
              <input type="text" class="form-control" name="lname" placeholder="Lastname" pattern="[a-zA-Z]{3,}"  title="Must contain at least 3 characters. Only use alphabets." required>
          </div>
      </div>
      <div class="form-group">
          <div class="input-group">
          <input type="email" class="form-control" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Must be of the format, someone@abc.abc" required><br>
          </div>
      </div>
      <p>Home Address:</p>
              <div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Address Line 1" name="addr1" maxlength="80"  required ></div></div>
              <div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Address Line 2 (optional)" name="addr2"   maxlength="100" ><br><br></div></div>
              <div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="City" name="city" " maxlength="20"  pattern="([a-zA-Z]|[ ]|[a-zA-Z])*" required><br><br></div></div>
              <div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="State" name="state" " maxlength="20"  pattern="([a-zA-Z]|[ ]|[a-zA-Z])*" required ><br><br></div></div>
              
              <div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Zipcode" name="zip" " maxlength="11" pattern="([0-9]|[-]|[0-9])*" required><br><br></div></div>
              <div class="form-group"><div class="input-group"><input type="text" class="form-control"  placeholder="Country" name="cont" " maxlength="30"  pattern="([a-zA-Z]|[ ]|[a-zA-Z])*" required ><br><br></div></div>
            Phone:<br><br>  <div class="form-group"><div class="input-group"><input type="tel" class="form-control" placeholder="Home Phone" name="hpho" " maxlength="15" pattern="(\+\d{1,3}[- ]?)?\d{10}" required><br><br></div></div>

              <div class="form-group"><div class="input-group"><input type="tel" class="form-control" placeholder="Cell Phone" name="cpho" " maxlength="15" 
                pattern="(\+\d{1,3}[- ]?)?\d{10}" required><br><br></div></div><br>

      <div class="form-group sign-btn">
          <input type="submit" class="btn" name="submit" value="Submit">
          <br><br>
      </div>
  </form>
        </div>
        <?php
if ( isset( $_POST['submit'] ) ){
extract($_POST); 
  $check_email_query="select * from users where email='$email'";

      $res=mysqli_query($conn,$check_email_query);

      if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
            
        if ($email==$row['email'])
        {
             echo "<script type='text/javascript'>alert(\"Email already exists!Try with a different email.\")</script>";
        }

       } 
       else{
if($addr2==null)//since address 2 is optional, if it's null skip the value 
{
  $addr=$addr1.",".$city.",".$state.",".$cont.",".$zip;
}
else{
  $addr=$addr1.",".$addr2.",".$city.",".$state.",".$cont.",".$zip;
}

$insert_query="INSERT INTO users (`fname`,`lname`,`email`,`addr`,`hpho`,`cpho`) VALUES('$fname','$lname','$email','$addr','$hpho','$cpho')"; 
if ($conn->query($insert_query) === TRUE) {
  echo "<script type='text/javascript'>alert(\"Registered Successfully!\")</script>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();  
}
}
?>


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
  </div>
  </body>
</html>

