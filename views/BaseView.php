<?php
namespace thuctap\views;

class BaseView{
	private $layout;
	private $params;
	private $contentType;

	function __construct($layout){
		$this->layout = $layout;
		$this->contentType = 'text/html';
	}

	public function setContentType($type){
		$this->contentType = $type;	
	}

	public function setLayout($l){
		$this->layout = $l;
	}	

	public function setPramaters($p){
		$this->params = $p;
	}
	public function render(){
		header('Content-Type: '.$this->contentType);
		$params = $this->params;
		include_once LAYOUTS_PATH.$this->layout;
	}
}
?>