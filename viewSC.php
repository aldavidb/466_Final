<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Group 21</title>
  	<style>
	        header{
        		background-color: #333;
        		font-family: "Georgia";
			font-size: 20px;
			line-height: 40px;
        		color: white;
        		text-align: center;
        	}

        	body{
        		background-color: #0d0d0d;
        		font-family: "Lato";
        		font-size: 15px;
        		color: white;
        	}

        	tr:nth-child(odd){
                	background-color: #242526
        	}
	</style>
</head>

<body>
	<header><b>Group 21</b></header>
	<?php
		include("credentials.php");
		include("functions.php");

		try {
			$dsn = "mysql:host=courses;dbname=z1894914";
			$pdo = new PDO($dsn, $username, $password);

			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//if (isset($_POST['remove'])) {

			//$rm = "REMOVE FROM Adds 
				//WHERE  
				//(SELECT 


			$mysql= "SELECT p_name Product, price Price, a_quantity Quantity, date_ Date
				 FROM Adds JOIN Product
		      	         USING(productID)
				 WHERE cartID = ?;";

			$totalsql= "SELECT SUM(total_price) 
				    FROM (SELECT p.price*a.a_quantity as total_price
					  FROM Product p JOIN Adds a
				          USING(productID)
				          WHERE cartID = ?) as total_price;)";

			$items = $pdo->prepare($mysql);
			$items ->execute(array(4));

			$rows = $items->fetchALL(PDO::FETCH_ASSOC);

			$pTotal = $pdo->prepare($totalsql);
			$pTotal ->execute(array(4));

			$row = $pTotal->fetch();

			$total = $row[0]; 

			if(!$rows) {
				echo "<h3>Your shopping cart is empty!</h3>";
			} else {
				echo "<h3>Hello, this is your shopping cart!</h3>";
				shopping_cart($rows);

		
				echo "<h3> TOTAL = $ $total</h3>";
				echo "<form action='checkout.php' method='POST'>";
					echo "<input type = 'Submit' name = 'Submit' value = 'Proceed to Checkout'>";
					echo "<input type = 'hidden' name = 'total' value = $total>";
				echo "</form>";

			}
		}

		catch(PDO_exception $e) {
			echo "Connection to Database failed:" . $e->getMessage();
		}
		
		
	
	
	?> 
	<br>
	<br>


</body>

</html>


