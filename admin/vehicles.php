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


    if($_SERVER['REQUEST_METHOD'] == "POST")
                            {
                                // something was posted
                                $car = $_POST['car'];
                                
                                if(!empty($car)){
                        
                                    
                                    $query = "INSERT INTO vehicle(car) VALUES ('$car')";
                        
                                    mysqli_query($conn,$query);
                        
                                    header("Location: vehicles.php");
                                }
                                else{
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
                width: 58%;
                float: left;
                border-radius: 20px;
            }
            .tbl-full{
                width: 100%;
            }
            .btn{
                
                width: 28%;
                float: right;
                margin-top: 30px;
                margin-right: 2%;
                border: 2px solid black;
                border-radius: 10px;
                
            }
            .btn input{
                padding: 3px;
                border: 2px solid black;
                border-radius: 10px;
            }
            
            .subbtn{
                text-decoration: none;
                margin-top: 30px;
                background-color: #637CC1;
                color: aliceblue;
                padding: 2%;
                border-radius: 10px;
                transition: 100ms;
            }
            .subbtn:hover{
                
                color: bisque;
                border-radius: 12px;
                transition: 100ms;
            }
            #tbl th{
                padding: 5px;
            }
            #tbl td{
                padding: 5px;
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
            
            <div class="info"><h1>VEHICLES</h1><table id="tbl">
                <tr>
                    <th>SN</th>
                    <th>car</th>
                    
                    <th>Availibility</th>
                    <th>Vehicle id</th>
                </tr>
                <?php 
                     $sql = "SELECT * FROM vehicle";

                     $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        // check number of rows
                        $count = mysqli_num_rows($res);
                        $sn = 1;

                        if($count>0)
                        {
                            // we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                // using while loop to get data from database

                                // get individual data
                                
                                    $id=$rows['id'];
                                    $car=$rows['car'];
                                    $avail=$rows['availability'];
                                    
                                    

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $car ?></td>
                                        <td><?php echo $avail ?></td>
                                        
                                        <td><?php echo $id ?></td>
                                        
                                    </tr>
                                        
                                    <?php
                                
                            }
                        }
                        else{
                            // we donot have data in database
                        }
                    }
                    ?>

                </table></div>
            <div class="btn">
                <form action=""method="POST">
                    <h3>Add vehicle</h3>
                    <Label>car Name and model:</Label><br>
                    <input type="text" name="car">
                    <input type="submit"id="submit" value="Add Vehicle" class="subbtn" >
                </form><br>
                
                
                
            </div>
           
        </div>
        
    </main>
    
    
</body>
</html>