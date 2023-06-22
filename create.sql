DROP TABLE IF EXISTS Adds;
DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Order_;
DROP TABLE IF EXISTS ShoppingCart;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Owner;
DROP TABLE IF EXISTS Employee;


CREATE TABLE IF NOT EXISTS Employee(
        employeeID INT            AUTO_INCREMENT PRIMARY KEY,
        e_name       CHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Owner(
        ownerID INT            AUTO_INCREMENT PRIMARY KEY,
        o_name CHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Customer(
    customerID INT            AUTO_INCREMENT PRIMARY KEY,
    c_name       CHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Product(
        productID INT           AUTO_INCREMENT,
        ownerID   INT           NOT NULL,
        employeeID INT          NOT NULL,
        p_name CHAR(20)         NOT NULL,
        price DECIMAL(15,2)    NOT NULL,
        p_quantity INT          NOT NULL,

        PRIMARY KEY(productID),
        FOREIGN KEY(ownerID)    REFERENCES Owner(ownerID),
        FOREIGN KEY(employeeID) REFERENCES Employee(employeeID)
);

CREATE TABLE IF NOT EXISTS ShoppingCart(
        cartID          INT AUTO_INCREMENT,
        customerID INT NOT NULL,

        PRIMARY KEY(cartID),
        FOREIGN KEY(customerID) REFERENCES Customer(customerID)
);

CREATE TABLE IF NOT EXISTS Order_(
        orderID INT AUTO_INCREMENT,
        customerID      INT NOT NULL,
        employeeID      INT NOT NULL,
        o_status        CHAR(20) NOT NULL,

        FOREIGN KEY(customerID)  REFERENCES Customer(customerID),
        FOREIGN KEY(employeeID) REFERENCES Employee(employeeID),
        PRIMARY KEY(orderID, customerID)
);

CREATE TABLE IF NOT EXISTS Orders(
        customerID INT NOT NULL,
        cartID INT NOT NULL,
        orderID INT NOT NULL,
        date_ DATE NOT NULL,

        FOREIGN KEY(customerID) REFERENCES Customer(customerID),
        FOREIGN KEY(cartID) REFERENCES ShoppingCart(cartID),
        FOREIGN KEY(orderID) REFERENCES Order_(orderID),
        PRIMARY KEY (customerID, cartID)
);

CREATE TABLE IF NOT EXISTS Adds(
        a_quantity INT   NOT NULL,
        cartID INT         NOT NULL,
        customerID INT NOT NULL,
        productID INT      NOT NULL,
        date_ DATETIME,

        FOREIGN KEY(cartID) REFERENCES ShoppingCart(cartID),
        FOREIGN KEY(customerID) REFERENCES Customer(customerID),
        FOREIGN KEY(productID) REFERENCES Product(productID),
        PRIMARY KEY(productID, customerID)
);
