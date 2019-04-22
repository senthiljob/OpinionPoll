<?php
class Database{
 
    // specify your own database credentials
	
	private static $_instance; //The single instance
    private $host = "localhost";
    private $db_name = "opinions";//"mobimanagement";
    private $username = "root";
    private $password = "root";
    public $connection;
	
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance($DB) {
		
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self($DB);
		}
		return self::$_instance;
	}
	
	
	 
 
    // get the database connection
    public function __construct($DB){
	//echo "====>".$DB."<br/>";
    	
	 	if($DB!="") $this->db_name = $DB;
        $this->connection = null;
		$this->connection = @new mysqli($this->host, $this->username, $this->password, $this->db_name);

		if ($this->connection->connect_error) {
			//die("Connection failed: " . $this->connection->connect_error);
		   $err['name'] = 'db';
		   $err['desc']= $this->connection->connect_error;
		   echo json_encode($err);
		   die();
		}
    }
	
	// Get mysqli connection
	public function getConnection() {
		return $this->connection;
	}
	
	
	
	
}