<?php
require_once 'connection.php';
$id = $_REQUEST["id"];
$sql = "DELETE FROM books WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: listsach.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
