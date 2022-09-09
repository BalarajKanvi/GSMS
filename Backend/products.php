<?php
        include '../db_connection.php';

        $pname = $_POST['product_name'];
        $unit = $_POST['units'];
        $price = $_POST['ppu'];
        $qty = $_POST['avail'];

        $query = "INSERT INTO PRODUCT VALUES(NULL,'$pname','$unit','$price', '$qty')";

        $result = mysqli_query($link,$query);

        if ($result)
        {
            echo "Product Added";
            header("location: ../view-products.php");
        }

        else
        {
            echo "Product not added";
        }

?>