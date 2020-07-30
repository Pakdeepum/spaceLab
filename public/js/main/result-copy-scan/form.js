(function () {
	'use strict';
    var app = angular.module('application', []);
    document.getElementById("save").disabled = true;
    document.getElementById("range").disabled = true;
    document.getElementById("originalSize").disabled = true;
    document.getElementById("imgSize").disabled = true;

    //modal search lab
	app.controller('selectLabController', function ($scope){
		$scope.SelectLab = function(){
			$("#modal-lab").modal('show');
        }
    });

    // modal list data lab
	app.controller('selectDataLabController', function ($scope,$http){
        $http.get('/main/resultCopyScan/SelectLab').then(function(response){
            $scope.posts = response.data.data;
						console.log("posts:",$scope.posts );
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
            //alert(labID);
            $http.get('/main/resultCopyScan/SelectLabData/'+labID).then(function(response){
                console.log(response);
                var temp = [];
                $scope.posts = response.data.data;
                $scope.lab_order_main_id = labID;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                // console.log($scope.array);
                $('input[name="hiddenHospitalID"]').val($scope.array[0].id_hospital);
                $('input[name="hiddenLabID"]').val($scope.array[0].id_lab_order_main);
                $('input[name="hiddenLabNo"]').val($scope.array[0].lab_order_no);
                $('input[name="hiddenHN"]').val($scope.array[0].hn);
                $('input[name="hiddenName"]').val($scope.array[0].patient_firstname + " " + $scope.array[0].patient_lastname);
                $('input[name="hiddenGender"]').val($scope.array[0].gender);
                $('input[name="hiddenAge"]').val($scope.array[0].age);
                $('input[name="hiddenOrderDate"]').val($scope.array[0].order_date);
                console.log($scope.array)
                $scope.LabNo = $scope.array[0].lab_order_no;
                $scope.HN = $scope.array[0].hn;
                $scope.name = $scope.array[0].patient_firstname + " " + $scope.array[0].patient_lastname;
                $scope.gender = $scope.array[0].gender;
                $scope.age = $scope.array[0].age;
                $scope.orderDate = $scope.array[0].order_date;
                var idHospital = temp[0].id_hospital;
                var LabNo = temp[0].lab_order_no;
                var filename = [];
                for(var i = 1; i <= (temp.length)-1; i++) {
                    filename[i-1] = $scope.array[i];
                }
                $scope.filename = filename;
                
            });
            
        }
        $scope.PrintPicture = function(){
                var image =  document.getElementById('img');
                // console.log(image.src);
                var imageDescription = document.getElementsByName('pictureNote')
                // $('input[name="hiddenHospitalID"]').val($scope.array[0].id_hospital);
                // $('input[name="hiddenLabID"]').val($scope.array[0].id_lab_order_main);
                $('input[name="hiddenLabNo"]').val($scope.array[0].lab_order_no);
                // $('input[name="hiddenHN"]').val($scope.array[0].hn);
                // $('input[name="hiddenName"]').val($scope.array[0].patient_firstname + " " + $scope.array[0].patient_lastname);
                // $('input[name="hiddenGender"]').val($scope.array[0].gender);
                // $('input[name="hiddenAge"]').val($scope.array[0].age);
                // $('input[name="hiddenOrderDate"]').val($scope.array[0].order_date);
                // window.open('/main/printImage2',$('input[name="hiddenLabNo"]').val());
                // var param ={
                //     // "image":image.src,
                //     "lab_order_no":$('input[name="hiddenLabNo"]').val()
                // };
                var config = {
                    headers:  {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    }
                };
                // $('#originalSize').on('click', function() {
                //     $('#img').addClass('origin');
                // })
                // $('#range').on("input", function() {
                //     $('#imgSize').val(this.value);
                // }).trigger("change");

                // range to image
                // var ranger = document.getElementById('range');
                // var width = image.clientWidth;
                // var height = image.clientWidth;
                // ranger.onchange = function(){
                //     $('#img').removeClass('origin');
                //     image.width = width * (ranger.value / 100);
                //     image.height = height * (ranger.value / 100);
                //     $("#image_height").val(image.height);
                //     $("#image_width").val(image.width);
                // }
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '/main/printImage2';
                form.target = 'window_1'; // target the window
                // append it to body
                var body = document.getElementsByTagName('body')[0];
                body.appendChild(form);
                var csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = $('meta[name="csrf-token"]').attr('content');
                form.appendChild(csrf);
                console.log(csrf.value);
                // create an element
                var child1 = document.createElement('input');
                child1.type = 'text'; // or 'hidden' it is the same
                child1.name = '_labNo';
                child1.value = $('input[name="hiddenLabNo"]').val();
                // append it to form
                form.appendChild(child1);
                // create another element
                var child2 = document.createElement('input');
                child2.type = 'text'; // or 'hidden' it is the same
                child2.name = 'image';
                child2.value = image.src;
                // append it to form
                form.appendChild(child2);
                var child3 = document.createElement('input');
                child3.type = 'text'; // or 'hidden' it is the same
                child3.name = 'imageDescription';
                child3.value = imageDescription[0].value;
                // append it to form
                form.appendChild(child3);
                var child4 = document.createElement('input');
                child4.type = 'text'; // or 'hidden' it is the same
                child4.name = 'imageWidth';
                child4.value =  $("#image_width").val();
                // append it to form
                form.appendChild(child4);
                var child5 = document.createElement('input');
                child5.type = 'text'; // or 'hidden' it is the same
                child5.name = 'imageHeight';
                child5.value = $("#image_height").val();
                // append it to form
                form.appendChild(child5);
                // console.log(image.src);
            
                // create window
                window.open('', 'window_1');
            
                // submit form
                form.submit();
                body.removeChild(form); // clean up
                

        }
        
    });
    

    //insert picture, input image name and set all button normal
	app.controller('insertPicture', function ($scope){
		$scope.InsertPic = function(){
            $('#photo').click();
            $('#photo').on('change', function(e) {
                var fileInput=this;
                if(fileInput.files[0]) {
                    var reader=new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                    document.getElementById("save").disabled = false;
                    // change properties disable of button
                    document.getElementById("range").disabled = false;
                    document.getElementById("originalSize").disabled = false;
                    // original size
                    $('#originalSize').on('click', function() {
                        $('#img').addClass('origin');
                    })
                    // range scrollbar - range to text
                    $('#range').on("input", function() {
                        $('#imgSize').val(this.value);
                    }).trigger("change");

                    // range to image
                    var ranger = document.getElementById('range');
                    var image =  document.getElementById('img');
                    var width = image.clientWidth;
                    var height = image.clientWidth;
                    ranger.onchange = function(){
                        $('#img').removeClass('origin');
                        image.width = width * (ranger.value / 100);
                        image.height = height * (ranger.value / 100);
                        $("#image_height").val(image.height);
                        $("#image_width").val(image.width);
                    }
                }
                
            })
        
        }
       
    });
    
})();
