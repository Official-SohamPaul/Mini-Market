<?php

    session_start();
    if(!isset($_SESSION['clientID']))
    {
        echo"
        <script>
            alert('Login First ....');
            window.location.replace('login.html');
        </script>
        ";
    }
    $pid=$_GET['pid'];
    echo"$pid<br>";
    include_once "shared/config.php";
    $obj=mysqli_query($connect,"select Cart from client where clientID='$_SESSION[clientID]'");
    $re=mysqli_fetch_assoc($obj);
    $cart=$re['Cart'];
    $newcart=str_replace($pid.',','',$cart);
    $newcart=str_replace(','.$pid,'',$newcart);
    $newcart=str_replace(''.$pid.'','',$newcart);
    $res=mysqli_query($connect,"update client set Cart='$newcart' where clientID=$_SESSION[clientID]");
    if($res)
    {   echo "
        <script>
            alert('The Product has been Deleted Sucessfully...');
            window.location.replace('cart.php');
        </script>";
    }
    else
    {   echo "
        <script>
            alert('Deletion unsucessfull... Try again');
            window.location.replace('cart.php');
        </script>";
    }


?>