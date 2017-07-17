<?php 

session_start();
require_once 'includefiles/config.php';
require_once 'includefiles/functions.php';
$getuserid=$_GET['id'];
$sql1= mysql_query("select * from users where User_Id='$getuserid'");
$num1=mysql_fetch_array($sql1);
$uId=$num1['User_Id'];
$username=$num1['UserName'];
$_SESSION['UserName']=$username;
if(isset($_SESSION['UserName']) & !empty($_SESSION['UserName']))
{
	$_SESSION['UserName'];
}
else
{
	
	echo '<script>window.location = "index.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Task List</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-toggle.css" rel="stylesheet">
    
</head>

<body>
<div class="top_nav">
<div class="nav_menu">
  <nav class="" role="navigation">
	<h3 class="tilele">WhishList Panel</h3>

	<ul class="nav navbar-nav navbar-right">
	  <li class="">
		<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		  <img src="images/img.jpg" alt=""><?php echo $_SESSION['UserName']; ?>
		  <span class=" fa fa-angle-down"></span>
		</a>
		<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
		 
		  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
		  </li>
		</ul>
	  </li>
	</ul>
  </nav>
</div>

</div>
<div class="content-tt">
  	<div class="main-tab">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
				<a href="#All-Task" aria-controls="All-Task" role="tab" data-toggle="tab">My To-Do List</a></li>
				<li role="presentation" class="active">
				<a type="button" href="#" class="blue-text" data-toggle="modal" data-target="#addnewtask">+ Add New Task </a>
				</li>
			</ul>

	<!-- Tab panes -->
	<div class="tab-content">
				
	<!-- --------------------ALL TASK LIST--------------------- -->	
	<div role="tabpanel" class="tab-pane active" id="profile">
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="All-Tasklist">
				<div class="custom-table-width">
					<div class="table-responsive">
						<form action="javascript:void(0);" id="tasklist" name="tasklist">
							<table class="table table-bordered" >
								<thead class="color-bg"> 
									<tr> 
										<th>Tasks Code#  </th>
										<th>Task Name#  </th>
										<th>Note#</th>
										<th>Status#</th>
										<th>Action#</th>
										
									</tr>
								</thead>
							<?php
							$ssql= mysql_query("select * from tasklist where UserId='$uId'");
							$num=mysql_num_rows($ssql);
							if($num>0)
							{
							while($row = mysql_fetch_array($ssql))
							{
							?>
								<tbody> 
									<tr> 
										<td><?php echo $row['TaskCode'] ?> </td>
										<td><?php echo $row['TaskName'] ?> </td>
										<td><?php echo $row['TaskNote'] ?> </td>
										<td>
											<div class="checkbox">
											<label>
												<input   type="checkbox" <?php if($row['Status']=='1'){echo "checked";} ?> data-id="<?php echo $row['id']; ?>"  onclick="update_status('<?php echo $row['id']; ?>','<?php echo $row['Status']; ?>');">
											</label>
											</div> 
										</td>
										<td>
										<?php if($row['Status']=='1')
										{
										echo "Done /";
										?>
											<a type="button" class="blue-text"  data-toggle="modal" href="javascript:void(0);"  id="getdeletetask"  onclick="deletetask(this.id,<?php echo $sid=$row['id']; ?>);"><i class="fa fa-pencil"></i>Delete </a> 
										
										<?php										} 
										else
										{	?> 
											<a class="blue-text" data-target="#myModa6" data-toggle="modal" href="javascript:void(0);" id="gettask" onclick="edittask(this.id,<?php echo $sid=$row['id']; ?>);">
											<i class="fa fa-pencil"></i> Edit /</a>
											<a type="button" class="blue-text"  data-toggle="modal" href="javascript:void(0);"  id="getdeletetask"  onclick="deletetask(this.id,<?php echo $sid=$row['id']; ?>);"><i class="fa fa-pencil"></i>Delete </a> 
										
										<?php 
										}
										?>		  
										</td>
										
									</tr>
									
								</tbody>
							<?php 
							}
							}
							?>

							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!---------------Ends ---------------------->
	</div>

	</div>
  </div>
  <footer class="main-footer">
	<p>&copy; 2017 Mono Solutions All rights reserved</p>
  </footer>


<!-- ---------------------Add Detail Modal ----------------------------------- -->

<div class="modal fade" id="addnewtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Task Details</h4>
			</div>
			<div class="modal-body">
				<form id="add-form" action="uploadimage_ajax.php" method="post">
					<input type="hidden" class="with-border" name="userid" id="userId" value="<?php echo $uId;?>">
					<div class="form-lable">
						<label>Task Name *</label>
						<input type="text" class="with-border" name="taskName" id="taskName">
						<div class="error-span"><span id="error_taskName"></span></div>
					</div>
					<div class="form-lable">
						<label>Detail *</label>
						<textarea class="with-border" name="taskDetail" id="taskDetail" placeholder="Description"></textarea>
						<div class="error-span"><span id="error_taskDetail"></span></div>
					</div>
					<div class="form-lable">
						<input type="submit" id="add-stylist" class="btn btn-primery text-uppercase"  value="Create" ></button>
					</div>
				</form>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- ---------------------Add Details End----------------------------------- -->
<!-- ---------------------Edit Detail Modal ----------------------------------- -->
<div class="modal fade" id="myModa6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="javascript:void(0);" id="edit-form" name="edit-form" method="POST">
					<input type="hidden" name="tId" id="tId">
					<div class="form-lable">
						<label>Task Code</label>
						<input type="text" class="with-border" name="tCode" id="tCode" readonly="">
					</div>
					<div class="form-lable">
						<label>Taskname</label>
						<input type="text" class="with-border" name="tName" id="tName" readonly="">
					</div>
					<div class="form-lable">
						<label>Detail</label>
						<textarea class="with-border" name="tDetail" id="tDetail" readonly=""></textarea>
						<div class="error-span"><span id="error_tDetail"></span></div>
					</div>
					<div class="form-lable">
						<label>Add Comment *</label>
						<input type="text" class="with-border" name="tNote" id="tNote">
						<div class="error-span"><span id="error_tNote"></span></div>
					</div>
					
					<div class="form-lable">
						<input type="submit" id="edit" class="btn btn-primery text-uppercase"  value="Edit" ></button>
					</div>
				</form>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<!-- ---------------------Edit Details End----------------------------------- -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	
	<script src="js/ajax.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	
	<script src="js/bootstrap-toggle.js"></script>
	
<!-- Style For Error Message -->
<style>
	.error-span {
    color: #ff0000;
    font-weight: bold;
}


</style>


</body>

</html>


<script type="text/javascript">
//--------------Create New Task-----------
$(document).ready(function (e) 
{
    $("#add-form").on('submit',(function(e)
	{
		//------------Validation-------------
		var taskName = $('#taskName').val(); 
		if(taskName == '')
		{
			$('#error_taskName').html("Please Enter TaskName");
			$( "#error_taskName" ).focus();
			return false;
		}
		else
		{
			$('#error_taskName').html("");
		}
		var taskDetail = $('#taskDetail').val();
		if(taskDetail == '')
		{
			$('#error_taskDetail').html("Please Enter Description");
			$( "#error_taskDetail" ).focus();
			return false;
		}
		else
		{
			$('#error_taskDetail').html("");
		}
		//------------Validation End-------------
		e.preventDefault();
        $.ajax({
            url: "includefiles/createtask_ajax.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
           }).success(function( msg ) 
		    {
				$('.success').css("display", "");
				$(".success").fadeIn(200, "linear");
				$('.success_text').fadeIn("slow");
				$('.success_text').html(msg);
				setTimeout(function()
				{
					window.location.href = "#All-Task";
					$('#All-Task').load(document.URL +  ' #All-Task');
					$("#addnewtask").modal("hide");
					location.reload();
				},100);

			});           
    }));
});
 
//-------------Get Task Detail-------------
function edittask(id,sid) 
{
 	$.ajax({
		url: "includefiles/edittask_ajax.php",
		type: 'POST',       
		data:  "form="+id+"&sid="+sid,
		dataType:"json",
		success : function(result) 
		{ 
		 
			if(result.length != 0)
			{ 
			  $("#tId").val(result[0]);
			  $("#tCode").val(result[2]); 
			  $("#tName").val(result[3]); 
			  $("#tDetail").val(result[4]);
			  $("#tNote").val(result[5]); 
			  $("#tStatus").val(result[6]); 
			}
		}
		});
};
  	 
//---------------Edit Task----------- 
$(document).ready(function (e) 
{
    $("#edit-form").on('submit',(function(e) 
	{
		//------------Validation-------------
		var taskComment = $('#tNote').val();
		if(taskComment == '')
		{
			$('#error_tNote').html("Add Your Note");
			$( "#error_tNote" ).focus();
			return false;
		}
		else
		{
			$('#error_tNote').html("");
		}
 
	
		//------------Validation End-------------
		e.preventDefault();
        $.ajax({
            url: "includefiles/edit_ajax.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
           }).success(function( msg ) 
		   {
			  $('.success').css("display", "");
			  $(".success").fadeIn(200, "linear");
              $('.success_text').fadeIn("slow");
              $('.success_text').html(msg);
				setTimeout(function()
				{
					window.location.href = "#All-Task";
					$('#All-Task').load(document.URL +  ' #All-Task');
					$("#myModa6").modal("hide");
					location.reload();
				},100);

			});           
    }));
});
	
	
	
	
//----------------Delete Function---------------	
	
function deletetask(id,sid) 
{
 	if (confirm('Are you sure you want to delete this?')) 
	{
        $.ajax({
            url: "includefiles/delete_ajax.php",
            type: "POST",
            data:  "form="+id+"&sid="+sid,
            
           }).success(function( msg ) 
    	    {
                setTimeout(function()
				{
				window.location.href = "#All-Task";
				$('#All-Task').load(document.URL +  ' #All-Task');
				location.reload();
				},100);
			});
	};
};




function update_status(id)
{
	$.ajax({
            url: "includefiles/status_ajax.php",
            type: "POST",
            data:  "id="+id,
            
           }).success(function( msg ) 
    	    {
				setTimeout(function()
				{
				window.location.href = "#All-Task";
				$('#All-Task').load(document.URL +  ' #All-Task');
				location.reload();
				},100);
			});
	
	
}
 </script>