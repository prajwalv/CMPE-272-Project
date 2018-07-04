<?php
include('database.php');

function no_of_counts($conn){ 
$query = mysqli_query($conn, "SELECT * FROM prod_review");
$count = mysqli_num_rows($query);
  if($count==0)
  {
    echo "<h5>No service page reviewed</h5><br>";
  }
  else{
echo '<div align ="center" class="table table-responsive">';
echo '<table class="table table table-bordered">
<thead>
<tr>
<th scope="col">Website</th>
<th scope="col">Service(s)</th>
<th scope="col">Count</th>
</tr>
</thead>';
$star_query = mysqli_query($conn, "SELECT wid,count(*) r_count,pname FROM `prod_review` group by pname order by r_count  desc limit 10"); // for all reviews
//$star_query = mysqli_query($conn, "SELECT count(*),pname,avg(star) rating FROM `prod_review`  group by pname order by rating  desc limit 5 "); //for top-5 reviews
echo "<h3>Displaying Count of Reviewed Products</h3>";
while($row = mysqli_fetch_array($star_query))    
{
echo "<tbody>"; 
echo "<tr>";
if ($row['wid']==1)
   echo "<td>" .'<a href="http://prajwalvenkatesh.com/index.html">PV University </a>'. "</td>";
elseif ($row['wid']==3)
    echo "<td>" .'<a href="http://rangarajulabs.com">Rangaraju Labs</a>'. "</td>";
elseif ($row['wid']==2)
    echo "<td>" .'<a href="http://abrahamwilliam007.com/testFinal.php">Abraham William</a>'. "</td>";
else 
    echo "<td>" .'<a href="http://setmeon.com">Setmeon</a>'. "</td>";
echo "<td>" . $row['pname'] . "</td>";
echo "<td>" . $row['r_count'] . "</td>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
mysqli_close($conn);
}
} 


function most_reviewed($conn){ 
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
<th scope="col">Website</th>
<th scope="col">Service(s)</th>
<th scope="col">Avg. Rating</th>
</tr>
</thead>';
$star_query = mysqli_query($conn, "SELECT wid,count(*),pname,avg(star) rating FROM `prod_review` group by pname order by rating  desc limit 10"); // for all reviews
//$star_query = mysqli_query($conn, "SELECT count(*),pname,avg(star) rating FROM `prod_review`  group by pname order by rating  desc limit 5 "); //for top-5 reviews
echo "<h3>Displaying Top Reviewed Products</h3>";
while($row = mysqli_fetch_array($star_query))    
{
echo "<tbody>"; 
echo "<tr>";
if ($row['wid']==1)
   echo "<td>" .'<a href="http://prajwalvenkatesh.com/index.html">PV University </a>'. "</td>";
elseif ($row['wid']==3)
    echo "<td>" .'<a href="http://rangarajulabs.com">Rangaraju Labs</a>'. "</td>";
elseif ($row['wid']==2)
    echo "<td>" .'<a href="http://abrahamwilliam007.com/testFinal.php">Abraham William</a>'. "</td>";
else 
    echo "<td>" .'<a href="http://setmeon.com">Setmeon</a>'. "</td>";
echo "<td>" . $row['pname'] . "</td>";
echo "<td>" . number_format((float)$row['rating'],1,'.','') . "</td>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";

}
} 

function recently_viewed(){

echo    "<script type='text/javascript'>

$(document).ready(function(){
    var globalstore = {};
    $.when(
        $.ajax({
          method: 'GET',
          url: 'http://setmeon.com/getrecentviewed.php',
          cache: false,
          xhrFields: {
             withCredentials: true
            },
            crossDomain: true,
            success: function(response) {
            globalstore.setmeonresponse = response;
          }
        }),
        $.ajax({
          method: 'GET',
          url: 'http://rangarajulabs.com/getrecentviewed.php',
          cache: false,
          xhrFields: {
             withCredentials: true
            },
            crossDomain: true,
            success: function(response) {
            globalstore.rangarajuresponse = response;
          }
        }),
        $.ajax({
          method: 'GET',
          url: 'http://prajwalvenkatesh.com/services/getrecentviewed.php',
          cache: false,
          xhrFields: {
             withCredentials: true
            },
            crossDomain: true,
            success: function(response) {
            globalstore.prajwalvenkatesh = response;
          }
        })
    ).then(function(){
        console.log(globalstore.setmeonresponse);
        console.log(globalstore.rangarajuresponse);

        globalstore.setmeonresponse = JSON.parse(globalstore.setmeonresponse);
        globalstore.rangarajuresponse = JSON.parse(globalstore.rangarajuresponse);

        console.log(globalstore.setmeonresponse);
        console.log(globalstore.rangarajuresponse);

        var sortable = [];
        for (var key in globalstore.setmeonresponse) {
            sortable.push(['setmeon.com', key, +globalstore.setmeonresponse[key]]);
        }
        for (var key in globalstore.rangarajuresponse) {
            sortable.push(['rangarajulabs.com', key, +globalstore.rangarajuresponse[key]]);
        }

        sortable.sort(function(a, b) {
            return b[2] - a[2];
        });
        console.log(sortable);

        var table = $('#myTable').html('<thead><tr><th scope=col>Website</th><th scope=col>Service</th></tr></thead>').appendTo('body'),
            tbody = table.append('<tbody>');

        for (i = 0; i < 10; i++) { 
            tbody.append('<tr><td>' + sortable[i][0] + '</td><td>' + sortable[i][1] + '</td></tr>' );
            }
        });
    
});
</script>";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Marketplace Portal Activities</title>
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
 echo '<h2 class="text-center">Activities of <a style="{text-decoration:none;}" href="http://prajwalvenkatesh.com/app/index.html">Marketplace Portal</a></h2>';
most_reviewed($conn);
no_of_counts($conn);
echo "<h3 align='center'>Displaying Recent Products in Market Place</h3><div class='table table-responsive'><table id='myTable' class='table table table-bordered'>";
    recently_viewed();
echo "</tbody></table></div>";
?>
</div>
<?php echo "<a align='center' href='http://abrahamwilliam007.com/chart.php'>Click here to view the chart</a>"; ?>
  </body>
</html>                            