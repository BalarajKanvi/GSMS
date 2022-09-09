<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/o_styles.css">
    <title>GSMS</title>
</head>

<body>
    <div>
        <h1>View Order Details</h1>


        <form name="f" method="POST" action="view-orders.php">
            <label for="cust_name"> Name &nbsp;</label>
            <select name="o_id" id="o_id">

                <?php
                include 'db_connection.php';

                $query = "SELECT * FROM TOTAL_ORDERS";
                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value={$row['order_id']}>{$row['c_name']}</option>";
                }

                ?>

            </select>
            <input value="Submit" type="Submit" class="submit-button">
        </form>

    </div>



</body>

</html>