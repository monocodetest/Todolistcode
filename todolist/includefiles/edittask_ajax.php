<?php 
//-----Session Start-------------
session_start();

//-----Connection File--------------
require_once 'config.php';
//-----Functions File with Queries--
require_once 'functions.php';

if(isset($_POST['form'])) 
{
    $form = strip_tags($_POST['form']);
    switch($form) 
    {
      	
		case 'gettask':    
             $sid = $_POST['sid'];
             echo get_tasklist($sid);
        break;

        
        case 'getdeletetask':    
             $sid = $_POST['sid'];
            echo get_tasklist($sid);
        break;

	default:
    break;
	}
    	
}
?>
