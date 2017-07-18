<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="robots" content="noindex"/>
      <title>Registration Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
      <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" id="main-css"/>
      <link href="css/style.css" rel="stylesheet" id="main-css"/>
      <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>  
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   </head>
   <body ng-app="postReg" ng-controller="PostController as postCtrl">
      <div class="container" style="margin-top: 100px;">
         <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
           <!-- <div class="row">
               <img src="images/logo.jpg" class="imglogo"/>
            </div>-->
            <div class="panel panel-default" >
               <div class="panel-heading">
                  <div class="panel-title text-center">Registration Form</div>
               </div>
               <div class="panel-body" >
                  <form name="reg" ng-submit="postCtrl.postForm()" class="form-horizontal" method="POST">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i>Username</span>
                        <input type="text" id="inputUsername" class="form-control" required autofocus ng-model="postCtrl.inputData.username"/>
                     </div>
					 
					 
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i>Password</span>
                        <input type="password" id="inputPassword" class="form-control" required ng-model="postCtrl.inputData.password"/>
                     </div>
                  
                     <div class="form-group">
                        <div class="col-sm-12 controls">
                           <button type="submit" class="btn btn-primary pull-right" ng-disabled="reg.$invalid">
                           <i class="glyphicon glyphicon-log-in"></i> Register</button>
						    <a href="index.php"><button type="button"  class="btn btn-warning btn-sm" >Cancel</button></a>
                         
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
     
	 <script type="text/javascript">
	 
	 angular.module('postReg', [])
    .controller('PostController', ['$scope', '$http', function($scope, $http) {        
            this.postForm = function() {
                var encodedString = 'username=' +
                    encodeURIComponent(this.inputData.username) +
                    '&password=' +
                    encodeURIComponent(this.inputData.password);
 
                $http({
                    method: 'POST',
                    url: 'regauth.php',
                    data: encodedString,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                
                .success(function(data) {
					
					if ( data.trim() == '1') {
						  
                            window.location.href = 'index.php';
                        } else {
                            window.location.href = 'register.php';
                        }
                })            
            }
    }]);
	
	
	
	 </script>
   </body>
</html>