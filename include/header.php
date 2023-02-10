<header>
<div class="container">
    <div class="navbar">
        <div class="brand">
            <a href="index.php">
            <img src="img/logo.gif" alt="">
            </a>
        </div>
        <ul class="navbar-nav flex-grow">
            <li class="nav-item flex-grow">
                <a href="#" class="nav-link"></a>
            </li>
            
            <li class="nav-item">
                <a href="" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
                <a href=" " class="nav-link">Vehicle Models</a>
            </li>
            <li class="nav-item">
                <a href="vendor.php" class="nav-link">Earn With Us</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item flex-grow">
                <a href="#" class="nav-link"></a>
            </li>
            <li class="nav-item">
            <?php
                            // session_start();
                            // ;
                            if($index_user_data == true){
                if ($index_user_data['user_type'] == 1) {
                    echo '

                                <a href="admin/dashboard.php"><b> Admin    ||     </b></a>';
                }


                                echo'

                                    <a href="#"><b>'. $index_user_data['name'];'  ||   </b></a>';
                                
                                    echo'  |  <a href="logout.php"style="color: red;border:1px solid red; padding:3px;border-radius:5px;">    Logout</a>';}
                            else{
                                echo'
                                    <a href="login.php" class="nav-link btn">Login</a>

                                    ';}?>
                
            </li>
        </ul>
        <div class="bar">
        <i class="fa-solid fa-bars"></i>

        </div>
      
    </div>
</div>


</header>