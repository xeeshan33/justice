<?php
 include 'config.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    
}

if (isset($_POST['submit'])) {
    $avb = $_POST['avb'];
    $spc = $_POST['spc'];
    $bio = $_POST['bio'];
    $dob = $_POST['dob']; 
    $gender = $_POST['gender']; 
    $phone = $_POST['phone']; 
    $address = $_POST['add']; 
    $exp = $_POST['exp']; 
    $language = $_POST['language']; 
    $fee = $_POST['fee']; 
    $edu = $_POST['edu']; 
    $CNIC = $_POST['CNIC']; 
    
    $photo = $_FILES['photo'];
    $image = $photo['name'];

   
    // Pseudo-code for registration
    $insert = "INSERT INTO `lawyer_profile` (`user_ID`, `availability`, `specialty`, `bio`, `DOB`, `gender`, `contact`, `address`, `experience`, `language`, `fee`, `photo`, `education`, `CNIC`) VALUES ('$user_id', '$avb', '$spc', '$bio', '$dob', '$gender', '$phone', '$address', '$exp', '$language', '$fee', '$image', '$edu', '$CNIC')";
    
    $success = mysqli_query($conn,$insert);
    var_dump($success);
    if ($success) {
        // After successful registration, redirect to login page
        header('Location: lawyers-dashbord.php');
        exit;
    } else {
        $error = "Registration failed!";
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
            <a class="navbar-brand" href="#">Lawyer Dashbord</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Client Buding</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
            <h2 class="text-center mb-4">Lawyer Information</h2>
                <div class="col-md-6">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="avb" class="form-label">Availability</label>
                            <input type="text" name="avb" class="form-control" id="avb" required>
                        </div>
                        <div class="mb-3">
                            <label for="spc" class="form-label">speciality</label>
                            <input type="text" name="spc" class="form-control" id="spc" required>
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">bio</label>
                            <input type="text" name="bio" class="form-control" id="bio" required>
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">DOB</label>
                            <input type="date" name="dob" class="form-control" id="dob" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">contact No</label>
                            <input type="text" name="phone" class="form-control" id="phone" required placeholder="+92 1234 5678900">
                        </div>
                        <div class="mb-3">
                            <label for="add" class="form-label">Address</label>
                            <input type="text" name="add" class="form-control" id="add" required>
                        </div>
            </div>            
            <div class="col-md-6">    
                        <div class="mb-3">
                            <label for="exp" class="form-label">Experience</label>
                            <input type="text" name="exp" class="form-control" id="exp" required>
                        </div>
                        <div class="mb-3">
                            <label for="language" class="form-label">Language</label>
                            <input type="text" name="language" class="form-control" id="language" required>
                        </div>
                        <div class="mb-3">
                            <label for="fee" class="form-label">Fees</label>
                            <input type="text" name="fee" class="form-control" id="fee" required>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">photo</label>
                            <input type="file" name="photo" class="form-control" id="photo" required>
                        </div>
                        <div class="mb-3">
                            <label for="edu" class="form-label">education</label>
                            <input type="text" name="edu" class="form-control" id="edu" required>
                        </div>
                        <div class="mb-3">
                            <label for="CNIC" class="form-label">CNIC</label>
                            <input type="text" name="CNIC" class="form-control" id="CNIC" required>
                        </div>
                </div>

                <button type="submit"  name="submit" class="btn btn-primary w-100">Register</button>

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
