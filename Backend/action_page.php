<?php
    include "../db_connection.php";

    // $_SESSION['first'] = true;
    $user = $_POST['uname'];
    $pw = md5($_POST['psw']);

    $query = "SELECT * FROM LOGIN WHERE username = '$user' AND passwd = '$pw'";
    
    $result = mysqli_query($link, $query);
    $check_username = mysqli_num_rows($result);

    if ($check_username > 0)
    {
        // $_SESSION['loggedIn'] = true;
        echo "<script type='text/JavaScript'> 
                    alert('Login Successful');
                location='../home.php';
              </script>";

    }
    else
    {
        // $_SESSION['loggedIn'] = false;
        echo "<script type='text/JavaScript'>
                    alert('Login Not Successful');
                    location='../index.php';
              </script>";
        
    }
?>