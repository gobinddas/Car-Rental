<?php 
    include('config/constants.php');
    include('config/functions.php');
    $index_user_data = index_loginval($conn);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        // $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        // $email = $_POST['email'];
        // $phone = $_POST['phone'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)){

            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

            $result = mysqli_query($conn,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password);
                    {
                        if($user_data['type'] == 0)
                        {
                            $id = $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index.php");
                            die;
                        }
                        else
                        {
                            $id = $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: final-year-project/admin/dashboard.php");
                            die; 
                        }
                    }
                        echo '<script>alert("Wrong Password")</script>';
                    
                }
            }
            echo '<script>alert("Wrong Username or Password")</script>';
            
            // header("Location: index.html");
        }
        else{
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .loginbox{
    /* background-color: #659DBD; */
    
    color: #FFFFFF;
    
    width: 20%;
    margin:5% auto;
    padding: 2%;
    text-align: center;
    
    


}
#h1{
    font-family: 'K2D', sans-serif;
    background-color:#659DBD;
    padding: 1%;
    font-size: 45px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;

}
#login{
    background-color: #ebebeb;
    font-size: 20px;
    font-family: 'Open Sans', sans-serif;
    padding: 5%;
    margin-top: -6%;
    color: #535353;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}

.loginbox input[type="text"]{
    font-family: 'Open Sans', sans-serif;
    padding: 3%;
    border:1px solid #659DBD;
    margin-top: 5px;
    border-radius: 5px;
}

.loginbox input[type="Password"]{
    font-family: 'Open Sans', sans-serif;
    padding: 3%;
    border:1px solid #659DBD;
    margin-top: 5px;
    border-radius: 5px;
}
.loginbox input[type="number"]{
    font-family: 'Open Sans', sans-serif;
    padding: 3%;
    border:1px solid #659DBD;
    margin-top: 5px;
    border-radius: 5px;
}
.form-btn{
    background-color: #BC986A;
    font-size: 20px;
    padding: 1% 3%;
    font-family: 'K2D', sans-serif;
    color: white;
    border-style: none;
    border-radius: 5px;
    transition: 200ms ease;
    
    
}
.form-btn:hover{
    background-color: #FBEEC1;
    color: #BC986A;
    
    transition: 200ms ease;
}
.loginbox h5{
    color: #272727;
    font-family: 'K2D', sans-serif;
    font-size: 20px;

}
.loginbox a{
    text-decoration: none;
    color: #659DBD;
    
}
.loginbox a:hover{
    color: #BC986A;
}
.loginbg{
    border: 0px solid black;
    background-image: url(../images/loginbg.png);
    background-size: contain;
    background-position-x: center;
    background-position: 0 100%;
    background-repeat: no-repeat;
}
    </style>
</head>
<body>
<div class="loginbg">
        <div class="loginbox">
            <h1 id="h1">LOGIN</h1><br>
            

            <div id="login">
                <!-- form start here -->
                <form action="" method="POST">
                    <label>Enter Email:</label><br>
                    <input type="text" name="email" placeholder="Enter email"><br><br>
                    <label>Password:</label><br>
                    <input type="password" name="password" placeholder="Enter Password"><br><br>
                    <input type="submit" name="submit" value="Login" class="form-btn">
                </form>
            </div>
            <br>
            <div id="signuptxt">
                <h5 id="log.txt">Create account here:<h5> <a href="index.php#register">Sign up<a>

            </div>
        </div>
    </div>
</body>
</html>