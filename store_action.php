<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Store Action</title>
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
        .center{
            margin: auto;
            width: 10%;
        }
    </style>
</head>
<body>
    <header><h2><b><i>Group 21</i></b></h2></header>
    <?php        
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

        // check if the user actually submitted the form
        if(isset($_POST['submit'])){
            $submission = array($_POST['selection']);
            
            if(in_array("Customer", $submission)){
                echo "<h3 style=\"text-align: center;\">Hello customer! What's your name?</h3>";
                submitName();
            }
            else if(in_array("Employee", $submission)){
                echo "employee"; 
            }
            else if(in_array("Owner", $submission)){
                echo "owner";
            }
            else{
                echo "\t\t\tUh oh. Something went wrong. Go back and try again.";
            }
        }
    ?> 

<!-- //        SESSION_START();

//        if(!(isset($_SESSION['cart']))){
//             $_SESSION['cart'];
//         }

//         if(isset($_GET['product_id'])){
//             $pID = $_GET['product_id'];
//             $cQuantity = $_GET['quantity'];

//             if($cQuantity > 0 && filter_var($cQuantity, FILTER_VALIDATE_INT)){
//                 if(isset($_SESSION['cart'][$pID])){
//                     $_SESSION['cart'][$pID] += $cQuantity;
//                 }
//                 else{   // if product doesn't exist in the cart, add it to the cart
//                     $_SESSION['cart'][$pID] = $pQuantity;
//                 }
//             }
//             else {
//                 // input quantity from user isn't an int
//                 echo $error = "Error: Invalid quantity displayed";
//             }
//         } -->
</body>
</html>


