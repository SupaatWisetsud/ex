<?php 
    session_start();
    require("./connect.php");

    if(isset($_SESSION['user_id'])) header("Location: index.php");

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";

        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result)){
            $objResult = mysqli_fetch_assoc($result);

            $_SESSION["user_id"] = $objResult["id"];

            header("Location: index.php");
        }else{
            echo "<script>alert('Username หรือ Password ของท่านไม่ถูกต้อง')</script>";
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
    <form method="post">
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <button type="submit" name="submit" >เข้าสู่ระบบ</button>
    </form>
</body>
</html>