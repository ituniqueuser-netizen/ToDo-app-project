<?php
$conn = new mysqli("localhost", "root", "", "todo_pro");

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>