<?php
include './Common/header.php';
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lawyer list</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 550px;
            object-fit: cover;
        }

        body {
            background-color: #343a40;
        }
    </style>
</head>
<body>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/slider1.jpg" class="d-block w-100" alt="demo">
        </div>
        <div class="carousel-item">
            <img src="./img/slider2.jpg" class="d-block w-100" alt="demo">
        </div>
        <div class="carousel-item">
            <img src="./img/slider3.jpg" class="d-block w-100" alt="demo">
        </div>
    </div>
</div>


<?php
$fetch = "SELECT *  FROM `register` 
    INNER JOIN `lawyer_profile` 
    ON register.ID = lawyer_profile.user_ID;";

$result = mysqli_query($conn, $fetch);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4" style="text-shadow: 5px 15px 5px; color:#bababc">Our Lawyer</h1>
    <div class="row justify-content-center">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-3">
                    <div class="card text-center">
                        <img src="./img/<?php echo $row['photo']; ?>" class="card-img-top" alt="Lawyer Profile Picture">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><?php echo $row['specialty']; ?></p>
                            <a href="lawyer_profile.php?LID= <?php echo $row['user_ID']; ?>" class="btn btn-primary">View
                                Profile</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No lawyers found.</p>
        <?php endif; ?>
    </div>
</div>
<hr>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
