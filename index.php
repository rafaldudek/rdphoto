<?php
require_once('classes/pageClass.php');
$page=new page(array('css1.css','css2.css'),array('js1.js','js2.js'),'Page title','Page body');
echo $page->printPage();
?>