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
    <p style="text-align: center;">Who are you? Select an option below.</p>
    
    <form method="post" action="store_action.php">
        <div style="text-align: center;">
            <label class="radio-inline">    
                <input type="radio" name="selection" id="owner" value="Owner"/>Owner
            </label>
            <label class="radio-inline">
                <input type="radio" name="selection" id="employee" value="Employee"/>Employee
            </label>
            <label class="radio-inline">
                <input type="radio" name="selection" id="customer" value="Customer"/>Customer <br/><br/>
            </label>
          
            <input type="submit" name="submit" value="Submit Here!"/>
        </div>
    </form>
</body>
</html>
