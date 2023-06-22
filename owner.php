<html><head><title>Owner View</title></head><body>
<p1>CSCI 466 Group Project (Owner View)</p1>
<?php

//Alexander Bertolasi, z1915589, CSCI 466 Group Project

$username = 'z1915589';
$password = '1998May15';
$dsn = "mysql:host=courses;dbname=z1915589";
$pdo = new PDO($dsn, $username, $password);

//Implemented a display function named show_table to call that displays tables within the database (For ease of use >
function show_table($rows) {
    if(empty($rows)) { echo "<p>No results found.</p>"; }
    else {
    echo "<table border=1 cellspacing=1>";
    echo "<tr>";
    foreach($rows[0] as $key => $item) {
      echo "<th>$key</th>";
    }

    foreach($rows as $row) {
      echo "<tr>";
      foreach($row as $key => $item) {
        echo "<td>$item</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
    }
}

//Block of code to implement button that displays information from table 'Product' about products in inventory.
echo "<form method=GET> <input type=submit name=productBtn value='Click for list of products.' /> </form>";
echo "<br>\n";

if (isSet($_GET['productBtn']) && $_GET['productBtn'] == "Click for list of products.") {
  $rs = $pdo->prepare("SELECT * FROM Product");
  $rs = $pdo->query("SELECT * FROM Product;");
  echo "\n";

  $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
  show_table($rows);
  echo "<br>\n\n";
}

//Block of code to implement button that displays currently filled orders.
echo "<form method=GET> <input type=submit name=filledBtn value='Click for list of past orders.' /> </form>";
echo "<br>\n";

if (isSet($_GET['filledBtn']) && $_GET['filledBtn'] == "Click for list of past orders.") {
  $rs = $pdo->prepare("SELECT * FROM Order_ WHERE o_status = 'filled';");
  $rs = $pdo->query("SELECT * FROM Order_ WHERE o_status = 'filled';");
  echo "\n";

  $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
  show_table($rows);
  echo "<br>\n\n";
}

//Block of code to implement button that displays currently unfilled orders.
echo "<form method=GET> <input type=submit name=unfilledBtn value='Click for list of current orders.' /> </form>";
echo "<br>\n";

if (isSet($_GET['unfilledBtn']) && $_GET['unfilledBtn'] == "Click for list of current orders.") {
  $rs = $pdo->prepare("SELECT * FROM Order_ WHERE o_status = 'unfilled';");
  $rs = $pdo->query("SELECT * FROM Order_ WHERE o_status = 'unfilled';");
  echo "\n";

  $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
  show_table($rows);
  echo "<br>\n\n";
}

//Block of code to allow user to fulfill an unfilled order.
echo "<form action=owner.php method=POST /> <br>";
echo "Order ID: <input type=text name=fillOrderID /> <br>";
echo "Customer ID: <input type=text name=fillCustomerID /> <br>";
echo "<input type=submit value='Click to fill order.' />";
echo "</form>";

try {
        if (isSet($_POST['fillOrderID']) && isSet($_POST['fillCustomerID'])) {
                $ii = $_POST['fillOrderID'];
                $ii2 = $_POST['fillCustomerID'];

        $query = "UPDATE Order_ SET  o_status = 'filled' WHERE customerID = '$ii2' && orderID = '$ii'";

        $run =$pdo->query($query);

        }
}
catch(PDOexception $e) { //Handles exceptions (aforementioned)
echo "Connection to database failed: " . $e->getMessage();
}


//Block of code to implement text boxes and submission button for adding new products to the table 'Product'.
echo "<form action=owner.php method=POST /> <br>";
echo "Product Name: <input type=text name=newProductName /> <br>";
echo "Product Price: <input type=text name=newPrice /> <br>";
echo "Product Quantity: <input type=text name=newQty /> <br>";
echo "Owner ID: <input type=text name=newOwner /> <br>";
echo "Employee ID: <input type=text name=newEmployee /> <br> \n";
echo "<input type=submit value='Click to append new product.' />";
echo "</form>";

try {

        if (isset($_POST['newPrice']) && isset($_POST['newProductName']) && isset($_POST['newQty']) && isset($_POST['newOwner']) && isset($_POST['newEmployee'])) {

                $id2 = $_POST['newProductName'];
                $id3 = $_POST['newPrice'];
                $id4 = $_POST['newQty'];
                $id5 = $_POST['newOwner'];
                $id6 = $_POST['newEmployee'];

        $query = "INSERT INTO Product(p_name, price, p_quantity, ownerID, employeeID) VALUES('$id2', '$id3', '$id4', '$id5', '$id6')";
        $run =$pdo->query($query);

        }
}
catch(PDOexception $e) { //Handles exceptions (aforementioned)
echo "Connection to database failed: " . $e->getMessage();
}

echo "<br><br>\n";


//Block of code to view employee table.
echo "<form method=GET> <input type=submit name=empBtn value='Click for list of employees.' /> </form>";
echo "<br>\n";

if (isSet($_GET['empBtn']) && $_GET['empBtn'] == "Click for list of employees.") {
  $rs = $pdo->prepare("SELECT * FROM Employee");
  $rs = $pdo->query("SELECT * FROM Employee;");
  echo "\n";

  $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
  show_table($rows);
  echo "<br>\n\n";
}


//Block of code to add an employee to the roster.
echo "<form action=owner.php method=POST /> <br>";
echo "New Employee Name: <input type=text name=newEmpName /> <br>";
echo "<input type=submit value='Click to add an employee.' />";
echo "</form>";

try {

        if (isset($_POST['newEmpName'])) {

                $ic = $_POST['newEmpName'];

        $query = "INSERT INTO Employee(e_name) VALUES('$ic')";
        $run =$pdo->query($query);

        }
}
catch(PDOexception $e) { //Handles exceptions (aforementioned)
echo "Connection to database failed: " . $e->getMessage();
}

echo "<br><br>\n";


//Block of code to remove an employee from the roster.
echo "<form action=owner.php method=POST /> <br>";
echo "Removed Employee's ID: <input type=text name=removeEmp /> <br>";
echo "<input type=submit value='Click to remove an employee.' />";
echo "</form>";

try {

        if (isset($_POST['removeEmp'])) {

		$il = $_POST['removeEmp'];

	$query = "DELETE FROM Employee WHERE employeeID = '$il'";
	$run =$pdo->query($query);

	}
}
catch(PDOexception $e) { //Handles exceptions (aforementioned)
echo "Connection to database failed: " . $e->getMessage();
}

?>
</body></html>



