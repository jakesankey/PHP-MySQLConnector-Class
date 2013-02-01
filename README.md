MySQLConnector-PHP-MySQL-Wrapper
================================

This is perfect for those who are new to PHP and MySQL interaction and looking for a straight-forward way of working with a database.

This class is a singleton (single instance) which wrap up the basic functionality of PHP's PDO classes. With a simple configuration method and a single 'execute' method, this class makes it very simple to get results from a MySQL database. Your SQL will be made a prepared statement prior to execution, limiting the possibility of SQL injection threats. If you are interested, you can download the class here: <a href="http://jakesankey.com/files/code/MySQLConnectorV2.zip" title="MySQLConnector" target="_blank">MySQLConnector</a>.

To use MySQLConnector, you first need to include it in your PHP file:

    include("MySQLConnector.php");

Then, somewhere in the application you setup the connection parameters (which will be retained for the life of the current session or until changed): 

    MySQLConnector::setDefaultConnection("host", port, "database", "username", "password");

Once you have done this, you can easily make calls to the database.

Execute a statement:
    $result = MySQLConnector::instance()->execute("SELECT * FROM MyTable");

The object returned is a PDOStatement object. So, you can loop through the results, grab a specific value, and execute any of the other native PDOStatement methods.

<b>EXAMPLE:</b>

    function Test()
    {
        $result = MySQLConnector::instance()->execute("SELECT * FROM User");
        $error = $result->errorCode() != "00000";
        $resultArray = $result->fetchAll();
        
        if (!$error)
        {
            foreach ($resultArray as $row)
            {
                print $row["FirstName"] . " " . $row["LastName"] . "</br>";
            }
        }
        else
        {
            $errorInfo = $result->errorInfo();
            print "An error occured: " . $errorInfo[2];
        }
    }

