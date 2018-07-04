<?php
echo "Session Expired!" . "<br>";
echo "Please login to continue!" . "<br>";
echo "<script>setTimeout(\"location.href = '/PasswordManager/index.html';\",2500);</script>";
?>