<?php
include ('database.php');
$wid = $_GET['wid'];
$pid = $_GET['pid'];
$serviceName = $_GET['service'];
$pid=(int)$pid;
$wid=(int)$wid;
if($wid<=0 or $wid>4 or $pid<=0 or $pid>10 or $serviceName==null)
{
    echo "<script type='text/javascript'>alert(\"Invalid page!\")</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Review Page</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="/app/css/style.css">
<link rel="stylesheet" href="/app/css/review.css">
</head>
<body>
   
<div class="login-form">
	<h2 class="text-center">Reviewing for service '<?php echo htmlspecialchars($serviceName);?>'</h2>
	<form class="login-form" action="/app/register-review.php" method="post">
		<div class="form-group">
			<p>Please rate this service on the scale of 1 to 5.</p>
<fieldset class="rating" >
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars" ></label>
    
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
 
</fieldset></div>
<br><br>
           <div class="form-group"> <textarea name="comment" class="form-control input-lg" placeholder="Comments"  rows=5 cols=5 maxlength=500 ></textarea><br></div>
		    <input type="hidden" name="wid" value='<?php echo htmlspecialchars($wid);?>' >
		    <input type="hidden" name="pid" value='<?php echo htmlspecialchars($pid);?>' >
		    <input type="hidden" name="serviceName" value='<?php echo htmlspecialchars($serviceName);?>' >
            <div class="form-group clearfix"><input type="submit" class="btn btn-primary btn-lg pull-left" name="submit" value="Submit"></div>
  </form>
            
</body>
            <form style="background:none;border:none;   box-shadow:none;"action="/app/display-review.php" method="post">
             <input type="hidden" name="wid" value='<?php echo htmlspecialchars($wid);?>' >
            <input type="hidden" name="pid" value='<?php echo htmlspecialchars($pid);?>' >
            <input type="hidden" name="serviceName" value='<?php echo htmlspecialchars($serviceName);?>' >
            <input style="background:none;
            background-image:none;
     border:none; 
     padding:0;
     color:green;
     font: inherit;
   
     /*border is optional*/
     border-bottom:1px solid #444; 
     cursor: pointer;" type="submit" name="submit" value="Click here to read all the review for this product/service"></div>
            </form>
</html>
