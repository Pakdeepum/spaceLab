(function () {
	'use strict';
    var app = angular.module('application', []);

    // controller of management/manageDoctor
    app.controller('doctorController', function($scope, $http){
        // list Patient form search
        $http.get('/management/listDoctor').then(function(response){
            $scope.posts = response.data.data;
        });

        $scope.Search = function(){
            var dataSearch =  $('input[name="search"]').val();
            $http.get('/management/listDoctor/'+dataSearch).then(function(response){
                // console.log('/management/listDoctor/'+dataSearch);
                $scope.posts = response.data.data;
            });
        }
		$scope.Add = function(){
            $('#PrefixAdd').val("0")
            $("input[name='firstNameAdd']").val("");
            $("input[name='lastNameAdd']").val("");
            $("input[name='telNoAdd']").val("");
            $('#departmentAdd').val("0")
            $('#positionAdd').val("0")
            $('#specialtyAdd').val("0")
            $("input[name='iddoctor']").val("");
            $("#modal-management-doctor-addDoctor").modal('show');
            $("select").change(function(){
                if($("#PrefixAdd").val() != 0 && $("#departmentAdd").val() != 0 && $("#positionAdd").val() != 0 && $("#specialtyAdd").val() != 0){
                    $("#addPatient").prop('disabled',false);
                }else{
                    $("#addPatient").prop('disabled',true);
                }
            });
        }
        $scope.EditDoctor = function(doctorID){
            $http.get('/management/manageDoctor/editDoctor/'+doctorID).then(function(response){
                $scope.dataDoctorEdit = response.data.data;
                $("#prefixShow").val($scope.dataDoctorEdit[0].doctor_prefix);
                $("#prefixShow").attr('selected','selected');
                $("#prefixShow").text( $scope.dataDoctorEdit[0].prefix_name);
                $("input[name='firstNameEdit']").val($scope.dataDoctorEdit[0].doctor_name);
                $("input[name='lastNameEdit']").val($scope.dataDoctorEdit[0].doctor_lastname);
                $("input[name='telNoEdit']").val($scope.dataDoctorEdit[0].doctor_tel);
                $("#departmentEdit option[value='"+$scope.dataDoctorEdit[0].doctor_department+"']").attr('selected','selected');
                $("#positionEdit option[value='"+$scope.dataDoctorEdit[0].doctor_position+"']").attr('selected','selected');
                $("#specialtyEdit option[value='"+$scope.dataDoctorEdit[0].doctor_specialty+"']").attr('selected','selected');
                $("input[name='iddoctor']").val($scope.dataDoctorEdit[0].id_doctor);
            });
            $("#modal-management-doctor-editDoctor").modal('show');
        }
        $scope.DelDoctor = function(doctorID){
            $scope.doctorID = doctorID;
            $("#modal-askDelete").modal('show');
        }
        $("#confirm").click(function(){
            $http.get('/management/manageDoctor/deleteDoctor/'+ $scope.doctorID).then(function(response){
                window.location.reload();
            });    
        });
    });

    app.controller('ListPrefixDoctorController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/PrefixMasterData').then(function(response){
            $scope.prefixname = response.data.data;
        });
    });

    app.controller('ListDepartmentMasterController', function($scope,$http){
        // combobox list data DepartmentMaster
        $http.get('/management/DepartmentMasterData').then(function(response){
            $scope.department = response.data.data;
        });
    });

    app.controller('ListPositionMasterController', function($scope,$http){
        // combobox list data PositionMaster
        $http.get('/management/PositionMasterData').then(function(response){
            $scope.position = response.data.data;
        });
    });

    app.controller('ListSpecialtyController', function($scope,$http){
        // combobox list data SpecialtyMaster
        $http.get('/management/specialtyMaster').then(function(response){
            $scope.specialty = response.data.data;
        });
    });

})();