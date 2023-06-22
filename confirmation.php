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
if (empty($_POST['name']) or empty($_POST['street']) or empty($_POST['citystatezip']) or empty($_POST['card_num']) or empty($_POST['card_name']) or empty($_POST['experation_date'])) {
        echo "You did not fill out all areas";
}
else {
	echo    "<header><h2><b><i>Order Has Been Placed</b></i></h2></header>";

	echo    "<form action='http://students.cs.niu.edu/~z1884404/store.php' method='POST'>";
	echo    "<input type='submit' name='submit' value='Go Back To Store'/>";
	echo    "</form>";
}
?>
</body>


</html>
