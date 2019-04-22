<?php
require_once("model.php");
class OpinionModel extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function GetAllOpinions(){		
		$opinions_info = array();			
		try{
			$sql = "SELECT * from op_quest";
			$stmt = $this->conn->prepare($sql);
			if(!$stmt) {
				throw new Exception();
			}else{			
				
				$stmt->execute();
				$result = $stmt->get_result();
				
				if($result->num_rows === 0) return $opinions_info;
				$i = 1;
				while($row = $result->fetch_assoc()) {
				  $opinions_info[] = $row;
				}				
				$stmt->close();
			}
		}		
		catch(Exception $e){
	   		throw new Exception($e);
		}
		return $opinions_info;
	}
	
	public function GetPollResponse(){		
		$poll_info = array();			
		try{
			$sql = "SELECT op_question , opinion from op_response";
			$stmt = $this->conn->prepare($sql);
			if(!$stmt) {
				throw new Exception();
			}else{			
				//@$stmt->bind_param("s",$pid) or $this->throw_function("Error - on binding");
				$stmt->execute();
				$result = $stmt->get_result();
				
				if($result->num_rows === 0) return $poll_info;
				$i = 1;
				while($row = $result->fetch_assoc()) {
				  $poll_info[] = $row;
				}				
				$stmt->close();
			}
		}		
		catch(Exception $e){
	   		throw new Exception($e);
		}
		return $poll_info;
	}
	

	
	function AddPoll($formData){
		  try{
		  	$rows_affected = 0;
			$updateqry = "INSERT INTO op_response (`op_question`,`opinion`,`op_date`) VALUES(?,?,?)";
			$stmt = $this->conn->prepare($updateqry);

			if(!$stmt) {
				throw new Exception("Error on query");
			}else{
				foreach($formData as $q => $ans):
					$d = date("Y-m-d H:i:s");
					@$stmt->bind_param("iis",$q,$ans,$d) or $this->throw_function("Error - on binding");
					@$stmt->execute() or $this->throw_function("Error on query execution");
				endforeach;
				
				$rows_affected = $stmt->affected_rows;
				
				$stmt->close();
			}
		  }	  
		  catch(Exception $e){
		  		$rows_affected = -1;
				throw new Exception($e);
		  }
		
		return $rows_affected; 
	}
	
	
	
	
	function throw_function($err){
		throw new Exception($err);
	}
	
	function addParamsToSQL ( $SQL, $params ) {

		foreach($params as $value)
			$SQL = preg_replace ( '[\?]' , "'" . $value . "'" , $SQL, 1 );
	
		return $SQL."<br/>";
	}
}