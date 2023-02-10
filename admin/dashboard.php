<?php 
      include('../config/constants.php');
      include('../config/functions.php');
      $index_user_data = index_loginval($conn);

      $userid= $index_user_data['user_id'];
  
      if($index_user_data == false){
          header("Location: ../login.php");
      }
      if($index_user_data == true){
        if($index_user_data['user_type'] == 0)
        {
            echo'
            <script>alert("Access denied")</script>';
            header("Location: ../index.php");}
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Open+Sans:wght@300&family=Orbitron&family=Oswald:wght@500&family=Playfair+Display:wght@500&family=Poppins:wght@300;400;500;600&family=Quicksand:wght@300&family=Roboto+Slab:wght@300;400&family=Rubik+Glitch&family=Rubik+Microbe&family=Russo+One&family=Signika:wght@300;400&family=Sora:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <style>
             * {
                    margin: 0;
                    padding: 0;
                    font-family: "Poppins", sans-serif;
                }
                main{
                    width: 90%;
                    margin: auto;
                    
                }
            main div{
                
                padding: 1%;
                margin-top: 10px;
                    
            }
            .menu{
                width: 20%;
                float: left;
                border: 1px solid rgb(46, 46, 63);
                border-radius: 20px;
                background-color: rgb(20, 20, 28);
            }
            .content{
                width: 70%;
                float: right;
            }
            ul{
                list-style: none;
            }
            ul li{
                margin: 5px;
                width: 100;
            }
            ul li a{
                text-decoration: none;
                font-size: 1.5rem;
                color: aliceblue;
                transition: 100ms;
                
            }
            ul li a:hover{
                
                color: bisque;
                padding: 6%;
                transition: 100ms;
                
            }
            .content{
                border: 3px solid rgb(20, 20, 28);
                border-radius: 20px;
            }
            
            .info{
                border: 2px solid rgb(20, 20, 28);
                margin: 15px;
                width: 50%;
                float: left;
                border-radius: 20px;
            }
            .btn{
                
                width: 20%;
                float: right;
                margin-top: 30px;
                margin-right: 5%;
                
            }
            .btn a{
                text-decoration: none;
                background-color: #637CC1;
                color: aliceblue;
                padding: 5%;
                border-radius: 10px;
                transition: 100ms;
            }
            .btn a:hover{
                padding: 6%;
                color: bisque;
                border-radius: 12px;
                transition: 100ms;
            }
            header{
                text-align: center;
            }
            
    </style>
</head>
<body>
<?php include ('../include/admin-header.php'); ?>
    <main>
        <div class="menu">
            <ul>
                <li><a href="users.php">Users</a> </li>
                <li><a href="vehicles.php">Vehicles</a></li>
                <li><a href="requests.php">Booking request</a></li>
                <li><a href="vehicleaddreq.php">Add Vehicle request</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Dashboard</h1>
            <div class="usersinfo info"><h2>Users</h2>
                <div class="inf">
                <?php 

                    $sql = "SELECT * FROM users ";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                ?>
                    <h4>Total Users:</h4><h4>             <?php echo $count;?></h4>
                    <?php 

                        $sql = "SELECT * FROM users WHERE user_type = '1' ";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                    ?>
                    <h4>Total admin:</h4><h4>             <?php echo $count;?></h4>
                </div>
                
            </div>
            <div class="btn">
                <a href="users.php">Manage users</a>
            </div>
            <div class="vehiclesinfo info">
                <h2>Vehicles</h2>
                <div class="inf">
                
                    <?php 

                    $sql = "SELECT * FROM vehicle ";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    ?>
                    <h4>Total Vehicles:</h4><h4>             <?php echo $count;?></h4>
                </div>
                
            </div>
            <div class="btn">
                <a href="vehicles.php">Manage Vehicles</a>
            </div>
            <div class="requestinfo info">
                <h2>Booking Requests</h2>
                <div class="inf">
                    <?php 

                    $sql = "SELECT * FROM booking_request Where status='pending'";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    ?>
                    <h4>Prending requests:</h4><h4>              <?php echo $count;?></h4>
                    <?php 

                        $sql = "SELECT * FROM booking_request Where status='accepted'";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        ?>
                    <h4>Approved request:</h4><h4>              <?php echo $count;?></h4>
                        <?php 

                        $sql = "SELECT * FROM booking_request Where status='rejected'";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        ?>
                    <h4>Unapproved request:</h4><h4>              <?php echo $count;?></h4>
                </div>
                
            </div>
            <div class="btn">
                <a href="requests.php">Manage Requests</a>
            </div>
        </div>
    </main>
    
    
</body>
</html>