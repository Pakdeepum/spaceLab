(function () {
    'use strict';
    var app = angular.module('application', []);

    app.controller('QCViewerDataViewController', function ($scope, $http) {
        /**
         * #################
         * convert date
         * #################
         */
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }
        /**
         * #########################
         * buttom click serach result
         * #########################
         */
        $scope.serachResult = function(){
            $http.get('/QC/QCViewer/QcResultData?_level='+$scope.level+'&_name='+$scope.qcName
            +'&_profile='+$scope.profile+'&date_s='+formatDate($scope.date_s)+'&date_e='+formatDate($scope.date_e)).then(function (response) {
                $scope.listitemResult = response.data.data;
            }).catch(error => {
                console.log(error)
            });
        }

        /**
         * ###############
         * get all profile
         * ###############
         */
        $scope.searchProfile = function(){
            $http.get('/QC/QCViewer/QcResultData?_level='+$scope.level+'&_name='+$scope.qcName+'&_profile='+$scope.profile).then(function (response) {
                $scope.listitemResult = response.data.data;
            }).catch(error => {
                console.log(error)
            });
        }
        $http.get('/QC/QCViewer/Qc-allProfile').then(function (response) {
            $scope.listprofile = response.data.data;
            $scope.listprofile.unshift({"profile_name" : "--select--","id_profile_qc" : ""})
        }).catch(error => {
            console.log(error)
        });

        $("#selectProfile").change(function () {
            $scope.id = $(this).val();
        });
        /**
         * #################
         * get Qc name
         * #################
         */
        $http.get('/QC/QCViewer/getQcName').then(function (response) {
            $scope.listQcName = response.data.data;
            $scope.listQcName.unshift({"qc_name" : "--select--","id_qc_name" : ""})
        }).catch(error => {
            console.log(error)
        });
        $scope.searchQcName = function(){
            $http.get('/QC/QCViewer/QcResultData?_profile='+$scope.profile+'&_level='+$scope.level+'&_name='+$scope.qcName).then(function (response) {
                $scope.listitemResult = response.data.data;
           }).catch(error => {
            console.log(error)
           });
        }
        /**
         *###############
         * serach with level
         * ##############
         */
        $http.get('/QC/QCViewer/getLevel').then(function (response) {
            $scope.listLevel = response.data.data;
            $scope.listLevel.unshift({"qc_level" : "--select--","id_qc_level" : ""})
        }).catch(error => {
            console.log(error)
        });

        $scope.searchLevel = function(){
            $http.get('/QC/QCViewer/QcResultData?_level='+$scope.level+'&_name='+$scope.qcName+'&_profile='+$scope.profile).then(function (response) {
                $scope.listitemResult = response.data.data;
           }).catch(error => {
            console.log(error)
            });
        }
        /*
        *###############
        * get all data
        * ###############
        */
        $http.get('/QC/QCViewer/QcResultData').then(function (response) {
            $scope.listitemResult = response.data.data;
            console.log('all data', $scope.listitemResult)
        }).catch(error => {
            console.log(error)
        });
        $http.get('/QC/Qc-allProfile').then(function (response) {
            $scope.listallprofile = response.data.data;
            console.log('all data profile', $scope.listallprofile)
        });

        $scope.selectedRow = null;
        $scope.clickRowMain = function (id_main, index,id_qc_level) {
            console.log('selected', id_main, index,id_qc_level);
            $scope.mean = 0;
            $scope.sd = 0;
            $scope.P2SD = 0;
            $scope.P1SD = 0;
            $scope.N1SD = 0;
            $scope.N2SD = 0;
            $scope.N3SD = 0;
            $scope.P3SD = 0;
            $scope.Allmean = 0;
            $scope.Allsd = 0;
            $scope.AllP2SD = 0;
            $scope.AllP1SD = 0;
            $scope.AllN1SD = 0;
            $scope.AllN2SD = 0;
            $scope.AllN3SD = 0;
            $scope.AllP3SD = 0;
            $scope.AllMaxValue = 0;
            $scope.AllMinValue = 0;
            $scope.selectedRow = index;
            $scope.CV = 0;
            $scope.mean2 = 0;
            $scope.sd2 = 0;
            $scope.P2SD2 = 0;
            $scope.P1SD2 = 0;
            $scope.N1SD2 = 0;
            $scope.N2SD2 = 0;
            $scope.N3SD2 = 0;
            $scope.P3SD2 = 0;
            $scope.Allmean2 = 0;
            $scope.Allsd2 = 0;
            $scope.AllP2SD2 = 0;
            $scope.AllP1SD2 = 0;
            $scope.AllN1SD2 = 0;
            $scope.AllN2SD2 = 0;
            $scope.AllN3SD2 = 0;
            $scope.AllP3SD2 = 0;
            $scope.CV2 = 0;
            $scope.cal = 0;
            $scope.total = 0;
            var RowItemSelect2 = [];
            // console.log(formatDate($scope.date_s), formatDate($scope.date_e));
            $http.get('/QC/QCViewer/QcResultDataFillter?_idMain='+id_main+'&_idQcLevel='+id_qc_level+'&date_s='+formatDate($scope.date_s)+'&date_e='+formatDate($scope.date_e)).then(function (response) {
              //console.log("id_main",id_main,"id_qc_level:",id_qc_level);
                
                $scope.RowItemSelect = response.data.data;
                console.log("$scope.RowItemSelect",$scope.RowItemSelect);
                var item_number = 0;

                angular.forEach($scope.RowItemSelect, function (item) {

                    if ($scope.AllMinValue == 0 && $scope.AllMaxValue == 0) {
                        $scope.AllMinValue = item.result;
                        $scope.AllMaxValue = item.result;
                    } else {
                        if ($scope.AllMinValue > item.result)
                            $scope.AllMinValue = item.result;
                        else if ($scope.AllMaxValue < item.result)
                            $scope.AllMaxValue = item.result;
                    }
                    if(item.result == null || item.result == undefined){
                        RowItemSelect2.push(0);
                    }else{
                        RowItemSelect2.push(item.result);
                    }
                    
                    $scope.Allmean += item.result;
                    //$scope.Allsd += item.sd;
                    //$scope.AllP2SD += item.P2SD;
                    //$scope.AllP1SD += item.P1SD;
                    //$scope.AllN1SD += item.N1SD;
                    //$scope.AllN2SD += item.N2SD;
                    //$scope.AllN3SD += item.N3SD;
                    //$scope.AllP3SD += item.P3SD;
                    item_number++;
                })

                console.log("RowItemSelect2",RowItemSelect2);
                $scope.Allmean = $scope.Allmean / item_number;
                for(var i=0; i < RowItemSelect2.length; i++){
                   $scope.cal += Math.pow(RowItemSelect2[i], 2)
                   $scope.total += RowItemSelect2[i];
                }
                console.log('total n, ', $scope.cal)
                console.log('total before, ', $scope.total)
                $scope.total = Math.pow($scope.total, 2)
                console.log('total after, ', $scope.total)
                $scope.Allsd = Math.sqrt(((item_number * $scope.cal) - $scope.total)/(item_number*(item_number-1)));
                console.log('sd, ', $scope.Allsd)
                // $scope.Allsd = ($scope.AllMaxValue-$scope.AllMinValue)/4;
                $scope.AllP2SD = $scope.Allmean +$scope.Allsd+$scope.Allsd;
                $scope.AllP1SD = $scope.Allmean +$scope.Allsd;
                $scope.AllN1SD = $scope.Allmean -$scope.Allsd;
                $scope.AllN2SD = $scope.Allmean -$scope.Allsd-$scope.Allsd;
                $scope.AllN3SD = $scope.Allmean -$scope.Allsd-$scope.Allsd - $scope.Allsd;
                $scope.AllP3SD = $scope.Allmean + $scope.Allsd+$scope.Allsd +$scope.Allsd;
                $scope.CV = $scope.Allsd*100/$scope.Allmean;
                console.log("cv =",$scope.CV);
                //chart
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);
                

                function drawChart() {
                    var data_temp = [
                        ['No', 'QC Result']
                    ];
                    RowItemSelect2.forEach(function (val, i) {
                        data_temp.push([i + 1, val]);
                    });

                    var data = google.visualization.arrayToDataTable(data_temp);

                    var options = {
                        title: 'QC Result',
                        curveType: 'function',
                        legend: {
                            position: 'bottom'
                        },

                        vAxis: {
                            title: 'Reslut',
                            ticks: [{
                                    v: $scope.AllN3SD,
                                    f: '-3SD'
                                }, {
                                    v: $scope.AllN2SD,
                                    f: '-2SD'
                                }, {
                                    v: $scope.AllN1SD,
                                    f: '-1SD'
                                }, {
                                    v: $scope.Allmean,
                                    f: 'Mean'
                                },
                                {
                                    v: $scope.AllP1SD,
                                    f: '+1SD'
                                }, {
                                    v: $scope.AllP2SD,
                                    f: '+2SD'
                                }, {
                                    v: $scope.AllP3SD,
                                    f: '+3SD'
                                }
                            ]
                            //, {SD: $scope.AllN2SD}, {SD:$scope.Allmean}, {SD:$scope.AllP1SD}, {SD:$scope.AllP2SD},{SD:$scope.AllP3SD}
                        }
                    };
                    var id = 0;
                    var gridlines = [
                        '#ff0000',
                        '#FF8B00',
                        '#00ff00',
                        '#000000',
                        '#00ff00',
                        '#FF8B00',
                        '#ff0000'
                    ];

                    var container = document.getElementById('curve_chart');
                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    google.visualization.events.addListener(chart, 'ready', function () {
                        var gridlineIndex = 0;
                        Array.prototype.forEach.call(container.getElementsByTagName('rect'), function (rect, index) {
                            if (rect.getAttribute('height') === '1') {
                                rect.setAttribute('fill', gridlines[gridlineIndex]);
                                gridlineIndex++;
                            }
                        });
                    });
                    chart.draw(data, options);
                }
                
            });
           
                $http.get('/QC/QueryItemCompare/' + id_main +'/'+id_qc_level).then(function (response) {
                    $scope.dataFromSetup = response.data.data;
                    console.log('dataFromSetup', $scope.dataFromSetup)
                    $scope.Allmean2 = $scope.dataFromSetup[0].mean;
                    $scope.Allsd2 = $scope.dataFromSetup[0].sd;
                    $scope.AllP2SD2 = $scope.Allmean2 +$scope.Allsd2+$scope.Allsd2;
                    $scope.AllP1SD2 = $scope.Allmean2 +$scope.Allsd2;
                    $scope.AllN1SD2 = $scope.Allmean2 -$scope.Allsd2;
                    $scope.AllN2SD2 = $scope.Allmean2 -$scope.Allsd2-$scope.Allsd2;
                    $scope.AllN3SD2 = $scope.Allmean2 -$scope.Allsd2-$scope.Allsd2 - $scope.Allsd2;
                    $scope.AllP3SD2 = $scope.Allmean2 +$scope.Allsd2+$scope.Allsd2 +$scope.Allsd2;
                    $scope.CV2 = $scope.Allsd2*100/$scope.Allmean2;
                    console.log("cv2 =",$scope.CV2);
                    //chart
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart2);
                    function drawChart2() {
                        var data_temp2 = [
                            ['No', 'QC Result']
                        ];
                        RowItemSelect2.forEach(function (val, i) {
                            data_temp2.push([i + 1, val]);
                        });
    
                        var data2 = google.visualization.arrayToDataTable(data_temp2);
    
                        var options2 = {
                            title: 'QC Result',
                            curveType: 'function',
                            legend: {
                                position: 'bottom'
                            },
    
                            vAxis: {
                                title: 'Reslut',
                                ticks: [{
                                        v: $scope.AllN3SD2,
                                        f: '-3SD'
                                    }, {
                                        v: $scope.AllN2SD2,
                                        f: '-2SD'
                                    }, {
                                        v: $scope.AllN1SD2,
                                        f: '-1SD'
                                    }, {
                                        v: $scope.Allmean2,
                                        f: 'Mean'
                                    },
                                    {
                                        v: $scope.AllP1SD2,
                                        f: '+1SD'
                                    }, {
                                        v: $scope.AllP2SD2,
                                        f: '+2SD'
                                    }, {
                                        v: $scope.AllP3SD2,
                                        f: '+3SD'
                                    }
                                ]
                                //, {SD: $scope.AllN2SD}, {SD:$scope.Allmean}, {SD:$scope.AllP1SD}, {SD:$scope.AllP2SD},{SD:$scope.AllP3SD}
                            }
                        };
                        var id = 0;
                        var gridlines = [
                            '#ff0000',
                            '#FF8B00',
                            '#00ff00',
                            '#000000',
                            '#00ff00',
                            '#FF8B00',
                            '#ff0000'
                        ];
    
                        var container = document.getElementById('curve_chart2');
                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));
                        google.visualization.events.addListener(chart, 'ready', function () {
                            var gridlineIndex = 0;
                            Array.prototype.forEach.call(container.getElementsByTagName('rect'), function (rect, index) {
                                if (rect.getAttribute('height') === '1') {
                                    rect.setAttribute('fill', gridlines[gridlineIndex]);
                                    gridlineIndex++;
                                }
                            });
                        });
                        chart.draw(data2, options2);
                    }
                });
        }
    });
})();
