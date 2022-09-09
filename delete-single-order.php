<?php
    include 'db_connection.php';

    $o_id = $_GET['o'];

    $query = "DELETE FROM TOTAL_ORDERS WHERE order_id = $o_id";
    $result = mysqli_query($link, $query);

    if (mysqli_affected_rows($link) > 0) 
    {
        header("location: home.php");
    } 
    else 
    {
        echo "Not deleted";
    }

?>
