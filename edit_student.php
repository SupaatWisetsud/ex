<?php
session_start();
require('./connect.php');

if (!isset($_SESSION["user_id"])) header("Location: login.php");

if(isset($_GET["id"])){
    $sql = "SELECT * FROM student WHERE id = '{$_GET['id']}' ";
    
    $result = mysqli_query($con, $sql);
    $student = mysqli_fetch_assoc($result);
}else{
    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $sql = "UPDATE student 
            SET name = '{$_POST['name']}', 
            year = '{$_POST['year']}', 
            branch = '{$_POST['branch']}', 
            grade = '{$_POST['grade']}'
            WHERE id = '{$_GET['id']}' ";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>
            if(confirm('แก้ไขข้อมูลเสร็จสิ้น')) location.replace('index.php')
            else location.replace('index.php')
        </script>";
    }else{
        echo "<script>
                alert('เกิดข้อผิดพลาด');
            </script>";
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
    <?php require("./menu.php") ?>

    <form method="post">
        <div>
            ID : <input type="text" name="id" placeholder="ID student" value="<?= $student["id"] ?>" readonly><br>
            Name : <input type="text" name="name" placeholder="Name" value="<?= $student["name"] ?>"><br>
            Year : <input type="text" name="year" placeholder="Year" value="<?= $student["year"] ?>"><br>
            Branch : <input type="text" name="branch" placeholder="Branch" value="<?= $student["branch"] ?>"><br>
            Grade : <input type="text" name="grade" placeholder="Grade" value="<?= $student["grade"] ?>"><br>
        </div>
        <br>
        <button type="submit" name="submit">แก้ไขข้อมูลนักศึกษา</button>
    </form>

</body>

</html>
<?php 
    mysqli_close($con);
?>