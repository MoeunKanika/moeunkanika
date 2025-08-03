<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "university_db";

$conn = new mysqli($host, $user, $pass, $dbname);

$id = $_GET["id"];
$conn->query("DELETE FROM student WHERE student_id = $id");
header("Location: Moeun_Kanika-index.php");
exit();
