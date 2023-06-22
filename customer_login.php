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
        }
        tr:nth-child(odd){
                background-color: #242526
        }
        input[type="submit"]{
            height: 50px;
            width: 150px;
        }
    </style>
<body>
	<header><h2><b><i>Group 21</b></i></h2></header>
   	<p style="text-align: center;">Please input your customer ID and name.</p>
	<form method = "POST">
		<div style="text-align: center;">
			<label for ="customerID_">Customer ID:</label><br>
			<input type ="text" name = "customerID_"> <br>
			<label for ="c_name">First Name:</label><br>
			<input type="text" name = "c_name"> <br>
			<input type = "submit" name = "login_submit" value ="Submit"> 
		</div>
	</form>

	<?php
		include("secret_info.php");
if(!empty($_POST["customerID_"]) && !empty($_POST["c_name"])) {
	try {
			$dsn = "mysql:host=courses;dbname=z1883404";
			$pdo = new PDO($dsn, $username, $password);

			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


			$customerID = $_POST['customerID_'];
                        $c_name = $_POST['c_name'];

			$mysql= "SELECT customerID
				 FROM Customer
				 WHERE customerID = $customerID
				 AND c_name = '$c_name';";

			$items = $pdo->prepare($mysql);
			$namerows = $items->execute();



		if(!empty($namerows)){

				echo "<form method ='POST'>";
				echo "<input type='hidden' name='customerID' value = $customerID></form>"; 
	
				header('Location: http://students.cs.niu.edu/~z1894914/CSCI-466-Group-21/store_action.php');	
		}  else {

			echo "<p>Retry Login, or create a new account!</p>";
			echo "<form method = 'POST'>";
				echo "<input type = 'Submit' name= 'make_acc' value='Make New Account!'>";
	
			if(!empty($_POST['make_acc'])) {
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
  				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "INSERT INTO Customer(c_name)
				   VALUES ('$c_name');";

			$sql2 = "SELECT customerID
			     	 FROM Customer
				 WHERE c_name = '$c_name';";
			$cID = $pdo->prepare($sql2);
			$cID ->execute();
			
			$row1 = $cID->fetch();

			$customerID1 = $row1[0];
			
			
			if ($conn->query($sql) === TRUE) {
  				echo "Your Account is All Set! Your customer ID is: $customerID1 ";


			} else {
  				echo "Error: " . $sql . "<br>" . $conn->error;
			}	
		
	
			}
		}


		}catch(PDO_exception $e) {
			echo "Connection to Database failed:" . $e->getMessage();
		}
}
	?>
</body>
</html>
