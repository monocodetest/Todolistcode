<?php 

// FUNCTIONS AND QUERIES


//----------Login Function---------

function login($username,$password){
	$password =	md5($password);
	$sql = "SELECT * FROM users WHERE `UserName`='$username' AND `PassWord`='$password' ";
	$row=mysql_query($sql);
	$data=mysql_fetch_array($row);
	return $data;
}


//-----------Task Functions----------

//----Add New (INSERT Query)---

function add_task($userid,$taskcode,$taskname,$taskdetail,$status,$createdOn)
{
	$sql = "INSERT INTO tasklist(UserId,TaskCode,TaskName,TaskDetail,TaskNote,Status) VALUES('".$userid."','".$taskcode."','".$taskname."','".$taskdetail."','','0')";
	$row=mysql_query($sql);
	if($row)
	{
		echo "Task Created Successfully.";
	}
	else
	{
		echo "Error";
	}
		
}

//----Get List (SELECT Query)---
function get_tasklist($sid){
        $style= mysql_query("SELECT * FROM tasklist WHERE id = '$sid'");
        $res = mysql_fetch_row($style);  
        if($res)
		{
           return json_encode($res);
        }   
    }
	
//-----Edit (UPDATE Query)------	
function edit_tasks($tid,$tasknote) 
{
    $sql="UPDATE tasklist SET TaskNote='".$tasknote."' WHERE id=".$tid;
	$update=mysql_query($sql);
	if($update)
	{
		echo "Task Update Successfully";
	}
}


//-----Edit (UPDATE Query)------	
function edit_status($tid) 
{
	 $style= mysql_query("SELECT Status FROM tasklist WHERE id = '$tid'");
        $res = mysql_fetch_array($style); 
		$status=$res['Status'];
		if($status==1)
		{
			$status1='0';
		}
		else
		{
			$status1='1';
		}
		
    $sql="UPDATE tasklist SET Status='".$status1."' WHERE id=".$tid;
	$update=mysql_query($sql);
	if($update)
	{
		echo "Task Update Successfully";
	}
}


//-----Delete (DELETE Query)------
function delete_tasks($sid)
{
	 $res= mysql_query("DELETE FROM tasklist WHERE id = '$sid'");
     if($res)
	 {
        echo "Deleted Successfully";
     }   
}


?>
