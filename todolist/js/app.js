angular.module('postLogin', [])
    .controller('PostController', ['$scope', '$http', function($scope, $http) {        
            this.postForm = function() {
                var encodedString = 'username=' +
                    encodeURIComponent(this.inputData.username) +
                    '&password=' +
                    encodeURIComponent(this.inputData.password);
 
                $http({
                    method: 'POST',
                    url: 'userauth.php',
                    data: encodedString,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                
                .success(function(data) {
					var data1=data;
					var ret = data1.split(" ");
					var str1 = ret[0];
					var str2 = ret[1];
					if ( str1.trim() == 'correct') {
						  
                            window.location.href = 'whislistdashboard.php?id='+str2;
                        } else {
                            $scope.errorMsg = "Username and password do not match.";
                        }
                })            
            }
    }]);
	
	
