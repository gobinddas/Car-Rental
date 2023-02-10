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
                
            }
            
            .btn a{
                text-decoration: none;
                background-color: #637CC1;
                color: aliceblue;
                padding: 2%;
                border-radius: 10px;
                transition: 100ms;
            }
            .btn a:hover{
                
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
            
            <div class="info"><h1>USERS</h1><table id="tbl">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <Th>Phone</Th>
                    <th>Email</th>
                    <th>User id</th>
                </tr>
                <?php 
                     $sql = "SELECT * FROM users";

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
                                    $name=$rows['name'];
                                    $phone=$rows['phone'];
                                    $email=$rows['email'];
                                    $userid=$rows['user_id'];

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $userid ?></td>
                                        
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
                <a href="../index.php#register">Add users</a>
                
            </div>
            <div class="clearfix"></div>
            
            <div class="info"><h1>Admins</h1><table id="tbl">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <Th>Phone</Th>
                    <th>Email</th>
                    <th>User id</th>
                </tr>
                <?php 
                     $sql = "SELECT * FROM users";

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
                                if($rows['user_type'] == 1){
                                    $id=$rows['id'];
                                    $name=$rows['name'];
                                    $phone=$rows['phone'];
                                    $email=$rows['email'];
                                    $userid=$rows['user_id'];

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $userid ?></td>
                                        
                                    </tr>
                                        
                                    <?php
                                }
                            }
                        }
                        else{
                            // we donot have data in database
                        }
                    }
                    ?>

                </table></div>
            
        </div>
        
    </main>
    
    
</body>
</html>