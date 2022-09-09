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
        <h1>Add Products</h1>
     
        <div id="add-prod-container">
            <form name="f" method="POST" action="Backend/products.php">
                <label>Name</label>  <input type="text" name="product_name" required/><br/><br/>
                <label for="unit"> Unit &nbsp;</label>
                <select name="units" id="unit">
            
                <?php
                include 'db_connection.php';
            
                $query = "SELECT * FROM UOM";
                $result = mysqli_query($link,$query);

                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option value={$row['uom_id']}>{$row['uom_name']}</option>";
                }

                ?>
            
                </select><br/><br/>

                <label>Price Per Unit</label>  <input type="number" step="0.01" min="0.00" name="ppu" required/><br/><br/>
                
                <label> Available </label>  <input type="number" step="1" min="0" name="avail" required/>
                <br/> <br/>

                <input value="Add" type="Submit" class="submit-button">
            </form>
        </div>

    </div>

    


</body>

</html>
