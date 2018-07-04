<?php
include('function.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Services</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

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
              <a class="nav-link" href="/services/service.html">Services</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header with Background Image -->
    <header class="service-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 style=" color:black; text-align: center;" class="display-3 text-center text-white mt-4">PV University</h1>
           <h5 style=" color:black; text-align: center;" >The Heart and Future of the Silicon Valley</h5>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
   <div class="container">
<?php
	echo "<h5>Displaying Most Viewed Services</h5>";
	$filtered=array_filter(explode(";",$_COOKIE['service']));
	$count=count($filtered);
	if($count == 0)
	{
		echo "<h5>No service page visited</h5><br>";
	}
	else{
	$values=array_count_values($filtered);
	arsort($values);
	$most_vis=array_slice(array_keys($values),0,5,true);
	foreach ($most_vis as $mkey => $mvalue) {
if ($mvalue=='Accommodation'){echo '<a href ="http://prajwalvenkatesh.com/services/accommodation.php">Accommodation</a><br>';}
elseif ($mvalue=='Food_Court'){echo '<a href ="http://prajwalvenkatesh.com/services/canteen.php">Food Court</a><br>';}
elseif ($mvalue=='Career'){echo '<a href ="http://prajwalvenkatesh.com/services/career.php">Career</a><br>';}
	elseif ($mvalue=='Health-Care'){echo '<a href ="http://prajwalvenkatesh.com/services/health-care.php">Health-Care</a><br>';}
		elseif ($mvalue=='Library'){echo '<a href ="http://prajwalvenkatesh.com/services/library.php">Library</a><br>';}
			elseif ($mvalue=='Parking'){echo '<a href ="http://prajwalvenkatesh.com/services/parking-facility.php">Parking</a><br>';}
				elseif ($mvalue=='Recreation'){echo '<a href ="http://prajwalvenkatesh.com/services/recreation.php">Recreation</a><br>';}
					elseif ($mvalue=='Sports'){echo '<a href ="http://prajwalvenkatesh.com/services/sports.php">Sports</a><br>';}
						elseif ($mvalue=='Student_union'){echo '<a href ="http://prajwalvenkatesh.com/services/student-union.php">Student Union</a><br>';}
							else{echo '<a href ="http://prajwalvenkatesh.com/services/workshop.php">Workshop</a><br>';}
	}
}
?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
