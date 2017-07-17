<?php
//-----Session Start-------------
session_start();

//-----Connection File--------------
require_once 'config.php';
//-----Functions File with Queries--
require_once 'functions.php';


if(is_array($_FILES)) {
			$tid=$_POST['tId'];
			$tasknote      = htmlspecialchars($_POST['tNote']);
			
            edit_tasks($tid,$tasknote); 
}
?>