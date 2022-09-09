<?php

    // include 'Backend/action_page.php';
    function checkSession($page_name)
    {
        if($_SESSION['loggedIn'] == true)
        {
            header("location:$page_name");
        }
        else
        {
            header("location:index.php");
        }
    }
?>
