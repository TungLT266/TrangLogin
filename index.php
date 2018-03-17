<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tunglt";
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE tunglt";
    if (!$conn->query($sql) === TRUE) {
        echo "Error creating database: " . $conn->error;
    }
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE books (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50) NOT NULL,
            author VARCHAR(50) NOT NULL,
            year YEAR(4) NOT NULL,
            price DECIMAL(50,2) NOT NULL)";
    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }
    mysqli_query($conn,"SET NAMES 'UTF8'");
    $sql = "INSERT INTO books (title, author, year, price)
            VALUES ('HTML BOOK', 'Lê Thanh Tùng', '2014', '35')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO books (title, author, year, price)
            VALUES ('CSS BOOK', 'Lê Thanh Tùng', '2015', '40')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO books (title, author, year, price)
            VALUES ('JAVACRIPT BOOK', 'Lê Thanh Tùng', '2016', '45')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO books (title, author, year, price)
            VALUES ('PHP BOOK', 'Lê Thanh Tùng', '2017', '50')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO books (title, author, year, price)
            VALUES ('ENGLISH BOOK', 'Lê Thanh Tùng', '2017', '50.26')";
    mysqli_query($conn, $sql);
    header("Location: listsach.php");
?>