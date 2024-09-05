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
    <title>My Result</title>
    
    <?php include 'student_css.php'; ?>
    <style>
        /* Center the content */
        .content {
            text-align: center;
        }
        
        /* Style the result table */
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
        <h1>My Result - <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <table>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
            <!-- Add dynamic content here -->
            <tr>
                <td>Subject 1</td>
                <td>85</td>
            </tr>
            <tr>
                <td>Subject 2</td>
                <td>92</td>
            </tr>
            <tr>
                <td>Subject 3</td>
                <td>78</td>
            </tr>
            <!-- Add more rows for additional subjects and marks -->
        </table>
    </div>

</body>
</html>
