<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
<form action="search.php" method="post">  
Search: <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysqli_real_escape_string($_REQUEST['term']);     

$sql = "SELECT * FROM users WHERE username LIKE '%".$term."%',email LIKE '%".$term."%',created_on LIKE '%".$term."%',last_login LIKE '%".$term."%',role LIKE '%".$term."%'"; 
$r_query = mysqli_query($conn,$sql); 

while ($row = mysqli_fetch_array($r_query)){  
echo '<br /> Username: ' .$row['username'];  
echo '<br /> Email: '.$row['email'];  
echo '<br /> Account Created On: '.$row['created_on'];  
echo '<br /> Last Login: '.$row['last_login'];  
echo '<br /> Role: '.$row['role'];  
}  

}
?>
    </body>
</html>