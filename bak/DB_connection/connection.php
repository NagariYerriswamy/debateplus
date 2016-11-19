<?php 
/*
 * @Version
 * @Package Database
 */

class Database{
	//Declare connection string
	public $connection;


 
//	public $host = "172.31.4.96";  // Change as required new 10.0.3.108,  old 172.31.4.96
//	public $user = "daily_pooja";  // Change as required new: root old: daily_pooja
//	public $pass = "dailypoojacrmdb";  // Change as required new: Cricinfo@123, old: dailypoojacrmdb

	 public $host = "localhost";  // Change as required new 10.0.3.108,  old 172.31.4.96
	 public $user = "root";  // Change as required new: root old: daily_pooja
	 public $pass = "welcome@root";  // Change as required new: Cricinfo@123, old: dailypoojacrmdb

	//Connect with database for mysql database
	public function connect($db)
	{
		$db = 'debateplus';
		$connection = new mysqli($this->host,$this->user,$this->pass,$db);
		//Check Connection
		if($connection->connect_errno){			
			die("Connection Fail ".$connection->connect_error);
			//echo $this->connection->connect_error;						
		}else{

			//echo "".$db." is connected<br>";
			return $connection;
		}

	}// End of constructor	
}

?>

