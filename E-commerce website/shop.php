<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppings</title>
    <link rel="stylesheet" href="mini.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

    <section id="header">
        <a href="OwnShop.html">
            <img src="img/mini-marketLOGO.png" class="logo" alt="Logo" >
        </a>
        <div>
            <ul id="navbar">
                <li><a href="OwnShop.html">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="login.html">Sign In</a></li>
                <li><a href="contact.html">Connect</a></li>
                <li><a href="cart.php"><img src="img/cart.png" alt="Cart" class="cartImg"></a></li>
                
            </ul>
            <ul id="searchbar">
                <li><input type="text" placeholder="Search"></li>
            </ul>
        </div>
    </section>
</body>
</html>
<?php

    include_once 'shared/config.php';
    $obj=mysqli_query($connect,'select * from product');
    
    echo "<div id='bg-shop'>";
    while($row=mysqli_fetch_assoc($obj))
    {
        $id=$row['ProductID'];
        $cat=$row['Category'];
        $pname=$row['ProductName'];
        $price=$row['Price'];
        $description=$row['Description'];
        $imp=$row['ImageProduct'];
        $impath="Admin/$imp";
        {
            echo "
                  <div id='shop-product'>
                    <img src='$impath' alt='Image of $pname'>
                    <div class='details'>
                        <h4>$pname</h4>
                        <h5>Rs:- $price/-</h5>
                        <p>$description</p>
                        <a href='addtocart.php?pid=$id'>
                            <button type='submit' name='AddToCart' class='btn btn-outline-success'>Add to cart</button>
                        </a>
                    </div>
                  </div>  
            
            ";
        }
    }
    echo "</div>";
   

?>