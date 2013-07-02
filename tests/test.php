<?php
	require('testClass.php');
	
	require('../classes/pageClass.php');
	
	echo "Test";
	$test=new test();
	$test->equal(1,1);
	
	
	$page=new page();
	$test->m='Empty page print';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf8"><title></title></head><body></body></html>',$page->printPage());
	
	
	$page=new page('','','Page title','');
	$test->m='Title page print';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf8"><title>Page title</title></head><body></body></html>',$page->printPage());
	
	
	$page=new page('','','Page title','Page body');
	$test->m='Body page print';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf8"><title>Page title</title></head><body>Page body</body></html>',$page->printPage());
	
	$page=new page(array('css1.css','css2.css'),'','Page title','Page body');
	$test->m='CSS page print';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf8"><title>Page title</title><link rel="stylesheet" type="text/css" href="css1.css"><link rel="stylesheet" type="text/css" href="css2.css"></head><body>Page body</body></html>',$page->printPage());
	
	$page=new page('',array('js1.js','js2.js'),'Page title','Page body');
	$test->m='JS page print';
	$test->equal('<!DOCTYPE html><html><head><meta charset="utf8"><title>Page title</title></head><body>Page body<script type="text/javascript" src="js1.js"></script><script type="text/javascript" src="js2.js"></script></body></html>',$page->printPage());
	
	
?>