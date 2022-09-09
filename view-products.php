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
    <header>
        <a href="home.php" id="logout">
        <i class="fas fa-store fa-2x"></i>
        </a>
    </header>



    <div>
        <h1>Products Manager</h1>
        <!-- <a id="warehouse-btn" type="button" title="Go to Warehouse">Go to Warehouse</button> -->
        <!-- <button id="new_product" type="button" title="Add new Product">Add new Product</button> -->
        <!-- <a href='delete_product.php' id="delete_prod" target='_blank'>Delete</a> -->

        <a href="add_product.php" id="new_product" >Add new product</a>

        <table border=1px id="products_table">
            <tr>
                <th>Name</th>
                <th>Unit</th>
                <th>Price per Unit</th>
                <th> Quantity </th>
                <th>Action</th>
            </tr>
            
            <?php

            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "GSMS";
            $link = mysqli_connect($host,$user,$password,$db);


            $query = "SELECT * FROM PRODUCT JOIN UOM ON unit=uom_id WHERE available > 0";
            $result = mysqli_query($link,$query);

            while($row = mysqli_fetch_assoc($result))
            {
                $product_id = $row['pid'];
                echo "<tr>
                        <td>{$row['p_name']} </td>
                        <td>{$row['uom_name']} </td>
                        <td>{$row['price_per_unit']} </td>
                        <td> {$row['available']} </td>
                        <td><a href='delete_product.php?pId=$product_id' id='delete_prod'>
                            <i class='fas fa-trash' style='color: #FF0000'></i>
                        </a>
                        </td>
                    </tr>";
            }
            
            $order_sum = "SELECT SUM(price_per_unit) FROM PRODUCT";
            $sum = mysqli_query($link,$order_sum);
            $sum_array = $sum->fetch_array();
            $sums = floatval($sum_array[0]);

            echo "<tr>
                    <td colspan='2' id='total'> Total </td>
                    <td>$sums</td>
                </tr>";


           ?>
        </table>

    </div>


</body>

</html>