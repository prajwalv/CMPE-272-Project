<?php
echo "User must be logged in!" . "<br>";
echo "Redirecting in 3 seconds!";
echo "<script>setTimeout(\"location.href = '/PasswordManager/index.html';\",2500);</script>";
?>