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
                <title>Admin Home</title>
                <link rel='stylesheet' href='../index.css'>
                <link rel='stylesheet' href='../mini.css'>
                <link rel='stylesheet' href='../bootstrap.css'>
            </head>
                <body id='bg-admin'>
                    <section id='header'>
                        <a href='../OwnShop.html'>
                            <img src='../img/mini-marketLOGO.png' class='logo' alt='Logo' >
                        </a>
                        <div>
                            <ul id='navbar'>
                                <li><a class='active' href='AdminHome.php'>Home</a></li>
                                <li><a  href='upload-f.php'>Upload</a></li>
                                <li><a href='viewproduct.php'>View Product</a></li>
                                <li><a href='adminlogout.php'><img src='../img/logout.png' alt='logouIMG' class='logout'></a></li>               
                            </ul>
                        </div>
                    </section>
                    <h4 id='admin-h4'>Hey $_SESSION[name] , You have got order from</h4>";

                include_once '../shared/config.php';
                $object=mysqli_query($connect,'select * from orders');

                echo "<div>
                        <div class='table-div'>
                            <table class='client-table'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>OrderID</th>
                                        <th>ClientID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>EmailID</th>
                                        <th>Address</th>
                                        <th>Ordered Items</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>";
                while($res=mysqli_fetch_assoc($object))
                {
                    $orderid=$res['orderID'];
                    $cid=$res['clientID'];
                    $adminID=$res['adminID'];
                    $order=$res['productID'];
                    $obj=mysqli_query($connect,"select * from client where clientID=$cid");
                    $row=mysqli_fetch_assoc($obj);
                    $fname=$row['FirstName'];
                    $lname=$row['LastName'];
                    $email=$row['email'];
                    $address=$row['Address'];
                    $date=$res['orderdate'];
                    if($adminID==$_SESSION['adminID'])
                    {    echo "
                                    <tr>
                                        <td>#$orderid</td>
                                        <td>$cid</td>
                                        <td>$fname</td>
                                        <td>$lname</td>
                                        <td>$email</td>
                                        <td>$address</td>
                                        <td>$order</td>
                                        <td>$date</td>
                                    </tr>
                        ";
                    }
                }
                echo "          </tbody>      
                            </table>
                        </div>
                    </div>
                </body>
            </html>";
                }

?>
