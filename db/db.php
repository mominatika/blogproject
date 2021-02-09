<?php
class db
{
	private $host = 'localhost';
	private $user = 'root';
	private $Database = 'businessblog';
	private $password = "";

	public function __construct()
	{
		try {
				$this->conn = new PDO("mysql:host=".$this->host.';dbname='.$this->Database,$this->user,$this->password);
				return $this->conn;


		} catch (PDOException $e) 
		{
			echo  "database Connection Error:" .$e->getMessage();
		}
	}



 public function query($query, $params=[])
 {
 	if(empty($params))
 	{
 		
 		$this->result= $this->conn->prepare($query);

 		return $this->result->execute();
 	
 	}
 	else
 	{
 		$this->result=$this->conn->prepare($query);
 		// print_r($this->result);
 		// print_r($params);
 		return $this->result->execute($params);


 		
 	}
 }
 public function rowCount()
 {

 	return $this->result->rowCount();
 }
 public function fetchAll()
 {
 	return $this->result->fetchAll(PDO::FETCH_OBJ);
 }

 public function fetch()
 {
 	return $this->result->fetch(PDO::FETCH_OBJ);
 }

 
// public function cacheFile($cacheFile)
// {
// 		if(file_exists( __DIR__.'/../../application/cache/'.$cacheFile.'.php'))
// 		{
// 			require_once  __DIR__.'/../../application/cache/'.$cacheFile.'.php';
// 			return true;	
// 		}
// 		else
// 		{
// 			return false;
// 		}

// 	}
}

?>