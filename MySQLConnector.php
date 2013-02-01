<?php

  class MySQLConnector
	{
		private function __construct()
		{
		}
		
		public static function instance()
		{
			static $inst = null;
			if ($inst === null)
			{
				$inst = new MySQLConnector();
			}
			return $inst;
		}
		
		public static function setDefaultConnection($host, $port, $dbName, $username, $password)
		{
			$_SESSION["host"] = $host;
			$_SESSION["port"] = $port;
			$_SESSION["database"] = $dbName;
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
		}

		public function execute($query)
		{
			$conn = new PDO("mysql:host=".$_SESSION["host"].";port=".$_SESSION["port"].";dbname=".$_SESSION["database"], $_SESSION["username"], $_SESSION["password"]);
			
			$stmt = $conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
	  }
	}

?>
