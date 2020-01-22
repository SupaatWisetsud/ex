<?php 
    $con = mysqli_connect("localhost", "root", "", "it_6008") or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error());

    mysqli_set_charset($con, "utf8");
    
?>