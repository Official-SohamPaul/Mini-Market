<?php

    include_once "../shared/config.php";
    $mail=$_POST['email'];
    $passwd=$_POST['password'];

    $cmd="select * from admin where email='$mail' and password='$passwd' limit 1";
    $obj=mysqli_query($connect,$cmd);
    $count=mysqli_num_rows($obj);

    if($count==0)
    {   echo "
        <Script>
            alert('Invalid credentials');
            window.location.replace('adminlogin.html');
        </Script> ";

    }
    else
    {   
        $row=mysqli_fetch_assoc($obj);
        session_start();

        $_SESSION['adminID']=$row['adminID'];
        $_SESSION['name']=$row['FirstName'];
        $_SESSION['email']=$row['email'];
        echo "
        <Script>
            alert('LogIn successfully , $row[FirstName]');
            window.location.replace('AdminHome.php');
        </Script> ";  
    }


?>