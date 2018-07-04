<?php
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/database.php');
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/email.php');
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/user/encryption.php');
require_once('google-login-api.php');
/* Google App Client Id */
define('CLIENT_ID', '138800578179-mn57im9u9iek79mhfphtou3ocoduveat.apps.googleusercontent.com');

/* Google App Client Secret */
define('CLIENT_SECRET', 'qDC12ygV3TF3Or-7dvFdpGiG');

/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://prajwalvenkatesh.com/PasswordManager/google/gauth.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
	
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
		
 		$email=$user_info['emails'][0]['value'];
		$name=$user_info['displayName'];

		$email_query = "SELECT * FROM `users` WHERE email = '$email'";
		$email_result = mysqli_query($conn, $email_query) or die(mysqli_error($conn));
		$email_count = mysqli_num_rows($email_result);
		if($email_count==0)
		{
			$uid=generateRandomString(15);
			$insert_query="INSERT INTO users (`uid`,`created_on`,`email`,`google_user`,`act_status`) VALUES('$uid',now(),'$email','1','1')";
			$insert_result = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
			session_start();
			$_SESSION['uid'] = $uid;
			$_SESSION['email'] = $email;
			$_SESSION["authenticated"] = 'true';
			$_SESSION["user"] = 'true';
			$_SESSION['logged_in'] = 1;
			$getll = mysqli_query($conn,"SELECT last_login FROM users WHERE uid = '$uid' ") or die( "<b>Error:</b> Something went wrong!"); 
			$LL = mysqli_fetch_row($getll);
			// Set session variable
			$_SESSION['lastlogin'] = $LL[0];
			$message="<p>Hello User,<br>"."Welcome to PasswordManager, perfect place to store your passwords secure."."<br><br>"."This is an notification email informing you an account has been created using this email."."<br><br>".$email."<br><br><br>"."We're sending an email just to confirm that this was you. "."<br><br><br>"."---------------------------------------------"."<br><br><br>"."Copyright PV Group 2018</p>";
			$subject="Login Alert";
			send_email($email,$message,$subject);
			echo "<script type='text/javascript'>window.location.href = '/PasswordManager/user-home.php';</script>";
		}
		else
		{
			$uid_query="SELECT uid FROM users WHERE email ='$email'";
			$uid_result = mysqli_query($conn,$uid_query) or die(mysqli_error($conn));
			$row = mysqli_fetch_row($uid_result);
			$uid=$row[0];	
			$update_query = $sql = "UPDATE users SET google_signIN='1' where uid='$uid'";
			$update_result = mysqli_query($conn, $update_query) or die(mysqli_error($conn));
			session_start();
			$_SESSION['uid'] = $uid;
			$_SESSION['email'] = $email;
			$_SESSION["authenticated"] = 'true';
			$_SESSION["user"] = 'true';
			$_SESSION['logged_in'] = 1;
			$getll = mysqli_query($conn,"SELECT last_login FROM users WHERE uid = '$uid' ") or die( "<b>Error:</b> Something went wrong!"); 
			$LL = mysqli_fetch_row($getll);
			// Set session variable
			$_SESSION['lastlogin'] = $LL[0];
			// Update New LastLogin
			$updatelog = mysqli_query($conn,"UPDATE users SET last_login = now() WHERE uid = '$uid' ") or die( "<b>Error:</b> Something went wrong!");
			$message="<p>Hello User,<br>"."Welcome to PasswordManager, perfect place to store your passwords secure."."<br><br>"."New sign-in to your PasswordManager account using your google account."."<br><br>".$email."<br><br><br>"."We're sending an email just to confirm that this was you. "."<br><br><br>"."---------------------------------------------"."<br><br><br>"."Copyright PV Group 2018</p>";
			$subject="Login Alert";
			send_email($email,$message,$subject);
			echo "<script type='text/javascript'>window.location.href = '/PasswordManager/user-home.php';</script>";
		}

	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>