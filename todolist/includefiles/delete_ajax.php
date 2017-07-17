<?php
//-----Session Start-------------
session_start();

//-----Connection File--------------
require_once 'config.php';
//-----Functions File with Queries--
require_once 'functions.php';


if(is_array($_FILES)) {
 	$sid =$_POST['sid'];
    delete_tasks($sid); 
}

?>