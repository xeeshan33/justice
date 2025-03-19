<?php
 include 'config.php';
 session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

if (isset($_POST['submit'])) {
    $phone = $_POST['phone']; 
    $address = $_POST['address']; 
    $dob = $_POST['DOB']; 
    $gender = $_POST['gender']; 
    $CNIC = $_POST['CNIC']; 
    $work = $_POST['work']; 
    
   
    // Pseudo-code for registration
    $insert = "INSERT INTO `client_profile` (`user_id`, `phone_no`, `address`, `DOB`, `gender`, `cnic_no`, `work`) VALUES ('$user_id', '$phone', '$address', '$dob', '$gender', '$CNIC', '$work')";
    $result = mysqli_query($conn,$insert);
    if ($result) {
        // After successful registration, redirect to login page
        header('Location: index.php');
        exit;
    } else {
        print_r("Registration failed!");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Client Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
            <h2 class="text-center mb-4">Client Information</h2>
                <div class="col-md-6">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Contact</label>
                            <input type="text" name="phone" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="DOB" class="form-label">DOB</label>
                            <input type="date" name="DOB" class="form-control" id="DOB" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cnic" class="form-label">CNIC_NO</label>
                            <input type="text" name="cnic" class="form-control" id="cnic" required>
                        </div>
                        <div class="mb-3">
                            <label for="work" class="form-label">Work</label>
                            <input type="text" name="work" class="form-control" id="work" required placeholder="Job,Business,etc">
                        </div>
                        
                        
                </div>        
                <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                
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
