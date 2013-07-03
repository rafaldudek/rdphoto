<?php
	require('testClass.php');
	
	require('../classes/pageClass.php');
	
	echo "Test";
	$test=new test();
	$test->equal(1,1);
	
	
	$page=new page();
	$test->m='Empty page print';
	$test->equal('<!DOCTYPE html><html><head><title></title></head><body></body></html>',$page->printPage());
	
	
	$page=new page('','','Page title','');
	$test->m='Title page print';
	$test->equal('<!DOCTYPE html><html><head><title>Page title</title></head><body></body></html>',$page->printPage());
	
	
	$page=new page('','','Page title','Page body');
	$test->m='Body page print';
	$test->equal('<!DOCTYPE html><html><head><title>Page title</title></head><body>Page body</body></html>',$page->printPage());
	
	$page=new page(array('css1.css','css2.css'),'','Page title','Page body');
	$test->m='CSS page print';
	$test->equal('<!DOCTYPE html><html><head><title>Page title</title><link rel="stylesheet" type="text/css" href="css1.css"><link rel="stylesheet" type="text/css" href="css2.css"></head><body>Page body</body></html>',$page->printPage());
	
	$page=new page('',array('js1.js','js2.js'),'Page title','Page body');
	$test->m='JS page print';
	$test->equal('<!DOCTYPE html><html><head><title>Page title</title></head><body>Page body<script type="text/javascript" src="js1.js"></script><script type="text/javascript" src="js2.js"></script></body></html>',$page->printPage());
	
	$page=new page('','','Page title','');
	$page->addMeta(array('charset'=>'utf-8'));
	$test->m='Single meta data ';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf-8"><title>Page title</title></head><body></body></html>',$page->printPage());
	
	$page=new page('','','Page title','');
	$page->addMeta(array('charset'=>'utf-8'));
	$page->addMeta(array('a'=>'aa','b'=>'bb'));
	$test->m='Multiple meta data';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf-8"><meta a="aa" b="bb"><title>Page title</title></head><body></body></html>',$page->printPage());
	
	
	$page=new page();
	$page->addBody('Hello');
	$test->m='Add body function';
	$test->equal('<!DOCTYPE html><html><head><title></title></head><body>Hello</body></html>',$page->printPage());
	
	
	$page=new page();
	$arr=array();
	$arr[]=array('text'=>'Item 1','href'=>'href 1','class'=>'a');
	$arr[]=array('text'=>'Item 2','href'=>'href 2','class'=>'b');
	$test->m='Generate menu simple';
	$test->equal('<ul class="menu"><li class="a"><a href="href 1">Item 1</a></li><li class="b"><a href="href 2">Item 2</a></li></ul>',$page->generateMenu($arr,'menu'));
	
	$page=new page();
	$ch=array();
	$ch[]=array('text'=>'Item 1','href'=>'href 1','class'=>'a');
	$ch[]=array('text'=>'Item 2','href'=>'href 2','class'=>'b');
	$arr=array();
	$arr[]=array('text'=>'Item 1','href'=>'href 1','class'=>'a');
	$arr[]=array('text'=>'Item 2','children'=>$ch);
	$test->m='Generate menu multilevel';
	$test->equal('<ul class="menu"><li class="a"><a href="href 1">Item 1</a></li><li>Item 2<ul><li class="a"><a href="href 1">Item 1</a></li><li class="b"><a href="href 2">Item 2</a></li></ul></li></ul>',$page->generateMenu($arr,'menu'));
	
	
	
?>