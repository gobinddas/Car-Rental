<?php
include('config/constants.php');
include('config/functions.php');
$index_user_data = index_loginval($conn);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
    // something was posted
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($full_name) && !empty($password) && !ctype_alpha($phone)) {

        $user_id = random_num(20);
        $query = "INSERT INTO users(name,phone,email,password,user_id) VAlUES ('$full_name','$phone','$email','$password','$user_id')";

        mysqli_query($conn, $query);

        header("Location: login.php");
    } else {
        echo "enter valid information!";
    }


}
if (isset($_POST['request'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // something was posted
        $car = $_POST['car'];
        $frm = $_POST['frm'];
        $to = $_POST['to'];
        $pdate = $_POST['pdate'];
        $ptime = $_POST['ptime'];
        $ddate = $_POST['ddate'];
        $dtime = $_POST['dtime'];
        $addserv = $_POST['addserv'];
        $bname = $index_user_data['name'];
        $bphone = $index_user_data['phone'];
        $bemail = $index_user_data['email'];
        

        if (!empty($car) && !empty($pdate)) {


            $query = "INSERT INTO booking_request(name,phone,email,car,frm,d_to,date_from,ptime,date_till,dtime,add_serv) VALUES ('$bname','$bphone','$bemail','$car','$frm','$to','$pdate','$ptime','$ddate','$dtime','$addserv')";

            mysqli_query($conn, $query);

            header("Location: index.php");
        } else {
            echo "enter valid information!";
        }


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
    <!-- -----home section------ -->
    <!-- <?php echo $index_user_data['name'] . $index_user_data['phone'] . $index_user_data['email']; ?> -->
    <section class="home">
        <div class="inner-home">
            <div class="container">
                <div class="container1-item container1-form">

                    <form class="form1" method="POST">
                        <select name="car" id="car-select" required>

                            <option value="">Select Your Car Type</option>
                            <?php

                            $sql2 = "SELECT * FROM vehicle";

                            $res2 = mysqli_query($conn, $sql2);

                            $count2 = mysqli_num_rows($res2);
                            if ($count2 > 0) {
                                while ($row2 = mysqli_fetch_assoc($res2)) {
                                    $id = $row2['id'];
                                    $car = $row2['car'];
                                    ?>
                                    <option value="<?php echo $car; ?>"><?php echo $car; ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">none</option>
                            <?php
                            }
                            ?>
                            <!-- <option value="VW Passat">VW Passat CC</option>
                            <option value="Mercedes">Mercedes-Benz GLK</option>
                            <option value="BMW">BMW 320 ModernLine</option>
                            <option value="Toyota">Toyota Camry</option>
                            <option value="Audi">Audi A1 S-LINE</option>
                            <option value="VW Golf ">VW Golf VII</option>  -->
                        </select>

                        <div class="location loco">
                            <label for="pet-select"><i class="fa-sharp fa-solid fa-location-dot"></i>Pick-up
                                Location</label>

                            <select name="frm" id="location-select"required>
                                <option value="Kathmandu">Kathmandu</option>
                                <option value="Pokhara">Pokhara</option>
                                <option value="Birathnagar">Birathnagar</option>

                            </select>
                        </div>
                        <div class="location loco">
                            <label for="pet-select"><i class="fa-sharp fa-solid fa-location-dot"></i>Drop-off
                                Location</label>

                            <select name="to" id="location-select"required>
                                <option value="Kathmandu">Kathmandu</option>
                                <option value="Pokhara">Pokhara</option>
                                <option value="Birathnagar">Birathnagar</option>

                            </select>
                        </div>
                        <div class="calander loco">
                            <label for="birthday"><i class="fa-regular fa-calendar-days"></i>Pick-up Date and
                                Time</label>
                            <input type="date" id="birthday" name="pdate"required>
                            <input type="time" id="appt" name="ptime">
                        </div>
                        <div class="calander loco">
                            <label for="birthday"><i class="fa-regular fa-calendar-days"></i>Drop-up Date and
                                Time</label>
                            <input type="date" id="birthday" name="ddate"required>
                            <input type="time" id="appt" name="dtime">
                        </div>
                        <div class="additional-services loco">
                        <label><i class="fa-sharp fa-solid fa-location-dot"></i>Additional service</label>
                            <input type="text " id="full " name="add_serv" placeholder="Fuel,Baby seat,Driver or None" required>
                        </div>



                            <?php 
                             if($index_user_data == false){
                                echo'<a href="login.php" class="btn">Login to request</a> <label style="color:white;">Or</label> <a href="#register"class="btn">Sign up<a>';
                             }
                             else{
                                echo'<input type="submit" name="request" id="submit" value="Submit" class="btn">';
                             }
                            ?>
                        
                       
                    </form>

                </div>

                <div class="container1-item container1-car" data-aos="fade-left">
                    <h1>GET 15% OFF ON YOUR RENTAL</h1>
                    <h2>Plan your trip now</H2>
                    <div class="carcover-fig"><img src="img/carcover.png" alt="" srcset=""></div>

                </div>
            </div>

        </div>
    </section>

    <!-- ----service section-------- -->
    <section class="services">
        <div class="container">
            <h1>Customer Services</h1>
            <h2>Best customer services in the world</h2>
            <ul class="services-grid-container">
                <li class="services-grid-item">
                    <a href="" class="services-item-link">
                        <h1 class="services-heading">Fule</h1>
                        <p class="services-discription">Lont quos voluptatibus commodi, Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. In ratione quisquam odit illum suscipit, perferendis
                            consequatur doloribus voluptatum sed amet cum labore at vitae odio maxime accusamus, illo
                            ducimus ut! dolorum cum, atque laudantium alias architecto odio aliquid accusantium tempore!
                        </p>
                    </a>

                </li>
                <li class="services-grid-item">
                    <a href="" class="services-item-link">

                        <h1 class="services-heading">Baby-Seat</h1>
                        <p class="services-discription">Lont quos voluptatibus commodi, Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. In ratione quisquam odit illum suscipit, perferendis
                            consequatur doloribus voluptatum sed amet cum labore at vitae odio maxime accusamus, illo
                            ducimus ut! dolorum cum, atque laudantium alias architecto odio aliquid accusantium tempore!
                        </p>

                    </a>


                </li>
                <li class="services-grid-item">
                    <a href="" class="services-item-link">

                        <h1 class="services-heading">Driver</h1>
                        <p class="services-discription">Lont quos voluptatibus commodi, Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. In ratione quisquam odit illum suscipit, perferendis
                            consequatur doloribus voluptatum sed amet cum labore at vitae odio maxime accusamus, illo
                            ducimus ut! dolorum cum, atque laudantium alias architecto odio aliquid accusantium tempore!
                        </p>

                    </a>

                </li>
                <li class="services-grid-item">
                    <a href="" class="services-item-link">

                        <h1 class="services-heading">Flexible-Booking</h1>
                        <p class="services-discription">Lont quos voluptatibus commodi, Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. In ratione quisquam odit illum suscipit, perferendis
                            consequatur doloribus voluptatum sed amet cum labore at vitae odio maxime accusamus, illo
                            ducimus ut! dolorum cum, atque laudantium alias architecto odio aliquid accusantium tempore!
                        </p>
                    </a>


                </li>
            </ul>
        </div>
    </section>
    <!-- -----vhecle model------ -->
    <section class="car-model">
        <div class="container">
            <h1>Vehicle Models - Our rental fleet at a glance</h1>
            <div class="model-flex-container">
                <ul class="model-name">
                    <li id="model1 ">VW Golf VII</li>
                    <hr>
                    <li id="model2 ">Audi A1 S-LINE</li>
                    <hr>
                    <li id="model3 ">Toyota Camry</li>
                    <hr>
                    <li id="model4 ">BMW 320 ModernLine</li>
                    <hr>
                    <li id="model5 ">Mercedes-Benz GLK</li>
                    <hr>
                    <li id="model6 ">VW Passat CC</li>

                </ul>
                <div class="model model1 ">
                    <div class="model-wrap ">
                        <img src="img/model/vehicle1.jpg " alt=" " srcset=" ">
                        <div class="table " data-aos="fade-left" 0Z>
                            <table>
                                <tr>
                                    <th colspan="2 ">RS.4999 Rent Per Day</th>

                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>Limousine</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Luggage</td>
                                    <td>2 Suitcases/2 Bags</td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>Automatic</td>
                                </tr>
                                <tr>
                                    <td>Air conditioning</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Minimum age</td>
                                    <td>25 years</td>
                                </tr>
                                <tr>
                                    <th colspan="2 " class="reserve"> <a href="">Reserve Now</a> </th>

                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="model model2 ">
                    <div class="model-wrap ">
                        <img src="img/model/vehicle2.jpg " alt=" " srcset=" ">
                        <div class="table ">
                            <table>
                                <tr>
                                    <th colspan="2 ">RS.5999 Rent Per Day</th>

                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>Limousine</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Luggage</td>
                                    <td>2 Suitcases/4 Bags</td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>Automatic</td>
                                </tr>
                                <tr>
                                    <td>Air conditioning</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Minimum age</td>
                                    <td>25 years</td>
                                </tr>
                                <tr>
                                    <th colspan="2 " class="reserve"> <a href="">Reserve Now</a> </th>

                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="model model3 ">
                    <div class="model-wrap ">
                        <img src="img/model/vehicle3.jpg " alt=" " srcset=" ">
                        <div class="table ">
                            <table>
                                <tr>
                                    <th colspan="2 ">RS.7999 Rent Per Day</th>

                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>Limousine</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Luggage</td>
                                    <td>4 Suitcases/2 Bags</td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>Automatic</td>
                                </tr>
                                <tr>
                                    <td>Air conditioning</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Minimum age</td>
                                    <td>25 years</td>
                                </tr>
                                <tr>
                                    <th colspan="2 " class="reserve"> <a href="">Reserve Now</a> </th>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="model model4 ">
                    <div class="model-wrap ">
                        <img src="img/model/vehicle4.jpg " alt=" " srcset=" ">
                        <div class="table ">
                            <table>
                                <tr>
                                    <th colspan="2 ">RS.6599 Rent Per Day</th>

                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>Limousine</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Luggage</td>
                                    <td>2 Suitcases/2 Bags</td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>Automatic</td>
                                </tr>
                                <tr>
                                    <td>Air conditioning</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Minimum age</td>
                                    <td>25 years</td>
                                </tr>
                                <tr>
                                    <th colspan="2 " class="reserve"> <a href="">Reserve Now</a> </th>

                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="model model5 ">
                    <div class="model-wrap ">
                        <img src="img/model/vehicle5.jpg " alt=" " srcset=" ">
                        <div class="table ">
                            <table>
                                <tr>
                                    <th colspan="2 ">RS.8599 Rent Per Day</th>

                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>Limousine</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Luggage</td>
                                    <td>2 Suitcases/2 Bags</td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>Automatic</td>
                                </tr>
                                <tr>
                                    <td>Air conditioning</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Minimum age</td>
                                    <td>25 years</td>
                                </tr>
                                <tr>
                                    <th colspan="2 " class="reserve"> <a href="">Reserve Now</a> </th>

                                </tr>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="model model6 ">
                    <div class="model-wrap ">
                        <img src="img/model/vehicle6.jpg " alt=" " srcset=" ">
                        <div class="table ">
                            <table>
                                <tr>
                                    <th colspan="2 ">RS.4999 Rent Per Day</th>

                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>Limousine</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Luggage</td>
                                    <td>2 Suitcases/2 Bags</td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>Automatic</td>
                                </tr>
                                <tr>
                                    <td>Air conditioning</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Minimum age</td>
                                    <td>25 years</td>
                                </tr>
                                <tr>
                                    <th colspan="2 " class="reserve"> <a href="">Reserve Now</a> </th>

                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
    </section>


    <!-- ----earn with us-------- -->
    <section class="earn-with-us">
        <div class="container">
            <h1>Register to become member</h1>
            <div class="earn-flex-container" id="register">
                <form action="" method="POST">
                    <h2>Register Now</h2>
                    <label for="full_name">Full Name</label> <br>
                    <input type="text " id="full " name="full_name" required>
                    <br>

                    <label for="mobile ">Mobile Number</label> <br>
                    <input type="phone " id="mobile " name="phone" required> <br>
                    <label for="email ">Email</label> <br>
                    <input type="email " id="email " name="email"> <br>
                    <label>Password:</label><br>
                    <input type="password" name="password" required><br><br>

                    <input type="submit" name="signup" id="submit" value="Sign up" class="btn">
                </form>
                <div class="earn-content">
                    <h2><i class="fa-solid fa-coins"></i>Connect with us</h2>
                    <h5>Being with us means being on transportation platform</h5>
                    <p>-Register now to get car according to your choice and comfort </p>
                </div>
            </div>
        </div>
    </section>
    <!-- -----------header--------------- -->
    <?php include 'include/footer.php'; ?>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js "></script>

    <script src="index.js"></script>
    <!-- <script src="wow.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 300
        });
    </script>





</body>

</html>