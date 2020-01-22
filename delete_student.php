<?php
require('./connect.php');
if (!isset($_SESSION["user_id"])) header("Location: login.php");
if (!isset($_GET['id'])) header("Location: index.php");

$sql = "DELETE FROM student WHERE id = '{$_GET['id']}' ";

$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script>
            if(confirm('ลบข้อมูลเสร็จสิ้น')) location.replace('index.php')
            else location.replace('index.php')
        </script>";
} else {
    echo "<script>
        if(confirm('เกิดข้อผิดพลาด')) location.replace('index.php')
        else location.replace('index.php')
            </script>";
}

mysqli_close($con);
?>