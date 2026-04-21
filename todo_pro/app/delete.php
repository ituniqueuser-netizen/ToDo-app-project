<?php
include '../config/db.php';
include '../auth_check.php';

$id = $_GET['id'];

$conn->query("DELETE FROM tasks WHERE id=$id");

header("Location: index.php");
?>