INSERT INTO Owner
        (ownerID, o_name)
        VALUES  ('1', 'Steve');

INSERT INTO Employee
        (employeeID, e_name)
        VALUES  ('1', 'Marvin');

INSERT INTO Customer
        (customerID, c_name)
        VALUES  ('1', 'Bob'), ('2', 'Thomas'), ('3', 'Jack'), ('4', 'Stanley'), ('5', 'Alexa');

INSERT INTO Product
        (productID, ownerID, employeeID, p_name, price, p_quantity)
        VALUES  ('1', '1', '1', 'apples', '3.65', '100'),
                ('2', '1', '1', 'bread', '1.50', '100'),
                ('3', '1', '1', 'oranges', '3.80', '100'),
                ('4', '1', '1', 'milk', '1.45', '50'),
                ('5', '1', '1', 'cereal', '2.50' , '200'),
                ('6', '1', '1', 'ice cream', '2.35', '75'),
                ('7', '1', '1', 'chips', '1.45', '80'),
                ('8', '1', '1', 'pasta', '2.00', '150'),
                ('9', '1', '1', 'peanut butter', '1.25', '60'),
                ('10', '1', '1', 'lettuce', '1.15', '75'),
                ('11', '1', '1', 'mayonnaise', '2.35', '45'),
                ('12', '1', '1', 'fruit punch', '3.00', '50'),
                ('13', '1', '1', 'granola bars', '2.75', '90'),
                ('14', '1', '1', 'peaches', '2.85', '30'),
                ('15', '1', '1', 'pretzels', '3.50', '45'),
                ('16', '1', '1', 'grapes', '2.30', '25'),
                ('17', '1', '1', 'chips', '2.55', '30'),
                ('18', '1', '1', 'frozen pizza', '5.73', '50'),
                ('19', '1', '1', 'soda', '1.25', '125'),
                ('20', '1', '1', 'bottled water', '2.50', '30');

INSERT INTO ShoppingCart
        (cartID, customerID)
        VALUES  ('1', '1'),
                ('2', '2'),
                ('3', '3'),
                ('4', '4'),
                ('5', '5');


INSERT INTO Adds
        (a_quantity, productID, cartID, customerID, date_)
        VALUES  ('2', '3', '1', '1', '2022-04-27 12:50:35'),
                ('5', '6', '4', '4', '2022-04-27 12:50:35'),
                ('1', '9', '5', '5', '2022-04-27 12:50:35'),
                ('1', '2', '3', '3', '2022-04-27 12:50:35'),
                ('10', '20', '2', '2', '2022-04-27 12:50:35'),
                ('1', '18', '1', '1', '2022-04-27 12:50:35'),
                ('15', '12', '3', '3', '2022-04-27 12:50:35'),
                ('4', '16', '5', '5', '2022-04-27 12:50:35'),
                ('3', '13', '1', '1', '2022-04-27 12:50:35'),
                ('7', '8', '2', '2', '2022-04-27 12:50:35'),
                ('2', '15', '5', '5', '2022-04-27 12:50:35'),
                ('1', '4' , '4', '4', '2022-04-27 12:50:35'),
                ('4', '19', '4', '4', '2022-04-27 12:50:35'),
                ('18', '16', '3', '3', '2022-04-27 12:50:35'),
                ('5', '6', '5', '5', '2022-04-27 12:50:35');

INSERT INTO Order_
        (orderID, customerID, employeeID, o_status)
        VALUES  ('1', '1', '1', 'filled'),
                ('2', '1', '1', 'filled'),
                ('3', '1', '1', 'unfilled'),
                ('4', '2', '1', 'filled'),
                ('5', '2', '1', 'filled'),
                ('6', '2', '1', 'unfilled'),
                ('7', '3', '1', 'unfilled'),
                ('8', '4', '1', 'unfilled'),
                ('9', '4', '1', 'filled'),
                ('10', '5', '1', 'filled');

INSERT INTO Orders
        (orderID, customerID, cartID, date_)
        VALUES  ('3', '1', '1', '2022-05-05'),
                ('6', '2', '2', '2022-05-05'),
                ('7', '3', '3', '2022-05-05'),
                ('8', '4', '4', '2022-05-05');
