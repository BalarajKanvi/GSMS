<?php
    include "../db_connection.php";

    $user = $_POST['new_email'];
    $pw = md5($_POST['new_psw']);
    $pwr = md5($_POST['new_psw_repeat']);

    if($pw == $pwr)
    {
        $query = "INSERT INTO LOGIN(username,passwd) VALUES('$user','$pw')";
    
        $result = mysqli_query($link, $query);
        if ($result)
        {
            // $_SESSION['loggedIn'] = true;
            echo "<script type='text/JavaScript'> 
                    alert('User Registered');
                    location='../home.php';
                  </script>";


        }
        else
        {
            // $_SESSION['loggedIn'] = false;
            echo "<script type='text/JavaScript'>
                    alert('User not registered');
                    location='../index.php';
              </script>";
        
        }
    }

    else
    {
        // $_SESSION['loggedIn'] = false;
        echo "<script type='text/JavaScript'>
                    alert('User not registered');
                    location='../index.php';
              </script>";
        
    }
?>