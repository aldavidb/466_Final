<?php
   session_start();     // start the session for the customer's shopping cart
   
   include("functions.php");   //include all functions in here to be used
   include("secret_info.php");
   
   // connect to the database
   try{ // if something goes wrong, an exception is thrown
       $dsn = "mysql:host=courses;dbname=z1883404";
       $pdo = new PDO($dsn, $username, $password);                
   }
   catch (PDOException $e){
       echo "Connection to database failed: " . $e->getMessage();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Group 21: Customer</title>
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
            height: 25px;
            width: 150px;
        }
        .center-big{
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>
<body>
    <header><h2><b><i>Group 21</i></b></h2></header>
    <?php
        if(isset($_POST['nameSubmit'])){        // check if the submission for the customer's name worked
            echo "<h3 style=\"text-align: center;\">Welcome, " . $_POST['customerName'] . "</h3>";     // display the name on the top right side of the screen

            // try adding the name into the database once the code above works
            try{
                $sql = "INSERT INTO Customer(c_name) VALUES (:customerName)";
                $statement = $pdo->prepare($sql);
                $rs = $statement->execute([':customerName' => $_POST['customerName']]);
            }
            catch (PDOException $e){
                echo "\t\tName wasn't found: " . $e->getMessage();
            }    
        }
    ?>
    <h3 style="text-align: center;">Pick out some products to add to your shopping cart!</h3>
    <p style="text-align: center;"><i>Scroll to the bottom to add what you'd like!</i></p>
    <?php
        // // if the cart hasn't already been created for the customer, create it
        // if(empty($_SESSION['cart'])){
        //     $_SESSION['cart'];
        // }
        
        // try to display the products to the customer
        try{
            $sql = "SELECT p_name, productID, price, p_quantity FROM Product;";
            $rs = $pdo->query($sql);
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            productList($rows);
        }
        catch (PDOException $e){
            echo "\t\tList of products cannot be displayed at this time: " . $e->getMessage();
        }
    ?>
    <form method="post" action="">
        <?php
            addProduct();
        ?>
    </form> <br/>
    <?php

    ?>
    <div style="text-align:center">
        <a href="viewSC.php">View Your Shopping Cart</a>
    </div>
</body>
</html>