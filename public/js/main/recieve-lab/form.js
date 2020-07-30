(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
    var SE_SelectLabSubGroupItem = null;
    app.directive("modalLabreveice", function () {
        return {
            restrict: "A",
            link: function (scope, element, attrs, test) {
                $(element).bind("hide.bs.modal", function () {
                    $('input[name="hospital_name"]').val("");
                    $('input[name="id_hospital"]').val("");
                    $('input[name="clinic_name"]').val("");
                    $('input[name="id_clinic"]').val("");
                    $('input[name="department_name"]').val("");
                    $('input[name="id_department"]').val("");
                    $('input[name="doctor_name"]').val("");
                    $('input[name="id_doctor"]').val("");
                    $('input[name="ward_name"]').val("");
                    $('input[name="id_ward"]').val("");
                    $('input[name="hn"]').val("");
                    $('input[name="id_patient"]').val("");
                    $('input[name="prefix_name"]').val("");
                    $('input[name="patient_firstname"]').val("");
                    $('input[name="patient_lastname"]').val("");
                    $('input[name="age"]').val("");
                    $('input[name="gender"]').val("");
                    $('input[name="service_plan_name"]').val("");
                    $('input[name="id_service_plan"]').val("");
                    $("#department_app").val('');
                    $("#special_app").val('');
                    $("#hospital_app").val('');

                    $('select[name="labgroupitem"]').val("");
                    $('input:checkbox').removeAttr('checked');

                    scope.hospital = false;
                    scope.department = false;
                    scope.clinic = false;
                    scope.patient = false;
                    scope.doctor = false;
                    scope.ward = false;
                    // scope.invalid_ward = "testtttttttttt";
                    console.log('ward', false)
                    scope.labItem = false;
                    scope.itemget = [];
                    scope.DataLabSubGroupItem = [];
                    scope.Se = 0;
                });
              }
          };
      });

    //modal Lab Order select orderlab
    app.controller('LabOrderSearchBarController', function ($scope,$http,$rootScope){
        $('input[name="hospital_name"]').prop('disabled', true);
        $('input[name="clinic_name"]').prop('disabled', true);
        $('input[name="department_name"]').prop('disabled', true);
        $('input[name="doctor_name"]').prop('disabled', true);
        $('input[name="ward_name"]').prop('disabled', true);
        //$('input[name="hn"]').prop('disabled', true);
        $('input[name="prefix_name"]').prop('disabled', true);
        $('input[name="patient_firstname"]').prop('disabled', true);
        $('input[name="patient_lastname"]').prop('disabled', true);
        $('input[name="age"]').prop('disabled', true);
        $('input[name="gender"]').prop('disabled', true);
        $('input[name="service_plan_name"]').prop('disabled', true);
        $('input[name="service_plan_name"]').prop('disabled', true);

                $scope.selectedItemId = 0;
                var iditem=[];
                $scope.itemget = [];
				$scope.profileTestByGroup=[];
				$scope.labSubId=0;
				$scope.SelectLabSubGroupItem = function(id){
                    $scope.Se = id;
                    console.log('selected');
                        $scope.itemget = [];
                        // $scope.DataLabSubGroupItem = [];
                        $scope.labItem = false;
                        iditem = [];
                        var datalab = id;
                        $scope.selectedItemId = id;
                        console.log('datalab',datalab);
                        if(datalab !== ""){
                                $http.get('/main/SelectLabSubGroupItemById/'+id).then(function(response){
                                    $scope.Se = id;
                                    SE_SelectLabSubGroupItem = id;
                                $scope.DataLabSubGroupItem = response.data.data;
                                console.log('data lab',$scope.DataLabSubGroupItem)
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
                    $scope.labSubId = id;
                    console.log('$scope.labSubId:',$scope.labSubId);
					$http.get('/management/profileTest/getAllProfileByLabSubGroup/'+id).then(function(response){
						console.log('get profile by id',response.data.data);
						$scope.profileTestByGroup = response.data.data;
					});
				}
				$scope.SelectProfileTest = function(profileItem){
					$scope.itemget.length=0;
					iditem.length=0;
					if(profileItem==null){
						return;
					}
					if(profileItem.profile_test_item_detail!=null){
						console.log('select profile test:',profileItem);
						console.log('profile.profile_test_item_detail',profileItem.profile_test_item_detail);
						for(var i=0;i<profileItem.profile_test_item_detail.length;i++){
							  $scope.check(profileItem.profile_test_item_detail[i].id_lab_item);

						}
					}

					//if($scope.profileTestByGroup.
				}
                $http.get('/main/LabSubGroupItem').then(function(response){
                    $scope.LabSubGroup = response.data.data;
                    console.log('$scope.labSubgroup',$scope.LabSubGroup);
                    console.log('lordหน้าใหม่');
                    $rootScope.LabSubGroupEdit = response.data.data;
                    console.log('$scope.labSubId',$scope.labSubId);
                    console.log('$scope =>',$scope);
                    $('#CheckBox').click(function(e){
                        if (e. target. checked) {
                            localStorage.checked = true;
                        } else {
                            localStorage.checked = false;
                        }
                    });
                });

        function getLabOrderMain(id){
            $http.get('/main/SelectLabOrderMain').then(function(response){
                console.log("getLabOrderMain");
                $scope.DataLabSubGroupItem = [];
                setTimeout(function () {
                    $scope.$apply(function () {
                        $rootScope.AllDataLabOrderMain = response.data.data;
                        console.log('fdvdfvdf',$rootScope.AllDataLabOrderMain)
                    });
                }, 0);
            }).catch(error => {
                console.log(error)
            });
            $scope.isFiltered = true;
            console.log ('scope.isFiltered 2', $scope.isFiltered);
            console.log('SelectLabSubGroupItem:',id);
            $scope.labSubId = id;
            $rootScope.newPosts = [];
            $http.get('/main/SelectLabSubGroupItemById/'+id).then(function(response){
                $scope.Se = id;
                SE_SelectLabSubGroupItem = id;
                $scope.labSubGroupItems = response.data.data;
                console.log('sub group items data',$scope.labSubGroupItems);
                for(var i=0; i<$rootScope.AllDataLabOrderMain.length; i++){
                    for(var j=0; j<$rootScope.AllDataLabOrderMain[i].detail.length; j++){
                        for(var k=0; k<$scope.labSubGroupItems.length; k++){
                        // console.log($scope.posts[i].detail[j])
                        if($rootScope.AllDataLabOrderMain[i].detail[j].id_lab_item == $scope.labSubGroupItems[k].id_lab_item){
                            if(!$rootScope.newPosts.includes($rootScope.AllDataLabOrderMain[i])){
                                $rootScope.newPosts.push($rootScope.AllDataLabOrderMain[i]);
                            }
                            // console.log('true');
                            // console.log('newpost after filter'$rootScope.newPosts)
                        } else {

                        }
                        
                      }
                    }
                    
                }
                console.log('newposts length', $rootScope.newPosts);
            });
        }
        /**
         * ##############
         * add labOrderMain
         * ##############
         */
        $("#AddLabOrder").click(function(){
            var idhospital =  $('input[name="id_hospital"]').val();
            var iddepartment =  $('input[name="id_department"]').val();
            var idservice_plan =  $('input[name="id_service_plan"]').val();
            var idclinic =  $('input[name="id_clinic"]').val();
            var idpatient =  $('input[name="id_patient"]').val();
            var iddoctor =  $('input[name="id_doctor"]').val();
            var idward =  $('input[name="id_ward"]').val();
            var OPDIPD =  $('input[name="OPD_IPD"]:checked').val();
            var myJSON = iditem;

            if(!idhospital){
                setTimeout(() => {
                    $scope.$apply(function () {
                        $scope.invalid_hospital = "Please Select Hospital"
                        $scope.hospital = true;
                    });
                },0);
                return false;
            }
            if(!idclinic){
                setTimeout(() => {
                    $scope.$apply(function () {
                        $scope.invalid_clinic = "Please Select Clinic"
                        $scope.clinic = true;
                    });
                },0);
                return false;
            }
            if(!iddepartment){
                setTimeout(() => {
                    $scope.$apply(function () {
                        $scope.invalid_departmanet = "Please Select Department"
                        $scope.department = true;
                    });
                },0);
                return false;
            }
            if(!iddoctor){
                setTimeout(() => {
                    $scope.$apply(function () {
                        $scope.invalid_doctor = "Please Select Doctor"
                        $scope.doctor = true;
                    });
                },0);
                return false;
            }
            if(!idward){
                setTimeout(() => {
                    $scope.$apply(function () {
                        console.log('ward', true)
                        $scope.invalid_ward = "Please Select Ward"
                        $scope.ward = true;
                    });
                },0);
                return false;
            }
            if(!idpatient){
                setTimeout(() => {
                    $scope.$apply(function () {
                        $scope.invalid_patient = "Please Select Patient!"
                        $scope.patient = true;
                    });
                },0);
                return false;
            }
            if(iditem.length == 0){
                setTimeout(() => {
                    $scope.$apply(function () {
                        $scope.invalid_labitem = "Please Select Lab Item"
                        $scope.labItem = true;
                    });
                },0);
                return false;
            }
            var url = $(this).data('url');
            var url2 = $(this).data('url2');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                dataType : "JSON",
                data: {
                        idhospital:idhospital,
                        iddepartment:iddepartment,
                        idservice_plan:idservice_plan,
                        idclinic:idclinic,
                        idpatient:idpatient,
                        iddoctor:iddoctor,
                        idward:idward,
                        OPDIPD:OPDIPD,
						lab_item_selected:myJSON
                },
                success:function(res){
                    if(res.success){
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url2,
                            data: {Data:myJSON,
															num_lab_barcode:res.num_lab_barcode,
															lab_main_id:res.lab_main_id,
															lab_item_id:res.data,
															mapIdMainAndLabId:res.mapIdMainAndLabId
														},
                            success:function(res){
                               if(res.success){
											$("#modal-recieveLab-reg").modal('hide');
                                            getLabOrderMain($scope.selectedItemId);
                                            console.log("after lab detail res",res);
                                            // return false;
                               }
                            }
                        });
												console.log("res",$scope.selectedItemId);
                    }
                },
                error : function(xhr,error){
                    console.log(xhr.responseJSON)
                }
            });
        });
		$scope.SearchHospital = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.hospital = false;
                });
            },0);
			$("#modal-hospital").modal('show');
        }
        $scope.SearchPatient = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.patient = false;
                });
            },0);
            $("#modal-patient").modal('show');
        }
        $scope.SearchDepartment = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.department = false;
                });
            },0);
			$("#modal-department").modal('show');
        }
        $scope.SearchClinic = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.clinic = false;
                });
            },0);
			$("#modal-clinic").modal('show');
        }
        $scope.SearchDoctor = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.doctor = false;
                });
            },0);
			$("#modal-doctor").modal('show');
        }
        $scope.SearchServicePlan = function(){
			$("#modal-servicePlan").modal('show');
        }
        $scope.SearchWard = function(){
            setTimeout(() => {
                $scope.$apply(function () {
                    $scope.ward = false;
                });
            },0);
			$("#modal-ward").modal('show');
        }
				var isInputDetailDisableWhenDel = true;
        $scope.DelHospital = function(){
            $('input[name="hospital_name"]').val("");
            $('input[name="id_hospital"]').val("");
            $('input[name="hospital_name"]').prop('disabled', isInputDetailDisableWhenDel);
        }
        $scope.DelPatient = function(){
            $('input[name="hn"]').val("");
            $('input[name="hn"]').prop('disabled', isInputDetailDisableWhenDel);
            $('input[name="prefix_name"]').val("");
            $('input[name="prefix_name"]').prop('disabled', isInputDetailDisableWhenDel);
            $('input[name="patient_firstname"]').val("");
            $('input[name="patient_firstname"]').prop('disabled', isInputDetailDisableWhenDel);
            $('input[name="patient_lastname"]').val("");
            $('input[name="patient_lastname"]').prop('disabled', isInputDetailDisableWhenDel);
            $('input[name="age"]').val("");
            $('input[name="age"]').prop('disabled', isInputDetailDisableWhenDel);
            $('input[name="gender"]').val("");
            $('input[name="gender"]').prop('disabled', isInputDetailDisableWhenDel);
            $('input[name="id_patient"]').val("");
        }
        $scope.DelDepartment = function(){
            $('input[name="department_name"]').val("");
            $('input[name="id_department"]').val("");
            $('input[name="department_name"]').prop('disabled', isInputDetailDisableWhenDel);
        }
        $scope.DelClinic = function(){
            $('input[name="clinic_name"]').val("");
            $('input[name="id_clinic"]').val("");
            $('input[name="clinic_name"]').prop('disabled', isInputDetailDisableWhenDel);
        }
        $scope.DelDoctor = function(){
            $('input[name="doctor_name"]').val("");
            $('input[name="id_doctor"]').val("");
            $("#department_app").val('');
            $("#special_app").val('');
            $("#hospital_app").val('');
            $('input[name="doctor_name"]').prop('disabled', isInputDetailDisableWhenDel);
        }
        $scope.DelServicePlan = function(){
            $('input[name="service_plan_name"]').val("");
            $('input[name="id_service_plan"]').val("");
            $('input[name="service_plan_name"]').prop('disabled', isInputDetailDisableWhenDel);
        }
        $scope.DelWard = function(){
            $('input[name="ward_name"]').val("");
            $('input[name="id_ward"]').val("");
            $('input[name="ward_name"]').prop('disabled', isInputDetailDisableWhenDel);
        }

        // return false;
    });

    $(document).ready(function(){
        $("#appointment_print").on('click',function(){
            var doctor_name = $("#doctor_name").val();
            var fullname = $("#fullname").val();
            var date = $("#datepicker").val();
            var hour = $("#Hr").val();
            var minute = $("#Minute").val();
            var appointmentfor = $("#appointmentfor").val();
            var laborderno = $("#laborderno").val();
            var note = $("#note").val();
            var department = $("#department_app").val();
            var specialty = $("#special_app").val();
            var hospital = $("#hospital_app").val();
            var age = $('#age_app').val();
            var sex = $('#sex_app').val()
            window.open('/report/appointment?doctor_name='+doctor_name+'&fullname='+fullname +
            '&date='+date+'&hour='+hour+'&minute='+minute+'&appointmentfor='+appointmentfor+'&laborderno='+laborderno+
            '&note='+note+'&sex='+sex+'&age='+age+'&department='+department+'&specialty='+specialty+
            '&hospital='+hospital,'_blank');
        });
    });

    document.onreadystatechange = function () {
        if (document.readyState === 'complete') {
            $("#checkAll").attr("disabled", false)
        }
    }
		app.controller('EditLabOrderController',function ($scope,$http,$rootScope,$timeout){
			$("#EditLabOrder").click(function(){
                console.log("you click Edit");
					var idhospital =  $('input[name="id_hospital"]').val();
					var iddepartment =  $('input[name="id_department"]').val();
					var idservice_plan =  $('input[name="id_service_plan"]').val();
					var idclinic =  $('input[name="id_clinic"]').val();
					var idpatient =  $('input[name="id_patient"]').val();
					var iddoctor =  $('input[name="id_doctor"]').val();
					var idward =  $('input[name="id_ward"]').val();
					var OPDIPD =  $('input[name="OPD_IPD_Edit"]:checked').val();
					var myJSON = $rootScope.itemgetEdit;
                    var lab_order_main_id = $rootScope.editId;
                    // console.log("you click Edit2");
					if(!idhospital){
							setTimeout(() => {
									$scope.$apply(function () {
                                            $scope.invalid_hospital = "Please Select Hospital"
                                            $scope.hospital = true;
                                            alert("Please Select Hospital");
									});
							},0);
							return false;
                    }
                    // console.log("you click Edit3");
					if(!idclinic){
							setTimeout(() => {
									$scope.$apply(function () {
											$scope.invalid_clinic = "Please Select Clinic"
                                            $scope.clinic = true;
                                            alert("Please Select Clinic");
									});
							},0);
							return false;
                    }
                    // console.log("you click Edit4");
					if(!iddepartment){
							setTimeout(() => {
									$scope.$apply(function () {
											$scope.invalid_departmanet = "Please Select Department"
                                            $scope.department = true;
                                            alert("Please Select Department");
									});
							},0);
							return false;
                    }
                    // console.log("you click Edit5");
					if(!iddoctor){
							setTimeout(() => {
									$scope.$apply(function () {
											$scope.invalid_doctor = "Please Select Doctor"
                                            $scope.doctor = true;
                                            alert("Please Select Doctor");
									});
							},0);
							return false;
                    }
                    // console.log("you click Edit6");
					if(!idward){
                        // console.log("you click Edit6.1");
							setTimeout(() => {
                                // console.log("you click Edit6.2");
									$scope.$apply(function () {
                                        // console.log("you click Edit6.3");
										$scope.invalid_ward = "Please Select Ward"
                                        $scope.ward = true;
                                        // console.log('ward', true,$scope.invalid_ward)
                                        // alert("Please Select Ward");
									});
                            },0);
                            $scope.invalid_ward = "Please Select Ward"
                            $scope.ward = true;
                            console.log('ward', true,$scope.invalid_ward)
							// return false;
                    }
                    console.log("you click Edit7");
					if(!idpatient){
							setTimeout(() => {
									$scope.$apply(function () {
											$scope.invalid_patient = "Please Select Patient!"
                                            $scope.patient = true;
                                            alert("Please Select Patient");
									});
							},0);
							return false;
                    }
                    console.log("you click Edit8", $rootScope.itemgetEdit);
					if($rootScope.itemgetEdit.length == 0){
							setTimeout(() => {
									$scope.$apply(function () {
											$scope.invalid_labitem = "Please Select Lab Item"
                                            $scope.labItemEdit = true;
                                            alert("Please Select Lab Item");
									});
							},0);
							return false;
                    }
                    // return false;
                    console.log("you click Edit9");
                    console.log("lab_order_main_id", lab_order_main_id);
                    console.log("idhospital", idhospital);
                    console.log("iddepartment", iddepartment);
                    console.log("idservice_plan", idservice_plan);
                    console.log("idclinic", idclinic);
                    console.log("idpatient", idpatient);
                    console.log("iddoctor", iddoctor);
                    console.log("idward", idward);
                    console.log("OPDIPD", OPDIPD);

                    var update_data = [];

                    update_data.push({'lab_order_main_id':lab_order_main_id});
                    update_data.push({'idhospital':idhospital});
                    update_data.push({'idclinic':idclinic});
                    update_data.push({'iddepartment':iddepartment});
                    update_data.push({'iddoctor':iddoctor});
                    update_data.push({'idward':idward});
                    update_data.push({'idpatient':idpatient});
                    update_data.push({'idservice_plan':idservice_plan});
                    update_data.push({'OPDIPD':OPDIPD});
                    update_data.push({'lad_groyp':$rootScope.itemgetEdit});
                    console.log ('update_data', update_data);

                    // return false;
					var url = $(this).data('url');
					var url2 = $(this).data('url2');
					console.log("url",url," url2",url2);
					$.ajax({
							type: "POST",
							headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							url: url,
							dataType : "JSON",
							data: {
											id_lab_order_main:lab_order_main_id,
                                            idhospital:idhospital,
                                            idclinic:idclinic,
                                            iddepartment:iddepartment,
                                            iddoctor:iddoctor,
                                            idward:idward,
                                            idpatient:idpatient,
											idservice_plan:idservice_plan,
                                            OPDIPD:OPDIPD,
                                            lad_groyp:$rootScope.itemgetEdit
							},
							success:function(res){
                                console.log('res1', res);
								// if(res.success){
								// 	$.ajax({
								// 		type: "POST",
								// 		headers: {
								// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								// 		},
								// 		url: url2,
								// 		data: {
								// 			id_lab_order_main:lab_order_main_id,
								// 			Data:myJSON
								// 		},
								// 		success:function(res){
								// 		    if(res.success){
								// 				$("#modal-recieveLab-edit").modal('hide');
                                //                  //getLabOrderMain();
                                //                  console.log('res2', res);
								// 		    }
								// 	    }
								//     });
								// }
							},
							error : function(xhr,error){
								console.log(xhr.responseJSON)
							}
                    });
                    // return false;
			});

		});
    //modal appointment,tat and list data LabOrderMain
    
    app.controller('RecieveLabDataViewController', function ($scope,$http,$rootScope,$timeout){
                $scope.isFiltered = false;
                console.log ('scope.isFiltered.3', $scope.isFiltered);
                $rootScope.newPosts = [];
                $scope.ShowAll = function(){
                    $scope.isFiltered = false;
                    console.log ('scope.isFiltered.4', $scope.isFiltered);
                }
                var iditem=[];
				$scope.labSubGroupItems=[];
				$scope.labSubId=0;
				$scope.SelectLabSubGroupItem = function(id){
                    $http.get('/main/SelectLabOrderMain').then(function(response){
                        console.log("getLabOrderMain2");
                        // $scope.DataLabSubGroupItem = [];
                        setTimeout(function () {
                            $scope.$apply(function () {
                                $rootScope.AllDataLabOrderMain = response.data.data;
                                console.log('fdvdfvdf',$rootScope.AllDataLabOrderMain)
                            });
                        }, 0);
                    }).catch(error => {
                        console.log(error)
                    });
                    console.log ('scope.isFiltered.1', $scope.isFiltered);
                    console.log('SelectLabSubGroupItem:',id);
                    $scope.labSubId = id;
                    // $rootScope.newPosts = [];
					$http.get('/main/SelectLabSubGroupItemById/'+id).then(function(response){
                        $scope.Se = id;
                        SE_SelectLabSubGroupItem = id;
                        $scope.labSubGroupItems = response.data.data;
                        console.log('sub group items data',$scope.labSubGroupItems);
                        $rootScope.newPosts = [];
                        for(var i=0; i<$rootScope.AllDataLabOrderMain.length; i++){
                            for(var j=0; j<$rootScope.AllDataLabOrderMain[i].detail.length; j++){
                                for(var k=0; k<$scope.labSubGroupItems.length; k++){
                                // console.log($scope.posts[i].detail[j])
                                if($rootScope.AllDataLabOrderMain[i].detail[j].id_lab_item == $scope.labSubGroupItems[k].id_lab_item){
                                    if(!$rootScope.newPosts.includes($rootScope.AllDataLabOrderMain[i])){
                                        $rootScope.newPosts.push($rootScope.AllDataLabOrderMain[i]);
                                    }
                                    // console.log('true');
                                    // console.log('newpost after filter'$rootScope.newPosts)
                                } else {

                                }
                                
                              }
                            }
                            
                        }
                        console.log('newposts length', $rootScope.newPosts);
                        $scope.isFiltered = true;
					});
				}
        $http.get('/main/LabSubGroupItem').then(function(response){
            $scope.LabSubGroup = response.data.data;
            // console.log('$scope.labSubgroup',$scope.LabSubGroup);
			$rootScope.LabSubGroupEdit = response.data.data;
            // console.log('$scope.labSubId',$scope.labSubId);
            $("#labgroupitem").click(function(){
                $scope.itemget = [];
                $scope.DataLabSubGroupItem = [];
                $scope.labItem = false;
                iditem = [];
                var datalab = $(this).val();
				console.log('datalab',datalab);
                if(datalab !== ""){
                    $http.get('/main/SelectLabSubGroupItem/'+datalab).then(function(response){
						// $http.get('/main/SelectLabSubGroupItemById/'+$scope.labSubId).then(function(response){
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
		$scope.showExcel = false;
		$scope.limitRowExport =0;
        $scope.currentPage = 1;
        $scope.printBarCode = false;
        $scope.listitemreason = [];
        $scope.Reg = function(){
            $('select[name="labgroupitem"]').val("");
            $('input:checkbox').removeAttr('checked');
		    $('select[name="profileTest"]').val("");
			$("#modal-recieveLab-reg").modal('show');
        }
		$scope.SearchStatusChange = function (){
            getLabOrderMain();
            // $scope.SelectLabSubGroupItem();
			console.log('SearchStatuschange: ',$scope.SearchStatus.status);
			$scope.printBarCode = false;
			angular.forEach($rootScope.AllDataLabOrderMain, function (item) {
					item.selected = false;
			});
			setTimeout(() => {
					$rootScope.$apply();
			}, 0);
			//labItem = []
			$scope.selectedAll = false;
			labItem.length = 0;
		}
        $scope.checkAll = function(event){
					console.log('AllDataLabOrderMain:',$rootScope.AllDataLabOrderMain);
            if(event.target.checked){
                var resultsOnPage = 0;
                if($rootScope.AllDataLabOrderMain.length >= $scope.currentPage*10){
                    resultsOnPage = 10;
                } else {
                    if($rootScope.AllDataLabOrderMain.length < 10){
                        resultsOnPage = $rootScope.AllDataLabOrderMain.length;
                    }else{
                        resultsOnPage = $rootScope.AllDataLabOrderMain.length-10;
                    }
                }
                /**index start at 0 */
                var started = (10 * $scope.currentPage) +1
                    started = started <= 10 ? 0 : started - 10;
                    started = started == 0 ? started : started - 1;
                var ending = (10 * $scope.currentPage) + resultsOnPage;
                    ending = (ending - 10) - 1;
										var selectStatus = 0;//old is 1 change to 0 cause myanmar Version
                angular.forEach($rootScope.AllDataLabOrderMain, function (item,index) {
									if($scope.SearchStatus!=null){
										//if($scope.SearchStatus.status==1&&item.status==1){
										if($scope.SearchStatus.status==selectStatus&&item.status==selectStatus&&item.print_barcode_time==null){
											console.log("test SearchStatus = 1 barcode:",item.lab_order_no);
											item.selected = true;
											labItem.push({
													id : item.id_lab_order_main,
													barcode : item.lab_order_no
											});
										}else if(index >= started && index <= ending && item.receive_date == null&& item.status==selectStatus&&$scope.SearchStatus.status==selectStatus&&item.print_barcode_time==null){
	                        item.selected = true;
	                        labItem.push({
	                            id : item.id_lab_order_main,
	                            barcode : item.lab_order_no
	                        });
													console.log("else if index>=startedbarcode:",item.lab_order_no);
	                    }else{
												//if(index >= started && index <= ending && item.receive_date != null&& item.status==selectStatus){
												console.log('index:'+index+',start:'+started+',ending:'+ending);
												if(index >= started && index <= ending&& item.receive_date == null &&item.status==selectStatus&&item.print_barcode_time==null){
			                        item.selected = true;
			                        labItem.push({
			                            id : item.id_lab_order_main,
			                            barcode : item.lab_order_no
			                        });
															console.log("else index>=startedbarcode: in if",item.lab_order_no);
			                    }
												console.log("else index>=startedbarcode:",item.lab_order_no);
											}

									}else{
										//if(index >= started && index <= ending && item.receive_date != null&& item.status==selectStatus){
										console.log('index:'+index+',start:'+started+',ending:'+ending);
										if(index >= started && index <= ending &&  item.status==selectStatus&& item.print_barcode_time == null){
	                        item.selected = true;
	                        labItem.push({
	                            id : item.id_lab_order_main,
	                            barcode : item.lab_order_no
	                        });
													console.log("else and else if index>=started barcode:",item.lab_order_no);
	                    }
									}
                });
                setTimeout(() => {
                    $rootScope.$apply();
                }, 0);
                $scope.printBarCode = false;
            }else{
                $scope.printBarCode = false;
                angular.forEach($rootScope.AllDataLabOrderMain, function (item) {
                    item.selected = false;
                });
                setTimeout(() => {
                    $rootScope.$apply();
                }, 0);
                //labItem = []
								labItem.length = 0;
            }

            setTimeout(() => {
                $scope.labChecked = labItem;
                $scope.$apply();
            }, 0);
        }

        $scope.Speciment = function(){
			$("#modal-recieveLab-specimentNote").modal('show');
        }

        /**DOM this state is ready has load content*/
        $timeout(function(){
            $http.get('/main/SelectLabOrderMain').then(function(response){
                console.log("getLabOrderMain3");
                setTimeout(function () {
                    $scope.$apply(function () {
                        $rootScope.AllDataLabOrderMain = response.data.data;
                    });
                }, 0);
            }).catch(err => {
                console.log(err)
            });
        });


        function getLabOrderMain(){
            $http.get('/main/SelectLabOrderMain').then(function(response){
                console.log("getLabOrderMain4", SE_SelectLabSubGroupItem);
                if (SE_SelectLabSubGroupItem != null){
                    $scope.SelectLabSubGroupItem(SE_SelectLabSubGroupItem);
                }
                // $scope.SelectLabSubGroupItem(3);
                setTimeout(function () {
                    $scope.$apply(function () {
                        $rootScope.AllDataLabOrderMain = response.data.data;
                    });
                }, 0);
            });
        }

        $scope.Barcode = function(id,Labno){
            $scope.selectedMain = id;
            // console.log('Barcode');
            $http.get('/main/DataPatient/'+id).then(function(response){
                $scope.AllDataPatient = response.data.data;

                if(!$scope.AllDataPatient[0]['receive_date']){
                    $scope.printBarCode = false;
                    console.log('01');
                }else{
                    $scope.printBarCode = false;
                    console.log('02');
                }
            });
            console.log('--------------------------------------');
            // ปิดไว้ก่อน
            // console.log('/main/DataLabDetail/', $id);
			// 			$http.get('/main/DataLabDetail/'+id).then(function(response){
            //                 $scope.LabDetail = response.data.data;
            //                 console.log('selected', $scope.LabDetail);
			// 					if($scope.LabDetail!=null){
            //                         console.log('lab_item_id');
            //                         var lab_item_id = $scope.LabDetail[0].id_lab_specimen_item;
            //                         console.log('lab_item_id',lab_item_id);
			// 						$http.get('/main/GetSpecimenById/'+lab_item_id).then(function(response){
			// 							$scope.spcimenData = response.data.data;
			// 							//console.log('$scope.specimen',response.data.data);
			// 						});
			// 					}
			// 					//console.log('$scope.LabDetail',$scope.LabDetail);

            // });
            $('textarea').val("");
            $("input[name='User']").val("");
            $("input[name='Datereject']").val("");
            $("input[name='Timereject']").val("");
            $("input[name='Datereceive']").val("");
            $("input[name='Timereceive']").val("");
            $scope.LabNo = Labno;
            $scope.idLab = id;
            $scope.listitemreason = [];
            console.log('/main/SelectIDLabOrderMain/'+ id)
			$http.get('/main/SelectIDLabOrderMain/'+ id).then(function(response){
                console.log('933 response', response.data);
                    $scope.AllDataLabOrder = response.data.data;
                    var datereject =  "   ";
                    var timetect;
                    var DateRej;
                    var daterej;
                    var timerej;
                    var DateRec;
                    var daterec;
                    var timerec;
                    if($scope.AllDataLabOrder){
                        // if($scope.AllDataLabOrder.receive_date){
                        //     datereject = $scope.AllDataLabOrder.receive_date;
                        // }
                        if($scope.AllDataLabOrder.order_date){
                            datereject = $scope.AllDataLabOrder.order_date;
                        }
                        timetect = $scope.AllDataLabOrder.specimen_item_reject_date;
                        DateRej = timetect.split(" ");
                        daterej  = DateRej[0];
                        timerej  = DateRej[1];
                        DateRec = datereject.split(" ");
                        daterec  = DateRec[0];
                        timerec  = DateRec[1];
                    }

                    if($scope.AllDataLabOrder){
                        $scope.item = $scope.AllDataLabOrder.item;
                        $("input[name='User']").val($scope.AllDataLabOrder.prefix_name +' '+ $scope.AllDataLabOrder.fname +' '+ $scope.AllDataLabOrder.lastname);
                        $("input[name='Datereject']").val(daterej);
                        $("input[name='Timereject']").val(timerej);
                        var daterec  = DateRec[0];
                        $("input[name='Datereceive']").val(daterec);
                        $("input[name='Timereceive']").val(timerec);
                        var dataText = "";
                        $scope.item.forEach(function(val,key) {
                            dataText +=val+" ";
                        });
                        $('textarea').val(dataText);
                    }
                
                
                
            });
        }
        /**
         * ###################
         * search
         * ###################
         */
        $scope.searchLab = function(){
            var date1 = $("input[name='fromdate']").val();
            var date2 = $("input[name='todate']").val();
            var hn = $("input[name='hn']").val();
            var labNo = $("input[name='labNo']").val();
            // console.log('lab no is ::' , labNo);
            $http.get('/main/getLabOrder?dateS='+date1+'&dateEnd='+date2+'&hn='+hn+'&labNo='+labNo+'&GroupItem='+SE_SelectLabSubGroupItem)
            .then(function(response){
                setTimeout(function () {
                    $scope.$apply(function () {
                        $rootScope.AllDataLabOrderMain = response.data.data;
                        console.log($rootScope.AllDataLabOrderMain);
                        $scope.isFiltered = false;
                    });
                }, 0);
            }).catch(error => {
                console.log(error);
            });
            // getLabOrderMain($scope.selectedItemId);
      }//mak

      function searchLabs(){
        $timeout(function(){
            var date1 = $("input[name='fromdate']").val();
            var date2 = $("input[name='todate']").val();
            var hn = $("input[name='hn']").val();
            var labNo = $("input[name='labNo']").val();
            $http.get('/main/getLabOrder?dateS='+date1+'&dateEnd='+date2+'&hn='+hn+'&labNo='+labNo+'&GroupItem='+SE_SelectLabSubGroupItem)
            .then(function(response){
                 setTimeout(function () {
                    $scope.$apply(function () {
                        $rootScope.AllDataLabOrderMain = response.data.data;
                        $rootScope.newPosts = response.data.data;
                        $scope.isFiltered = true;
                        $scope.isFiltered = false;
                    });
                }, 0);
            }).catch(error => {
                console.log(error);
            });
            getLabOrderMain($scope.selectedItemId);
        });
      }
		$scope.appointData;
		$scope.Appointment = function(data){
            $http.get('/main/SelectIDLabOrderMainPatiant/'+ data).then(function(response){
                 $scope.subid = response.data.data;
                $("input[name='fullname']").val($scope.subid[0].patient.prefix['prefix_name'] +' '+ $scope.subid[0].patient['patient_firstname'] +' '+ $scope.subid[0].patient['patient_lastname']);
                $("input[name='laborderno']").val($scope.subid[0].lab_order_no);
                $("input[name='id_lab_order_main']").val($scope.subid[0].id_lab_order_main);

                $("#age_app").val($scope.subid[0].patient['age']);
                $("#sex_app").val($scope.subid[0].patient['gender']);
            }).catch(error => {
                console.log(error);
            });

            $("#modal-recieveLab-appointment").modal('show');
            document.querySelector("#datepicker").valueAsDate = new Date();

        }
        $scope.doctor = function(){
            $("#modal-doctor").modal('show');
        }
        $scope.Deldoctor = function(){
            $('input[name="doctor_name"]').val("");
            $('input[name="id_doctor"]').val("");
            $('input[name="doctor_name"]').prop('disabled', false);
        }
        $scope.Tat = function(){
			$("#modal-recieveLab-tat").modal('show');
        }
        /**
         * ###############
         * Recevice Button
         * ###############
         */
        $scope.ReceiveLabOrderMain = function(data){
            // console.log(data);
            console.log('ReceiveLabOrderMain');
            $rootScope.sub_id = data;
            $("#modal-askSave").find('h3').text("Do you want to Receive lab?");
            $("#modal-askSave").modal('show');
            $(document).keypress(function(e) {
                if ($("#modal-askSave").hasClass('in') && (e.keycode == 13 || e.which == 13)) {
                    $("#confirm-Asksave").click();
                    console.log('confirmed');
                }
            })
        }

        $("#confirm-Asksave").click(function(){
            console.log("confirm-Asksave");
            $http.get('/main/ReceiveLabOrder/'+ $rootScope.sub_id ).then(function(){
                setTimeout(() => {
                    $("#modal-askSave").modal('hide');
                    //getLabOrderMain();
                    searchLabs();
                }, 0);
            }).catch(error => {
                console.log(error)
            });
        });

        $scope.pageChanged = function(){
            if($scope.labChecked){
                angular.forEach($scope.labChecked, function (checked) {
                    angular.forEach($rootScope.AllDataLabOrderMain, function (item) {
                        if(item.id_lab_order_main === checked['id']){
                            setTimeout(() => {
                                item.selected = true;
                            }, 0);
                        }
                    });
                });
            }
        }
        var labItem = [];
        $scope.toggleRecieve = function(id, barcode, event){
            if(event.target.checked){
                labItem.push({
                    id : id,
                    barcode : barcode
                })
            }else{
                labItem = labItem.filter(function(arr){
                    return arr.id != id;
                });
            }
            $scope.labChecked = labItem;
        }

        $scope.submitBarcode = function(){
            if($scope.labChecked.length > 0){
                $("#labSubmit").submit();
                setTimeout(() => {
                    window.location.reload();
                    /*getLabOrderMain();
                    searchLabs();
                    $scope.labChecked = [];
                    labItem = [];
                    $scope.selectedAll = false;*/
                }, 0);
            }
        }


        $scope.DelLabOrderMain = function(data){
            $scope.subid = data;
            $("#modal-askDelete").modal('show');
            $("#confirm").click(function(){
                $http.get('/main/DeleteLabOrder/'+ $scope.subid ).then(function(response){
                    setTimeout(() => {
                        //getLabOrderMain();
                        searchLabs();
                        $("#modal-askDelete").modal('hide');
                    }, 0);
                }).catch(error => {
                    console.log(error)
                });
            });
        }
				$rootScope.datalab="";
				$rootScope.itemgetEdit = [];
				$rootScope.DataLabSubGroupItemEdit = [];
				$rootScope.editId="";
				$scope.labItemEdit = false;
				$scope.EditLabOrderDetail = function(data){
					console.log("in scope Edit Lab Order Detail");
            $rootScope.editId= data;
						$rootScope.AutoCheck = [];
                        $("#modal-recieveLab-edit").modal('show');
                        console.log('/main/RecieveEditLabOrderDetail/'+ $rootScope.editId);
                $http.get('/main/RecieveEditLabOrderDetail/'+ $rootScope.editId).then(function(response){
									$scope.EditLabOrder = response.data.data;
									console.log("EditLabOrder data:",$scope.EditLabOrder);
									//set old data for editId
									$('input[name="hospital_name"]').val($scope.EditLabOrder['hospital'][0]['hospital_name']);
									$('input[name="id_hospital"]').val($scope.EditLabOrder['hospital'][0]['id_hospital']);
									$('input[name="clinic_name"]').val($scope.EditLabOrder['clinic'][0]['clinic_name']);
									$('input[name="id_clinic"]').val($scope.EditLabOrder['clinic'][0]['id_clinic']);
									$('input[name="department_name"]').val($scope.EditLabOrder['department'][0]['department_name']);
                                    $('input[name="id_department"]').val($scope.EditLabOrder['department'][0]['id_department']);
                                    // console.log('test', $scope.EditLabOrder);
                                    console.log('test', $scope.EditLabOrder);
									if ($scope.EditLabOrder['doctor'][0]['prefix']!= null){
                                        $scope.doctorfullname = $scope.EditLabOrder['doctor'][0]['prefix']['prefix_name']+" "+$scope.EditLabOrder['doctor'][0]['doctor_name']+" "+$scope.EditLabOrder['doctor'][0]['doctor_lastname'];
                                    }
									$('input[name="doctor_name"]').val($scope.doctorfullname);
                                    $('input[name="id_doctor"]').val($scope.EditLabOrder['doctor'][0]['id_doctor']);
                                    // console.log('--ward', $scope.EditLabOrder['ward']);
                                    // console.log('count ward', $scope.EditLabOrder['ward'].length);
                                    if ($scope.EditLabOrder['ward'].length != 0){
                                        $('input[name="ward_name"]').val($scope.EditLabOrder['ward'][0]['ward_name']);
                                        $('input[name="id_ward"]').val($scope.EditLabOrder['ward'][0]['id_ward']);
                                    }
									$('input[name="hn"]').val($scope.EditLabOrder['patient'][0]['hn']);
									$('input[name="id_patient"]').val($scope.EditLabOrder['patient'][0]['id_patient']);
									$('input[name="prefix_name"]').val($scope.EditLabOrder['patient'][0]['prefix']['prefix_name']);
									$('input[name="patient_firstname"]').val($scope.EditLabOrder['patient'][0]['patient_firstname']);
									$('input[name="patient_lastname"]').val($scope.EditLabOrder['patient'][0]['patient_lastname']);
									$('input[name="age"]').val($scope.EditLabOrder['patient'][0]['age']);
									$('input[name="gender"]').val($scope.EditLabOrder['patient'][0]['gender']);
									var $radios = $('input[name="OPD_IPD_Edit"]');
									if($scope.EditLabOrder['labEdit'][0]['id_sevice_point']==1){
												 $radios.filter('[value=1]').prop( "checked", true );
												 $radios.filter('[value=2]').prop( "checked", false );
												//  console.log("in service point= 1 OPD_IPD_Edit val =" ,$('input[name="OPD_Edit"]:checked').val());
									}else{
										$radios.filter('[value=2]').prop( "checked", true );
										$radios.filter('[value=1]').prop( "checked", false );
										// console.log("in service point= 2 OPD_IPD_Edit val =" ,$('input[name="OPD_Edit"]:checked').val());
									}

									if($scope.EditLabOrder['servicePlan'][0]!=null){
										$('input[name="service_plan_name"]').val($scope.EditLabOrder['servicePlan'][0]['service_plan_name']);
										$('input[name="id_service_plan"]').val($scope.EditLabOrder['servicePlan'][0]['id_service_plan']);
									}

									//$("#department_app").val('');
									//$("#special_app").val('');
									//$("#hospital_app").val('');
                                    //-----------end set old data--------------------------------
                                    // console.log ('labItemTypeMaster', $scope.EditLabOrder['labItemTypeMaster']);
                                    // if ($scope.EditLabOrder['labItemTypeMaster'].length != 0){
                                    //     console.log ('Nooooooooooo', $scope.EditLabOrder['labItemTypeMaster'][0]['item_type_name']);
                                    //     $rootScope.datalab = $scope.EditLabOrder['labItemTypeMaster'][0]['item_type_name'];
                                    //     console.log('เช็คค', $scope.EditLabOrder['labItemTypeMaster']);
                                    //     $http.get('/main/SelectLabSubGroupItem/'+$rootScope.datalab).then(function(response){
                                    //         $rootScope.DataLabSubGroupItemEdit = response.data.data;
                                    //         // console.log('/main/SelectLabSubGroupItem/',$rootScope);
                                    //     });  
                                    // }


                                    console.log("ทดสอบ", $scope.EditLabOrder);
                                    console.log("full_lab", $scope.EditLabOrder['full_labOrderitem']);
                                    var iditem = [];
                                    if ($scope.EditLabOrder['full_labOrderitem'].length > 0) {
                                        var lab_sub_group_code = $scope.EditLabOrder['labSubGroupItemMaster'][0]['lab_sub_group_code'];
                                        var lab_sub_group_name = $scope.EditLabOrder['labSubGroupItemMaster'][0]['lab_sub_group_name'];
                                        console.log("lab_sub_group_code ->", lab_sub_group_code, '| lab_sub_group_name ->', lab_sub_group_name);

                                        // $rootScope.DataLabSubGroupItemEdit = full_lab;
                                        $rootScope.lab_sub_group_name = "Test";
                                        console.log('FameTest', '/main/SelectLabSubGroupItem/'+lab_sub_group_name)
                                        $rootScope.datalab = "Test";
                                        $http.get('/main/SelectLabSubGroupItem/'+lab_sub_group_name).then(function(response){
                                            $rootScope.DataLabSubGroupItemEdit = response.data.data;
                                            console.log('FameTest', $rootScope.DataLabSubGroupItemEdit);
                                            $rootScope.DataLabSubGroupItemEdit.forEach(function(value,key){
                                                // console.log('data ->',key ,value['id_lab_item']);
                                                $scope.EditLabOrder['full_labOrderitem'].forEach(function(value2,key2){
                                                    // console.log(value2['id_lab_item'] , key2);
                                                    if (value['id_lab_item'] == value2['id_lab_item']){
                                                        console.log(value2['id_lab_item'] , " == ", value['id_lab_item']);
                                                        $rootScope.AutoCheck[key] = true;
                                                        iditem.push(value2['id_lab_item']);
                                                        // $rootScope.DataLabSubGroupItemEdit[key].disableCheck = true;
                                                    }
                                                });
                                            });
                                            $rootScope.itemgetEdit = iditem;
                                            console.log ('fun 1');
                                            $rootScope.checkEdit = function(val){
                                                console.log ('fun 2');
                                                if(iditem.indexOf(val) == -1){
                                                        iditem.push(val);
                                                        console.log ('fun 3');
                                                }else{
                                                    var index = iditem.indexOf(val);
                                                    if (index !== -1) {
                                                        iditem.splice(index, 1);
                                                        console.log ('fun 4');
                                                    }
                                                }
                                                console.log ('iditem => ', iditem);
                                                // $rootScope.itemgetEdit = iditem;
                                                // angular.forEach($scope.EditLabOrder['labEdit'][0]['detail'], function (item,index) {
                                                //     console.log ('fun 5');
                                                //     for(var i =0;i < $rootScope.DataLabSubGroupItemEdit.length; i++){
                                                //         console.log ('fun 6');
                                                //         if(item.id_lab_item==$rootScope.DataLabSubGroupItemEdit[i]['id_lab_item']){
                                                //             $rootScope.AutoCheck[i] = true;
                                                //             if(iditem.indexOf(item.id_lab_item) == -1){
                                                //                 iditem.push(item.id_lab_item);
                                                //             }else{
                                                //                 var index = iditem.indexOf(item.id_lab_item);
                                                //                 if (index !== -1) {
                                                //                     iditem.splice(index, 1);
                                                //                 }
                                                //             }
                                                //             $rootScope.itemgetEdit = iditem;
                                                //         }
                                                //         if($scope.EditLabOrder['labitemGroup'][0]['id_lab_specimen_item']==$rootScope.DataLabSubGroupItemEdit[i]['id_lab_specimen_item']){
                                                //             $rootScope.DataLabSubGroupItemEdit[i].disableCheck = false;
                                                //         }else{
                                                //             $rootScope.DataLabSubGroupItemEdit[i].disableCheck = true;
                                                //         }
                                                //     }
                                                // });
                                            }
                                        });
                                    }
                                    console.log ('fun 7');
                                    // if ($scope.EditLabOrder['labitemGroup'][0]['sub_group'] != null){
                                    //     console.log ('fun -99');
                                    //     $rootScope.datalab=	$scope.EditLabOrder['labitemGroup'][0]['sub_group']['lab_sub_group_name'];//auto select group lab item

                                    //     $http.get('/main/SelectLabSubGroupItem/'+$rootScope.datalab).then(function(response){
                                    //             $rootScope.DataLabSubGroupItemEdit = response.data.data;
                                    //             console.log('/main/SelectLabSubGroupItem/',$rootScope.datalab);
                                    //             // console.log("DataLabSubGroupItemEdit",$rootScope.DataLabSubGroupItemEdit);
                                    //             var iditem = [];
                                    //             $rootScope.checkEdit = function(val){
                                    //                 // console.log("in checkEdit function:",$rootScope.itemgetEdit);
                                    //                     if(iditem.indexOf(val) == -1){
                                    //                             iditem.push(val);
                                    //                     }else{
                                    //                             var index = iditem.indexOf(val);
                                    //                             if (index !== -1) {
                                    //                                     iditem.splice(index, 1);
                                    //                             }
                                    //                     }
                                    //                     $rootScope.itemgetEdit = iditem;
                                    //                     // console.log("$rootScope.itemgetEdit:",$rootScope.itemgetEdit);
                                    //             }
                                    //             angular.forEach($scope.EditLabOrder['labEdit'][0]['detail'], function (item,index) {
                                    //                 // console.log("$rootScope.itemgetEdit:",$rootScope.itemgetEdit);
                                    //                 // console.log("item id lab item:",item.id_lab_item);
                                    //                 for(var i =0;i < $rootScope.DataLabSubGroupItemEdit.length; i++){
                                    //                     // console.log("Data Group Item:",$rootScope.DataLabSubGroupItemEdit[i]);
                                    //                         if(item.id_lab_item==$rootScope.DataLabSubGroupItemEdit[i]['id_lab_item']){
                                    //                             $rootScope.AutoCheck[i] = true;
                                    //                             if(iditem.indexOf(item.id_lab_item) == -1){
                                    //                                 iditem.push(item.id_lab_item);
                                    //                         }else{
                                    //                                 var index = iditem.indexOf(item.id_lab_item);
                                    //                                 if (index !== -1) {
                                    //                                         iditem.splice(index, 1);
                                    //                                 }
                                    //                         }
                                    //                         $rootScope.itemgetEdit = iditem;
                                    //                                 // console.log("AutoCheck["+i+"]:",$rootScope.AutoCheck[i] );
                                    //                                 // console.log("$rootScope.itemgetEdit",$rootScope.itemgetEdit);
                                    //                         }
                                    //                         if($scope.EditLabOrder['labitemGroup'][0]['id_lab_specimen_item']==$rootScope.DataLabSubGroupItemEdit[i]['id_lab_specimen_item']){
                                    //                             $rootScope.DataLabSubGroupItemEdit[i].disableCheck = false;
                                    //                             // console.log("Data Group Item:sss",$rootScope.DataLabSubGroupItemEdit[i]);
                                    //                             // console.log("Data Group Item:",$rootScope.DataLabSubGroupItemEdit[i].disableCheck);
                                    //                         }else{
                                    //                             $rootScope.DataLabSubGroupItemEdit[i].disableCheck = true;
                                    //                         }
                                    //                     }
                                    //             });
                                    //     });
                                    // }
                });


				            // $scope.LabSubGroupEdit = response.data.data;
							// console.log("LabSubGroupEdit",$scope.LabSubGroupEdit);
				            $("#labgroupitemEdit").change(function(){
											console.log("labgroupitemEdit Change");
											//$scope.OnChangeLabGroupItem();
											$rootScope.AutoCheck.length = 0;//clear selection when change
                                            var iditem = [];
                                            console.log("rootScope.datalab", $rootScope.datalab);
											$rootScope.datalab = $(this).val();
												console.log("/main/SelectLabItemType/",$rootScope);
													$http.get('/main/SelectLabSubGroupItem/'+$rootScope.datalab).then(function(response){
                                                        // $http.get('/main/SelectLabItemType/2').then(function(response){
															$rootScope.DataLabSubGroupItemEdit = response.data.data;
                                                            console.log("DataLabSubGroupItemEdit",$rootScope.DataLabSubGroupItemEdit);
                                                            // console.log("$rootScope", $rootScope);
															$rootScope.checkEdit = function(val){ //ทำงานตอนเช็คถูก
																console.log("in checkEdit function:",$rootScope.itemgetEdit);
																	if(iditem.indexOf(val) == -1){
																			iditem.push(val);
																	}else{
																			var index = iditem.indexOf(val);
																			if (index !== -1) {
																					iditem.splice(index, 1);
																			}
																	}
                                                                    $rootScope.itemgetEdit = iditem;
                                                                    console.log('iditem', $iditem);
																	// console.log("$rootScope.itemgetEdit:",$rootScope.itemgetEdit);
															}
															angular.forEach($scope.EditLabOrder['labEdit'][0]['detail'], function (item,index) {
																// console.log("$rootScope.itemgetEdit:",$rootScope.itemgetEdit);
																// console.log("item id lab item:",item.id_lab_item);
																for(var i =0;i < $rootScope.DataLabSubGroupItemEdit.length; i++){
																	//console.log("Data Group Item:",$rootScope.DataLabSubGroupItemEdit[i]);
																		if(item.id_lab_item==$rootScope.DataLabSubGroupItemEdit[i]['id_lab_item']){
																			$rootScope.AutoCheck[i] = true;
																			if(iditem.indexOf(item.id_lab_item) == -1){
																				 iditem.push(item.id_lab_item);
																		 }else{
																				 var index = iditem.indexOf(item.id_lab_item);
																				 if (index !== -1) {
																						 iditem.splice(index, 1);
																				 }
																		 }
                                                                         $rootScope.itemgetEdit = iditem;
                                                                         console.log('iditem', $iditem);
																				// console.log("AutoCheck["+i+"]:",$rootScope.AutoCheck[i] );
																				// console.log("$rootScope.itemgetEdit",$rootScope.itemgetEdit);
																		}
																	}
															});
													}).catch(error => {
															console.log(error)
                                                    });
                                                    console.log("3rootScope.datalab", $rootScope.datalab);
                                                    $rootScope.datalab = 'trrrr';

				            });


        }
        $scope.RejectSpeciment = function(data){
            $scope.subid = data;
            // console.log('subid', $scope.subid);
            var allItem = [];
            $http.get('/main/RejectSpeciment/'+ $scope.subid ).then(function(response){
                $scope.Rej = response.data.data;
            });
            
            $http.get('/main/GetDataRejected/'+ $scope.subid ).then(function(response){
                function push(array, item) {
                    if (!array.find(({id_specimen_item_reject_note}) => id_specimen_item_reject_note === item.id_specimen_item_reject_note)) {
                      array.push(item);
                    }
                  }
                // console.log('response',response.data.data)
                for(var i=0; i<response.data.data.length; i++){
                    push($scope.listitemreason, response.data.data[i]);
                    // $scope.listitemreason.push({
                    //     id_specimen_item_reject_note: response.data.data[i].id_specimen_item_reject_note,
                    //     specimen_item_reject_note : response.data.data[i].specimen_item_reject_note
                    // });
                }
                // console.log('ksjdjhdhfh',$scope.listitemreason)
            });
			// console.log("RejectSpeciment,Data",data);
            $("#modals-recieveLab-specimentreject").modal('show');
            if($("#idtr").val() != 0 ){
                $("#addappointment").prop('disabled',false);
            }else{
                $("#addappointment").prop('disabled',true);
            }
            $("select").change(function(){
                if($("#reasonselectbox").val() != 0 ){
                    $("#btn-add").prop('disabled',false);
                }else{
                    $("#btn-add").prop('disabled',true);
                }

                $('input[name="idspecimentitem[]"]').each(function(key,item){
                    allItem.push($(item).val());
                });
                var idSelect = $(this).val();
                var check = allItem.includes(idSelect);
                if(check == true) {
                    $("#btn-add").prop('disabled',true);
                }
            });

            $scope.saveSpeciment = function(){
                var allItem = [];

                $('input[name="idspecimentitem[]"]').each(function(key,item){
                    allItem.push($(item).val());
                });
                var url = $('#addappointment').data('url');
				console.log('saveSpecimen url',url,allItem);
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    cache: false,
                    data:{allItem:allItem,id:$scope.subid},
                    success:function(msg){
                        if(msg=="success"){
                            window.location.reload();
														$("#modals-recieveLab-specimentreject").modal('hide');
														console.log('save reject specimen success');
                            // searchLabs();
                        }
                    }
                });
            }
        }

        $scope.AddReason = function(){
            var id = $("#reasonselectbox").val();
            var txt = $("#reasonselectbox option:selected").html();

                $scope.listitemreason.push({
                    id_specimen_item_reject_note: id,
                    specimen_item_reject_note : txt
                });
                var allItem = [id];

                $('input[name="idspecimentitem[]"]').each(function(key,item){
                    allItem.push($(item).val());
                });
                var idSelect = $('#reasonselectbox').val();
                var check = allItem.includes(idSelect);
                if(check == true) {
                    $("#btn-add").prop('disabled',true);
                }
        }

        $scope.DelReason = function(id){
            for(var j=0; j < $scope.listitemreason.length; j++) {
                if ($scope.listitemreason[j].id_specimen_item_reject_note == id)
                {
                    $scope.listitemreason.splice(j,1);
                }
            }
        }
		$scope.AutoReceiveBarcodeInput = "";
        $scope.AutoReceive_input = false;
        
		$scope.AutoReceive = function(){
		$scope.AutoReceive_input = !$scope.AutoReceive_input;
		setTimeout(function() {
			 $('input[name="autoReceiveInput"]').val('');
			 $('input[name="autoReceiveInput"]').focus();
		 }, 500);

		}
                
        var BarcodeLength = 9;
		$scope.OnAutoReceiveInputChange = function(){
            console.log('on change function:');
			 if($scope.AutoReceiveBarcodeInput.length==BarcodeLength){
				 	console.log('on change:',$scope.AutoReceiveBarcodeInput);
					setTimeout(function() {
						 //to do call receive date by barcode
						 $http.get('/main/ReceiveLabOrderByBarcode/'+ $scope.AutoReceiveBarcodeInput ).then(function(res){
								 setTimeout(() => {
										 //getLabOrderMain();
										 console.log('auto receive response:',res);
										 console.log('http ok: receive lab:',$scope.AutoReceiveBarcodeInput);
										 $scope.AutoReceiveBarcodeInput = "";
										 $('input[name="autoReceiveInput"]').val('');
										 $('input[name="autoReceiveInput"]').focus();
                                         searchLabs();
                                         

                                 }, 0);
                                 
                            //  console.log('asdksodkoiopo][p',$scope.selectedItemId);
                                //  $scope.itemget = [];
                                //             console.log('SeSeSe',$scope.Se);
                                //             $scope.DataLabSubGroupItem = [];
                                //             $scope.labItem = false;
                                //             iditem = [];
                                //             var id = $scope.Se;
                                //             var datalab = id;
                                //             // $scope.selectedItemId = id;
                                //             if(datalab !== ""){
                                //                     $http.get('/main/SelectLabSubGroupItemById/'+id).then(function(response){
                                //                         $scope.Se = id;
                                //                     $scope.DataLabSubGroupItem = response.data.data;
                                //                     console.log('data lab',$scope.DataLabSubGroupItem)
                                //                     $scope.check = function(val){
                                //                     console.log('check:',val);
                                //                         if(iditem.indexOf(val) == -1){
                                //                             iditem.push(val);
                                //                         }else{
                                //                             var index = iditem.indexOf(val);
                                //                             if (index !== -1) {
                                //                                 iditem.splice(index, 1);
                                //                             }
                                //                         }
                                //                         $scope.itemget = iditem;
                                //                     }
                                //                 }).catch(error => {
                                //                     console.log(error)
                                //                 });
                            //             }
						 })
						 .catch(error => {
								 console.log('on autoReceive http :',error);
								 $scope.AutoReceiveBarcodeInput="";
								 $('input[name="autoReceiveInput"]').val('');
								 $('input[name="autoReceiveInput"]').focus();
						 });
				    }, 1000);
				 }

		}
    });

    // modal list data Patient Hospital Department
	app.controller('SelectPatientController', function ($scope,$http){
        $http.get('/main/DataPatient').then(function(response){
            $scope.AllDataPatient = response.data.data;
            console.log('/main/DataPatient');
            $http.get('/main/Test').then(function(response){});
        });
        $scope.Choose = function(id){
            $http.get('/main/DataPatientLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="hn"]').val($scope.array[0].hn);
                //$('input[name="hn"]').prop('disabled', true);
                $('input[name="prefix_name"]').val($scope.array[0].prefix['prefix_name']);
                $('input[name="prefix_name"]').prop('disabled', true);
                $('input[name="patient_firstname"]').val($scope.array[0].patient_firstname);
                $('input[name="patient_firstname"]').prop('disabled', true);
                $('input[name="patient_lastname"]').val($scope.array[0].patient_lastname);
                $('input[name="patient_lastname"]').prop('disabled', true);
                $('input[name="age"]').val($scope.array[0].age);
                $('input[name="age"]').prop('disabled', true);
                $('input[name="gender"]').val($scope.array[0].gender);
                $('input[name="gender"]').prop('disabled', true);
                $('input[name="id_patient"]').val($scope.array[0].id_patient);
            });
        }
    });
    app.controller('SelectHospitalController', function ($scope,$http){
        $http.get('/main/DataHospital').then(function(response){
            $scope.AllDataHospital = response.data.data;
        });
        $scope.Choose = function(id){
            $http.get('/main/DataHospitalLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="hospital_name"]').val($scope.array[0].hospital_name);
                $('input[name="hospital_name"]').prop('disabled', true);
                $('input[name="id_hospital"]').val($scope.array[0].id_hospital);
            });
        }
    });
    app.controller('SelectDepartmentController', function ($scope,$http){
        $http.get('/main/DataDepartment').then(function(response){
            $scope.AllDataDepartment = response.data.data;
        });
        $scope.Choose = function(id){
            $http.get('/main/DataDepartmentLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="department_name"]').val($scope.array[0].department_name);
                $('input[name="department_name"]').prop('disabled', true);
                $('input[name="id_department"]').val($scope.array[0].id_department);
            });
        }
    });
    app.controller('SelectClinicController', function ($scope,$http){
        $http.get('/main/DataClinic').then(function(response){
            $scope.AllDataClinic = response.data.data;
        });
        $scope.Choose = function(id){
            $http.get('/main/DataClinicLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="clinic_name"]').val($scope.array[0].clinic_name);
                $('input[name="clinic_name"]').prop('disabled', true);
                $('input[name="id_clinic"]').val($scope.array[0].id_clinic);
            });
        }
    });
    app.controller('SelectDoctorController', function ($scope,$http){
        $('input[name="doctor_name"]').prop('disabled', true);
        $('input[name="fullname"]').prop('disabled', true);
        $('input[name="laborderno"]').prop('disabled', true);
        $http.get('/main/DataDoctor').then(function(response){
            $scope.AllDataDoctor = response.data.data;
        });

        $scope.Choose = function(id){
            $("#modal-doctor").modal('hide');
            $http.get('/main/DataDoctorLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $scope.fullname = $scope.array[0].prefix['prefix_name']+" "+$scope.array[0].doctor_name+" "+$scope.array[0].doctor_lastname;
                $('input[name="doctor_name"]').val($scope.fullname);
                $('input[name="id_doctor"]').val($scope.array[0].id_doctor);
                $('#hospital_app').val($scope.array[0]['hospital']['hospital_name'])
                $('#special_app').val($scope.array[0]['specialty']['specialty_name'])
                $('#department_app').val($scope.array[0]['department']['department_name'])
            });
        }
    });
    app.controller('SelectServicePlanController', function ($scope,$http){
        $http.get('/main/DataServicePlan').then(function(response){
            $scope.AllDataServicePlan = response.data.data;
        });
        $scope.Choose = function(id){
            $http.get('/main/DataServicePlanLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="service_plan_name"]').val($scope.array[0].service_plan_name);
                $('input[name="service_plan_name"]').prop('disabled', true);
                $('input[name="id_service_plan"]').val($scope.array[0].id_service_plan);
            });
        }
    });
    app.controller('SelectWardController', function ($scope,$http){
        $http.get('/main/DataWard').then(function(response){
            $scope.AllDataWard = response.data.data;
        });
        $scope.Choose = function(id){
            $http.get('/main/DataWardLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="ward_name"]').val($scope.array[0].ward_name);
                $('input[name="ward_name"]').prop('disabled', true);
                $('input[name="id_ward"]').val($scope.array[0].id_ward);
            });
        }
    });
})();
