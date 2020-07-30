(function () {
	'use strict';
    var app = angular.module('application', []);

    app.directive("modalLabResult", function () {
        return {
            restrict: "A",
            link: function (scope, element, attrs) {
                $(element).bind("hide.bs.modal", function () {
                    $('input[name="recevied"]').val("");
                    $('input[name="reporter"]').val("");
                    $('input[name="department"]').val("");
                    $('textarea[name="cause"]').val("");

                    setTimeout(() => {
                        scope.$apply(function () {
                            scope.recevied = false;
                            scope.reporter = false;
                            scope.department = false;
                            scope.cause = false;
                        });
                    },0);
                });
              }
          };
      });
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
      app.controller('authenticationController', function($scope,$http,$rootScope){
        /**edit lab result modal */
        $scope.authen = function(){
            if(!$scope._user){
                $scope.hasUser = true;
                return false;
            }
            if(!$scope._pwd){
                $scope.hasPwd = true;
                return false;
            }
            var authen = {
                "user" : $scope._user,
                "pwd" : $scope._pwd,
            }
            var config = {
                headers:  {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                }
            };
           $http.post('/main/recordedResults/authorized',{data : authen},config).then(function(res){
               if(res.data.success){
                setTimeout(() => {
                    $("#modal-editLabResult").modal('hide');
                    $('input:disabled').removeAttr('disabled').removeClass('disabled-text');
										$('.result_repeat_input').attr('disabled',true).addClass('disabled-text');

                        $scope.$apply(function() {
                        $rootScope.editResult = res.data.data;//if authen success disable input text box ผู้บันทึก และผู้ตรวจสอบ
                            $('#nameEditResult').attr('disabled',true);
                            $('#nameEditApproveResult').attr('disabled',true);
                            $rootScope.fullname = $rootScope.editResult.fname+" "+$rootScope.editResult.lastname;
                        });
												$scope._pwd="";
                }, 0);
               }else{
                   if(res.data.type == "username"){
                        $scope.hasUser = true;
                   }
                   if(res.data.type == "password"){
                        $scope.hasPwd = true;
                   }
                   if(res.data.type == "permission"){
                        $scope.permission = true;
                   }
               }
            }).catch(error => {
                console.log(error)
            });
        }

        $scope.onUsernameChange = function(){
            setTimeout(() => {
                $scope.hasUser = false;
                $scope.permission = false;
            }, 0);
        }
        $scope.onPasswordChange = function(){
            setTimeout(() => {
                $scope.hasPwd = false;
                $scope.permission = false;
            }, 0);
        }
    });

    app.controller('criticalController', function($scope,$http,$rootScope){
        $scope.receiveChange = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.recevied = false;
                });
            },0);
        }
        $scope.reporterChange = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.reporter = false;
                });
            },0);
        }
        $scope.departmentChange = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.department = false;
                });
            },0);
        }
        $scope.causeChange = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.cause = false;
                });
            },0);
        }
        $scope.cancelButton = function(){
            // $scope.RedRecord();
        }
        $scope.saveCri = function(){
            if($('input[name="recevied"]').val() == ""){
                $scope.recevied = true;
                $scope.invalid_receives = "Please specify a Critical Recipient.";
                return false;
            }
            if($('input[name="reporter"]').val() == ""){
                $scope.reporter = true;
                $scope.invalid_reporter = "Please specify a Critical Reporter.";
                return false;
            }
            if($('input[name="department"]').val() == ""){
                $scope.department = true;
                $scope.invalid_department = "Please specify a Notified Department.";
                return false;
            }
            if($('textarea[name="cause"]').val() == ""){
                $scope.cause = true;
                $scope.invalid_cause = "Please specify a Cause";
                return false;
            }

            var critical = {
                "recevied" : $('input[name="recevied"]').val(),
                "reporter" : $('input[name="reporter"]').val(),
                "department" : $('input[name="department"]').val(),
                "cause" : $('textarea[name="cause"]').val(),
                "patient" : $rootScope.patientID,
                "orderID" : $rootScope.orderMainID,
                "idLabItem": $rootScope.idLabItem,
            }
            console.log('critical',critical);
            var config = {
                headers:  {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                }
            };
            console.log('old', $scope.redRecordResult);
           $http.post('/main/recordedResults/critical',{data : critical},config).then(function(res){
                $("#modal-ResultReport").modal('hide');
                window.alert('Reported successfully');
                $("#modal-Success").modal('show');
                for(var i=0; i<$scope.redRecordResult.length; i++){
                    if($scope.redRecordResult[i].id_lab_item == $rootScope.idLabItem){
                        $scope.redRecordResult.splice(i, 1); 
                    }
                }
                
                if($scope.redRecordResult.length>0){
                    $scope.RedRecord();
                }
               console.log('new', $scope.redRecordResult);
            }).catch(error => {
                console.log(error)
            });
        }

        $scope.SaveReason = function(){
            if($('input[name="reason"]').val() == ""){
                $scope.recevied = true;
                $scope.invalid_receives = "Please specify a reason of canceling.";
                return false;
            }

            var reason = {
                "reason" : document.getElementById("reason").value,
                "orderID" : $rootScope.orderMainID,
                "idLabItem": $rootScope.idLabItem,
            }
            console.log('Cancel ', reason);
            var config = {
                headers:  {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                }
            };
            console.log('old', $scope.redRecordResult);
           $http.post('/main/recordedResults/cancel',{data : reason},config).then(function(res){
                $("#modal-Cancel").modal('hide');
                window.alert('Canceled successfully');
                for(var i=0; i<$scope.redRecordResult.length; i++){
                    if($scope.redRecordResult[i].id_lab_item == $rootScope.idLabItem){
                        $scope.redRecordResult.splice(i, 1); 
                    }
                }
                // $("#modal-Success").modal('show');
                if($scope.redRecordResult.length > 0){
                    $scope.RedRecord();
                }
                console.log('new', $scope.redRecordResult);
            }).catch(error => {
                console.log(error)
            });
        }
    });
    app.controller('RecordedResultsDataviewController', function ($scope,$http,$timeout, $interval ,$window, $rootScope){
        $scope.disableButton = true;
		$scope.eGFRIsClick = false;

        /*$scope.callAtInterval = function() {
            if($scope.AllDataLabDetail){
                $timeout(function() {
                    angular.element('tr#'+$scope.AllDataLabDetail[0]['id_lab_order_main']+'_lab').trigger('click');
                }, 0);
            }
        }
        $interval( function(){ $scope.callAtInterval(); }, 5000);*/
		$http.get('/management/manageUser/GetCurrentUser').then(function(response){
						$scope.userData = response.data.datauser[0];
						//console.log('userData',$scope.userData);
			});
        $scope.PDFLab = function(id){
           $scope.url = '/main/RecordedResults/printpdf/'+id;
        }

        var labItem = [];
				var labCheckedId =  [];
				$scope.checkAll = function(event){

					if(event.target.checked){
						angular.forEach($scope.recordResult, function (item,index) {
							item.isChecked = true;
							labItem.push({
									id : item.id_lab_order_main
							});
								labCheckedId.push(item.id_lab_order_main);
						});
						console.log('checked event:',labItem);
						console.log('checked labCheckedId:',labCheckedId);

					}else{
						angular.forEach($scope.recordResult, function (item) {
								item.isChecked = false;
						});
						setTimeout(() => {
								$scope.$apply();
						}, 0);
						labCheckedId.length =0;
						labItem.length = 0;
						console.log('unchecked event:',labItem);
						console.log('unchecked labCheckedId:',labCheckedId);
					}
					$scope.labChecked = labItem;
					document.getElementById('labCheckedId').value="";
					labCheckedId.forEach(function(item){
						document.getElementById('labCheckedId').value +=","+item;
					});
				}
        $scope.togglePrint = function(id, event){
            if(event.target.checked){
                labItem.push({
                    id : id
                });
								labCheckedId.push(id);
								//document.getElementById('labCheckedId').value +=","+id;
            }else{
                labItem = labItem.filter(function(arr){
                    return arr.id != id;
                });
						    var index = labCheckedId.indexOf(id);
						    if (index > -1) {
						       labCheckedId.splice(index, 1);
						    }
            }
            $scope.labChecked = labItem;
						document.getElementById('labCheckedId').value="";
						labCheckedId.forEach(function(item){
						  document.getElementById('labCheckedId').value +=","+item;
						});
        }
        $scope.PrintAll = function(){
            var print =  $("#formPrintData");
            print.empty();
            $scope.labChecked.forEach(element => {
                print.append("<input type='hidden' name='p-"+element.id+"' value='"+element.id+"'/>");
            });
            $("#printform").submit();
						$scope.isCheckAll = false;
            setTimeout(() => {
				$scope.labChecked.length = 0;//clear data in labChecked array
                angular.element('tr#'+$scope.saveMain+'_lab').trigger('click');
                statusP();
                //recordResult();
				$scope.$apply();
            }, 0);
        }
				$scope.ExportResultSelect = function(){
						$scope.isCheckAll = false;
					setTimeout(() => {
						angular.element('tr#'+$scope.dataDetail[0]['id_lab_order_main']+'_lab').trigger('click');
				 						// //recordResult();
				 						// statusP();
				 						// $scope.$apply();
						$scope.labChecked.length=0;
						statusP();
						$scope.$apply();
						}, 0);

					// var labIdList =[];
					// labIdList.length=0;
					//   $scope.labChecked.forEach(element => {
					// 		labIdList.push(element.id);
					// 		  });
					// var config = {
			 		// 		headers:  {
			 		// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			 		// 				'Content-Type': 'application/json'
			 		// 		}
			 		// };
			 		// $http.post('/main/RecordedResults/exportWithSelectLab',{labchecked : labIdList },config).then(function(res){
			 		// 		setTimeout(() => {
			 		// 				// angular.element('tr#'+$scope.dataDetail[0]['id_lab_order_main']+'_lab').trigger('click');
			 		// 				// //recordResult();
			 		// 				// statusP();
			 		// 				// $scope.$apply();
					// 				$scope.labChecked.length = 0;
					// 					labIdList.length=0;
			 		// 		}, 0);
					//
			 		// }).catch(error => {
			 		// 		console.log(error)
			 		// });
                }
                


        $scope.detailLabitem = function(id, patient,labResult,labitemName,idLabItemDetail,checkStatus){
			// console.log('lab iitem detail id',idLabItemDetail);
            // console.log('detailLabitem click ', id, patient);
            $rootScope.patientID = patient;
            // $rootScope.orderMainID = idLabItemDetail;
            $rootScope.idLabItem = id;
			$scope.idLabItemDetailForGFR = idLabItemDetail;
			$scope.currentSelectLabNameForGFR=labitemName;
            $scope.labValForeGFR  = labResult;
            $scope.checkStatus = checkStatus;
            if($scope.checkStatus == 'PH' || $scope.checkStatus == 'PL'){
                $scope.RedRecord();
            }
            var labId = id;
            console.log('id', labId);
            
            
            $http.get('/main/RecordedResults/History/'+id+"/"+patient).then(function(response){
                console.log('/main/RecordedResults/History/'+id+"/"+patient);
                console.log($scope.dataDetail);
                var RowItemSelect2 = [];
                $scope.historyRecorded = response.data;
                // console.log('$scope.historyRecorded',$scope.historyRecorded);
                angular.forEach($scope.historyRecorded, function(item){
                     if(item['lab_approve']){
                        var lab_result = parseFloat(item['lab_approve']);
                        var decimal = parseFloat(item['decimal']['_decimal'])
                        item['lab_approve'] = lab_result.toFixed(decimal);

                        var lab_result = parseFloat(item['lab_result_repeat']);
                        item['lab_result_repeat'] = lab_result.toFixed(decimal);

                        if(angular.isNumber(+item['lab_approve'])) {
                            RowItemSelect2.push(+item['lab_approve']);
                        } else {
                            RowItemSelect2.push(0);
                        }

                    }
                 });
                if(RowItemSelect2[RowItemSelect2.length-1] > RowItemSelect2[RowItemSelect2.length-2]){
                    for(var i=0; i < $scope.dataDetail.length; i++){
                        if($scope.dataDetail[i].id_lab_item == id)
                        $scope.dataDetail[i]["flag_compare"] = "↑";
                    }
                } else if(RowItemSelect2[RowItemSelect2.length-1] < RowItemSelect2[RowItemSelect2.length-2]){
                    for(var i=0; i < $scope.dataDetail.length; i++){
                        if($scope.dataDetail[i].id_lab_item == id)
                        $scope.dataDetail[i]["flag_compare"] = "↓";
                    }
                } else {
                    for(var i=0; i < $scope.dataDetail.length; i++){
                        if($scope.dataDetail[i].id_lab_item == id)
                        $scope.dataDetail[i]["flag_compare"] = "-";
                    }
                }
                 console.log('Eoww',RowItemSelect2, RowItemSelect2[RowItemSelect2.length-1], RowItemSelect2[RowItemSelect2.length-2]);
                 chart(RowItemSelect2);
            }).catch(error => {
                console.log(error)
            });
        }

        function chart(RowItemSelect2){
            if(RowItemSelect2.length == 0){
                document.getElementById("curve_chart").style.display = "none";
                document.getElementById("curve").style.display = "block";
                document.getElementById("curve").style.background = "red";
                document.getElementById("curve").style.textAlign = "center";
                document.getElementById("curve").style.color = "white";
                document.getElementById("curve").innerHTML = "No Data Found!"
                
            }else{
            document.getElementById("curve_chart").style.display = "block";
            document.getElementById("curve").style.display = "none";
            google.charts.load('current', {
                'packages': ['corechart']
            });
                 google.charts.setOnLoadCallback(drawChart);

                 function drawChart() {
                 var data_temp = [['No','Result']];
                 RowItemSelect2.forEach(function(val,i){
                     data_temp.push([i+1,val]);
                 });
                     var data = google.visualization.arrayToDataTable(data_temp);

                     var options = {
                        title: 'Result History',
                        curveType: 'function',
                        legend: { position: 'bottom' },
                        hAxis: {format: '0'}
                        };
                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    chart.draw(data, options);
                 }
            }
        }
            

    	$http.get('/main/DataRecordedResults').then(function(response){
            $scope.redRecordList = [];
            $scope.redRecordListDetail = [];
            $timeout(function() {
            $scope.recordResult = response.data.data;
            console.log("--response", response)
            $http.get('/main/Test').then(function(response){});
			$scope.eGFRIsClick=false;
            for(var i=0; i <  $scope.recordResult.length; i++) {
                if($scope.recordResult[i].status == 0){
                    $scope.recordResult[i].icon_status = "dotStanby";
                }
                else if($scope.recordResult[i].status == 1){
                    $scope.recordResult[i].icon_status = "dotPending";
                }
                else if($scope.recordResult[i].status == 2){
                    $scope.recordResult[i].icon_status = "dotProcess";
                }
                else if($scope.recordResult[i].status == 3){
                    $scope.recordResult[i].icon_status = "dotReported";
										$rootScope.disabled = false;
                }
                else if($scope.recordResult[i].status == 4){
                    $scope.recordResult[i].icon_status = "dotApproved";
                    $rootScope.disabled = false;
                }
                else{
                    $scope.recordResult[i].icon_status = "dotAll";
                }
								if($scope.recordResult[i].detail !=null){
									for(var j=0;j<$scope.recordResult[i].detail.length;j++){
										var resultFlag = $scope.recordResult[i].detail[j].result_flag;
										if(resultFlag==4||resultFlag==5){//is Critcal value
											$scope.recordResult[i].isCriticalVal = true;
											console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
										}
									}
								}
            }
            console.log("recordResult:",$scope.recordResult);
            // var testttt = [];
            // $scope.recordResult.forEach(function(data){
            //     if (data.status == 4){
            //         console.log(data.status);
            //         testttt.push(data);
            //     }
            // })
            // console.log("testttt" , testttt);
            // $scope.recordResult = testttt;
            // for(var i=0; i <  $scope.recordResult.length; i++) {
            //     for(var j=0; j <  $scope.recordResult[i].detail.length ; j++) {
            //         if($scope.recordResult[i].detail[j]['result_flag']==4 || $scope.recordResult[i].detail[j]['result_flag']==5){
            //             $scope.recordResult[i].detail[j]['hn'] = $scope.recordResult[i].patient['hn'];
            //             $scope.recordResult[i].detail[j]['firstname'] = $scope.recordResult[i].patient['patient_firstname'];
            //             $scope.recordResult[i].detail[j]['lastname'] = $scope.recordResult[i].patient['patient_lastname'];
            //             $scope.recordResult[i].detail[j]['id_patient'] = $scope.recordResult[i].id_patient;
            //             $scope.recordResult[i].detail[j]['id_lab_order_main'] = $scope.recordResult[i].id_lab_order_main;
            //             if($scope.recordResult[i].detail[j].reported == 1){
            //                 $scope.redRecordList.push($scope.recordResult[i]);
            //                 $scope.redRecordListDetail.push($scope.recordResult[i].detail[j]);
            //             }
            //             if ($scope.recordResult[i].detail[j]['result_flag']==4){
            //                 $scope.recordResult[i].detail[j]['critical'] = 'PL';
            //             } else if($scope.recordResult[i].detail[j]['result_flag']==5){
            //                 $scope.recordResult[i].detail[j]['critical'] = 'PH';
            //             }
            //         }
            //     }
            // }

            // console.log('red records', $scope.redRecordListDetail)
            
        });
        }).catch(error => {
            console.log(error)
        });
        $http.get('/main/DataRedRecordedResults').then(function(response){
            $scope.redRecordResult = response.data.data;
            console.log('redddddd', $scope.redRecordResult);
            for(var i=0; i <  $scope.redRecordResult.length; i++) {
                if ($scope.redRecordResult[i]['result_flag']==4){
                    $scope.redRecordResult[i]['critical'] = 'PL';
                } else if($scope.redRecordResult[i]['result_flag']==5){
                    $scope.redRecordResult[i]['critical'] = 'PH';
                }
            }
            if($scope.redRecordResult.length>0){
                $scope.RedRecord();
            }
        });

            $scope.isFiltered = false;
            $scope.ShowAll = function(){
                $scope.isFiltered = false;
            }
            var iditem=[];
            $scope.labSubGroupItems=[];
            $scope.labSubId=0;
            $scope.tempLabSubGroupId=0;
            $scope.SelectLabSubGroupItem = function(id){
                $scope.isFiltered = true;
                console.log('SelectLabSubGroupItem:',id);
                $scope.labSubId = id;
                $scope.newPosts = [];
                $scope.tempLabSubGroupId = id;
                $http.get('/main/SelectLabSubGroupItemById/'+id).then(function(response){
                    $scope.labSubGroupItems = response.data.data;
                    statusP();
                    console.log('sub group items data',$scope.labSubGroupItems);
                    for(var i=0; i<$scope.recordResult.length; i++){
                        for(var j=0; j<$scope.recordResult[i].detail.length; j++){
                            for(var k=0; k<$scope.labSubGroupItems.length; k++){
                            // console.log($scope.recordResult[i].detail[j])
                            if($scope.recordResult[i].detail[j].id_lab_item == $scope.labSubGroupItems[k].id_lab_item){
                                if(!$scope.newPosts.includes($scope.recordResult[i])){
                                    $scope.newPosts.push($scope.recordResult[i]);
                                }
                                // console.log('true');
                                // console.log($scope.newPosts)
                            } else {

                            }
                            
                        }
                        }
                        
                    }
                    console.log('newposts length', $scope.newPosts)
                });
            }
            $http.get('/main/LabSubGroupItem').then(function(response){
                $scope.LabSubGroup = response.data.data;
                console.log('$scope.labSubgroup',$scope.LabSubGroup);
                // $rootScope.LabSubGroupEdit = response.data.data;
                console.log('$scope.labSubId',$scope.labSubId);
                $("#labgroupitem").click(function(){
                    $scope.itemget = [];
                    $scope.DataLabSubGroupItem = [];
                    $scope.labItem = false;
                    iditem = [];
                    var datalab = $(this).val();
                    console.log('datalab',datalab);
                    if(datalab !== ""){
                            //$http.get('/main/SelectLabSubGroupItem/'+datalab).then(function(response){
                                $http.get('/main/SelectLabSubGroupItemById/'+$scope.labSubId).then(function(response){
                                $scope.DataLabSubGroupItem = response.data.data;

                                console.log($scope.DataLabSubGroupItem)
                                $scope.check = function(val){
                                console.log('check:',val);
                                    if(iditem.indexOf(val) == -1){
                                        iditem.push(val);
                                    }else{
                                        var index = iditem.indexOf(val);
                                        if (index !== -1) {
                                            iditem.splice(index, 1);
                                        }
                                    }
                                    $scope.itemget = iditem;
                                }
                            }).catch(error => {
                                console.log(error)
                            });
                        }else{
                            setTimeout(function () {
                                $scope.$apply(function () {
                                    $scope.DataLabSubGroupItem = [];
                                });
                            }, 0);
                            iditem = [];
                        }
                    });

                    $('#CheckBox').click(function(e){
                        if (e. target. checked) {
                            localStorage.checked = true;
                        } else {
                            localStorage.checked = false;
                        }
                    });
                });

		$scope.caleGFRInputChange = function(){
			if($scope.heightInput||$scope.patient_age){
				console.log('in heightInputChange function');
				$scope.eGFRResult = calCulateGFR($scope.labValForeGFR,$scope.heightInput,$scope.patient_age,$scope.patient_sex);
			}
		}

				var attempPincode = 0;
				var saveInput = document.getElementById("askSavePincodeInput");
				saveInput.addEventListener("keyup", function(event) {
			  // Number 13 is the "Enter" key on the keyboard
			  if (event.keyCode === 13) {
			    // Cancel the default action, if needed
			    event.preventDefault();
			    // Trigger the button element with a click
					console.log('enter save result');
			    $("#confirm-Asksave").click();
			  }
			});
        $("#confirm-Asksave").click(function(){
					$http.get('/management/manageUser/GetUserByPincode/'+$scope._pincode).then(function(response){
							$scope.userDataByPincode = response.data.data;
							console.log('userDataByPincode---',$scope.userDataByPincode);
							if($scope.userDataByPincode!=null){
								console.log('$scope._pincode-',$scope._pincode);
								$scope.permission=false;
								$scope._pincode="";
								//$scope.$apply();
							}else{
								console.log('$scope._pincode--',$scope._pincode);
								$scope.permission=true;
								attempPincode++;
								$scope._pincode="";
								//$scope.$apply();
								//$("#modal-askSave").modal('hide');
								if(attempPincode>=3){
									$scope.pinError ="System will automatic logout because wrong pincode morethan "+attempPincode+" times";
									$http.get('/login/logout').then(function(response){
										console.log('force logout because wrong pincode more than 3 times');
										attempPincode =0;
										window.location.reload();
									}).catch(error => {
		                  console.log('logout error',error)
		              });
								}
								return;
							}
							attempPincode=0;
		            var config = {
		                 headers:  {
		                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		                     'Content-Type': 'application/json'
		                 }
		             };
		             $http.post('/main/updateResult',{data : $scope.dataDetail , edit : $rootScope.editResult, by_userId : $scope.userDataByPincode['id_user'] },config)
                     .then(function(res){
		                 setTimeout(() => {
		                     angular.element('tr#'+$scope.dataDetail[0]['id_lab_order_main']+'_lab').trigger('click');
		                     //recordResult();
		                     statusP();
		                     $scope.$apply();
		                 }, 0);
										 $("#modal-askSave").modal('hide');
											 console.log("test Update Result success",$scope.dataDetail, $rootScope.editResult, $scope.userDataByPincode['id_user'] );
											 if(res.data.success){
												 console.log("updateResult Edit : success set edit result to null");
												 $rootScope.editResult = null;
												 $rootScope.fullname = "";
											 }

		             }).catch(error => {
		                 console.log(error)
		             });
						}).catch(error => {
		            console.log(error)
		        });
					//if($scope._pincode==$scope.userData['pincode']){

         });
		 $scope.saveeGFR = function(){
			 console.log('in save eGFR function lab item detail that update:'+$scope.idLabItemDetailForGFR);
			 var idLabDetail = $scope.idLabItemDetailForGFR;
			 var grfResult = $scope.eGFRResult;
			 console.log('id lab detail:'+idLabDetail+' grfResult:'+grfResult);
			 if(!grfResult||!idLabDetail){
				 return;
			 }
			 var config = {
		                 headers:  {
		                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		                     'Content-Type': 'application/json'
		                 }
		             };
		             $http.post('/main/updateGRFResult',{id_lab_detail:idLabDetail,egrf:grfResult },config).then(function(res){
						 console.log('update GRFResult res:',res);
		                 setTimeout(() => {
		                     angular.element('tr#'+$scope.dataDetail[0]['id_lab_order_main']+'_lab').trigger('click');
		                     //recordResult();
		                     statusP();
		                     $scope.$apply();
		                 }, 0);
											 console.log(" Update GRF Result success",res);
											 if(res.data.success){
												 console.log("updateResult Edit : success set edit result to null");
												 $rootScope.editResult = null;
												 $rootScope.fullname = "";
											 }

		             }).catch(error => {
		                 console.log(error)
		             });
		 }
				 function calCulateGFR(result,height,age,_sex){
					 var eGFR =0;
					 var sex = _sex;
					 var age = 0;
					 var resultFelmale = 0.7;
					 var resultMale = 0.9;
					 if($scope.patient_age){
						  age = $scope.patient_age;
					 }
					 if(age>=18){//if an adult age>=18
					 console.log('in adult calculate age:'+age+' sex:'+sex);
						 if(sex==1){//is male
							 if(result<=resultMale){
								 eGFR=(141*(Math.pow(result/resultMale, -0.411))) * Math.pow(0.993,age);
							 }else{
								 eGFR=(141*(Math.pow(result/resultMale,-1.209))) * Math.pow(0.993,age);
							 }
						 }else{//is female
							 if(result<=resultFelmale){
								 eGFR=(144*(Math.pow(result/resultFelmale,-0.329)))* Math.pow(0.993,age);
							 }else{
								 eGFR=(144*(Math.pow(result/resultFelmale,-1.209)))* Math.pow(0.993,age);
							 }
						 }
					 }else{
						 console.log('in pediatic <=18 calculate height:'+height+' sex:'+sex);
						 eGFR=(0.413*height)/result;
						console.log('calCulateGFR age<=18 :'+eGFR);
					 }
					 console.log('calCulateGFR result:'+eGFR+' age:'+age+' sex:'+sex+' height:'+height);
					 eGFR = eGFR.toFixed(2);
					 return eGFR;
				 }

         function statusP(){
            if($scope.statusP){
                $http.get('/main/DataRecordedResultsByStatus/'+$scope.statusP).then(function(response){
                    $timeout(function() {
                        $scope.recordResult = response.data.data;
                        console.log('success $scope.recordResult  is ***' ,$scope.recordResult );
                        console.log('/main/DataRecordedResultsByStatus/', $scope.statusP);
                        console.log('');
                        for(var i=0; i <  $scope.recordResult.length; i++) {
                            // console.log("record:",$scope.recordResult[i].detail);
                            if($scope.recordResult[i].status == 0){
                                $scope.recordResult[i].icon_status = "dotStanby";
                            }
                            else if($scope.recordResult[i].status == 1){
                                $scope.recordResult[i].icon_status = "dotPending";
                            }
                            else if($scope.recordResult[i].status == 2){
                                $scope.recordResult[i].icon_status = "dotProcess";
                            }
                            else if($scope.recordResult[i].status == 3){
                                $scope.recordResult[i].icon_status = "dotReported";
																$rootScope.disabled = false;
                            }
                            else if($scope.recordResult[i].status == 4){
                                $scope.recordResult[i].icon_status = "dotApproved";
                                $rootScope.disabled = false;
                            }
                            else{
                                $scope.recordResult[i].icon_status = "dotAll";
                            }
														if($scope.recordResult[i].detail !=null){//check lab no have any lab detail critical value
															for(var j=0;j<$scope.recordResult[i].detail.length;j++){
																var resultFlag = $scope.recordResult[i].detail[j].result_flag;
																if(resultFlag==4||resultFlag==5){//is Critcal value
																	$scope.recordResult[i].isCriticalVal = true;
																	console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
																}
															}
														}
                        }
                    },0)
                });
            }else{
                $http.get('/main/DataRecordedResults').then(function(response){
                    $timeout(function() {
                    $scope.recordResult = response.data.data;
                    for(var i=0; i <  $scope.recordResult.length; i++) {
                        if($scope.recordResult[i].status == 0){
                            $scope.recordResult[i].icon_status = "dotStanby";
                        }
                        else if($scope.recordResult[i].status == 1){
                            $scope.recordResult[i].icon_status = "dotPending";
                        }
                        else if($scope.recordResult[i].status == 2){
                            $scope.recordResult[i].icon_status = "dotProcess";
                        }
                        else if($scope.recordResult[i].status == 3){
                            $scope.recordResult[i].icon_status = "dotReported";
                        }
                        else if($scope.recordResult[i].status == 4){
                            $scope.recordResult[i].icon_status = "dotApproved";
                        }
                        else{
                            $scope.recordResult[i].icon_status = "dotAll";
                        }
												if($scope.recordResult[i].detail !=null){//check lab no have any lab detail critical value
													for(var j=0;j<$scope.recordResult[i].detail.length;j++){
														var resultFlag = $scope.recordResult[i].detail[j].result_flag;
														if(resultFlag==4||resultFlag==5){//is Critcal value
															$scope.recordResult[i].isCriticalVal = true;
															console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
														}
													}
												}
                    }
                });
            },0);
            }
        }

        function recordResult(){
            $http.get('/main/DataRecordedResults').then(function(response){
                $scope.recordResult = response.data.data;
                for(var i=0; i <  $scope.recordResult.length; i++) {
                    if($scope.recordResult[i].status == 0){
                        $scope.recordResult[i].icon_status = "dotStanby";
                    }
                    else if($scope.recordResult[i].status == 1){
                        $scope.recordResult[i].icon_status = "dotPending";
                    }
                    else if($scope.recordResult[i].status == 2){
                        $scope.recordResult[i].icon_status = "dotProcess";
                    }
                    else if($scope.recordResult[i].status == 3){
                        $scope.recordResult[i].icon_status = "dotReported";
												$rootScope.disabled = false;
                    }
                    else if($scope.recordResult[i].status == 4){
                        $scope.recordResult[i].icon_status = "dotApproved";
                        $rootScope.disabled = false;
                    }
                    else{
                        $scope.recordResult[i].icon_status = "dotAll";
                    }
										if($scope.recordResult[i].detail !=null){//check lab no have any lab detail critical value
											for(var j=0;j<$scope.recordResult[i].detail.length;j++){
												var resultFlag = $scope.recordResult[i].detail[j].result_flag;
												if(resultFlag==4||resultFlag==5){//is Critcal value
													$scope.recordResult[i].isCriticalVal = true;
													console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
												}
											}
										}
                }
            }).catch(error => {
                console.log(error)
            });
        }
        /**
         * #################
         * search with input
         * ################
         */
        $scope.searchLabResult = function(){
            var hn = $("input[name='resultHn']").val();
            var labNo = $("input[name='labResultNo']").val();
            var fname = $("input[name='fname']").val();

            $http.get('/main/getLabResult?resultHn='+hn+'&labResultNo='+labNo+'&fname='+fname).then(function(response){
                $timeout(function() {
                    $scope.recordResult = response.data.data;

                    for(var i=0; i <  $scope.recordResult.length; i++) {
                        if($scope.recordResult[i].status == 0){
                            $scope.recordResult[i].icon_status = "dotStanby";
                        }
                        else if($scope.recordResult[i].status == 1){
                            $scope.recordResult[i].icon_status = "dotPending";
                        }
                        else if($scope.recordResult[i].status == 2){
                            $scope.recordResult[i].icon_status = "dotProcess";
                        }
                        else if($scope.recordResult[i].status == 3){
                            $scope.recordResult[i].icon_status = "dotReported";
                                                    $rootScope.disabled = false;
                        }
                        else if($scope.recordResult[i].status == 4){
                            $scope.recordResult[i].icon_status = "dotApproved";
                            $rootScope.disabled = false;
                        }
                        else{
                            $scope.recordResult[i].icon_status = "dotAll";
                        }
												if($scope.recordResult[i].detail !=null){//check lab no have any lab detail critical value
													for(var j=0;j<$scope.recordResult[i].detail.length;j++){
														var resultFlag = $scope.recordResult[i].detail[j].result_flag;
														if(resultFlag==4||resultFlag==5){//is Critcal value
															$scope.recordResult[i].isCriticalVal = true;
															console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
														}
													}
												}
                    }
                },0);

            }).catch(error => {
                console.log(error)
            });
        }

        $scope.SearchStatusAll = function(){
            $("#table-sub  tbody > tr").remove();
							$scope.eGFRIsClick=false;
							labCheckedId.length =0;
            $http.get('/main/DataRecordedResults').then(function(response){
                $timeout(function() {
                    $scope.recordResult = response.data.data;
                    console.log('record result 1', $scope.recordResult);
                    for(var i=0; i <  $scope.recordResult.length; i++) {
                        if($scope.recordResult[i].status == 0){
                            $scope.recordResult[i].icon_status = "dotStanby";
                        }
                        else if($scope.recordResult[i].status == 1){
                            $scope.recordResult[i].icon_status = "dotPending";
                        }
                        else if($scope.recordResult[i].status == 2){
                            $scope.recordResult[i].icon_status = "dotProcess";
                        }
                        else if($scope.recordResult[i].status == 3){
                            $scope.recordResult[i].icon_status = "dotReported";
                                                    $rootScope.disabled = false;
                        }
                        else if($scope.recordResult[i].status == 4){
                            $scope.recordResult[i].icon_status = "dotApproved";
                            $rootScope.disabled = false;
                        }
                        else{
                            $scope.recordResult[i].icon_status = "dotAll";
                        }
												if($scope.recordResult[i].detail !=null){//check lab no have any lab detail critical value
													for(var j=0;j<$scope.recordResult[i].detail.length;j++){
														var resultFlag = $scope.recordResult[i].detail[j].result_flag;
														if(resultFlag==4||resultFlag==5){//is Critcal value
															$scope.recordResult[i].isCriticalVal = true;
															console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
														}
													}
												}
                    }
                },0);

            });
            console.log('newPosts',$scope.newPosts)
            if ($scope.newPosts == undefined){
                return false;
            }
            for(var i=0; i <  $scope.newPosts.length; i++) {
                if($scope.newPosts[i].status == 0){
                    $scope.newPosts[i].icon_status = "dotStanby";
                }
                else if($scope.newPosts[i].status == 1){
                    $scope.newPosts[i].icon_status = "dotPending";
                }
                else if($scope.newPosts[i].status == 2){
                    $scope.newPosts[i].icon_status = "dotProcess";
                }
                else if($scope.newPosts[i].status == 3){
                    $scope.newPosts[i].icon_status = "dotReported";
                                            $rootScope.disabled = false;
                }
                else if($scope.newPosts[i].status == 4){
                    $scope.newPosts[i].icon_status = "dotApproved";
                    $rootScope.disabled = false;
                }
                else{
                    $scope.newPosts[i].icon_status = "dotAll";
                }
                                        if($scope.newPosts[i].detail !=null){//check lab no have any lab detail critical value
                                            for(var j=0;j<$scope.newPosts[i].detail.length;j++){
                                                var resultFlag = $scope.newPosts[i].detail[j].result_flag;
                                                if(resultFlag==4||resultFlag==5){//is Critcal value
                                                    $scope.newPosts[i].isCriticalVal = true;
                                                    console.log("recordResultCriTrue:",$scope.newPosts[i].isCriticalVal);
                                                }
                                            }
                                        }
            }
            $scope.ShowAll();
        }

       $scope.statusDataLab ;
        $scope.SearchStatusColor = function(status){
            $scope.statusDataLab = status;
            console.log('color', $scope.newPosts)
            $scope.statusP = status;
							$scope.eGFRIsClick=false;
							labCheckedId.length =0;
            $("#table-sub  tbody > tr").remove();
            $http.get('/main/DataRecordedResultsByStatus/'+status).then(function(response){
                $timeout(function() {
                    $scope.recordResult = response.data.data;
                    console.log('success $scope.recordResult  is ' ,$scope.recordResult );
                    console.log('/main/DataRecordedResultsByStatus/'+status);
                    for(var i=0; i <  $scope.recordResult.length; i++) {
                        // console.log('recordResult is ',$scope.recordResult[i].status == 3)
                        if($scope.recordResult[i].status == 0){
                            $scope.recordResult[i].icon_status = "dotStanby";
                        }
                        else if($scope.recordResult[i].status == 1){
                            $scope.recordResult[i].icon_status = "dotPending";
                        }
                        else if($scope.recordResult[i].status == 2){
                            $scope.recordResult[i].icon_status = "dotProcess";
                        }
                        else if($scope.recordResult[i].status == 3){
                            $scope.recordResult[i].icon_status = "dotReported";
                                                    $rootScope.disabled = false;
                            // console.log('recordResult is ',i)
                           
                        }
                        else if($scope.recordResult[i].status == 4){
                            $scope.recordResult[i].icon_status = "dotApproved";
                            $rootScope.disabled = false;
                        }
                        else{
                            $scope.recordResult[i].icon_status = "dotAll";
                        }
												if($scope.recordResult[i].detail !=null){//check lab no have any lab detail critical value
													for(var j=0;j<$scope.recordResult[i].detail.length;j++){
														var resultFlag = $scope.recordResult[i].detail[j].result_flag;
														if(resultFlag==4||resultFlag==5){//is Critcal value
															$scope.recordResult[i].isCriticalVal = true;
															console.log("recordResultCriTrue:",$scope.recordResult[i].isCriticalVal);
														}
													}
												}
                    }
                },0);

            });
                if ($scope.newPosts != undefined){
                for(var i=0; i <  $scope.newPosts.length; i++) {
                    console.log('okay',$scope.newPosts[i].status)
                    if($scope.newPosts[i].status == 0){
                        $scope.newPosts[i].icon_status = "dotStanby";
                    }
                    else if($scope.newPosts[i].status == 1){
                        $scope.newPosts[i].icon_status = "dotPending";
                    }
                    else if($scope.newPosts[i].status == 2){
                        $scope.newPosts[i].icon_status = "dotProcess";
                    }
                    else if($scope.newPosts[i].status == 3){
                        $scope.newPosts[i].icon_status = "dotReported";
                                                $rootScope.disabled = false;
                    }
                    else if($scope.newPosts[i].status == 4){
                        $scope.newPosts[i].icon_status = "dotApproved";
                        $rootScope.disabled = false;
                    }
                    else{
                        $scope.newPosts[i].icon_status = "dotAll";
                    } if($scope.newPosts[i].detail !=null){//check lab no have any lab detail critical value
                        for(var j=0;j<$scope.newPosts[i].detail.length;j++){
                            var resultFlag = $scope.newPosts[i].detail[j].result_flag;
                            if(resultFlag==4||resultFlag==5){//is Critcal value
                                $scope.newPosts[i].isCriticalVal = true;
                                console.log("recordResultCriTrue:",$scope.newPosts[i].isCriticalVal);
                            }
                        }
                    }
                }
                $scope.SelectLabSubGroupItem($scope.tempLabSubGroupId);
            }
        }

        $("#print_appointment").on('click', function(){
            var doctor_name = $("#namedoctor").val();
            var fullname = $scope.patient_fullname
            var date = $("#date_order").val();
            var time = $("#time_order").val();
            var value;
            if(time){
                value = time.split(":")
            }else{
                value[0] = ""
                value[1] = ""
            }
            var hour = value[0]
            var minute = value[1]
            var appointmentfor = $("#appointmentfor").val();
            var laborderno = $scope.hnNo;
            var note = $("#note").val();
            var department = $("#department_app").val();
            var specialty = $("#special_app").val();
            var hospital = $("#hospital_app").val();
            var age = $scope.patient_age
            var sex = $scope.patient_sex
            window.open('/report/appointment?doctor_name='+doctor_name+'&fullname='+fullname +
            '&date='+date+'&hour='+hour+'&minute='+minute+'&appointmentfor='+appointmentfor+'&laborderno='+laborderno+
            '&note='+note+'&sex='+sex+'&age='+age+'&department='+department+'&specialty='+specialty+
            '&hospital='+hospital,'_blank');
        });
        /***
         * edit lab result
         */
        $scope.EditLabResult = function(){
            $("#modal-editLabResult").modal('show');
        }
				/*
				* cancel Approve
				*/
				$("#confirm-CancelApprove").click(function(){
					var config = {
							 headers:  {
									 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
									 'Content-Type': 'application/json'
							 }
					 };
            console.log("cancel Approve click lab main id:",$scope.saveMain,"lab detail:",$scope.dataDetail);
						$http.post('/main/cancelApprove',{data : $scope.dataDetail },config).then(function(res){
								setTimeout(() => {
										//angular.element('tr#'+$scope.dataDetail[0]['id_lab_order_main']+'_lab').trigger('click');
										//recordResult();
										statusP();
										$scope.$apply();
								}, 0);

						}).catch(error => {
								console.log(error)
						});
						$("#modal-reorded-confirmCancelApprove").modal('hide')
				});
				$scope.CancelApproveResult = function(){
					$("#modal-reorded-confirmCancelApprove").modal('show');
				}
        /**
         * Choose lab order main
         */
        $scope.Choose = function(id, labNo, hnNo){	
            console.log('---$scope.Choose------------------------------------------------');				
            $scope.saveMain = id;
            $rootScope.orderMainID = id;
            console.log('$rootScope.orderMainID',$rootScope.orderMainID);
            $("#namedoctor").val('');
            $('#appointmentfor').val('');
            $('#date_order').val('');
            $("#time_order").val('')
            $('#lab_order_no').val('');
            chart([]);
            $scope.patient_fullname = $('#'+labNo+'_fullname').val();
            $scope.patient_age = $('#'+labNo+'_patient_age').val();
            $scope.patient_sex = $('#'+labNo+'_patient_sex').val();
						//calCulateGFR(2.3,150,$scope.patient_age,$scope.patient_sex);
            $scope.disableButton = false;
            $scope.labButton = false;//for show button edit result
						$scope.labCancelApproveButton = false;//for show button cancel approve
            $scope.hasSelect = true;
            $scope.labNo = labNo;
            $scope.hnNo = hnNo;
            $scope.redHn = hnNo;
            $scope.selected = id;
            $rootScope.disabled = true;
            $timeout(function() {
                $scope.dataDetail = [];
            },0);
            $http.get('/main/DataLabDetail/'+id).then(function(response){
                $scope.dataDetail = response.data.data;
                $rootScope.labItemId = [];
				// console.log("dataDetail:",$scope.dataDetail);
                $rootScope.orderMainID = $scope.dataDetail[0].id_lab_order_main;
                $rootScope.patientID = $scope.dataDetail[0].order['id_patient'];
                for(var i=0; i < $scope.dataDetail.length; i++){
                    $rootScope.labItemId[i] = $scope.dataDetail[i].id_lab_item;
                    // console.log('2. ',$rootScope.labItemId[i], $rootScope.patientID)

                }
                // console.log($rootScope.labItemId);
                for(var i=0; i < $rootScope.labItemId.length; i++){
                    $scope.detailLabitem($rootScope.labItemId[i], $rootScope.patientID)
                }



                for(var i=0; i <  $scope.dataDetail.length; i++) {
                    if($scope.dataDetail[i]['lab_result'] != '-'){
                        var lab_result = parseFloat($scope.dataDetail[i]['lab_result']);
                        var decimal = parseFloat($scope.dataDetail[i]._decimal)
                        $scope.dataDetail[i]['lab_result'] = lab_result.toFixed(decimal);
                    }
                    if($scope.dataDetail[i]['lab_result_repeat'] != '-'){
                        var lab_result = parseFloat($scope.dataDetail[i]['lab_result_repeat']);
                        var decimal = parseFloat($scope.dataDetail[i]._decimal)
                        $scope.dataDetail[i]['lab_result_repeat'] = lab_result.toFixed(decimal);
                    }
                    if($scope.dataDetail[i].status == 0){
                        $scope.dataDetail[i].icon_status = "dotStanby";
                    }
                    else if($scope.dataDetail[i].status == 1){
                        $scope.dataDetail[i].icon_status = "dotPending";
                    }
                    else if($scope.dataDetail[i].status == 2){
                        $scope.dataDetail[i].icon_status = "dotProcess";
                    }
                    else if($scope.dataDetail[i].status == 3){
                        $scope.dataDetail[i].icon_status = "dotReported";
                        $scope.labButton = true;
												$rootScope.disabled = false;
                    }
                    else if($scope.dataDetail[i].status == 4){
                        $scope.dataDetail[i].icon_status = "dotApproved";
                        $rootScope.disabled = false;
                        $scope.labButton = true;
												$scope.labCancelApproveButton = true;
                    }
                    if($scope.dataDetail[i].result_flag == 1){
                        $scope.dataDetail[i].check_status = "L";
                    }
                    else if($scope.dataDetail[i].result_flag == 4){
                        $scope.dataDetail[i].check_status = "PL";
                    }
                    else if($scope.dataDetail[i].result_flag == 3){
                        $scope.dataDetail[i].check_status = "Normal";
                    }else if($scope.dataDetail[i].result_flag == 2){
                        $scope.dataDetail[i].check_status = "H";
                    }else if($scope.dataDetail[i].result_flag == 5){
                        $scope.dataDetail[i].check_status = "PH";
                    }else if($scope.dataDetail[i].result_flag == 6){
											$scope.dataDetail[i].check_status = "ERR";
										}else if($scope.dataDetail[i].result_flag == 7){
											$scope.dataDetail[i].check_status = "DH";
										}else if($scope.dataDetail[i].result_flag == 8){
											$scope.dataDetail[i].check_status = "DL";
										}else if($scope.dataDetail[i].result_flag == 9){
											$scope.dataDetail[i].check_status = "WN";
										}
										else{
                         $scope.dataDetail[i].check_status = "None";
                    }
                    if($scope.dataDetail[i].order){
											$scope.dataDetail[i].critical_value = $scope.dataDetail[i].critical_value;
                        if($scope.dataDetail[i].order['patient']['gender'] == 2){
                            $scope.dataDetail[i].normal_range = $scope.dataDetail[i].lab_male_normal_value
                        }else if($scope.dataDetail[i].order['patient']['gender'] == "1"){
                            $scope.dataDetail[i].normal_range = $scope.dataDetail[i].lab_female_normal_value
                        }else{
                            $scope.dataDetail[i].normal_range = $scope.dataDetail[i].lab_child_normal_value
                        }
                    }
										if($scope.dataDetail[i].approve!=null){
											var name = $scope.dataDetail[i].approve['fname']+" "+$scope.dataDetail[i].approve['lastname'];
											if($scope.dataDetail[i].cancel_approve_id_user!=null&&$scope.dataDetail[i].edit_approve_id_user==null){
													name = "";
											}else if($scope.dataDetail[i].edit_approve_id_user!=null){
													name =$scope.dataDetail[i].edit_approve['fname']+" "+$scope.dataDetail[i].edit_approve['lastname'];
											}
											$scope.dataDetail[i].approve_fullname = name;
										}else{
											$scope.dataDetail[i].approve_fullname = "";
										}




                }
								$scope.currentSelectLabNameForGFR="Please select lab item";
            });

                // code appointment by jame
                $rootScope.orderMainID = id;
                console.log('$rootScope.orderMainID',$rootScope.orderMainID);
                $http.get('/main/appointmentMaxValue/'+id).then(function(response){
                    $scope.appoint = response.data.data;
                    if ($scope.appoint.length > 0){
                        $("#note").val($scope.appoint[0].note);
                        $("#department_app").val($scope.appoint[0].doctor['department'].department_name);
                        $("#special_app").val($scope.appoint[0].doctor['specialty'].specialty_name);
                        $("#hospital_app").val($scope.appoint[0].doctor['hospital'].hospital_name);
                        setTimeout(() => {
                            var date = $scope.appoint[0].date_order.split(" ")
                            $("#lab_order_no").val($scope.appoint[0].lab_order_main['lab_order_no'])
                            $("#date_order").val(date[0])
                            $("#time_order").val(date[1])
                            $("#namedoctor").val($scope.appoint[0].doctor['doctor_name']+' '+$scope.appoint[0].doctor['doctor_lastname'])
                            $("#appointmentfor").val($scope.appoint[0].appointment_for)
                            $scope.$apply();
                        }, 0);
                    }
                }).catch(error => {
                    console.log(error)
                });

            }

            $scope.Transfer = function(id,result,_main_id){
                if(result != "-"){
                    $http.get('/main/transfer?_id='+id+'&result='+result).then(function(response){
                        $timeout(function() {
                            angular.element('tr#'+_main_id+'_lab').trigger('click');
                        }, 0);
                    }).catch(error => {
                        console.log(error)
                    });
                }
            }

            $scope.Repeat = function(id, result, _main_id){
                $http.get('/main/Repeat?_id='+id+'&result='+result).then(function(response){
                    $timeout(function() {
                        angular.element('tr#'+_main_id+'_lab').trigger('click');
                        //recordResult();
                        statusP();
                    }, 0);
                }).catch(error => {
                    console.log(error)
                });
            }

            $scope.AllTransfer = function(){
                $("#modal-transfer").modal('show');
            }

            $("#confirm-transfer").on('click', function(){
                var config = {
                    headers:  {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    }
                };
                $http.post('/main/transfer',{data : $scope.dataDetail},config).then(function(res){
                    $("#modal-transfer").modal('hide');
                    $timeout(function() {
                        angular.element('tr#'+$scope.saveMain+'_lab').trigger('click');
                        statusP();
                    }, 0);
                }).catch(error => {
                    console.log(error)
                });
            });

            $scope.AllRepeat = function(){
                $("#modal-askRepeat").modal('show');
            }

            $("#confirm-Askrepeat").click(function(){
                var config = {
                    headers:  {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    }
                };
               $http.post('/main/AllRepeat',{data : $scope.dataDetail},config).then(function(res){
                    setTimeout(() => {
                        angular.element('tr#'+$scope.saveMain+'_lab').trigger('click');
                        statusP();
                        //recordResult();
                        $("#modal-askRepeat").modal('hide');
                    }, 0);
                }).catch(error => {
                    console.log(error)
                });
            });

            $scope.SaveResult = function(){
                $("#modal-askSave").find('h3').text("Do you want to save result ?");
                $("#modal-askSave").modal('show');

								$('#modal-askSave').on('shown.bs.modal', function () {
							    $('#askSavePincodeInput').focus();
							});
								$scope.permission=false;
            }

            $scope.ConfirmResult = function(){
                console.log('function ConfirmResult')
                $("#modal-askConfirm").find('h3').text("Do you want to confirm result ?");
                $("#modal-askConfirm").modal('show');
								$('#modal-askConfirm').on('shown.bs.modal', function () {
									$('#askConfirmPincodeInput').focus();
							});
                                $scope.permission=false;
            }

						var attempPincode=0;
						var confirmInput = document.getElementById("askConfirmPincodeInput");
						confirmInput.addEventListener("keyup", function(event) {
					  // Number 13 is the "Enter" key on the keyboard
					  if (event.keyCode === 13) {
					    // Cancel the default action, if needed
					    event.preventDefault();
					    // Trigger the button element with a click
							console.log('enter save confirm');
					    $("#confirm-Askconfirm").click();
					  }
					});
            $("#confirm-Askconfirm").click(function(){
							$http.get('/management/manageUser/GetUserByPincode/'+$scope._pincode).then(function(response){
									$scope.userDataByPincode = response.data.data;
									//console.log('userDataByPincode',$scope.userDataByPincode);
								if($scope.userDataByPincode!=null){
									//console.log('$scope._pincode',$scope._pincode);
									$scope.permission=false;
									$scope._pincode="";
									//$scope.$apply();
								}else{
									//console.log('$scope._pincode',$scope._pincode);
									$scope.permission=true;
									attempPincode++;
									$scope._pincode="";
									$scope.$apply();
									// $("#modal-askSave").modal('hide');
									if(attempPincode>=3){
										$scope.pinError ="System will automatic logout because wrong pincode morethan "+attempPincode+" times";
										$http.get('/login/logout').then(function(response){
											console.log('force logout because wrong pincode more than 3 times');
											attempPincode =0;
											window.location.reload();
										}).catch(error => {
			                  console.log('logout error',error)
			              });
									}
									return;
								}
								attempPincode=0;

	                var lab_detail = $scope.dataDetail;
	                var tempApproveUser = lab_detail[0]['approve'];
	                lab_detail[0]['isEdit'] = false;
	                if(lab_detail!=null){
	                    if(lab_detail[0]['edit_id_user']!=null){
	                        if($rootScope.editResult!=null){
	                            lab_detail[0]['approve'] = $rootScope.editResult;
	                            lab_detail[0]['isEdit'] = true;
	                        }
	                    }
	                }
	                var config = {
	                    headers:  {
	                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	                        'Content-Type': "appliction/json"
	                    }
	                  };
	                $http.post('/main/ConfirmResult/',{data : lab_detail,by_userId:$scope.userDataByPincode['id_user']},config).then(function(response){
                        
                        if(response.data.success){
                            console.log($scope.selected);
                            var selected_id = $scope.selected;
                            // console.log(selected_id)
                            var text_url = '/report/ReportToHotXP/'+selected_id;
                            console.log('txt',text_url);
							  $http.get(text_url).then(function(response){
                                console.log('response', response.data.Status);
                                if (response.data.Status == true){
                                    if($scope.statusDataLab == 0){
                                        $scope.SearchStatusColor(0);
                                    }else if($scope.statusDataLab == 1){
                                        $scope.SearchStatusColor(1);
                                    }else if($scope.statusDataLab == 2){
                                        $scope.SearchStatusColor(2);
                                    }else if($scope.statusDataLab == 3){
                                        $scope.SearchStatusColor(3);
                                    }else if($scope.statusDataLab == 4){
                                        $scope.SearchStatusColor(4);
                                    }
                                }
                                $("#modal-askConfirm").modal('hide');
                            });
                           /* $http.get(text_url).then(function(response){
                                console.log('response', response.data.Status);
                                if (response.data.Status == true){
                                    $scope.SearchStatusColor(4);
                                }
                                $("#modal-askConfirm").modal('hide');
                            }); */
							
	                    }
	                }).catch(error => {
	                    console.log(error)
	                });
							}).catch(error => {
									console.log('confrim error',error)
							});
            });

            $scope.AutoResult = function(){
                for(var i=0; i < $scope.dataDetail.length; i++){
                    var id = $scope.dataDetail[i].id_lab_item;
                    $http.get('/main/AutoResult/'+id).then(function(response){
                        $scope.CheckAutoResult = response.data.data;
                        for(var i=0; i <  $scope.dataDetail.length; i++){
                            if($scope.dataDetail[i].id_lab_item == $scope.CheckAutoResult[0].id_lab_item ){
                                $scope.dataDetail[i].lab_result =$scope.CheckAutoResult[0].lab_default_value;
                            }
                        }
                    });
                }
            }


        $scope.CriticalReport = function(mainOrderId, idPatient, idLabItem){
            $("#modal-RedRecord").modal('hide');
            $("#modal-ResultReport").modal({backdrop: 'static', keyboard: false});
            // $rootScope.patientID = idPatient;
            // $rootScope.orderMainID = mainOrderId;
            // $rootScope.idLabItem = idLabItem;
            console.log(mainOrderId, idPatient, idLabItem)
            console.log($rootScope.patientID, $rootScope.orderMainID, $rootScope.idLabItem)
        }
        $scope.RedRecord = function(){
			$("#modal-RedRecord").modal({backdrop: 'static', keyboard: false});
        }
        $scope.Cancel = function(mainOrderId, idPatient, idLabItem){
            $("#modal-RedRecord").modal('hide');
            $("#modal-Cancel").modal({backdrop: 'static', keyboard: false});
            $rootScope.patientID = idPatient;
            $rootScope.orderMainID = mainOrderId;
            $rootScope.idLabItem = idLabItem;
        }
    });
})();
