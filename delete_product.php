/*

<!-- <!DOCTYPE html>
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
        <h1>Delete Products In Orders</h1>
     

        <form name="f" method="POST" action="delete_product.php">
            <label for="p_name"> Product Name &nbsp;</label>
            <select name="pname" id="pname">
            
            /*
            ////<?php
                //include 'db_connection.php';

                //$query = "SELECT * FROM PRODUCT";
                //$result = mysqli_query($link,$query);

                //while($row = mysqli_fetch_assoc($result))
                //{
                //  echo "<option value={$row['pid']}>{$row['p_name']}</option>";
                //}

                //
                ?>
            */
            
            </select>


            <input type='submit' name='delete' value="Delete"/>
        </form>

    </div>

     
            // if (isset($_REQUEST['delete'])) {
                // include 'db_connection.php';

                // $u = $_POST['pname'];

                // $query = "DELETE FROM PRODUCT where pid='$u' ";

                // $result = mysqli_query($link, $query);

                // if (mysqli_affected_rows($link) > 0) {

                    // echo " Deleted";
                    // header("location:view-products.php");
                // } else {
                    // echo "Not deleted";
                // }
            // }
            // ?> --> 
*/

    
        <?php

        include 'db_connection.php';
        
        $u = $_GET['pId'];

        $query = "DELETE FROM PRODUCT WHERE pid = '$u'";

        $result = mysqli_query($link, $query);
        echo $result;
        if(mysqli_affected_rows($link)>0) 
        {
            header("location:view-products.php");
        } 
        else 
        {
            echo "Not deleted product";
        }

    ?>




<!-- </body>

</html> -->