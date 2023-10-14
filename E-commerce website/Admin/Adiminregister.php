<?php
include_once'../shared/config.php';

$fName=$_POST['fname'];
$sName=$_POST['sname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];


    //echo"the get value is $fName $sName $email $password";
    $cmd="select * from admin where email='$email' and password='$password' limit 1";
    $obj=mysqli_query($connect,$cmd);
    $count=mysqli_num_rows($obj);
    if($count==0)
    {
        $qurry="insert into admin(FirstName,LastName,email,phone,password) value('$fName','$sName','$email','$phone','$password')";
        mysqli_query($connect,$qurry);

        echo"
        <script>
            alert('Welcome to Mini Market Admin , login to your account');
            window.location.replace('adminlogin.html');
        </script>";     
    
    }
    else
    {   echo "
        <script>
            alert('You Have an account , Please LogIn');
            window.location.replace('adminlogin.html');
        </script>";
    }
?>