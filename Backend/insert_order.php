<?php
        include '../db_connection.php';

        $s_oid = $_GET['oid'];
        $product = $_POST['prod'];
        $quant = $_POST['quantity'];
        
        
        $product_query = "SELECT price_per_unit FROM PRODUCT WHERE pid = '$product' AND available >= '$quant'";
        
        $ppu = mysqli_query($link,$product_query);
        
        if(mysqli_num_rows($ppu) <= 0)
        {
             echo "<script type='text/JavaScript'> 
                    alert('Quantity is more than available');
                location='../order_details.php?oid=`$s_oid`;
              </script>";
             
             header("location: ../order_details.php?oid=$s_oid ");
        }
        else
        {
        
        $p = $ppu->fetch_array();
        $price = intval($p[0]);
        $total = floatval($quant * $price);

        $q = floatval($quant);

        $q1 = "SELECT o_id FROM GSMS.ORDER WHERE single_oid = '$s_oid' AND p_id = '$product'";
        $s_res = mysqli_query($link, $q1);
        
        $check_prod = mysqli_num_rows($s_res);
            
        if ($check_prod == 0)
        {
            $query = "INSERT INTO GSMS.ORDER VALUES(NULL,'$s_oid','$product','$q','$total')";

            $result = mysqli_query($link,$query);
            if ($result)
            {
                echo "Order Added";
            
                $order_sum = "SELECT SUM(total) FROM GSMS.ORDER WHERE single_oid = '$s_oid'";
                $sum = mysqli_query($link,$order_sum);
                $sum_array = $sum->fetch_array();
                $sums = floatval($sum_array[0]);
            
                $order_update = "UPDATE TOTAL_ORDERS SET total_cost = '$sums' WHERE order_id = '$s_oid'";
                $res = mysqli_query($link,$order_update);
          
                $product_available = "UPDATE PRODUCT SET available = available - '$quant' WHERE pid = '$product'";
                $prod_avail_check = mysqli_query($link, $product_available);
                header("location: ../home.php");
                
            }   


            else
            {
                echo "Order not added";
            }
        }
        
        else
        {
            /*
            $order_id = $check_prod->fetch_array();
            $oid = intval($order_id[0]);
            */
            
            $update_prod = "UPDATE GSMS.ORDER SET quantity = quantity + '$q', total = total + '$total' WHERE  single_oid = '$s_oid' AND p_id = '$product'";
            
            $update_res = mysqli_query($link, $update_prod);
            if($update_res)
            {
                echo "Order Added";
            
                $order_sum = "SELECT SUM(total) FROM GSMS.ORDER WHERE single_oid = '$s_oid'";
                $sum = mysqli_query($link,$order_sum);
                $sum_array = $sum->fetch_array();
                $sums = floatval($sum_array[0]);
            
                $order_update = "UPDATE TOTAL_ORDERS SET total_cost = '$sums' WHERE order_id = '$s_oid'";
                $res = mysqli_query($link,$order_update);
                
                $product_available = "UPDATE PRODUCT SET available = available - '$quant' WHERE pid = '$product'";
                $prod_avail_check = mysqli_query($link, $product_available);
                header("location: ../home.php");
                
                
                
                
            }
            else
            {
                echo "Order not added";
            }
            
        }

        }



        /*
        $query = "INSERT INTO GSMS.ORDER VALUES(NULL,'$s_oid','$product','$q','$total')";


        $result = mysqli_query($link,$query);
        if ($result)
        {
            echo "Order Added";
            
            $order_sum = "SELECT SUM(total) FROM GSMS.ORDER WHERE single_oid = '$s_oid'";
            $sum = mysqli_query($link,$order_sum);
            $sum_array = $sum->fetch_array();
            $sums = floatval($sum_array[0]);
            
            $order_update = "UPDATE TOTAL_ORDERS SET total_cost = '$sums' WHERE order_id = '$s_oid'";
            $res = mysqli_query($link,$order_update);
            header("location: ../home.php");
        }



        else
        {
            echo "Order not added";
        }
         */

?>