
<?php
    
    include_once'../shared/config.php';

    $product=$_POST['product'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $category=$_POST['category'];
    $image=$_FILES['imname'];

    date_default_timezone_set('Asia/Kolkata');
    $unique=date("Y_m_d_H_i_s");
    $target="../img/Product/$unique.jpg";
    move_uploaded_file($image['tmp_name'],$target);

    $cmd="insert into product(ProductName,Category,Price,Description,ImageProduct) values('$product','$category',$price,'$description','$target')";

    $uploadResult=mysqli_query($connect,$cmd);
    if($uploadResult)
    {
        echo "
       <script>
            alert('Uploaded Sucessfully');
            window.location.replace('upload-f.php');
        </script>";
    }
    else
    {
       echo "
       <script>
            alert('Upload Failed!!');
            window.location.replace('upload-f.php');
        </script>";
    }

?>