<?php
require_once("config/Database.php");
//require_once("config/DeviceDatabase.php");
class Model extends Database{
	private $dbresult;
	protected $db;
	protected $conn;
	
	
	function __construct($db_name=""){
	//echo "====>".$db_name."<br/>";
		$this->db = static::getInstance($db_name);
		$this->conn = $this->db->getConnection();
	}
}