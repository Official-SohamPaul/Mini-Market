<?php

session_start();
if(!isset($_SESSION['clientID']))
{
    echo "
    <script>
        alert('You are not authorised to this page');
        window.location.replace('login.html');
    </script>
    ";
}
else
{       include_once "shared/config.php";
        $obj=mysqli_query($connect,"select * from client where clientID=$_SESSION[clientID]");
        $res=mysqli_fetch_assoc($obj);
        $cart=$res['Cart'];
        date_default_timezone_set('Asia/Kolkata');
        $date=date("Y/m/d-H:i:s");
        $order=mysqli_query($connect,"insert into orders(productID,adminID,clientID,orderdate) value('$cart','1','$_SESSION[clientID]','$date')");
        $newcart=mysqli_query($connect,"update client set Cart='' where clientID=$_SESSION[clientID]");
        $ordered=mysqli_query($connect,"update client set Ordered='$cart' where clientID=$_SESSION[clientID]");
        if($order && $newcart && $ordered)
        {   echo"
            <script>
                alert('The Order has been placed Successfully..');
                window.location.replace('cart.php');
            </script>";
        }
        else
        {   echo"
            <script>
                alert('The Order was Unsuccessfully... Try again');
                window.location.replace('cart.php');
            </script>";

        }
}

?>