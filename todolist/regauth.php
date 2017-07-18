<?php 
//include database connection file
require_once 'includefiles/config.php';


//------------Insert Query for New User--------------
 $sql = "INSERT into users (UserName,PassWord) Value('".$_POST['username']."','".md5($_POST['password'])."')";
	$row=mysql_query($sql);
	
	  	if($row){
			echo "1";
		}else{
			echo "0";
		}
?>