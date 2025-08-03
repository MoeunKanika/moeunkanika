<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "university_db";
$conn = new mysqli($host, $user, $pass, $dbname);

$id = $_GET["id"];
$student = $conn->query("SELECT * FROM student WHERE student_id = $id")->fetch_assoc();
$universities = $conn->query("SELECT * FROM university");
$faculties = $conn->query("SELECT * FROM faculty");
$provinces = $conn->query("SELECT * FROM province");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $name = $_POST["student_name"];
    $gender = $_POST["gender"];
    $university = $_POST["university"];
    $faculty = $_POST["faculty"];
    $province = $_POST["province"];

    $sql = "UPDATE student SET
            student_name='$name',
            gender='$gender',
            stu_university_id='$university',
            stu_faculty_id='$faculty',
            stu_province_id='$province'
            WHERE student_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Student updated successfully!');
            window.location.href = 'Moeun_Kanika-index.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error updating student: " . $conn->error . "');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Moeun_Kanika.css">
    <title>Update Student</title>
</head>

<body>

    <h1 class="text">Update Student</h1>
    <form class="form" method="post">

        <label for="show_id">Student ID:</label>
        <input class="yy" type="text" id="show_id" name="show_id" value="<?= htmlspecialchars($student['student_id']) ?>" readonly><br><br>
        <input class="yy" type="hidden" name="student_id" value="<?= htmlspecialchars($student['student_id']) ?>">

        <label>Name:</label>
        <input class="yy" type="text" name="student_name" value="<?= $student['student_name'] ?>"><br><br>

        <label>Gender:</label>
        <select class="yy" name="gender">
            <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        </select><br><br>

        <label>University:</label>
        <select class="yy" name="university">
            <?php while ($row = $universities->fetch_assoc()) {
                $selected = $student["stu_university_id"] == $row["university_id"] ? "selected" : "";
                echo "<option value='{$row["university_id"]}' $selected>{$row["university_name"]}</option>";
            } ?>
        </select><br><br>

        <label>Faculty:</label>
        <select class="yy" name="faculty">
            <?php while ($row = $faculties->fetch_assoc()) {
                $selected = $student["stu_faculty_id"] == $row["faculty_id"] ? "selected" : "";
                echo "<option value='{$row["faculty_id"]}' $selected>{$row["faculty_name"]}</option>";
            } ?>
        </select><br><br>

        <label>Address:</label>
        <select class="yy" name="province">
            <?php while ($row = $provinces->fetch_assoc()) {
                $selected = $student["stu_province_id"] == $row["province_id"] ? "selected" : "";
                echo "<option value='{$row["province_id"]}' $selected>{$row["province_name"]}</option>";
            } ?>
        </select><br><br>
        <input class="yy" type="submit" value="Update Student">
    </form>
    <p><a href="Moeun_Kanika-index.php">Back to Student List</a></p>
</body>

</html>