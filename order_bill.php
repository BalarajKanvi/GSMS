<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/o_styles.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/all.css">
    <title>GSMS</title>
</head>

<body bgcolor="#FFFFFF">
    <div>

        <h1> Grocery Store </h1>
        <h2 style='text-align: center;
    font-family: "Arial Rounded MT Bold",Arial, Helvetica, sans-serif;'> Tax Invoice </h2><hr>
        <?php

        include 'db_connection.php';

        $order_id = $_GET['oid'];

        $query = "SELECT * FROM TOTAL_ORDERS WHERE order_id = '$order_id'";
        $result = mysqli_query($link,$query);
        $res = $result->fetch_array();
            echo "
                <span id='o-id' style='font-size: 1.2em;'> Order ID : {$res['order_id']} </span>
                <span id='dt' style='font-size: 1.2em;
                font-style: bold;
                font-style: Arial,Helvetica,sans-serif;
                text-align: right;
                margin-top: 10%; margin-left: 10%;
            }'> Bill Date : {$res['date_time']} </span><br>
                <span id='customer-name' style='font-size: 1.2em;
                font-style: bold; 
                font-style: Century Gothic,Arial,Helvetica,sans-serif;'> Name : {$res['c_name']} </span>
                ";
        ?>

        <table border=1px id="order-details">
            <tr>
                <th>Product</th>
                <th>Price Per Unit</th>
                <th>Quantity</th>
                <th>Total</th>
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
                      </tr>";
            }

            echo "</table>";


            $order_sum = "SELECT SUM(total) FROM GSMS.ORDER WHERE single_oid = '$order_id'";
            $count_query = "SELECT COUNT(*) FROM GSMS.ORDER WHERE single_oid = '$order_id'";
            $sum = mysqli_query($link,$order_sum);
            $c = mysqli_query($link,$count_query);
            $sum_array = $sum->fetch_array();
            $count = $c->fetch_array();
            $sums = floatval($sum_array[0]);
            $counts = intval($count[0]);
            
            echo "<hr>
                    <span id='count' style='font-size: 1.5em;font-style: Arial,sans-serif;'> Items : {$counts} </span>
                    <span id='bill-total' style='font-size: 1.5em;
                    font-style: bold;font-style:Arial,Helvetica,sans-serif;margin-top: 15%; margin-left:50%;text-align: right;'> Total : {$sums}</span>";

            ?>
    
    
    <span id='bottom' style="font-size: 1.5em;
    font-style: bold;
    display: block;
    margin: 1% auto auto 15%;"> This is a computer generated invoice. </span>
    </div>
    
    
    
</body>
    
</html>

