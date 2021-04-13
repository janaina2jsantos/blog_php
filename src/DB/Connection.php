<?php


namespace Code\DB;


class Connection
{
	private static $conn = null;

	public static function getInstance() 
	{
		if (is_null(self::$conn)) {
			self::$conn = new \PDO('mysql:dbname=' . DB_NAME.';host=' . DB_HOST, DB_USER, DB_PASSWORD);
			// habilitando exibiçao de erro na página
			self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
			self::$conn->exec('SET NAMES '. DB_CHARSET);
		}

		return self::$conn;
	}
}
