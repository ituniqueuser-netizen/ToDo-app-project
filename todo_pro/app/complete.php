<?php
include '../config/db.php';
include '../auth_check.php';

$id = $_GET['id'];

$conn->query("UPDATE tasks SET status=1 WHERE id=$id");

header("Location: index.php");
?>