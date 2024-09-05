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
    <title>My Courses</title>
    
    <?php include 'student_css.php'; ?>
    <style>
        /* Center the content */
        .content {
            text-align: center;
        }
        
        /* Style the course table */
        table {
            margin: 0 auto; /* Center the table */
            border-collapse: collapse;
            width: 50%; /* Adjust width as needed */
        }
        
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <?php include 'student_sidebar.php'; ?>

    <div class="content">
        <h1>My Courses - <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <table>
            <tr>
                <th>Course Name</th>
                <th>Instructor</th>
            </tr>
            <!-- Example of dynamic course display -->
            <tr>
                <td>Course 1</td>
                <td>Instructor 1</td>
            </tr>
            <tr>
                <td>Course 2</td>
                <td>Instructor 2</td>
            </tr>
            <tr>
                <td>Course 3</td>
                <td>Instructor 3</td>
            </tr>
            <!-- Add more rows for additional courses -->
        </table>
    </div>

</body>
</html>
