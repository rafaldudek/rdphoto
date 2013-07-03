<?php
class page{
	private $js;
	private $css;
	private $body;
	private $title;
	private $meta;
	
	public function __construct($css='',$js='',$title='',$body=''){
		$this->js=$js;
		$this->css=$css;
		$this->title=$title;
		$this->body=$body;
		$this->meta=array();
		
	}
	
	//Adds meta tags to the page
	//arr - array for metadata e.g.('charset'=>'utf-8')
	public function addMeta($arr){
		$this->meta[]=$arr;
	}
	
	//Ads html code to page body element
	public function addBody($html){
		$this->body.=$html;
		return $this->body;
	}
	
	//Generates and returns menu code based on array
	public function generateMenu($array,$class=''){
		$h='<ul';
		if($class!=''){
			$h.=' class="'.$class.'"';
		}
		$h.='>';
		foreach($array as $tmp){
			$h.='<li';
			if(isset($tmp['class']) && $tmp['class']!=''){
				$h.=' class="'.$tmp['class'].'"';
			}
			$h.='>';
			if(isset($tmp['href']) && $tmp['href']!=''){
				$h.='<a href="'.$tmp['href'].'">'.$tmp['text'].'</a>';
			}else{
				$h.=$tmp['text'];	
				if(isset($tmp['children']) && is_array($tmp['children'])){
					$h.=$this->generateMenu($tmp['children']);
				}
			}
			$h.='</li>';
		}
		$h.='</ul>';
		return $h;
	}
	
	//Prints page
	public function printPage(){
		$h='<!DOCTYPE html><html>';
		$h.='<head>';
		if(count($this->meta)>0){
			foreach($this->meta as $tmp){
				$h.='<meta';	
				foreach($tmp as $key=>$value){
					$h.=' '.$key.'="'.$value.'"';
				}
				$h.='>';
			}
		}
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