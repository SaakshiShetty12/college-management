<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
} elseif ($_SESSION['userType'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_GET['teacher_id'])) {
    $t_id = $_GET['teacher_id'];
    $sql = "SELECT * FROM teacher WHERE id='$t_id' ";
    $result = mysqli_query($data, $sql);
    $info = $result->fetch_assoc();
}

if (isset($_POST['update_teacher'])) {
    $id = $_POST['id'];
    $t_name = $_POST['name'];
    $t_des = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    if ($file) {
        $sql2 = "UPDATE teacher SET name='$t_name', description='$t_des', image='$dst_db' WHERE id='$id' ";
    } else {
        $sql2 = "UPDATE teacher SET name='$t_name', description='$t_des', image='$dst_db' WHERE id='$id' ";
    }

    $result2 = mysqli_query($data, $sql2);
    if ($result2) {
        header('location:admin_update_teacher.php');
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
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .form_deg {
            background-color: skyblue;
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Update Teacher Data</h1>

            <form class="form_deg" action="admin_update_teacher.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>

                <div>
                    <label>Teacher Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                </div>

                <div>
                    <label>About teacher</label>
                    <textarea name="description" rows="4"><?php echo "{$info['description']}"; ?></textarea>
                </div>

                <div>
                    <label>Teacher old Image</label>
                    <img width="100px" height="100px" src="<?php echo "{$info['image']}"; ?>">
                </div>

                <div>
                    <label>Teacher new Image</label>
                    <input type="file" name="image">
                </div>

                <div>
                    <input class="btn btn-success" type="submit" name="update_teacher" value="Update">
                </div>
            </form>
        </center>
    </div>
</body>

</html>