<?php
include '../config/db.php';
include '../auth_check.php';

$user_id = $_SESSION['user_id'];
$task = $_POST['task'];

$conn->query("INSERT INTO tasks (task, user_id) VALUES ('$task', $user_id)");

header("Location: index.php");
?>