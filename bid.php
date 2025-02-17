 <?php
    session_start();
    include 'config.php';
    include './Common/header.php';
    
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $fetch = "SELECT * FROM `client_profile` WHERE ID = $user_id";
        $res = mysqli_query($conn,$fetch);
        if($res){
            $row = mysqli_fetch_assoc($res);
            $address = $row['address'];

        }

    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];
        $phone = $_POST['phone'];
        $amount = $_POST['amount'];

        $insert = "INSERT INTO `bid` (`user_id`, `name`, `email`, `address`, `phone`, `bid_amount`, `time`, `problem`) VALUES ('$user_id', '$name', '$email', '$address', '$phone', '$amount', current_timestamp(), '$desc')";
        $result = mysqli_query($conn,$insert);
        var_dump($result);
        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $error = "Registration failed!";
        }
    
    }
 ?>
 <!-- Appointment Start -->
 <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-appointment rounded">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <div class="rounded p-5 my-5" style="background: rgba(55, 55, 63, .7);">
                            <h1 class="text-center text-white mb-4">Define Problems</h1>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" name="name" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" name="email" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4 h-100" placeholder="Description" required="required" name="desc" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Phone Number" required="required" name="phone" />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control border-0 p-4" placeholder="Bid Amount" required="required" name="amount" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block border-0 py-3" type="submit" name="submit" >Place Bid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
