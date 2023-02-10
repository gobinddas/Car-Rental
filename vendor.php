<?php
include('config/constants.php');
include('config/functions.php');
$index_user_data = index_loginval($conn);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
    // something was posted
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $car = $_POST['car'];
    $location = $_POST['location'];

    if (!empty($full_name) && !empty($car) && !ctype_alpha($phone)) {

        $user_id = random_num(20);
        $query = "INSERT INTO addvehicle_req(owner,phone,email,car,location) VAlUES ('$full_name','$phone','$email','$car','$location')";

        mysqli_query($conn, $query);

        header("Location: done.php");
    } else {
        echo "enter valid information!";
    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Open+Sans:wght@300&family=Orbitron&family=Oswald:wght@500&family=Playfair+Display:wght@500&family=Poppins:wght@300;400;500;600&family=Quicksand:wght@300&family=Roboto+Slab:wght@300;400&family=Rubik+Glitch&family=Rubik+Microbe&family=Russo+One&family=Signika:wght@300;400&family=Sora:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Open+Sans:wght@300&family=Orbitron&family=Oswald:wght@500&family=Roboto+Slab:wght@300;400&family=Rubik+Glitch&family=Rubik+Microbe&family=Sora:wght@300&display=swap');
    </style>


</head>

<body>

    <!-- -----------header--------------- -->
    <?php include 'include/header.php'; ?>
    <!-- ----vendor------ -->
    <section class="vendor">
        <div class="inner-vendor">
            <div class="container">
                <div class="vendor-flex">
                    <div class="content">
                        <h1>Earn anytime, anywhere</h1>
                        <p>Being with CRO means being on the highest earning platform! So, what are you waiting for?
                            Join us to earn the most!</p>


                    </div>
                    <div class="vendor-form">
                        <form action="" method="POST">
                            <label for="full_name">Full Name</label> <br>
                            <input type="text " id="full " name="full_name" required>
                            <br>

                            <label for="mobile ">Mobile Number</label> <br>
                            <input type="phone " id="mobile " name="phone" required> <br>
                            <label for="email ">Email</label> <br>
                            <input type="email " id="email " name="email"> <br>
                            <label>Car Modle</label><br>
                            <input type="text" name="car" required><br><br>
                            <div class="location loco">
                                <label for="pet-select"><i class="fa-sharp fa-solid fa-location-dot"></i>
                                    Location</label>

                                <select name="location">
                                    <option value="">select location</option>
                                    <option value="Kathmandu">Kathmandu</option>
                                    <option value="Pokhara">Pokhara</option>
                                    <option value="Birathnagar">Birathnagar</option>
                                </select>
                            </div>

                            <input type="submit" name="signup" id="submit" value="submit" class="btn">
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>





</body>

</html>