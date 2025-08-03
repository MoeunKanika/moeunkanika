<?php
// 1. Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "university_db"; // Change this to your database name

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Fetch student data with JOINs
$sql = "SELECT 
            s.student_id, 
            s.student_name, 
            s.gender, 
            u.university_name, 
            f.faculty_name, 
            p.province_name
        FROM student s
        JOIN university u ON s.stu_university_id = u.university_id
        JOIN faculty f ON s.stu_faculty_id = f.faculty_id
        JOIN province p ON s.stu_province_id = p.province_id
        ORDER BY s.student_id ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <!-- <link href="" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="Moeun_Kanika.css">
    <title>List of Students</title>
    <style>
        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }

        .update-btn {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>

<body>
    <h1 class="text">List of Students</h1>
    <p class="text">MOEUN KANIKA <br> ID:17 </p>
    <table>
        <tr class="header">
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th colspan="9">Options</th>
        </tr>
        <td class="add" colspan="9"><a href="Moeun_Kanika-Add_student.php">Add (a student)</a></td>
        <?php
        $count = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count++;
                echo "<tr>";
                echo "<td><a href='Moeun_Kanika-Detail.php?id=" . $row["student_id"] . "'>" . $count . "</a></td>";
                echo "<td>" . $row["student_name"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td><a class='action-btn update-btn' href='Moeun_Kanika-Update.php?id=" . $row['student_id'] . "&row=$count'>Update</a></td>";

                echo "<td> <a class='action-btn delete-btn' 
                   href='Moeun_Kanika-Delete.php?id=" . $row["student_id"] . "' 
                   onclick=\"return confirm('Are you sure you want to delete this student?');\">
                   Delete</a>
                </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <p>There are <?php echo $count; ?> students</p>
</body>

</html>

<?php
$conn->close();
?>