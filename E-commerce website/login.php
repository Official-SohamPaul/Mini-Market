<?php

    include_once "shared/config.php";
    $mail=$_POST['email'];
    $passwd=$_POST['password'];

    $cmd="select * from client where email='$mail' and password='$passwd' limit 1";
    $obj=mysqli_query($connect,$cmd);
    $count=mysqli_num_rows($obj);

    if($count==0)
    {   echo "
        <Script>
            alert('Invalid credentials');
            window.location.replace('login.html');
        </Script> ";

    }
    else
    {   
        $row=mysqli_fetch_assoc($obj);
        session_start();
        $_SESSION['clientID']=$row['clientID'];
        $_SESSION['name']=$row['FirstName'];
        $_SESSION['address']=$row['Address'];
        $_SESSION['email']=$row['email'];
        echo "
        <Script>
            alert('LogIn successfully , $row[FirstName]');
            window.location.replace('OwnShop.html');
        </Script> ";  
    }


?>