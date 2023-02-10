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
                width: 97%;
                float: left;
                border-radius: 20px;
            }
            .tbl-full{
                width: 100%;
            }

            #tbl th{
                padding: 5px;
            }
            #tbl td{
                padding: 5px;
            }
            table tr td a{
                text-decoration: none;
                border-radius:5px;
                margin: 2px;
                padding: 2px;
            }
            #accp{
                background: green;
                color:white;
            }
            #rej{
                background: red;
                color:white;
            }
            #accp:hover{
                
                color:black;
            }
            #rej:hover{
                
                color:black;
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
                <li><a href="requests.php">Booking request</a>
                    <ul>
                        <li><a href="#pending" style="font-size:1rem;">Pending requests</a></li>
                        <li><a href="#accepeted"style="font-size:1rem;">Accepted requests</a></li>
                        <li><a href="#rejected"style="font-size:1rem;">rejected requests</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            
            <div class="info"id="pending"><h1>PENDING REQUEST</h1><table id="tbl">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <Th>Phone</Th>
                    <th>Email</th>
                    <th>Car</th>
                    <th>From</th>
                    <th>To</th>
                    <th>PickUp date</th>
                    <th>Drop Off date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php 
                     $sql = "SELECT * FROM booking_request WHERE status= 'pending'";

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
                                
                                    $id=$rows['req_id'];
                                    $name=$rows['name'];
                                    $phone=$rows['phone'];
                                    $email=$rows['email'];
                                    $car=$rows['car'];
                                    $frm=$rows['frm'];
                                    $to=$rows['d_to'];
                                    $pdate=$rows['date_from'];
                                    $ddate=$rows['date_till'];
                                    $status=$rows['status'];

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $car ?></td>
                                        <td><?php echo $frm ?></td>
                                        <td><?php echo $to ?></td>
                                        <td><?php echo $pdate ?></td>
                                        <td><?php echo $ddate ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><a href="<?php echo SITEURL; ?>admin/acceptreq.php?id=<?php echo $id; ?>" id="accp">Accept</a>
                                        <a href="<?php echo SITEURL; ?>admin/rejectreq.php?id=<?php echo $id; ?>"id="rej">Reject</a>
                                        </td>
                                        
                                        
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
           
            <div class="clearfix"></div>
            <div class="info "id="accepted"><h1>ACCEPTED REQUEST</h1><table id="tbl">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <Th>Phone</Th>
                    <th>Email</th>
                    <th>Car</th>
                    <th>From</th>
                    <th>To</th>
                    <th>PickUp date</th>
                    <th>Drop Off date</th>
                    <th>Status</th>
                    
                </tr>
                <?php 
                     $sql = "SELECT * FROM booking_request WHERE status= 'accepted'";

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
                                
                                    $id=$rows['req_id'];
                                    $name=$rows['name'];
                                    $phone=$rows['phone'];
                                    $email=$rows['email'];
                                    $car=$rows['car'];
                                    $frm=$rows['frm'];
                                    $to=$rows['d_to'];
                                    $pdate=$rows['date_from'];
                                    $ddate=$rows['date_till'];
                                    $status=$rows['status'];

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $car ?></td>
                                        <td><?php echo $frm ?></td>
                                        <td><?php echo $to ?></td>
                                        <td><?php echo $pdate ?></td>
                                        <td><?php echo $ddate ?></td>
                                        <td><?php echo $status ?></td>
                                        
                                        
                                        
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
           
            <div class="clearfix"></div>
            <div class="info "id="rejected"><h1>REJECTED REQUEST</h1><table id="tbl">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <Th>Phone</Th>
                    <th>Email</th>
                    <th>Car</th>
                    <th>From</th>
                    <th>To</th>
                    <th>PickUp date</th>
                    <th>Drop Off date</th>
                    <th>Status</th>
                    
                </tr>
                <?php 
                     $sql = "SELECT * FROM booking_request WHERE status= 'rejected'";

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
                                
                                    $id=$rows['req_id'];
                                    $name=$rows['name'];
                                    $phone=$rows['phone'];
                                    $email=$rows['email'];
                                    $car=$rows['car'];
                                    $frm=$rows['frm'];
                                    $to=$rows['d_to'];
                                    $pdate=$rows['date_from'];
                                    $ddate=$rows['date_till'];
                                    $status=$rows['status'];

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $car ?></td>
                                        <td><?php echo $frm ?></td>
                                        <td><?php echo $to ?></td>
                                        <td><?php echo $pdate ?></td>
                                        <td><?php echo $ddate ?></td>
                                        <td><?php echo $status ?></td>
                                        
                                        
                                        
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
           
            <div class="clearfix"></div>
            
            
        </div>
        
    </main>
    
    
</body>
</html>