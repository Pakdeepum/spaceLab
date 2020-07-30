(function () {
	'use strict';
    var app = angular.module('application', []);

    //modal search lab
	app.controller('selectLabController', function ($scope){
		$scope.SelectLab = function(){
			$("#modal-lab").modal('show');
        }
    });

    // modal list data lab
	app.controller('selectDataLabController', function ($scope,$http){
        $http.get('/main/resultDocumentPhoto/SelectLab').then(function(response){
            $scope.posts = response.data.data;
        });
    });

    // selct data of lab and put on input box
    app.controller('ChooseLabController', function ($scope,$http){
			$scope.Search = function () {
					$http.get('/main/SelectLab').then(function (response) {
							setTimeout(() => {
									$scope.posts = response.data.data;
									$scope.$apply();
							}, 0);
					});
					$("#modal-lab").modal('show');
			}
		$scope.ChooseLab = function(labID){

            $http.get('/main/resultDocumentPhoto/SelectLabData/'+labID).then(function(response){
                console.log(response)
                var temp = [];
                $scope.posts = response.data.data;

                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
				$scope.lab_order_main_id = labID;
                console.log($scope.array[0].id_number_photo)
                $scope.LabNo = $scope.array[0].lab_order_no;
                $("#photo_num").val($scope.array[0].id_number_photo);
                $scope.HN = $scope.array[0].hn;
                $scope.name = $scope.array[0].patient_firstname + " " + $scope.array[0].patient_lastname;
                $scope.gender = $scope.array[0].gender;
                $scope.age = $scope.array[0].age;
                $scope.orderDate = $scope.array[0].order_date;
                $scope.pictureNote = $scope.array[0].note;
                var idHospital = temp[0].id_hospital;
                var LabNo = temp[0].lab_order_no;
                // show filename of image in combo box
                var filename = [];
                for(var i = 1; i <= (temp.length)-1; i++) {
                    filename[i-1] = $scope.array[i];
                }
                $scope.filename = filename;

                $('#picNumber').on('click', function(e) {
                    var picValue = document.getElementById("picNumber").value;
                    var strpath = 'storage/img/LabResult/' + idHospital + '/' + LabNo + '/' + picValue ;
                    var newURL = '/' + strpath;
                    document.getElementById("img").src = newURL;
                    $("#img").height( $scope.array[0].height );
                    $("#img").width( $scope.array[0].width );
                })
            });
        }
				$scope.PrintPicture = function(){
					if($("#photo_num").val()!=""){
                        window.open('/main/printImage?_id='+$scope.lab_order_main_id+'&_pic_num='+$("#picNumber").val()+'&_photo_id='+$("#photo_num").val());
                        console.log($("#picNumber").val());
					}
				}
    });
    //$(document).ready(function(){
      //  $('#print').on('click', function(e) {
            /*var printContents = document.getElementById('image').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;*/
				/*		if($("#photo_num").val()!=""){
							window.open('/main/printImage?_id='+$lab_order_main_id+'&_pic_num='+$("#picNumber").val());
						}



        })
    })*/
    //insert picture, input image name and set all button normal
	app.controller('insertPicture', function ($scope){
		$scope.InsertPic = function(){
			// $('#browse_file').on('click', function(e) {
            //      $('#photo').click();
            // })
            $('#photo').click();
            $('#photo').on('change', function(e) {
                var fileInput=this;
                if(fileInput.files[0]) {
                    var reader=new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            })
        }
    });
})();
