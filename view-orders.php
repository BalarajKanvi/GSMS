<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/o_styles.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/all.css">
    <title>GSMS</title>
</head>



<body>
    <div>
        <h1>Order Details</h1>

        <div id="c_details">

        <?php

        include 'db_connection.php';

        $order_id = $_GET['oid'];

        $query = "SELECT * FROM TOTAL_ORDERS WHERE order_id = '$order_id'";
        $result = mysqli_query($link,$query);
        $res = $result->fetch_array();
            echo "
                <span id='order-id'> Order ID : {$res['order_id']} </span>
                <span><a id='bill-generate' href='generate_bill.php?oid=$order_id' target='_blank'>Generate Invoice</a> 
                </span>
                <span id='c-name'> Name : {$res['c_name']} </span>
                ";
        ?>

        </div>

        <table border=1px id="order-details">
            <tr>
                <th>Product</th>
                <th>Price Per Unit</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            
            <?php

            include 'db_connection.php';
            // include 'home.php';

            $order_id = $_GET['oid'];

            // $order_id = $_POST['o_id'];

            $query = "SELECT * FROM GSMS.ORDER JOIN PRODUCT ON p_id = pid WHERE single_oid = '$order_id'";
            $result = mysqli_query($link,$query);

            while($row = mysqli_fetch_assoc($result))
            {
                $OID = $row['o_id'];
                echo "<tr>
                        <td>{$row['p_name']} </td>
                        <td>{$row['price_per_unit']} </td>
                        <td>{$row['quantity']} </td>
                        <td>{$row['total']} </td>
                        <td><a href='delete_order.php?oID=$OID&order_id=$order_id' id='delete_prod'>
                            <i class='fas fa-trash' style='color: #FF0000'></i>
                        </a>
                        </td>
                        
                    </tr>";
            }


            $order_sum = "SELECT SUM(total) FROM GSMS.ORDER WHERE single_oid = '$order_id'";
            $sum = mysqli_query($link,$order_sum);
            $sum_array = $sum->fetch_array();
            $sums = floatval($sum_array[0]);

            echo "<tr>
                    <td colspan='3' id='total'> Total </td>
                    <td>$sums</td>
                </tr>";

            ?>
        </table>

    </div>


</body>

</html>

