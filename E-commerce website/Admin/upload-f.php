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
    {   echo"
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Upload Product</title>
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
                                <li><a href='AdminHome.php'>Home</a></li>
                                <li><a class='active' href='upload-f.php'>Upload</a></li>
                                <li><a href='viewproduct.php'>View Product</a></li>
                                <li><a href='adminlogout.php'><img src='../img/logout.png' alt='logouIMG' class='logout'></a></li>               
                            </ul>
                        </div>
                    </section>

                    <div>
                        <form id='upload' class='input-group-upload' enctype='multipart/form-data' action='http://localhost/E-commerce website/Admin/upload.php' method='post'>
                            <input name='product' type='text' class='input-field' placeholder='Product Name' required>
                            <input name='price' type='number' class='input-field' placeholder='Price in INR' required>
                            <input name='description' type='text' class='input-field' placeholder='Description' required>
                            <input name='imname' type='file' accept='.jpg' required>
                            <span class='span_upload'>Select category :-</span>
                            <select name='category' required>
                                <option value='Fruits'>Fruits</option>
                                <option value='Vegetables'>Vegetables</option>
                                <option value='Grocery'>Grocery</option>
                                <option value='Sweets'>Sweets</option>
                            </select>
                            <button type='submit' class='submit-upload'>Upload Product</button>
                        </form>
                    </div>
                </body>
            </html>";
        }

?>