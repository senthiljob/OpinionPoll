<?php
include_once("models/model.php");
//include_once("views/view.php");
class Controller
{
	protected $model;
	
		
	function __construct($db_name=""){
		$this->model = new Model($db_name);
		//$this->view = new View();
	}
}