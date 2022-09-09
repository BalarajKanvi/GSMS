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
        <h1>Add Orders</h1>

        <div id="add-order-container">

        <?php

        include 'db_connection.php';
        $o = $_GET['oid'];

        echo "<form name='f' method='POST' action='Backend/insert_order.php?oid=$o'>

            
            <label>Customer Name &nbsp; </label>";
            
            $query = "SELECT * FROM TOTAL_ORDERS WHERE order_id = '$o'";
            $result = mysqli_query($link,$query);
            $row = mysqli_fetch_assoc($result);
            echo "<span id='cust_name'> {$row['c_name']} </span>";
        
        ?>

            <!-- </select> -->
            <br/><br/>


            <label for="product"> Product &nbsp;</label>
            <select name="prod" id="prod">
            
            <?php
            include 'db_connection.php';
            
            $query = "SELECT * FROM PRODUCT WHERE available > 0"; // " WHERE available <> 0;
            $result = mysqli_query($link,$query);
        

            while($row = mysqli_fetch_assoc($result))
            {
                echo "<option value={$row['pid']}>{$row['p_name']}</option>";
            }

            ?>
            
            </select><br /><br />

            <label>Quantity</label>  <input type="number" step="0.001" min="0.000" name="quantity" required/><br/><br/>

            <input value="Add" type="Submit" class="submit-button">
        </form>

        </div>
    </div>

    

</body>

</html>
