<?php

    session_start();
    if(!isset($_SESSION['adminID']))
    {
        echo"<script>
        alert('YOU HAVE NOT AUTHORISED TO THIS PAGE , LOGIN FIRST');
        window.location.replace('adminlogin.html');
        </script>";
    }
    else
    { 
        echo"
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>View Product</title>
                <link rel='stylesheet' href='../index.css'>
                <link rel='stylesheet' href='../mini.css'>
                <link rel='stylesheet' href='../bootstrap.css'>
                <style>

                </style>
            </head>
                <body id='bg-admin'>
                    <section id='header'>
                        <a href='../OwnShop.html'>
                            <img src='../img/mini-marketLOGO.png' class='logo' alt='Logo' >
                        </a>
                        <div>
                            <ul id='navbar'>
                                <li><a href='AdminHome.php'>Home</a></li>
                                <li><a href='upload-f.php'>Upload</a></li>
                                <li><a class='active' href='http://localhost/E-commerce website/Admin/viewproduct.php'>View Product</a></li>
                                <li><a href='adminlogout.php'><img src='../img/logout.png' alt='logoutIMG' class='logout'></a></li>               
                            </ul>
                        </div>
                    </section>
                    
                </body>
            </html>";
        }

    include_once '../shared/config.php';
    $obj=mysqli_query($connect,'select * from product');
    
    while($row=mysqli_fetch_assoc($obj))
    {
        $id=$row['ProductID'];
        $cat=$row['Category'];
        $pname=$row['ProductName'];
        $price=$row['Price'];
        $description=$row['Description'];
        $impath=$row['ImageProduct'];
        {
            echo "
                  <div id='shop-product'>
                    <img src='$impath' alt='Image of $pname'>
                    <div class='details'>
                        <h4>$pname</h4>
                        <h5>Rs:- $price/-</h5>
                        <span>ProductID #$id</span>
                        <p>$description</p>
                        <a href='http://localhost/E-commerce website/Admin/delete.php?pid=$id'>
                            <button class='btn btn-outline-danger'>Delete</button>
                        </a>
                    </div>
                  </div>  
            
            ";
        }
    }

?>