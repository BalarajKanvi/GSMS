<?php
        include '../db_connection.php';

        $cname = $_POST['customer_name'];
        $dt = date('Y-m-d H:i:s');
        $t = $_POST['total'];

        $query = "INSERT INTO TOTAL_ORDERS VALUES(NULL,'$dt','$cname','$t')";

        $result = mysqli_query($link,$query);

        if ($result)
        {
            echo "Order Added";
            header("location: ../home.php");
        }

        else
        {
            echo "Product not added";
        }
?>
