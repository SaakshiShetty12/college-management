<?php
 session_start();
 if(!isset($_SESSION['username']))
 {
    header("Location:login.php");
 }
 elseif(($_SESSION['userType']=='admin'))
 {
    header("location:login.php");
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

<?php

include 'student_css.php'

?>

    
</head>
<body>
    

<?php

include 'student_sidebar.php'

?>



</body>
</html>