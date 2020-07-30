(function () {
	'use strict';
    var app = angular.module('application', []);
		app.directive('numbersOnly', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModelCtrl) {
            function fromUser(text) {
                if (text) {
                    var transformedInput = text.replace(/[^0-9]/g, '');

                    if (transformedInput !== text) {
                        ngModelCtrl.$setViewValue(transformedInput);
                        ngModelCtrl.$render();
                    }
                    return transformedInput;
                }
                return undefined;
            }
            ngModelCtrl.$parsers.push(fromUser);
        }
    };
});
	app.controller('UserController', function ($scope,$http){
			$http.get('/management/manageUser/GetCurrentUser').then(function(response){
					$scope.userData = response.data.datauser[0];
					console.log('userData',$scope.userData);
		});
			$http.get('/management/manageUser/GetAllUserPincode').then(function(response){
					$scope.userDataList = response.data.data;
					console.log('userDataList',$scope.userDataList);
		});
		$scope._pincode;
		$scope._newPincode;
		$scope._confirmNewPincode;
		$scope.updatePincode = function(){
			var isPass = true;
			if(	$scope.userData['pincode']!=null){
				console.log('old pincode:',$scope.userData['pincode']);
				if($scope._pincode!=$scope.userData['pincode']){
						console.log('wrong pincode:',$scope._pincode);
							$scope.notCorrect = true;
					isPass= false;
				}
			}
				if(!$scope._newPincode){
						$scope.notCorrect = true;
						isPass= false;
				}
				if(!$scope._confirmNewPincode){
						$scope.notMatch = true;
						isPass= false;
				}
				if($scope._newPincode != $scope._confirmNewPincode){
					$scope.notMatch = true;
					isPass= false;
				}else{
						$scope.notMatch = false;
				}
				//check duplicate pincode in system
				for(var i=0;i<$scope.userDataList.length;i++){
					if($scope.userDataList[i].pincode==$scope._newPincode){
						$scope.dupplicate = true;
						isPass=false;
						console.log('dupplicate pincode');
					}
				}
				if(!isPass){
					$scope._pincode="";
					$scope._newPincode ="";
					$scope._confirmNewPincode="";
					return isPass;
				}
				$scope.dupplicate = false;
				var config = {
						headers:  {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
								'Content-Type': 'application/json'
						}
				};
			 $http.post('/management/manageUser/UpdatePincode',{pincode : $scope._newPincode},config).then(function(res){
				 console.log('update pincode res is',res);
					 if(res.data.success){
						 console.log('update pincode success');
						//window.location.reload(true);
						$scope._pincode="";
						$scope._newPincode="";
						$scope._confirmNewPincode="";
						setTimeout(function () {

							alert("Change Pincode Success");
							console.log('timeout');
        		}, 1000);

					}else{
						$scope._pincode="";
						$scope._newPincode="";
						$scope._confirmNewPincode="";

					}
				}).catch(error => {
						console.log(error)
				});
		}
		$scope.onPincodeChange = function(){
			setTimeout(() => {
			console.log('pincode:',$scope._pincode);
			}, 0);
		}
		$scope.onNewPincodeChange = function(){
				setTimeout(() => {
					console.log('new pincode:',$scope._newPincode);
						$scope.hasUser = false;
						$scope.permission = false;
				}, 0);
		}
		$scope.onConfirmNewPincodeChange = function(){
				setTimeout(() => {
							console.log('_confirmNewPincode:',$scope._confirmNewPincode);
						$scope.hasPwd = false;
						$scope.permission = false;
				}, 0);
		}
	});
})();
