<?php

	class MySQLConnector
	{
		private static $_host;
		private static $_port;
		private static $_dbName;
		private static $_username;
		private static $_password;
		
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
			$_host = $host;
			$_port = $port;
			$_dbName = $dbName;
			$_username = $username;
			$_password = $password;
		}

		public function execute($query, $params)
		{
			$conn = new PDO("mysql:host=".$_host.";port=".$_port.";dbname=".$_dbName, $_username, $_password);
			
			$stmt = $conn->prepare($query);
			$stmt->execute($params);
			
			return $stmt;
		}
	}

?>
