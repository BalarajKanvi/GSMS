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

<?php
include 'header.php';


?>

<body>
    <div>
        <h1>ORDERS</h1>
        <!-- <a href="view-order-details.php" id="view-order">Order Details</a> -->
        <a id="manage_prod" href="view-products.php">Manage Products</a>
        <a id="new_order" href="add_order.php">New Order</a><br>

        <table border=1px>
            <tr>
                <th>Date</th>
                <th>Order number</th>
                <th>Customer Name</th>
                <th>Total</th>
                <th> Action </th>
            </tr>
            <?php



            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "GSMS";
            $link = mysqli_connect($host, $user, $password, $db);

            $query = "SELECT * FROM TOTAL_ORDERS";
            $result = mysqli_query($link, $query);

            function getTotal($order_id, $link)
            {

                $order_sum = "SELECT SUM(total) FROM GSMS.ORDER WHERE single_oid = '$order_id'";
                $sum = mysqli_query($link, $order_sum);
                $sum_array = $sum->fetch_array();
                $sums = floatval($sum_array[0]);
                return $sums;
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $oid = $row['order_id'];
                $cname = $row['c_name'];
                $sums = getTotal($oid, $link);
                echo "<tr>
                        <td>{$row['date_time']} </td>
                        <td>{$row['order_id']} </td>
                        <td>{$row['c_name']} </td>
                        <td> $sums </td>
                        <td>
                        <a href='order_details.php?oid=$oid' id='o_details'>
                            <i class='fas fa-cart-plus fa-lg' style='color: #00FF00'></i>
                        </a> &emsp;
                        <a href='view-orders.php?oid=$oid' id='view-details' target='_blank'>
                            <i class='fas fa-eye fa-lg' style='color: #FFFFFF'></i>
                        </a> &emsp;
                        <a href='delete-single-order.php?o=$oid' id='delete-orders' >
                            <i class='fas fa-trash fa-lg' style='color: #FF0000'></i>
                        </a>
                        </td>
                </tr>";
            }

            $order_sum = "SELECT SUM(total_cost) FROM TOTAL_ORDERS";
            $sum = mysqli_query($link, $order_sum);
            $sum_array = $sum->fetch_array();
            $sums = floatval($sum_array[0]);

            echo " <tr>
                <td colspan='3' id='total'> Total </td>
                <td>$sums</td>
                 </tr>";

            ?>
        </table>

    </div>


</body>

</html>