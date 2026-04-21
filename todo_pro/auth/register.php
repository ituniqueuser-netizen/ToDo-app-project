<?php
include '../config/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($check->num_rows > 0){
        $error = "Email already exists!";
    } else {
        $conn->query("INSERT INTO users (name,email,password) 
        VALUES ('$name','$email','$password')");

        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow w-50 mx-auto">

<h3 class="text-center">📝 Register</h3>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">

<input type="text" name="name" class="form-control mb-2" placeholder="Name" required>

<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-primary w-100">Register</button>

</form>

<p class="text-center mt-3">
Already have account? <a href="login.php">Login</a>
</p>

</div>

</div>

</body>
</html>