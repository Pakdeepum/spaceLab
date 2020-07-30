(function () {
	'use strict';
    var app = angular.module('application', []);

	app.controller('QCinputDataViewController', function ($scope,$http){
		$http.get('/QC/Qc-allProfile').then(function(response){
            $scope.listprofile = response.data.data;
		}).catch(error => {
			console.log(error)
		});

		$("#selectProfile").change(function(){
			$scope.id = $(this).val();
			if($(this).val() != ""){
				$http.get('/QC/QCInput/listall-profile/' + $scope.id).then(function(response){
					$scope.DataProfile = response.data.data;

					var newDataProfile = [];
					var checktime = "";
					var i = 0;
					$scope.DataProfile.forEach(function(data){
						var subtime = data.qc_test_time.substring(0, 5);
						if(checktime != subtime) {
							newDataProfile.push(data);
							checktime = subtime;
							i++;
						}else {
							newDataProfile[i-1].id_qc_profile_order = newDataProfile[i-1].id_qc_profile_order +',' + data.id_qc_profile_order;
						}
					})
					//console.log(newDataProfile);
					var newDataProfile2=[];
					for (var i = (newDataProfile.length-1) ; i>=0 ; i--){
						newDataProfile2.push(newDataProfile[i])
					}
					$scope.DataProfile = newDataProfile2;
				}).catch(error => {
					console.log(error)
				});
			}else{
				setTimeout(() => {
					$scope.DataProfile = [];
					$scope.$apply();
				}, 0);
			}
		});
		$scope.AddProfile = function(){
			$("#modal-askDelete").find('h3').text("Do you want to add profile?");
			$('#modal-askDelete').modal('show');
			var id = $scope.id;
			$('#confirm').click(function(){
				$('#modal-askDelete').modal('hide');
				$http.get('/QC/QCInput/listdata-profile/'+id).then(function(response){
					$scope.DataProfile = response.data.data;
					window.location.reload();
				}).catch(error => {
					console.log(error)
				});
			});
		}
		$scope.DeleteProfile = function(id_main){
			$('#modal-askDelete').modal('show');
			var id = id_main;
			$('#confirm').click(function(){
				$http.get('/QC/QCInput/delete-profile/'+id).then(function(response){
					window.location.reload();
				}).catch(error => {
					console.log(error)
				});
			});
		}
		$scope.selectedRow = null;

		var dbug = 0;
		$scope.clickRowMain = function(id_main, index){
			id_main = id_main.toString();
			var res = id_main.split(",");
			var x = res.length;
			var i = 0;
			var save = [];
			var saveAllItemProfile = [];
			$scope.AllItemProfile = [];
			res.forEach(function(data){
				id_main = data;
				$('#btn-save').prop('disabled',false);
				$scope.selectedRow = index;
				var id_scrop = $scope.id;
				var id = id_main;
				var allidItem = [];
				dbug++;
				$http.get('/QC/QCInput/listItem-profile/'+id_scrop+'/'+id).then(function(response){
					dbug--;
					saveAllItemProfile = response.data.data;
					saveAllItemProfile.forEach(function(data){
						if(data.result != null || data.comment != null) {
							var obj = {"id_item_qc": data.id_item_qc, "result": data.result};
							save.push(obj);
						}
					})
					saveAllItemProfile.forEach(function(data){
						save.forEach(function(data2){
							if( data2.id_item_qc == data.id_item_qc) {
								data.result=data2.result;
							}
						})
					})
					i++;
					if(x == i && dbug == 0){
						$scope.AllItemProfile = saveAllItemProfile;
					}


					saveAllItemProfile.forEach(function(data){
						allidItem.push(data.id_lab_item);
					})
				}).catch(error => {
					console.log(error)
				});
				var rejectItem =[];
				$scope.RejectData = function(id){
					for(var i = 0; i<$scope.AllItemProfile.length; i++){
						if($scope.AllItemProfile[i].id_lab_item == id){
							$scope.AllItemProfile.splice(i, 1);
							allidItem.splice(i, 1);
							rejectItem.push(id);
							console.log('all data',allidItem, $scope.AllItemProfile);
						}
					}
				}
				$scope.AddAllResult = function(){
					var allResult = [];
					var textComment = [];
					var url = '/QC/QCInput/AddItemList'
					$('input[name="result[]"]').each(function(key,item){
						allResult.push($(item).val());
					});
					$('input[name="textComment[]"]').each(function(key,item){
						textComment.push($(item).val());
					});
					$.ajax({
						type: "POST",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: url,
						cache: false,
						data: {idprofile:id,iditem:allidItem,idRejectItem:rejectItem,allResult:allResult,textComment:textComment, idProfile: id_scrop},
						success:function(msg){
							window.location.reload();
							// console.log('success data:',id,allidItem,allResult,textComment);
						},
						error : function(error){
							console.log(error)
						}
					});
				}
			})
		}
		$scope.PDFLabQC = function(id){
			$scope.url = '/QC/QCInput/printQCpdf/'+id;
			if($scope.AllItemProfile==null){

				$http.get('/QC/QCInput/listItem-profile/'+$scope.id+'/'+id).then(function(response){
					$scope.AllItemProfile = response.data.data;
					console.log("Printnull $scope.id:",$scope.id,$scope.AllItemProfile);
				});
		}else{
			 console.log("Print PDF QC id:",id,"item list:",$scope.AllItemProfile);
		}

		}
    });
})();
