MySQLConnector-PHP-MySQL-Wrapper
================================

This is perfect for those who are new to PHP and MySQL interaction and looking for a straight-forward way of working with a database.

This class is a singleton (single instance) which wraps up the basic functionality of PHP's PDO classes. With a simple configuration method and a single 'execute' method, this class makes it very simple to get results from a MySQL database. Your SQL will be made a prepared statement prior to execution, limiting the possibility of SQL injection threats.

To use MySQLConnector, you first need to include it in your PHP file:

    include("MySQLConnector.php");

Then, somewhere in the application you setup the connection parameters (which will be retained for the life of the current session or until changed): 

    MySQLConnector::setDefaultConnection("host", port, "database", "username", "password");

Once you have done this, you can easily make calls to the database.

<b>Execute a statement:</b>

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

<b>LICENSE:</b>

Copyright (c) 2013 Jake Sankey

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
