<?php
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/user/encryption.php');
$uid=htmlentities(decryptPassword($_GET['logoffUserAttributeTemp']));
if($uid==null)
{
    echo "<script type='text/javascript'>alert(\"Unauthorized Access!\")</script>";
    echo "Redirecting to homepage...";
    echo "<script type='text/javascript'>window.location.href = '/PasswordManager/index.html';</script>";
}
else{
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
<link rel="stylesheet" href="/PasswordManager/css/style.css">
<link rel="stylesheet" href="/PasswordManager/css/review.css">
</head>
<body>
   
<div class="login-form">
  <form class="login-form" action="/PasswordManager/register-feedback.php" method="post">
    <div class="form-group">
            <p>You are now logged-out.</p>
           <strong><p>Thank you for using PasswordManager.</p></strong> <hr>
      <p>Please rate your experience on the scale of 1 to 5.</p>
<fieldset class="rating" >
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars" ></label>
    
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Pathetic - 1 stars"></label>
    
</fieldset></div><br><br>
            <p>Please tell us what went wrong.</p>
             <input type="hidden" name="uid" value='<?php echo htmlspecialchars($uid);?>' >
             <fieldset class="reason" >
            <input type="radio" name="reason" value="Login or password issue"> Login or password issue.<br>
            <input type="radio" name="reason" value="Problem while adding my passwords"> Problem while adding my passwords.<br>
            <input type="radio" name="reason" value="Problem while updating my passwords"> Problem while updating my passwords.<br>
            <input type="radio" name="reason" value="Problem while viewing my passwords"> Problem while viewing my passwords.<br>      
            <input type="radio" name="reason" value="Problem while deleting my passwords"> Problem while deleting my passwords.<br>
            <input type="radio" name="reason" value=" The site was slow or unresponsive"> The site was slow or unresponsive.<br>
              <input type="radio" name="reason" value="Other"> Other problem.<br><hr>
              </fieldset>
              <p>If other problem, please specify(500 characters).</p>
           <div class="form-group"> <textarea name="comment" class="form-control input-lg" placeholder="Please specify the problem.."  rows=5 cols=5 maxlength=500 ></textarea><br></div>
          
            <div class="form-group clearfix"><input type="submit" class="btn btn-primary btn-lg pull-left" name="submit" value="Submit Feedback"></div>
  </form>     
</body>
<p class="m-0 text-center text-white">© Copyright 2018 PV Group</p>
</html>
<?php } ?>