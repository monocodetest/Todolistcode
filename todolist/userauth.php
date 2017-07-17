<?php 
//include database connection file
require_once 'includefiles/config.php';
$sql = "SELECT * FROM users WHERE `UserName`='".$_POST['username']."' && PassWord='".md5($_POST['password']) ."'";
	$row1=mysql_query($sql);
	$body=mysql_fetch_array($row1);
	$uid=$body['User_Id'];
	$row=mysql_num_rows($row1);
	

$n=count($row);
if ($n > 0)
{    
    echo 'correct '.$uid;
	
} else{ 
    echo 'wrong ';
}
 
?>