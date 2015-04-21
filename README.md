MySQLConnector-PHP-MySQL-Wrapper
================================

This is perfect for those who are new to PHP and MySQL interaction and looking for a straight-forward way of working with a database.

This class is a singleton (single instance) which wraps up the basic functionality of PHP's PDO classes. With a simple configuration method and a single 'execute' method, this class makes it very simple to get results from a MySQL database. Your SQL will be made a prepared statement prior to execution, limiting the possibility of SQL injection threats.

To use MySQLConnector, you first need to include it in your PHP file:
```php
    include("MySQLConnector.php");
```

Then, somewhere in the application you setup the connection parameters (which will be retained for the life of the current session or until changed): 
```php
    MySQLConnector::setDefaultConnection("host", port, "database", "username", "password");
```

Once you have done this, you can easily make calls to the database.

<b>Execute a statement:</b>
```php
    $result = MySQLConnector::instance()->execute("SELECT * FROM MyTable");
```
The object returned is a PDOStatement object. So, you can loop through the results, grab a specific value, and execute any of the other native PDOStatement methods.

<b>EXAMPLE:</b>
```php
    function Test() {
        $query = "SELECT * FROM User WHERE Age > :age";
        $params = array("age" => 18)
        $result = MySQLConnector::instance()->execute(query, params);
        $error = $result->errorCode() != "00000";
        $resultArray = $result->fetchAll();
        
        if (!$error) {
            foreach ($resultArray as $row) {
                print $row["FirstName"] . " " . $row["LastName"] . "</br>";
            }
        }
        else {
            $errorInfo = $result->errorInfo();
            print "An error occured: " . $errorInfo[2];
        }
    }
```
