<?php
$conn = mysqli_connect("localhost", "root", "", "tunglt")
        or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>