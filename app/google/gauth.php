<?php
session_start();

require_once('google-login-api.php');
/* Google App Client Id */
define('CLIENT_ID', '340876954104-99ele4r0dk01s24iehv18ki7m07m71tp.apps.googleusercontent.com');

/* Google App Client Secret */
define('CLIENT_SECRET', '1e1UjqFlMxE6UebRh_mQwuJa');

/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://prajwalvenkatesh.com/app/google/gauth.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
 		

		echo '<pre>';print_r($user_info); echo '</pre>';

		// Now that the user is logged in you may want to start some session variables
		$_SESSION['logged_in'] = 1;

		// You may now want to redirect the user to the home page of your website
		 //header('Location: /app/home.html');
		echo "<script type='text/javascript'>window.location.href = '/app/home.html';</script>";

	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>