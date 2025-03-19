<?php
    include 'config.php';
    session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    

    // Pseudo-code for authentication
    $query = "SELECT * FROM `register` WHERE email = '$email' AND password = '$password' AND role = '$role'";
    $res = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($res) > 0) {
        // Fetch the result row to get the user's role
        $row = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $row['ID'];
        // Store the role in the session
        $_SESSION['role'] = $row['role'];
    
        // Redirect based on the role
        if ($row['role'] == 'Client') {
            header('Location: index.php');
        } elseif ($row['role'] == 'Lawyer') {
            header('Location: ./Lawyers/lawyers-dashbord.php');
        }
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Justice Platform</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Login</h2>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Register as:</label>
                            <select name="role" class="form-select" id="role" required>
                                <option value="client">Client</option>
                                <option value="lawyer">Lawyer</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Justice Platform. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
