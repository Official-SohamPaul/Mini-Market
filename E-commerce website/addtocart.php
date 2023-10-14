<?php

    $pid=$_GET['pid'];
    
        session_start();
        if(!isset($_SESSION['clientID']))
        {
            echo "
            <script>
                alert('You must LogIN/Register to Add Product in Your cart');
                window.location.replace('login.html');
            </script>
            ";
        }
        else
        {   include_once"shared/config.php";
            $clientID=$_SESSION['clientID'];
            $query="select * from client where clientID=$clientID";
            $res=mysqli_query($connect,$query);
            $obj=mysqli_fetch_assoc($res);
            $cart=$obj['Cart'];
            if($cart==NULL)
                $newcart="$pid";
            else
                $newcart="$cart".","."$pid";
            $secondquery="update client set Cart='$newcart' where clientID=$clientID";
            $result=mysqli_query($connect,$secondquery);
            if($result)
            {   echo"<script>
                    alert('Product is added');
                    window.location.replace('shop.php');
                </script>";
            }
            else
            {   echo"<script>
                        alert('Could Not add , Somthing went wrong ...');
                        window.location.replace('shop.php');
                    </script>";
            }
        }

?>