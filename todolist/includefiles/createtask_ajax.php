<?php
//-----Session Start-------------
session_start();

//-----Connection File--------------
require_once 'config.php';
//-----Functions File with Queries--
require_once 'functions.php';
if(is_array($_FILES)) {
 			$sql = mysql_query("select MAX(id) as id  from tasklist");
            $row = mysql_fetch_array($sql);
            $i = $row['id'];
            $code = "S00".($i+1);
            $taskcode   = $code;
			$userid  = $_POST['userid'];
            $taskname      = htmlspecialchars($_POST['taskName']);
            $taskdetail      = htmlspecialchars($_POST['taskDetail']);
            $status     = '';
            $createdOn = '';
           
            add_task($userid,$taskcode,$taskname,$taskdetail,$status,$createdOn); 
}
?>