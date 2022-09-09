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
        <h1>New Order</h1>

        <div id="add-order-container">
     

        <form name="f" method="POST" action="Backend/order.php">
            <label>Name</label> <input type="text" name="customer_name" required/><br><br>
            <label>Total</label>  <input type="number" step="0.01" min="0.00" name="total" required/><br><br>
            
            <input value="Add" type="Submit" class="submit-button">
        </form>

        </div>


    </div>



</body>

</html>
