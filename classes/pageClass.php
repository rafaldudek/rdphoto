<?php
class page{
	private $js;
	private $css;
	private $body;
	private $title;
	
	public function __construct($css='',$js='',$title='',$body=''){
		$this->js=$js;
		$this->css=$css;
		$this->title=$title;
		$this->body=$body;
		
	}
	
	public function printPage(){
		$h='<!DOCTYPE html><html>';
		$h.='<head>';
		$h.='<meta charset="utf8">';
		$h.='<title>'.$this->title.'</title>';
		if(is_array($this->css) && count($this->css)>0){
			foreach($this->css as $css){
				$h.='<link rel="stylesheet" type="text/css" href="'.$css.'">';
			}	
		}
		$h.='</head>';
		$h.='<body>';
		$h.=$this->body;
		if(is_array($this->js) && count($this->js)>0){
			foreach($this->js as $js){
				$h.='<script type="text/javascript" src="'.$js.'"></script>';
			}	
		}
		$h.='</body>';
		$h.='</html>';
		
		return $h;	
	}
};

?>