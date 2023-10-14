<?php
include_once'shared/config.php';

$fName=$_POST['fname'];
$sName=$_POST['sname'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=$_POST['password'];


    //echo"the get value is $fName $sName $email $password";
    $cmd="select * from client where email='$email' and password='$password' limit 1";
    $obj=mysqli_query($connect,$cmd);
    $count=mysqli_num_rows($obj);
    if($count==0)
    {
        $qurry="insert into client(FirstName,LastName,email,Address,password) value('$fName','$sName','$email','$address','$password')";
        mysqli_query($connect,$qurry);

        echo"
        <!DOCTYPE html>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>SignUp with MiniMarket</title>
            <link rel='stylesheet' href='index.css'>
            <link rel='stylesheet' href='mini.css'>
            <link rel='stylesheet' href='bootstrap.css'>
            <style>
            #welcome{
                background-image: url(img/welcome.jpg);
                height: 80vh;
                width: 100rem;
                background-size: cover;
                background-position: top 25% right 0;
                padding:0 80px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            </style>
        </head>
            <body>
                <section id='header'>
                    <a href='OwnShop.html'>
                        <img src='img/mini-marketLOGO.png' class='logo' alt='Logo' >
                    </a>
                    <div>
                        <ul id='navbar'>
                            <li><a href='OwnShop.html'>Home</a></li>
                            <li><a href='shop.php'>Shop</a></li>
                            <li><a href='about.html'>About</a></li>
                            <li><a class='active' href='login.html'>Registered</a></li>
                            <li><a href='contact.html'>Connect</a></li>
                            <li><a href='cart.php'><img src='img/cart.png' alt='Cart' class='cartImg'></a></li>
                            
                        </ul>
                    </div>
                </section>
                <section id='welcome'>   
                    <h1 class='text-center fs-1 fw-bolder text-primary'>WelCome</h1>     
                </section>
            
            </body>
        </html>
    ";
    //header('location:login.php');
    }
    else
    {   echo"
        <script>
            alert('You Have an account , Please LogIn');
            window.location.replace('Login.html');
        </script>";
    }
?>