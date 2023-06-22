
  GNU nano 5.4                                                                                         store.php                                                                                                  
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
</head>
<body>
    <header><h2><b><i>Group 21</b></i></h2></header>
    <h3 style="text-align: center;">Welcome to Group 21!</h3>
    <p style="text-align: center;">Who are you? Please select an option below.</p>
    
    <form action "owner.php" method="GET">
        <div style="text-align: center;">
                <input type="Submit" name="Submit" value = "OWNER"/> <br>
        </div>
    </form>
    <form action = "employee.php" method= "post">
        <div style="text-align: center;">
                <input type="Submit" name="Submit" value="EMPLOYEE" /> <br/>
        </div>
    </form>
    <form action = "customer_login.php" method= "post">
         <div style="text-align: center;"> 
                  <input type="Submit" name="Submit" value="CUSTOMER"/> <br/><br/>
             </label>
        </div>
    </form>
</body>
</html>
