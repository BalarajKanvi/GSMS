<?php
    
        include 'db_connection.php';
        // include 'view-orders.php';

        // echo "$OID";
        $single_oid = $_GET['order_id'];
        $o = $_GET['oID'];

        
        $product_increase_avail = "SELECT * FROM GSMS.ORDER WHERE o_id = '$o'";
        $prod_res = mysqli_query($link,$product_increase_avail);
        $row = mysqli_fetch_assoc($prod_res);
        
        $product_avail_update = "UPDATE PRODUCT SET available = available + {$row['quantity']} WHERE pid = {$row['p_id']}";
        $prod_res2 = mysqli_query($link,$product_avail_update);
        
        $query = "DELETE FROM GSMS.ORDER WHERE o_id='$o'";

        $result = mysqli_query($link,$query);

        if(mysqli_affected_rows($link)>0)
        {
            header("location:view-orders.php?oid=$single_oid");
        }
        else
        {
            echo "Not deleted";
            // header("location:view-order-details.php");
        }
    
    
?>





