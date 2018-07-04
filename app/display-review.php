<?php
include('database.php');

function count_star($conn,$sno,$pid,$wid)
{
	$query = mysqli_query($conn, "SELECT count(star) cnt_star FROM `prod_review` where wid='$wid'and pid='$pid' and star='$sno'");
  	$row = mysqli_fetch_array($query);
  	$starno=$row['cnt_star'];
  	echo $starno;
  }
function print_stars($avg)
{
	echo "Stars:<br>";
	for($i=0;$i<$avg;$i++){
  echo '<i  style="font-size: 25px;color: #e67e22; " class="glyphicon glyphicon-star"></i>';
}}


if ( isset( $_POST['submit'] ) ){
extract($_POST);
echo "<h2 align='center'>Displaying reviews of ".$serviceName."</h2><br>";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <link rel="stylesheet" href="/app/css/style.css">
<link rel="stylesheet" href="/app/css/review.css">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>
function goBack() {
    window.history.back();
}
</script>

<!------ Include the above in your HEAD tag ---------->
    <title>Review Description</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
       <link href="/app/css/display-review.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <!-- <link href="/app/css/display-review.css" rel="stylesheet">
        <link href="/app/css/review.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <style>

</style>
  </head>

  <body>
  	 <p>
     	<button class="btn btn-info btn-lg" style="position: absolute;
    right: 350px;
    background-color: green;
    top: 30px;" onclick="goBack()">Back</button>
          <span class="glyphicon glyphicon-back"></span>
        </p> 
 

  	    
  	<?php
  	$avg_query = mysqli_query($conn, "SELECT avg(star) rating FROM `prod_review` where wid='$wid'and pid='$pid'");
  	$row = mysqli_fetch_array($avg_query);
  	$avg=ceil($row['rating']);
  	if($avg==0) echo "<h1>No Reviews for this product/service</h2>"; 
  	else{
  	?>
   <script>var ="<?php $avg;?>"</script>

    <div class="container">
    			
		<div class="row">
			<div class="col-sm-3">
				<div class="rating-block">
					<h4>Average user rating</h4>
					<h2 class="bold padding-bottom-7"><?php echo $avg ?> <small>/ 5</small></h2>
					<?php print_stars($avg) ?>
					 
				</div>
			</div>
			<div class="col-sm-3">
				<h4>Rating breakdown</h4>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php count_star($conn,'5',$pid,$wid);?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php count_star($conn,'4',$pid,$wid);?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php count_star($conn,'3',$pid,$wid);?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php count_star($conn,'2',$pid,$wid);?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php count_star($conn,'1',$pid,$wid);?></div>
				</div>
			</div>			
		</div>	<br><br>		
						<?php

								
								$review_query = mysqli_query($conn, "SELECT star,comment FROM prod_review where wid='$wid' and pid='$pid'");
								while($row = mysqli_fetch_array($review_query))
								{
								?>
							
					<div class="row">
						<div class="col-sm-3">
							<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
							<div class="review-block-name"><a href="#">User</a></div>
							<div class="review-block-date">Ja<br/></div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
								 <?php $star=$row['star'];
								print_stars($star);?>
							</div>
							<div class="review-block-title"></div>
							<div class="review-block-description"> <?php $comment=$row['comment'];
								echo "Comments:<br>"."<h5>".$comment."</h5>";?>
									 </div>
					
						</div>
					</div>
					<?php }

								mysqli_close($conn);
								}
								}
								?>
			
				</div>
			</div>
		</div>
		
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


								








