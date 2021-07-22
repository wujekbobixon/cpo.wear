<?php
//Auto changing Base URL 
define('BASE_URL',  $_SERVER['DOCUMENT_ROOT'].'/cpo_wear/');
define('PIC_URL' , "content/items/");
function toFolderName($title) {
    $strtolower = strtolower($title);
	  $output= str_replace(' ', '_', $strtolower);	
	  return $output;
}
?>