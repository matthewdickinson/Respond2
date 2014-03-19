<?php
class api_loader {
	public $id;
	public $api_key;
	
	public function __construct($id){
		$this->id = $id;
		$this->host = 'logic-engine.com';
	}
	
	public function call_method($module, $method = null, $args = Array()){
		$query_string = "module=$module";

		if(!empty($method)){
			$query_string .= "&method=$method";
		}
		
		if(!empty($args)){
			$query_string .= '&' . http_build_query($args);
		}

		$scheme = (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') ? 'http' : 'https';
		$url = $scheme.'://'.$this->host.'/api_call.php?id='.$this->id.'&'.$query_string;
		$_POST['args'] = Array();

		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => http_build_query($_POST)
			)
		);

		$context  = stream_context_create($opts);
		echo "<url: $url>";
		echo file_get_contents($url, false, $context);
	}
}