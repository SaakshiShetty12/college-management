<?php

error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message'])
{
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

$host="localhost";
$user="root";
$password="";
$db="collegeproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <label class="logo">ARS College</label>
        <ul>
           <li><a href="">Home</a></li> 
           <li><a href="">Contact</a></li>
           <li><a href="">Admission</a></li>
           <li><a href="login.php" class="btn btn-success">Login</a></li>
  </ul>  
</nav>


<div class="section1">
    <label class="img_text">We Teach Students With Care</label>
    <img class="main_img" src="school_management.jpg">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="welcome_img" src="school2.jpg">
</div>
<div class="col-md-8">
    <h1>Welcome to ARS College</h1>
    <p class="para">Welcome to ARS College, where academic excellence meets vibrant community engagement. At the forefront of innovative education, we foster a dynamic learning environment that nurtures critical thinking and creativity. Our dedicated faculty members are committed to guiding students on a transformative educational journey, equipping them with skills for success in a rapidly evolving world. With state-of-the-art facilities and a diverse range of programs, ARS College is not just a place of learning but a hub of collaboration, where students discover their passions and build lasting connections. Join us in shaping a future of limitless possibilities at ARS College.</p>
</div>
</div>
    <center>
        <h1>Our Professors</h1>
</center>

<div class="container">
    <div class="row">

       <?php

       while($info=$result->fetch_assoc())
       {

       

       ?>
        <div class="col-md-4">
            <img class="teacher" src="<?php  echo "{$info['image']}" ?>">
            <h3><?php  echo "{$info['name']}" ?></h3>
            <h5><?php  echo "{$info['description']}" ?></h5>
        </div>

        <?php
       }
        
        ?>

       
</div>
<center>
        <h1>Our Course</h1>
</center>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="teacher" src="web.jpg">
            <h3>WEB DEVELOPMENT</h3>
            
        </div>
        <div class="col-md-4">
        <img class="teacher" src="graphic.jpg">
        <h3>GRAPHIC DESIGN</h3>
        
        </div>
        <div class="col-md-4">
        <img class="teacher" src="marketing.png">
        <h3>MARKETING</h3>
        
        </div>
    </div>
</div>
<center>

    <h1 class="adm">Admission Form</h1>
    
</center>
<div 
align="center" class="admission_Form">

    <form action="data_check.php" method="POST">

        <div class="adm_int">
            <label class="label_text">Name</label>
            <input class="input_deg" type="text" name="name">
        </div>

        <div class="adm_int">
            <label class="label_text">Email</label>
            <input class="input_deg" type="text" name="email">
        </div>

        <div class="adm_int">
            <label class="label_text">Phone</label>
            <input class="input_deg" type="text" name="phone">
        </div>

        <div class="adm_int">
            <label class="label_text">Message</label>
            <textarea class="input_txt"name="message"></textarea>
        </div>

        <div class="adm_int">
            <input class="btn btn-primary" id="submit" type="Submit" value="apply" name="apply">
        </div>
    </form>
</div>
<footer>
    <h3 class="footer_txt">All @Copyright reserved by ARS College</h3>
</footer>
</body>
</html>