<?php
include '../config/db.php';
include '../auth_check.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Task</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow w-50 mx-auto">

<h4>Edit Task ✏</h4>

<form method="POST">

<input type="text" name="task" value="<?= $row['task'] ?>" class="form-control mb-3">

<button class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary">Back</a>

</form>

</div>

</div>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $task = $_POST['task'];

    $conn->query("UPDATE tasks SET task='$task' WHERE id=$id");

    header("Location: index.php");
}
?>