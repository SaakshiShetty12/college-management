<?php
session_start();

// Redirect to login page if user is not logged in or is not a student
if (!isset($_SESSION['username']) || $_SESSION['userType'] != 'student') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    
    <?php include 'student_css.php'; ?>
</head>
<body>
    
    <?php include 'student_sidebar.php'; ?>

    <div class="content">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <!-- Add content specific to the student's profile here -->
        <p>This is your profile page. You can view and update your information here.</p>
    </div>

</body>
</html>