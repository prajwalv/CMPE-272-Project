<?php
include('database.php');
function most_reviewed($conn){
echo "<h3>Displaying Most Reviewed Services</h3>"; 
$query = mysqli_query($conn, "SELECT * FROM prod_review");
$count = mysqli_num_rows($query);
  if($count==0)
  {
    echo "<h5>No service page reviewed</h5><br>";
  }
  else{
echo '<div class="table table-responsive">';
echo '<table class="table table table-bordered">
<thead>
<tr>
<th scope="col">Service(s)</th>
<th scope="col">Avg. Rating</th>
</tr>
</thead>';
$star_query = mysqli_query($conn, "SELECT count(*),pname,avg(star) rating FROM `prod_review` where wid='1' group by pname order by rating  desc "); //for top-5 reviews
//$star_query = mysqli_query($conn, "SELECT count(*),pname,avg(star) rating FROM `prod_review` where wid='1' group by pname order by rating limit 5 "); //for all reviews
while($row = mysqli_fetch_array($star_query))
{
echo "<tbody>"; 
echo "<tr>";
echo "<td>" . $row['pname'] . "</td>";
echo "<td>" . number_format((float)$row['rating'],1,'.','') . "</td>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
mysqli_close($conn);
}
}

function most_viewed(){
echo "<h3>Displaying Most Viewed Services</h3>";
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
    echo '<div class="table table-responsive">';
    echo '<table class="table table table-bordered">
    <thead>
    <tr>
    <th scope="col">Sl. No.</th>
    <th scope="col">Service(s)</th>
    </tr>
    </thead>';
    foreach ($most_vis as $mkey => $mvalue) {
    echo "<tbody>"; 
    echo "<tr>";
if ($mvalue=='Accommodation'){ echo "<td>".($mkey+1).'</td>'; echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/accommodation.php">Accommodation</a></td>';
  }
elseif ($mvalue=='Food_Court'){echo "<td>".($mkey+1).'</td>'; echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/canteen.php">Food Court</a></td>';
}
elseif ($mvalue=='Career'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/career.php">Career</a></td>';
}
    elseif ($mvalue=='Health-Care'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/health-care.php">Health-Care</a></td>';
    }
        elseif ($mvalue=='Library'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/library.php">Library</a></td>';
            }
            elseif ($mvalue=='Parking'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/parking-facility.php">Parking</a></td>';
                }
                elseif ($mvalue=='Recreation'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/recreation.php">Recreation</a></td>';
                    }
                    elseif ($mvalue=='Sports'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/sports.php">Sports</a></td>';
                        }
                        elseif ($mvalue=='Student_union'){echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/student-union.php">Student Union</a></td>';
                            }
                            else{echo "<td>".($mkey+1).'</td>';echo "<td>".'<a href ="http://prajwalvenkatesh.com/services/workshop.php">Workshop</a></td>';
                                }
    }
}

echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "</div>"; 
}
  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PV University Activities</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="/app/css/style.css">
</head>
<body>
    <div class="login-form">                      
<?php
echo "<h2 align='center'><strong>Displaying activities of PV University</strong></h2>"; 
most_viewed();
most_reviewed($conn);
?>
</div>
  </body>
    <footer>
      <div class="container">
        <p class="m-0 text-center text-white">© Copyright 2018 PV Group</p>
      </div>
      <!-- /.container -->
    </footer>
</html>                            
