<?php

    include_once '../shared/config.php';
    $pid=$_GET['pid'];
    $del="SELECT ImageProduct FROM product WHERE ProductID=$pid";
    $cmd="DELETE FROM `product` WHERE `product`.`ProductID` = $pid";
    $del_querry=mysqli_query($connect,$del);
    $del=mysqli_fetch_assoc($del_querry);
    $path=$del['ImageProduct'];
    if(unlink($path))
    {   $querry=mysqli_query($connect,$cmd);
        if($querry)
        {   echo "
            <script>
                 alert('Product Deleted Succesfully');
                 window.location.replace('viewproduct.php');
            </script>";
        }
        else
        {   echo "
            <script>
                 alert('Falied To Delete from database');
                 window.location.replace('viewproduct.php');
            </script>";
        }
    }
    else
    {   $querry=mysqli_query($connect,$cmd); 
        echo "
            <script>
                alert('Falied To Find The Image , But The Item has been deleted');
                window.location.replace('viewproduct.php');
            </script>";
    }
?>