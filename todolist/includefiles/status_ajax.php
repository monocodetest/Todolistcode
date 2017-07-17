<?php
//-----Session Start-------------
session_start();

//-----Connection File--------------
require_once 'config.php';
//-----Functions File with Queries--
require_once 'functions.php';

echo $tid=$_POST['id'];;
if(is_array($_FILES)) {
			$tid=$_POST['id'];
			
            
            
            edit_status($tid); 
}
?>