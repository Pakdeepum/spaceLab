(function () {
    'use strict';
    var app = angular.module('application', []);


    app.directive("modalHistory", function () {
        return {
            restrict: "A",
            link: function (scope, element, attrs) {
                $(element).bind("hide.bs.modal", function () {
                    setTimeout(() => {
                        scope.posts = [];
                        scope.newPosts = [];
                        scope.DataLabSubGroupItem = [];
                        scope.$apply();
                    }, 0);
                });
              }
          };
    });
                
    app.controller('ChooseLabController', function ($scope, $http) {
        $scope.Search = function () {
            $http.get('/main/SelectLab').then(function (response) {
                setTimeout(() => {
                    $scope.posts = response.data.data;
                    console.log('posts',$scope.posts);
                    $scope.ShowAll();
                    document.getElementById("labgroupitemAll").checked=true;
                    $scope.$apply();
                }, 0);
            });
            $("#modal-lab").modal('show');
        }
                $scope.isFiltered = false;
                $scope.ShowAll = function(){
                    $scope.isFiltered = false;
                }
                var iditem=[];
				$scope.labSubGroupItems=[];
				$scope.labSubId=0;
				$scope.SelectLabSubGroupItem = function(id){
                    $scope.isFiltered = true;
                    console.log('SelectLabSubGroupItem:',id);
                    $scope.labSubId = id;
                    $scope.newPosts = [];
					$http.get('/main/SelectLabSubGroupItemById/'+id).then(function(response){
                        $scope.labSubGroupItems = response.data.data;
                        console.log('sub group items data',$scope.labSubGroupItems);
                        for(var i=0; i<$scope.posts.length; i++){
                            for(var j=0; j<$scope.posts[i].detail.length; j++){
                                for(var k=0; k<$scope.labSubGroupItems.length; k++){
                                // console.log($scope.posts[i].detail[j])
                                if($scope.posts[i].detail[j].id_lab_item == $scope.labSubGroupItems[k].id_lab_item){
                                    if(!$scope.newPosts.includes($scope.posts[i])){
                                        $scope.newPosts.push($scope.posts[i]);
                                    }
                                    // console.log('true');
                                    // console.log($scope.newPosts)
                                } else {

                                }
                                
                              }
                            }
                            
                        }
                        console.log('newposts length', $scope.newPosts.length)
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
        $scope.DataLabDetail=[];
        $scope.ChooseLab = function (labID) {
            $http.get('/main/SelectLabData/' + labID).then(function (response) {
                var temp = [];
                $scope.labItemId = [];
                $scope.DataLabOrder = response.data.data;
                temp = angular.fromJson($scope.DataLabOrder);
                $scope.array = temp;
                $scope.hn = $scope.array[0].hn;
                $scope.age = $scope.array[0].age;
                console.log($scope.DataLabOrder);
                $scope.patientID = $scope.DataLabOrder[0].id_patient;
                $scope.name = $scope.array[0].prefix_name + " " +$scope.array[0].patient_firstname + " " + $scope.array[0].patient_lastname;
                for(var i=0; i < $scope.DataLabDetail.length; i++){
                    $scope.labItemId[i] = $scope.DataLabDetail[i].id_lab_item;
                    console.log('2. ',$scope.DataLabDetail)
                }
                console.log($scope.labItemId);
                for(var i=0; i < $scope.labItemId.length; i++){
                    $scope.detailLabitem($scope.labItemId[i], $scope.patientID)
                }
            });

            $http.get('/main/SelectLabItem/' + labID).then(function (response) {
                $scope.DataLabDetail = response.data.data;
                console.log($scope.DataLabDetail)
                $scope.DataLabDetail.forEach(ele => {
                    ele.labitem['_decimal'] = parseInt(ele.labitem['_decimal']);
                });
                
            });
        }
        $scope.detailLabitem = function (id, patient) {
            $http.get('/main/RecordedResults/History/' + id + '/' + patient).then(function (response) {
                var RowItemSelect2 = [];
                $scope.DataHistoryRecorded = response.data;
                console.log('data history', $scope.DataHistoryRecorded, response);
                $scope.DataHistoryRecorded.forEach(ele => {
                    ele.decimal['_decimal'] = parseInt(ele.decimal['_decimal']);
                });
                angular.forEach($scope.DataHistoryRecorded, function (item) {
                    if (item['lab_approve']) {
                        if (angular.isNumber(+item['lab_approve'])) {
                            RowItemSelect2.push(+item['lab_approve']);
                        } else {
                            RowItemSelect2.push(0);
                        }
                    }
                });
                if(RowItemSelect2[RowItemSelect2.length-1] > RowItemSelect2[RowItemSelect2.length-2]){
                    for(var i=0; i < $scope.DataLabDetail.length; i++){
                        if($scope.DataLabDetail[i].id_lab_item == id)
                        $scope.DataLabDetail[i]["flag_compare"] = "↑";
                    }
                } else if(RowItemSelect2[RowItemSelect2.length-1] < RowItemSelect2[RowItemSelect2.length-2]){
                    for(var i=0; i < $scope.DataLabDetail.length; i++){
                        if($scope.DataLabDetail[i].id_lab_item == id)
                        $scope.DataLabDetail[i]["flag_compare"] = "↓";
                    }
                } else {
                    for(var i=0; i < $scope.DataLabDetail.length; i++){
                        if($scope.DataLabDetail[i].id_lab_item == id)
                        $scope.DataLabDetail[i]["flag_compare"] = "-";
                    }
                }
                if($scope.DataHistoryRecorded.length == 0){
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
                    var data_temp = [
                        ['No.', 'Result']
                    ];
                    RowItemSelect2.forEach(function (val, i) {
                        data_temp.push([i + 1, val]);
                    });
                    var data = google.visualization.arrayToDataTable(data_temp);

                    var options = {
                        title: 'Result History',
                        curveType: 'function',
                        legend: {
                            position: 'bottom'
                        },
                        hAxis: {
                            format: '0'
                        }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }
             }
            });
         
        }
    });
})();
