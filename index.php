<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justice Platform</title>
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
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4">Find the Best Lawyers for Your Legal Needs</h1>
            <p class="lead">Connect with top-rated lawyers and discuss your legal issues.</p>
            <a href="register.php" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Experienced Lawyers</h4>
                        <p>Find lawyers with experience in various legal fields.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Easy Consultations</h4>
                        <p>Discuss your legal issues through our messaging system.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Secure Payments</h4>
                        <p>Make secure payments through trusted gateways.</p>
                    </div>
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
