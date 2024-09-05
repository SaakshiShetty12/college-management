<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} elseif ($_SESSION['userType'] == 'student') {
    header("Location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    
    $course_id=$_GET['course_id'];
    $sql = "SELECT * FROM courses WHERE id='$course_id'";
    $result = mysqli_query($data, $sql);
    $course_info = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_course'])) {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['name'];
    $course_description = $_POST['description'];

    // Update course information
    $sql_update = "UPDATE courses SET name='$course_name', description='$course_description' WHERE id='$course_id'";
    $result_update = mysqli_query($data, $sql_update);

    if ($result_update) {
        header('Location: admin_view_course.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Course</title>
    <?php include 'admin_css.php'; ?>
    <style type="text/css">

label
{
 display: inline-block;
 width: 100px;
 text-align: right;
 padding-top: 10px;
 padding-bottom: 10px;
}
.form_deg 
{
 background-color:skyblue;
 width:600px;
 padding-top:70px;
 padding-bottom:70px;
}
</style>
    
</head>
<body>
    <?php include 'admin_sidebar.php'; ?>
    <div class="content">
   
        <center>
        <h1>Update Course</h1>
        <form class="form_deg" action="admin_update_course.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>

                <div>
                    <label>Course Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                </div>

                <div>
                    <label>About Course</label>
                    <textarea name="description" rows="4"><?php echo "{$info['description']}"; ?></textarea>
                </div>

                

                

                <div>
                    <input class="btn btn-success" type="submit" name="update_teacher" value="Update">
                </div>
            </form>
        </center>
    </div>
</body>

</html>