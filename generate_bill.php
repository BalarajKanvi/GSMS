<!DOCTYPE html>

<head>

<?php

    $order_id = $_GET['oid'];

    echo "
    <script>
        function print() {
            var frame = document.getElementById('frame');
            frame.contentWindow.focus();
            frame.contentWindow.print();
        }
    </script>
    </head>

    <body>
    
        <iframe src='order_bill.php?oid=$order_id' id='frame' width='400' height='500' style='margin: 2% auto auto 35%;'></iframe><br>
        <button id='bill' onclick='print()'' style=' font-size: 1.5em;
        font-style:Arial,Helvetica,sans-serif;
        margin-top: 1%; margin-right: auto; margin-bottom: auto; margin-left: 40%;
        padding: 1%;'>Generate Invoice</button>

    </body>
    ";
?>

    </body>
    </html>