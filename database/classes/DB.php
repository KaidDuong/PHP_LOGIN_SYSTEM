<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class DB {
/*
@var object $connection   Hold the MySQLi object
*/
	protected static $con;

	/*
	@brief connect to the database 
	*/
	private function __construct() {

		try {
			//Below is a localhost connection
			self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_course', 'root','' );
			
			//set PDO attributes
			self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );

		} catch (PDOException $e) {
			echo "Could not connect to database."; 
			echo $e->getMessage();
			exit;
		
		}


	}

/* 
@return return the database Object
*/
	public static function getConnection() {
//if this instance was not been started, start it
		if (!self::$con) {
			new DB();
		}

		//return the writeable db connection
		return self::$con;
	}
}

?>
