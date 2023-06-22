<?php
    function createTable($rows) { 
        echo "<table border=1 cellpadding=10>"; // table formatting to make it look nice
        echo "<tr>";
        // make the first row of the table a header row
        foreach($rows[0] as $key => $item) {
            echo "<th>$key</th>";
        }
        echo "</tr>";
        foreach($rows as $row) {
            echo "<tr>";
            foreach($row as $key => $item) {
                echo "<td>$item</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

function shopping_cart($rows) { 
	echo "<form action = 'viewSC.php' method = 'GET'>";
        echo "<table border=1 cellpadding=20px>"; // table formatting to make it look nice
        $i = 0;
	echo "<tr>";
        // make the first row of the table a header row
        foreach($rows[0] as $key => $item) {
            echo "<th>$key</th>";
        }
	echo "<th></th>";

        echo "</tr>";

        foreach($rows as $row) {
            echo "<tr>";
            foreach($row as $key => $item) {
                echo "<td>$item</td>";
	    }
		$i++;
		echo "<td><input type = 'Submit' name = 'remove' value = 'Remove Item'></td>"; 
		echo "<input type = 'hidden' name = 'tbremoved' value = $i>"; 
            echo "</tr>";
        }
        echo "</table>";
	echo "</form>";
    }

   // function to display the products to the user
    function productList($rows) { 
        $pID = 0;
        echo "<table class=\"center-big\" border=1 cellpadding=10>"; // table formatting to make it look nice
        echo "<tr>";
            echo "<th>Item</th><th>ID</th><th>Price</th><th># In Stock</th>";
        echo "</tr>";
        foreach($rows as $row) {
            echo "<tr>";
            foreach($row as $key => $item) {
                echo "<td>$item</td>";
                $pID++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    // allow submission for the user's name
    function submitName(){
        echo "<form method=post action=\"customer_cart.php\">";
            echo "<div style=\"text-align: center;\">";
                echo "<input type=\"text\" style=\"height: 25px; text-align: center;\" name=\"customerName\" value=\"Type Your Name Here\"/> <br/><br/>";
                echo "<input type=\"submit\" name=\"nameSubmit\" value=\"Submit Your Name Here\"/>";
            echo "</div>";
        echo "</form>";
    }

    // add a product to the shopping cart
    function addProduct() {
        echo "<div style=\"text-align: center;\">";
            echo "<select id=\"products\" name=\"products\" style=\"height:30px;\">";
                echo "<option value=\"-\">-</option>
                        <option value=\"apples\">apples</option>
                        <option value=\"bread\">bread</option>
                        <option value=\"oranges\">oranges</option>
                        <option value=\"milk\">milk</option>
                        <option value=\"cereal\">cereal</option>
                        <option value=\"ice cream\">ice cream</option>
                        <option value=\"chips\">chips</option>
                        <option value=\"pasta\">pasta</option>
                        <option value=\"peanut butter\">peanut butter</option>
                        <option value=\"lettuce\">lettuce</option>
                        <option value=\"mayonaise\">mayonaise</option>
                        <option value=\"fruit punch\">fruit punch</option>
                        <option value=\"granola bars\">granola bars</option>
                        <option value=\"peaches\">peaches</option>
                        <option value=\"pretzels\">pretzels</option>
                        <option value=\"grapes\">grapes</option>
                        <option value=\"chips\">chips</option>
                        <option value=\"frozen pizza\">frozen pizza</option>
                        <option value=\"soda\">soda</option>
                        <option value=\"bottled water\">bottled water</option>";
            echo "</select>";
            echo "<input type=\"hidden\" name=\"pID\" value=\"pID\"/>";
            echo "<input type=\"text\" style=\"height:25px;\" name=\"quan\" value=\"Add Quantity Here\"/>";
            echo "<input type=\"submit\" style=\"height:30px;\" name=\"productSubmit\" value=\"Add to Cart\"/>";
        echo "</div>";
    }
?>
