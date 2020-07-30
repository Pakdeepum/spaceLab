
(function () {
	'use strict';
    var app = angular.module('application', []);

    app.directive("modalLabItem", function () {
        return {
            restrict: "A",
            link: function (scope, element, attrs) {
                $(element).bind("hide.bs.modal", function () {
                    $("#hospital1").val("0");
										$("#doctor1").val("0");
                    $("#visit1").val("0");
                    $("#ward1").val("0");
                    $("#date_s").val("");
                    $("#date_e").val("");

                    scope.valid_date_s = false;
                    scope.valid_date_e = false;
                });
              }
          };
      });

	app.controller('ReportViewController', function ($scope,$http){
        /**
         * ####################
         * Report 1 สถิติการตรวจนับ Test
         * ####################
         */
        $scope.Report1 = function(){
            $('#hospital1').empty();
						$('#doctor1').empty();
            $('#visit1').empty();
            $('#ward1').empty();
						$('#analyzer1').empty();

						$('#analyzer1').append($('<option>', { value: "", text: "Total"}));
						$('#doctor1').append($('<option>', { value: "", text: "Total" }));
						$('#visit1').append($('<option>', {
								value: "",
								text: "Total"
						}));
						$('#ward1').append($('<option>', {
								value: "",
								text: "Total"
						}));

            /**get hospital */
            $http.get('/main/DataHospital').then(function(response){
                $scope.AllDataHospital = response.data.data;
								//console.log('data hospital',$scope.AllDataHospital);
                $scope.AllDataHospital.forEach(element => {
                    $('#hospital1').append($('<option>', { value: element['id_hospital'], text: element['hospital_name']}));
                });
            });
						/**get doctor **/
						$http.get('/management/listDoctor').then(function(response){
								$scope.AllDataDoctor = response.data.data;
								console.log('data doctor',$scope.AllDataDoctor);
								//$scope.AllDataDoctor.unshift({"prefix_name":"","doctor_name" : "Total","doctor_lastname":"","id_doctor" : ""})
								$scope.AllDataDoctor.forEach(element => {
										$('#doctor1').append($('<option>', { value: element['id_doctor'], text: element['prefix_name']+" "+element['doctor_name']+" "+element['doctor_lastname']}));
								});
						});
            /**get patient type */
            $http.get('/report/getPatient').then(function(response){
                $scope.patientData = response.data.patient;
                //$scope.patientData.unshift({"patient_type_name" : "Total","id_patient_type" : ""})
                $scope.patientData.forEach(element => {
                    $('#visit1').append($('<option>', { value: element['id_patient_type'], text: element['patient_type_name']}));
                });
            });
            /**get ward type */
            $http.get('/report/getWard').then(function(response){
                $scope.wardData = response.data.ward;
                //$scope.wardData.unshift({"ward_name" : "Total","id_ward" : ""})
                $scope.wardData.forEach(element => {
                    $('#ward1').append($('<option>', { value: element['id_ward'], text: element['ward_name']}));
                });
								console.log("$scope.wardData:",$scope.wardData);
            });
						//$scope.analyzerData = [{"analyzer_id":1,"analyzer_name":"BA400"},{"analyzer_id":2,"analyzer_name":"BA200"},{"analyzer_id":3,"analyzer_name":"Manual"}];
						$http.get('/report/getAnalyzerType').then(function(response){
                $scope.analyzerData = response.data.analyzer;
								//$scope.analyzerData.unshift({"analyzer_name" : "Total","id_analyzer" : ""})
								$scope.analyzerData.forEach(element => {
										$('#analyzer1').append($('<option>', { value: element['id_analyzer'], text: element['analyzer_name']}));
								});
								console.log("$scope.analyzerData:",$scope.analyzerData);
            });


			$("#modal-report-1").modal('show');
        }

        $scope.dateOnChangeS = function(){
            $scope.valid_date_s = false;
        }

        $scope.dateOnChangeE = function(){
            $scope.valid_date_e = false;
        }

        /**report on click */
        $scope.printReport1 = function(){
            var date_s = $("#date_s").val();
            var date_e = $("#date_e").val();
            var hospital1 = $("#hospital1").val();
						var doctor1 = $("#doctor1").val();
            var visit1 = $("#visit1").val();
            var ward1 = $("#ward1").val();
						var analyzer1 = $("#analyzer1").val();
            if(!date_s){
                $scope.valid_date_s = true;
                $scope.invalid_date_s = "Please fill date่";
                return false;
            }
            if(!date_e){
                $scope.valid_date_e = true;
                $scope.invalid_date_e = "Please fill date่";
                return false;
            }
            $("#modal-report-1").modal('hide');
            window.open("/report/report1?date_s="+date_s+"&date_e="+date_e+"&hospital="+
                hospital1+"&doctor="+doctor1+"&visit="+visit1+"&ward="+ward1+"&analyzer="+analyzer1);
        }
        /**
         * ########################
         * Report 2
         * ########################
         */
        $scope.Report2 = function(){
            $('#labgroup2').empty();
						$('#analyzer2').empty();
						$('#doctor2').empty();

						$('#analyzer2').append($('<option>', { value: "", text: "Total"}));
						$('#doctor2').append($('<option>', { value: 0, text: "Total" }));
            $('#labgroup2').append($('<option>', {
                value: 0,
                text: "Total"
            }));

            $http.get('/main/LabSubGroupItem').then(function(response){
                $scope.AllDataDepartment = response.data.data;
                $scope.AllDataDepartment.forEach(element => {
                    $('#labgroup2').append($('<option>', {
                        value: element['id_lab_sub_group_item'],
                        text: element['lab_sub_group_name']
                    }));
                });
            });
						/**get doctor **/
						$http.get('/management/listDoctor').then(function(response){
								$scope.AllDataDoctor = response.data.data;
								//console.log('data doctor',$scope.AllDataDoctor);
								//$scope.AllDataDoctor.unshift({"prefix_name":"","doctor_name" : "Total","doctor_lastname":"","id_doctor" : ""})
								$scope.AllDataDoctor.forEach(element => {
										$('#doctor2').append($('<option>', { value: element['id_doctor'], text: element['prefix_name']+" "+element['doctor_name']+" "+element['doctor_lastname']}));
								});
						});
						$http.get('/report/getAnalyzerType').then(function(response){
                $scope.analyzerData = response.data.analyzer;
								//$scope.analyzerData.unshift({"analyzer_name" : "Total","id_analyzer" : ""})
								$scope.analyzerData.forEach(element => {
										$('#analyzer2').append($('<option>', { value: element['id_analyzer'], text: element['analyzer_name']}));
								});
								console.log("$scope.analyzerData:",$scope.analyzerData);
            });
			$("#modal-report-2").modal('show');
        }


        $scope.Showereport2 = function(){
            var dateStart2 = $('input[name="dateStart2"]').val();
            var dateEnd2 = $('input[name="dateEnd2"]').val();
            var labgroup2 = $("#labgroup2").val();
						var doctor2 = $("#doctor2").val();
						var analyzer2 = $('#analyzer2').val();
						if (dateStart2 == ""||dateEnd2 =="") {

            } else {
                $("#modal-report-2").modal('hide');
                window.open("/report/report2?dateStart="+dateStart2+"&dateEnd="+dateEnd2+"&labgroup="+labgroup2+"&analyzer="+analyzer2+"&doctor="+doctor2);
            }
        }

        /**
         * ############################
         * Report 3 สถิติการตรวจนับผู้ป่วย
         * ############################
         */
        $scope.printReport3 = function(){
            var date_s3 = $("#date_s3").val();
            var date_e3 = $("#date_e3").val();
            var hospital3 = $("#hospital3").val();
            var department3 = $("#department3").val();
            var serviceplan3 = $("#serviceplan3").val();
            var patient_department3 = $("#patient_department3").val();
            var visit3 = $("#visit3").val();
						var doctor3 = $("#doctor3").val();
            if (date_s3 == ""||date_e3 =="") {

            }else{
                $("#modal-report-3").modal('hide');
                window.open("/report/report3?date_s="+date_s3+"&date_e="+date_e3+"&hospital="+
                hospital3+"&department="+department3+"&serviceplan="+serviceplan3+"&patient_department="+patient_department3+"&visit="+visit3+"&doctor="+doctor3);
            }
            //console.log(date_s3,date_e3,hospital3,department3,serviceplan3,patient_department3,visit3);

        }

        $scope.Report3 = function(){
            $('#hospital3').empty();
            $('#serviceplan3').empty();
            $('#department3').empty();
            $('#patient_department3').empty();
            $('#visit3').empty();
						$('#doctor3').empty();

            $('#hospital3').append($('<option>', { value: 0,text: "Total"  }));
            $('#serviceplan3').append($('<option>', { value: 0, text: "Total" }));
            $('#department3').append($('<option>', { value: 0, text: "Total" }));
            $('#ward3').append($('<option>', { value: 0, text: "Total" }));
            $('#visit3').append($('<option>', { value: 0, text: "Total" }));
						$('#doctor3').append($('<option>', { value: 0, text: "Total" }));
            //$('#visit3').append($('<option>', { value: "0", text: "Total" }));
            $('#patient_department3').append($('<option>', { value: "0", text: "Total" }));

            $http.get('/main/DataHospital').then(function(response){
                $scope.AllDataHospital = response.data.data;
                $scope.AllDataHospital.forEach(element => {
                    $('#hospital3').append($('<option>', {
                        value: element['id_hospital'],
                        text: element['hospital_name']
                    }));
                });
            });
						/**get doctor **/
						$http.get('/management/listDoctor').then(function(response){
								$scope.AllDataDoctor = response.data.data;
								//console.log('data doctor',$scope.AllDataDoctor);
								//$scope.AllDataDoctor.unshift({"prefix_name":"","doctor_name" : "Total","doctor_lastname":"","id_doctor" : ""})
								$scope.AllDataDoctor.forEach(element => {
										$('#doctor3').append($('<option>', { value: element['id_doctor'], text: element['prefix_name']+" "+element['doctor_name']+" "+element['doctor_lastname']}));
								});
						});

            $http.get('/main/DataServicePlan').then(function(response){
                $scope.DataServicePlan = response.data.data;
                $scope.DataServicePlan.forEach(element => {
                    $('#serviceplan3').append($('<option>', {
                        value: element['id_service_plan'],
                        text: element['service_plan_name']
                    }));
                });
            });

            $http.get('/management/PatientTypeData').then(function(response){
                $scope.patientType = response.data.data;
                $scope.patientType.forEach(element => {
                $('#visit3').append($('<option>', {
                    value: element['id_patient_type'],
                    text: element['patient_type_name']
                }));
            })
            });

            $http.get('/main/DataWard').then(function(response){
                $scope.AllDataWard = response.data.data;
                $scope.AllDataWard.forEach(element => {
                    $('#patient_department3').append($('<option>', {
                        value: element['id_ward'],
                        text: element['ward_name']
                    }));
                });
            });

            $http.get('/main/DataDepartment').then(function(response){
                $scope.AllDataDepartment = response.data.data;
                $scope.AllDataDepartment.forEach(element => {
                    $('#department3').append($('<option>', {
                        value: element['id_department'],
                        text: element['department_name']
                    }));
                });
            });
			$("#modal-report-3").modal('show');
        }
        /**
         * ###########################
         * Report 4
         * ###########################
         */
        $scope.Report4 = function(){
            $('#hospital4').empty();
            $('#visit4').empty();

            $('#ward4').append($('<option>', { value: "", text: "Total" }));
            $('#visit4').append($('<option>', { value: "",  text: "Total" }));

            $http.get('/main/DataHospital').then(function(response){
                $scope.AllDataHospital = response.data.data;
                $scope.AllDataHospital.forEach(element => { $('#hospital4').append($('<option>', {
                        value: element['id_hospital'],
                        text: element['hospital_name']
                    }));
                });
            });

            $http.get('/management/PatientTypeData').then(function(response){
                $scope.patientType = response.data.data;
                $scope.patientType.forEach(element => {
                    $('#visit4').append($('<option>', {
                        value: element['id_patient_type'],
                        text: element['patient_type_name']
                    }));
                });
            });
			$("#modal-report-4").modal('show');
        }

        $scope.Showereport4 = function(){
            var dateStart4 = $('input[name="dateStart4"]').val();
            var dateEnd4 = $('input[name="dateEnd4"]').val();
            var hospital4= $("#hospital4").val();
            var visit4 = $("#visit4").val();

            $("#modal-report-4").modal('hide');
            window.open("/report/report4?dateStart="+dateStart4+"&dateEnd="+dateEnd4+"&hospital="+hospital4+"&visit="+visit4);
        }
        /**
         * ######################################
         * Report 5 สถิตินับภาระงานการทำงานของ User
         * ######################################
         */
        $scope.Report5 = function(){
            $('#department5').empty();
            $http.get('/main/DataDepartment').then(function(response){
                $scope.AllDataDepartment = response.data.data;
                $scope.AllDataDepartment.unshift({"department_name" : "Total","id_department" : ""})
                $scope.AllDataDepartment.forEach(element => {
                    $('#department5').append($('<option>', {
                        value: element['id_department'],
                        text: element['department_name']
                    }));
                });
            });
			$("#modal-report-5").modal('show');
        }

        $scope.printReport5 = function(){
            $("#modal-report-5").modal('hide');
            var date_s = $("#date_s5").val()
            var date_e = $("#date_e5").val()
            var department = $("#department5").val();
            window.open("/report/report5?dateStart="+date_s+"&dateEnd="+date_e+"&department="+department);
        }
        /**
         * #############################
         * Report 6
         * #############################
         */
        $scope.Report6 = function(){
            $('#hospital6').empty();
            $http.get('/main/DataHospital').then(function(response){
                $scope.AllDataHospital = response.data.data;
                $scope.AllDataHospital.forEach(element => {
                    $('#hospital6').append($('<option>', {
                        value: element['id_hospital'],
                        text: element['hospital_name']
                    }));
                });
            });
						$('#analyzer6').empty();
						$http.get('/report/getAnalyzerType').then(function(response){
                $scope.analyzerData = response.data.analyzer;
								$scope.analyzerData.unshift({"analyzer_name" : "Total","id_analyzer" : ""})
								$scope.analyzerData.forEach(element => {
										$('#analyzer6').append($('<option>', { value: element['id_analyzer'], text: element['analyzer_name']}));
								});
								console.log("$scope.analyzerData:",$scope.analyzerData);
            });
			$("#modal-report-6").modal('show');
        }
        $scope.Showereport6 = function(){
            var dateStart6 = $('input[name="dateStart6"]').val();
            var dateEnd6 = $('input[name="dateEnd6"]').val();
            var hospital6 = $("#hospital6").val();
						var analyzer6 = $('#analyzer6').val();
						if (dateStart6 == ""||dateEnd6 =="") {

            }else{
                $("#modal-report-6").modal('hide');
                window.open("/report/report6?dateStart="+dateStart6+"&dateEnd="+dateEnd6+"&hospital="+hospital6+"&analyzer="+analyzer6);
            }
        }
        /**
         * #############################
         * Report 7
         * #############################
         */
        $scope.Report7 = function(){
            $('#hospital7').empty();
            $('#visit7').empty();
            $('#ward7').empty();

            $('#ward7').append($('<option>', { value: "", text: "Total" }));
            $('#visit7').append($('<option>', { value: "",  text: "Total" }));

            $http.get('/main/DataHospital').then(function(response){
                $scope.AllDataHospital = response.data.data;
                $scope.AllDataHospital.forEach(element => { $('#hospital7').append($('<option>', {
                        value: element['id_hospital'],
                        text: element['hospital_name']
                    }));
                });
            });

            $http.get('/management/PatientTypeData').then(function(response){
                $scope.patientType = response.data.data;
                $scope.patientType.forEach(element => {
                    $('#visit7').append($('<option>', {
                        value: element['id_patient_type'],
                        text: element['patient_type_name']
                    }));
                });
            });

            $http.get('/main/DataWard').then(function(response){
                $scope.AllDataWard = response.data.data;
                $scope.AllDataWard.forEach(element => {
                    $('#ward7').append($('<option>', {
                        value: element['id_ward'],
                        text: element['ward_name']
                    }));
                });
            });
			$("#modal-report-7").modal('show');
        }

        $scope.Showereport7 = function(){
            var dateStart7 = $('input[name="dateStart7"]').val();
            var dateEnd7 = $('input[name="dateEnd7"]').val();
            var hospital7 = $("#hospital7").val();

            $("#modal-report-7").modal('hide');
            window.open("/report/report7?dateStart="+dateStart7+"&dateEnd="+dateEnd7+"&hospital="+hospital7);
        }
    });
})();
