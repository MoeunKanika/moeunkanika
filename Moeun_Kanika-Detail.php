<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "university_db";
$conn = new mysqli($host, $user, $pass, $dbname);

// យក ID ពី URL
$id = $_GET["id"];

// JOIN ទាញយកព័ត៌មានលម្អិត
$sql = "SELECT 
            s.student_name,
            u.university_name,
            f.faculty_name,
            p.province_name
        FROM student s
        JOIN university u ON s.stu_university_id = u.university_id
        JOIN faculty f ON s.stu_faculty_id = f.faculty_id
        JOIN province p ON s.stu_province_id = p.province_id
        WHERE s.student_id = $id";


$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="Moeun_Kanika.css">
    <title>Student Detail</title>
    
</head>

<body>

    <h1 class="text">Student Detail: <?= htmlspecialchars($student["student_name"]) ?></h1>

    <table class="leble">
        <tr>
            <td>University Name</td>
            <td><?= $student["university_name"] ?></td>
        </tr>
        <tr>
            <td>Faculty Name</td>
            <td><?= $student["faculty_name"] ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?= $student["province_name"] ?></td>
        </tr>
    </table>

</body>

</html>