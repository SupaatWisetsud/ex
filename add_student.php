<?php
session_start();
require('./connect.php');

if (!isset($_SESSION["user_id"])) header("Location: login.php");

if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $year = $_POST["year"];
    $branch = $_POST["branch"];
    $grade = $_POST["grade"];

    $sql = "SELECT * FROM student WHERE id = '$id' LIMIT 1 ";

    if (mysqli_num_rows(mysqli_query($con, $sql))) {
        echo "<script>
                alert('ID Student นี่มีในรายการแล้ว');
            </script>";
    } else {

        $sql = "INSERT INTO student VALUE('$id', '$name', '$year', '$branch', '$grade') ";

        $result = mysqli_query($con, $sql);


        if ($result) {
            echo "<script>
            if(confirm('เพิ่มข้อมูลเสร็จสิ้น')) location.replace('index.php')
            else location.replace('index.php')
        </script>";
        } else {
            echo "<script>
                alert('เกิดข้อผิดพลาด');
            </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php require_once('./menu.php') ?>
        <div>
            <h3>เพิ่มรายชื่อนักศึกษา</h3>
        </div>
        <div>
            <form method="post">
                <div>
                    ID : <input type="text" name="id" placeholder="ID student" required><br>
                    Name : <input type="text" name="name" placeholder="Name" required><br>
                    Year : <input type="text" name="year" placeholder="Year" required><br>
                    Branch : <input type="text" name="branch" placeholder="Branch" required><br>
                    Grade : <input type="text" name="grade" placeholder="Grade" required><br>
                </div>
                <br>
                <button type="submit" name="submit">เพิ่มนักศึกษา</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>