<?php
include '../config/db.php';
include '../auth_check.php';

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>ToDo Pro Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand">📋 ToDo Pro</a>
    <div>
        <span class="text-white me-3">Welcome, <?= $_SESSION['name'] ?></span>
        <a href="../auth/logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<!-- CONTAINER -->
<div class="container mt-4">

<!-- ADD TASK CARD -->
<div class="card p-3 shadow-sm mb-4">
    <form method="POST" action="add.php" class="d-flex">
        <input type="text" name="task" class="form-control me-2" placeholder="Enter new task..." required>
        <button class="btn btn-primary">Add Task</button>
    </form>
</div>

<!-- TASK LIST -->
<div class="card shadow-sm p-3">

<h5 class="mb-3">Your Tasks</h5>

<?php
$result = $conn->query("SELECT * FROM tasks WHERE user_id=$user_id ORDER BY id DESC");

while($row = $result->fetch_assoc()){
?>

<div class="task-item d-flex justify-content-between align-items-center">

<div>
<?php if($row['status']) echo "<del class='text-muted'>"; ?>
<?= $row['task'] ?>
<?php if($row['status']) echo "</del>"; ?>
</div>

<div>
<a href="complete.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">✔</a>
<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏</a>
<a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">❌</a>
</div>

</div>

<hr>

<?php } ?>

</div>

</div>

</body>
</html>