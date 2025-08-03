<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "university_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Save when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["student_name"];
    $gender = $_POST["gender"];
    $university = $_POST["university"];
    $faculty = $_POST["faculty"];
    $province = $_POST["province"];

    $sql = "INSERT INTO student (student_name, gender, stu_university_id, stu_faculty_id, stu_province_id)
            VALUES ('$name', '$gender', '$university', '$faculty', '$province')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Student Add successfully!');
            window.location.href = 'Moeun_Kanika-index.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error updating student: " . $conn->error . "');
        </script>";
    }
}

// Get dropdown data
$universities = $conn->query("SELECT * FROM university");
$faculties = $conn->query("SELECT * FROM faculty");
$provinces = $conn->query("SELECT * FROM province");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Moeun_Kanika.css">
    <title>Document</title>
</head>


<body>

    <h1 class="text">Add Student</h1>
    <form class="form" method="post">
        Name: <input type="text" name="student_name" required><br><br>
        Gender:
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        University:
        <select name="university">
            <?php while ($row = $universities->fetch_assoc()) {
                echo "<option value='{$row["university_id"]}'>{$row["university_name"]}</option>";
            } ?>
        </select><br><br>
        Faculty:
        <select name="faculty">
            <?php while ($row = $faculties->fetch_assoc()) {
                echo "<option value='{$row["faculty_id"]}'>{$row["faculty_name"]}</option>";
            } ?>
        </select><br><br>
        Province:
        <select name="province">
            <?php while ($row = $provinces->fetch_assoc()) {
                echo "<option value='{$row["province_id"]}'>{$row["province_name"]}</option>";
            } ?>
        </select><br><br>
        <input type="submit" value="Add Student">
    </form>
</body>

</html>

