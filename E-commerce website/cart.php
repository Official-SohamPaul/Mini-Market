<?php
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
    {   $clientID=$_SESSION['clientID'];
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Cart</title>
                <link rel='stylesheet' href='mini.css'>
                <link rel='stylesheet' href='bootstrap.css'>
            </head>
            <body id='bg-cart'>
                <section id='header'>
                    <a href='OwnShop.html'>
                        <img src='img/mini-marketLOGO.png' class='logo' alt='Logo'>
                    </a>
                    <div>
                        <ul id='navbar'>
                            <li><a href='OwnShop.html'>Home</a></li>
                            <li><a href='shop.php'>Shop</a></li>
                            <li><a href='about.html'>About</a></li>
                            <li><a href='logout.php'><img src='img/logout.png' class='logout'></a></li>
                            <li><a href='contact.html'>Connect</a></li>
                            <li><a class='activecart' href='cart.php'><img src='img/cart.png' alt='Cart' class='cartImg'></a></li>
                            
                        </ul>
                    </div>
                </section>
            </body>
            </html>";

            include_once "shared/config.php";
            $obj=mysqli_query($connect,"select * from client where clientID=$clientID");
            $res=mysqli_fetch_assoc($obj);
            $cart=$res['Cart'];
            $cartitems=explode(",",$cart);
              $uniqueitems=array_unique($cartitems);
              $quantity=array_count_values($cartitems);
              $i=0;
              $Total=0;
              echo"
              <div id='upper'>
                <span>Deliver to $_SESSION[name] - $_SESSION[address]</span>
              </div>";
              while($i<count($uniqueitems))
              {   
                  $object=mysqli_query($connect,"select * from product where ProductID=$uniqueitems[$i]");
                  $result=mysqli_fetch_assoc($object);
                  $id=$result['ProductID'];
                  $pname=$result['ProductName'];
                  $price=$result['Price'];
                  $description=$result['Description'];
                  $imp=$result['ImageProduct'];
                  $impath="Admin/$imp";
                  $qty=$quantity[$uniqueitems[$i]];
                  echo"
                  <div id='cart-product'>
                    <img src='$impath' alt='$pname'>
                          <div class='cartdetails'>
                            <h3>$pname</h3>
                            <h4>Rs:- $price/-</h4>
                            <span>Qty : $qty</span>
                            <p>$description</p>
                            <a href='deletefromcart.php?pid=$id'>
                              <button type='submit' name='Delete' class='btn btn-outline-danger'>Delete from cart</button>
                            </a>
                          </div>
                        </div>
                        ";

                        $Total=$Total+$price;
                        $i++;
                    }

                    echo"
                    <div id='checkoutBox'>
                        <h3>Subtotal Rs.$Total/-</h3>
                        <span style='color:green;display:block;'>You are eligible For FREE Delivery.</span>
                        <p style='display:inline;'>Select this option at checkout.</p>
                        <span style='color:green'>Details</span>
                      <div id='proceedBox'>
                        <a href='checkout.php'>
                          <button class='btn btn-warning'>Proceed To Checkout</button>
                        </a>
                      </div>
                    </div>";
                  
    }



?>