<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Group 21's Project</title>
    <style>
        header{
            background-color: #333;
            font-family: "Georgia";
            color: white;
            padding: 5px;
            text-align: center;
        }
        body{
            background-color: #0d0d0d;
            font-family: "Lato";
            font-size: 18px;
	    color: white;
	    text-align: center;
        }
        tr:nth-child(odd){
                background-color: #242526
        }

    </style>
</head>
<body>
<?php
echo    "<header><h2><b><i>Checkout</b></i></h2></header>";

echo    "<header><b>Shipping Address</b></header>";
echo    "<form action='http://students.cs.niu.edu/~z1904980/test3.php' method='POST'>";
echo    "<p>";
echo    "name<br/><input type='text' name='name'/> <br/>";
echo    "street<br/><input type='text' name='street'/> <br/>";
echo    "city, state, zip<br/><input type='text' name='citystatezip'/> <br/>";
echo    "</p>";

echo    "<header><b>Billing Information</b></header>";

echo    "<p>";
echo    "card number<br/><input type='text' name='card_num'/> <br/>";
echo    "name on card<br/><input type='text' name='card_name'/> <br/>";
echo    "experation date (##/####)<br/><input type='text' name='experation_date'> <br/>";
echo    "</p>";

echo    "<header>Total: $total</header><br/>";

echo    "<input type='submit' name='submit' value='Place Your Order'/>";

echo    "</form>";
?>

</body>


</html>

