(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);

    app.controller('SearchDoctorController', function($scope){
        // show modal choose doctor
        $scope.SearchDoctor = function(){
            $("#modal-doctor").modal('show');
        }
    });
    // select doctor from modal center
    app.controller('SelectDoctorController', function ($scope,$http){
        $http.get('/main/DataDoctor').then(function(response){
            //console.log(response)
            $scope.AllDataDoctor = response.data.data;
        });

        $scope.Choose = function(idDoc){
            $("#modal-doctor").modal('hide');
            $http.get('/main/DataDoctorLabOrder/'+idDoc).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                var fullname = $scope.array[0].prefix['prefix_name'] + " " + $scope.array[0].doctor_name + " " + $scope.array[0].doctor_lastname;
                $('input[name="doctor"]').val(fullname);
                $('input[name="iddoctor"]').val(idDoc);
            });
        }
    });

    $(document).ready(function(){
        $('#coin-amount').on('change, keyup', function(event){
            event.preventDefault();
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return numberOnly(value);
            });
        });
    });

    // controller of management/managePatient
    app.controller('PatientController', function($scope, $http){

        $http.get('/management/listPatient').then(function(response){
            $scope.posts = response.data.data;
            console.log($scope.posts);
        });
        // list Patient form search
        $scope.Search = function(){
            var dataSearch =  $('input[name="search"]').val();
            $http.get('/management/listPatient/'+dataSearch).then(function(response){
                
                $scope.posts = response.data.data;
                console.log('search', $scope.posts);
            });
        }

        $(document).ready(function(){
            $('#HNumber').on('change, keyup', function(event){
                event.preventDefault();
                // skip for arrow keys
                if(event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                    return numberOnly(value);
                });
            });
        });
        /**number only */
        function numberOnly(value){
            return value.replace(/\D/g, "");
        }
		$scope.Add = function(){
            $("input[name='IDnumberAdd']").val("");
            $('#PrefixAdd').val("0")
            $("input[name='firstNameAdd']").val("");
            $("input[name='lastNameAdd']").val("");
            $("input[name='telNoAdd']").val("");
            $("input[name='emailAdd']").val("");
            $("input[name='birthDayAdd']").val("");
            $("input[name='bloodGroupAdd']").val("");
            $('#genderAdd').val("0")
            $('#statusAdd').val("0")
            $('#ethnicityAdd').val("0")
            $('#nationalityAdd').val("153")
            $('#religionAdd').val("1")
            $("input[name='fatherNameAdd']").val("");
            $("input[name='motherNameAdd']").val("");
            $("input[name='zipcodeAdd']").val("");
            $('#provinceAdd').val("0")
            $('#amphurAdd').val("0")
            $('#districtAdd').val("0")
            $("input[name='addressAdd']").val("");
            $("input[name='weightAdd']").val("");
            $("input[name='heightAdd']").val("");
            $('#typeAdd').val("0")
            $("input[name='medAllergyAdd']").val("");
            $("input[name='iddoctor']").val("");
            $("input[name='idpatientAdd']").val("");
            $("input[name='doctor']").val("");
            $("#modal-management-patient-addPatient").modal('show');
        }

        $scope.idNumber = function(){
            $scope._idCard = false;
        }

        $("#PrefixAdd").on('change', function(){
            setTimeout(() => {
                $scope._preFix = false;
                $scope.$apply();
            }, 0);
        });

        $("#genderAdd").on('change', function(){
            setTimeout(() => {
                $scope._sex = false;
                $scope.$apply();
            }, 0);
        });

        $("#statusAdd").on('change', function(){
            setTimeout(() => {
                $scope._status = false;
                $scope.$apply();
            }, 0);
        });

        $("#ethnicityAdd").on('change', function(){
            setTimeout(() => {
                $scope._ethnicity = false;
                $scope.$apply();
            }, 0);
        });

        $("#nationalityAdd").on('change', function(){
            setTimeout(() => {
                $scope._nationality = false;
                $scope.$apply();
            }, 0);
        });

        $("#religionAdd").on('change', function(){
            setTimeout(() => {
                $scope._religion = false;
                $scope.$apply();
            }, 0);
        });

        $("#provinceAdd").on('change', function(){
            setTimeout(() => {
                $scope._province = false;
                $scope.$apply();
            }, 0);
        });

        $("#amphurAdd").on('change', function(){
            setTimeout(() => {
                $scope._amphur = false;
                $scope.$apply();
            }, 0);
        });

        $("#districtAdd").on('change', function(){
            setTimeout(() => {
                $scope._district = false;
                $scope.$apply();
            }, 0);
        });

        $("#typeAdd").on('change', function(){
            setTimeout(() => {
                $scope._patientType = false;
                $scope.$apply();
            }, 0);
        });

        $("#doctor").on('change', function(){
            setTimeout(() => {
                $scope._doctor = false;
                $scope.$apply();
            }, 0);
        });
        $scope.onHNChange = function(){
            $scope._HName = false;
        }
        $scope.onNameChange = function(){
            $scope._Name = false;
        }
        $scope.onlNameChange = function(){
            $scope._lname= false;
        }
        $scope.onBirthDate = function(){
            $scope._birth = false;
        }
        $scope.savePatient = function(){
            //
            // if(!$scope._idNumber){
            //     $scope._idCard = true;
            //     return false;
            // }
            if(!$scope._HNChange){
                $scope._HName = true;
                return false;
            }
            if($("#PrefixAdd").val() == 0){
                $scope._preFix = true;
                return false;
            }
            if(!$scope._NameChange){
                $scope._Name = true;
                return false;
            }
            // if(!$scope._lnameChange){
            //     $scope._lname = true;
            //     return false;
            // }
            if(!$scope._birthDate){
                $scope._birth = true;
                return false;
            }
            if($("#genderAdd").val() == 0){
                $scope._sex = true;
                return false;
            }
            if($("#statusAdd").val() == 0){
                $scope._status = true;
                return false;
            }
            // if($("#ethnicityAdd").val() == 0){
            //     $scope._ethnicity = true;
            //     return false;
            // }
            if($("#nationalityAdd").val() == 0){
                $scope._nationality = true;
                return false;
            }
            if($("#religionAdd").val()== 0){
                $scope._religion = true;
                return false;
            }
            if($("#provinceAdd").val() == 0){
                $scope._province = true;
                return false;
            }
            if($("#amphurAdd").val() == 0){
                $scope._amphur = true;
                return false;
            }
            if($("#districtAdd").val() == 0){
                $scope._district = true;
                return false;
            }
            if($("#typeAdd").val() == 0){
                $scope._patientType = true;
                return false;
            }
            if(!$("#doctor").val()){
                $scope._doctor = true;
                return false;
            }

            $("#from_patient_submit").submit();
        }

        $scope.EditPatient = function(patientID){
            $("#modal-management-patient-editPatient").modal('show');
            $http.get('/management/managePatient/editPatient/'+patientID).then(function(response){
                //console.log(response)
                $scope.dataPatientEdit = response.data.data;
                $("input[name='IDnumberEdit']").val($scope.dataPatientEdit.citizenid);
                $("input[name='HNumber']").val($scope.dataPatientEdit.hn);
                $("#PrefixEdit option[value='"+$scope.dataPatientEdit.id_prefix+"']").attr('selected','selected');
                $("input[name='firstNameEdit']").val($scope.dataPatientEdit.patient_firstname);
                $("input[name='lastNameEdit']").val($scope.dataPatientEdit.patient_lastname);
                $("input[name='telNoEdit']").val($scope.dataPatientEdit.patient_tel);
                $("input[name='emailEdit']").val($scope.dataPatientEdit.patient_email);
                $("input[name='birthDayEdit']").val($scope.dataPatientEdit.birthday);
                if($scope.dataPatientEdit.gender == 'Male') {
                    $("#genderEdit option[value='1']").attr('selected','selected');
                } else {
                    $("#genderEdit option[value='2']").attr('selected','selected');
                }
                $("input[name='bloodGroupEdit']").val($scope.dataPatientEdit.blood_group);
                $("#statusEdit option[value='"+$scope.dataPatientEdit.marital_status+"']").attr('selected','selected');
                $("#ethnicityEdit option[value='"+$scope.dataPatientEdit.ethnicity+"']").attr('selected','selected');
                $("#nationalityEdit option[value='"+$scope.dataPatientEdit.nationality+"']").attr('selected','selected');
                $("#religionEdit option[value='"+$scope.dataPatientEdit.patient_religion+"']").attr('selected','selected');
                $("input[name='fatherNameEdit']").val($scope.dataPatientEdit.father_name);
                $("input[name='motherNameEdit']").val($scope.dataPatientEdit.mother_name);
                $("input[name='zipcodeEdit']").val($scope.dataPatientEdit.patient_zipcode);
                $("#provinceEdit option[value='"+$scope.dataPatientEdit.patient_province+"']").attr('selected','selected');
                $("#amphurEdit option[value='"+$scope.dataPatientEdit.patient_amphur+"']").attr('selected','selected');
                $("#amphurShow").val( $scope.dataPatientEdit.patient_amphur);
                $("#amphurShow").attr('selected','selected');
                $("#amphurShow").text( $scope.dataPatientEdit.amphur_name);
                $("#districtEdit option[value='"+$scope.dataPatientEdit.patient_district+"']").attr('selected','selected');
                $("#districtShow").val( $scope.dataPatientEdit.patient_district);
                $("#districtShow").attr('selected','selected');
                $("#districtShow").text( $scope.dataPatientEdit.district_name);
                $("input[name='addressEdit']").val($scope.dataPatientEdit.patient_address);
                $("input[name='weightEdit']").val($scope.dataPatientEdit.weight);
                $("input[name='heightEdit']").val($scope.dataPatientEdit.height);
                $("#typeEdit option[value='"+$scope.dataPatientEdit.patient_type+"']").attr('selected','selected');
                $("input[name='medAllergyEdit']").val($scope.dataPatientEdit.drug_allergy);
                $("input[name='iddoctor']").val($scope.dataPatientEdit.private_docter_id);
                $("input[name='idpatientEdit']").val(patientID);
                var doctor = $scope.dataPatientEdit.prefix_name+" "+$scope.dataPatientEdit.doctor_name+" "+$scope.dataPatientEdit.doctor_lastname
                $("input[name='doctor']").val(doctor);

                document.getElementById("img_e").src = "https://cdn1.iconfinder.com/data/icons/metro-ui-dock-icon-set--icons-by-dakirby/512/Personal.png"
                if($scope.dataPatientEdit.image != null){
                    document.getElementById("img_e").src =  '/storage/img/patient/'+$scope.dataPatientEdit.image;
                    $("input[name='ofile_e']").val($scope.dataPatientEdit.image);
                }
                // show image from storage
                $('#image_e').on('change', function() {
                    var fileInput = this;
                        if(fileInput.files[0]) {
                            var reader=new FileReader();
                            reader.onload = function(e) {
                                $('#img_e').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                });
            });
        }

        $scope.DelPatient = function(patientID){
            $scope.patientID = patientID;
            $("#modal-askDelete").modal('show');
        }
        $("#confirm").click(function(){
            $http.get('/management/managePatient/deletePatient/'+ $scope.patientID).then(function(response){
                window.location.reload();
            });
        });
    });

    // dynamic of province amphur and district in edt patient modal
    app.controller('listProvinceControllerEdit', function ($scope,$http){
        $scope.loadProvinceEdit = function(){
            $http.get('/management/ProvinceMaster').then(function(response){
                $scope.province = response.data.data;
            })
        }
        // code jquery in select from IDprovince
        $('#provinceEdit').change(function(){
            var ProvinceID =  $(this).val();
            $http.get('/management/AmphurMaster/'+ProvinceID).then(function(response){
                $scope.amphur = response.data.data;
            })
        })
        // code jquery in select from IDamphur
        $('#amphurEdit').change(function(){
        var AmphurID =  $(this).val();
            $http.get('/management/DistrictMaster/'+AmphurID).then(function(response){
                $scope.district = response.data.data;
            })
        })
    });

    // dynamic of province amphur and district in add patient modal
    app.controller('listProvinceControllerAdd', function ($scope,$http){
        $scope.loadProvinceAdd = function(){
            $http.get('/management/ProvinceMaster').then(function(response){
                $scope.province = response.data.data;
            })
        }
        // code jquery in select from IDprovince
        $('#provinceAdd').change(function(){
            var ProvinceID =  $(this).val();
            $http.get('/management/AmphurMaster/'+ProvinceID).then(function(response){
                $scope.amphur = response.data.data;
            })
        })
        // code jquery in select from IDamphur
        $('#amphurAdd').change(function(){
        var AmphurID =  $(this).val();
            $http.get('/management/DistrictMaster/'+AmphurID).then(function(response){
                $scope.district = response.data.data;
            })
        })
    });

    app.controller('ListPrefixPatientController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/PrefixMasterData').then(function(response){
            $scope.prefixname = response.data.data;
        });
    });

    app.controller('ListEthnicityMasterController', function($scope,$http){
        // combobox list data EthnicityMaster
        $http.get('/management/EthnicityMaster').then(function(response){
            $scope.ethnicity = response.data.data;
        });
    });

    app.controller('ListNationalityMasterController', function($scope,$http){
        // combobox list data NationalityMaster
        $http.get('/management/NationalityMaster').then(function(response){
            $scope.nationality = response.data.data;
        });
    });

    app.controller('ListReligionMasterController', function($scope,$http){
        // combobox list data ReligionMaster
        $http.get('/management/ReligionMaster').then(function(response){
            $scope.religion = response.data.data;
        });
    });

    app.controller('ListPatientTypeDataController', function($scope,$http){
        // combobox list data PatientTypeData
        $http.get('/management/PatientTypeData').then(function(response){
            $scope.patientType = response.data.data;
        });
    });
})();
