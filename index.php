<?php
session_start();
require("./connect.php");

if (!isset($_SESSION["user_id"])) header("Location: login.php");

$sql = "SELECT * FROM student";

$result = mysqli_query($con, $sql);
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
        <h3>รายชื่อนักศึกษา</h3>
        <table border="1">
            <thead>
                <tr>
                    <td>ID.</td>
                    <td>Name</td>
                    <td>Year</td>
                    <td>Branch</td>
                    <td>Grade</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["year"] ?></td>
                        <td><?= $row["branch"] ?></td>
                        <td><?= $row["grade"] ?></td>
                        <td>
                            <a href="edit_student.php?id=<?= $row['id'] ?>">แก้ไข</a>
                        </td>
                        <td>
                            <a href="delete_student.php?id=<?= $row['id'] ?>">ลบ</a>
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php
mysqli_close($con);
?>