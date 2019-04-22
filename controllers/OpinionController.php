<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/text; charset=UTF-8");
ini_set('memory_limit','16M');
ini_set('max_execution_time', 300);
require_once("lib/Logger.php");
require_once("Controller.php");
require_once("models/OpinionModel.php");

//http://davidscotttufts.com/2009/03/31/how-to-create-barcodes-in-php/ = Barcode
class OpinionController extends Controller
{
	private $opinionModel;
	private $log;
	function __construct(){
		parent::__construct();
		$this->log = new Logger();
		$this->opinionModel = new OpinionModel();
	}
	
	public function index(){
		try{
			$poll_status = "";
			$validation_msg = "";
			

			if(isset($_POST['polls']) && isset($_POST['question'])){
				$poll_status = $this->AddPoll($_POST);				
			}

			if(isset($_POST['polls']) && !isset($_POST['question'])){
				$validation_msg = "Please select any poll option";
			}

			$Questions = $this->GetAllOpinion();

			if($poll_status!=""){
				$poll_status = json_decode($poll_status);
				if($poll_status->status=="Success"){
					$poll_results = $this->GetPollResponse();
					require "views/results.html.php";
					exit();
				}
			}


			
			require "views/opinion.html.php";					
			
		}
		catch(Exception $e){
			$this->log->WriteLog($e->getMessage());			
		}
	}

	public function GetAllOpinion(){		
		//$DeviceLoc = $_POST['deviceID'];
		try{
			return json_encode($this->opinionModel->GetAllOpinions());
		}
		catch(Exception $e){
			$this->log->WriteLog($e->getMessage());
			echo $e->getMessage();die();
		}
		return "";
	}
	
	public function GetPollResponse(){
		$poll_results = array();
		try{
			$poll_response = $this->opinionModel->GetPollResponse();			
			for($i=0;$i<count($poll_response);$i++){
				$cnt = (isset($poll_results[$poll_response[$i]['op_question']][$poll_response[$i]['opinion']])) ? $poll_results[$poll_response[$i]['op_question']][$poll_response[$i]['opinion']] : 0;
				$poll_results[$poll_response[$i]['op_question']][$poll_response[$i]['opinion']] = $cnt + 1;
			}			
		}
		catch(Exception $e)	{
			$this->log->WriteLog($e->getMessage());
			
		}
//		echo "<PRE>";print_r($poll_response);echo "</PRE>";
		return $poll_results;
		
	}
	
	public function AddPoll($post){		
		//$DeviceLoc = $_POST['deviceID'];
		$return = array();
		try{
			$insert_Status = $this->opinionModel->AddPoll($post['question']);
			//echo json_encode($insert_Status);die();
			if($insert_Status == 1){
				$return['msg'] = "Poll Successfully Submitted";
				$return['status'] = "Success";
			}else{
				$return['msg'] = "Error on your Poll";
				$return['status'] = "Error";
			}
		}
		catch(Exception $e)	{
			$this->log->WriteLog($e->getMessage());
			
		}
		
		return json_encode($return);
	}
} 