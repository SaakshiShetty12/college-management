<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} elseif ($_SESSION['userType'] == 'student') {
    header("location: login.php");
}
$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM courses"; // Changed to select courses instead of teachers
$result = mysqli_query($data, $sql);

if ($_GET['course_id']) {
    $course_id = $_GET['course_id'];

    $sql2 = "DELETE FROM courses WHERE id='$course_id'";
    $result2 = mysqli_query($data, $sql2);
    if ($result2) {
        header('location: admin_view_courses.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'admin_css.php';
    ?>
    <style type="text/css">
        .table_th {
            padding: 20px;
            font-size: 20px;
        }

        .table_td {
            padding: 20px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
<?php
include 'admin_sidebar.php';
?>
<div class="content">
    <center>
        <h1>View All Courses Data</h1>
        <table border="1px">
            <tr>
                <th class="table_th">Course Name</th>
                <th class="table_th">Description</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php while ($info = $result->fetch_assoc()) { ?>
                <tr>
                    <td class="table_td"><?php echo $info['name']; ?></td>
                    <td class="table_td"><?php echo $info['description']; ?></td>
                    <td class="table_td"><img height="100px" width="100px" src="<?php echo $info['image']; ?>"></td>
                    <td class="table_td">
                        <a onClick="return confirm('Are You Sure To Delete confirm');" class='btn btn-danger'
                           href='admin_view_courses.php?course_id=<?php echo $info['id']; ?>'>Delete</a>
                    </td>
                    <td class="table_td">
                        <a class='btn btn-primary'
                           href='admin_update_course.php?course_id=<?php echo $info['id']; ?>'>Update</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </center>
</div>
</body>
</html>