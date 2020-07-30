(function () {
    'use strict';
    var app = angular.module('application', []);

    app.controller('Add-profile', function ($scope, $http) {

    });

    app.controller('listname', function ($scope, $http) {
        $http.get('/QC/Qc-list-name').then(function (response) {
            $scope.listall = response.data.data;
        });
    });

    app.controller('listlevel', function ($scope, $http) {
        $http.get('/QC/Qc-list-level').then(function (response) {
            $scope.listlevel = response.data.data;
        });
    });

    app.controller('listdepartment', function ($scope, $http) {
        $http.get('/QC/Qc-list-department').then(function (response) {
            $scope.listDepartment = response.data.data;
        });
    });

    app.controller('listprofile', function ($scope, $http) {

    });

    // modal listgroupitem
    app.controller('listgroupitem', function ($scope, $http) {
        $scope.listitemselect = [];
        $scope.groupnow;
        $scope.groupnowEdit = $scope.iditemEdit;
        $scope.listitemselectEdit = [];

        $http.get('/QC/Qc-listgroupitem').then(function (response) {
            $scope.listgroup = response.data.data;
            console.log('list group', $scope.listgroup);
        });

        $("#selectitem").change(function () {
            $scope.iditem = $(this).val();
            //console.log($scope.iditem);
            $scope.groupnow = $scope.iditem;
            console.log('selectitem', $scope.iditem);
            $http.get('/QC/Qc-selected/' + $scope.iditem).then(function (response) {
                $scope.allitem = response.data.data;
                if ($scope.listitemselect.length > 0) {
                    for (var i = 0; i < $scope.listitemselect.length; i++) {
                        for (var j = 0; j < $scope.allitem.length; j++) {
                            if ($scope.allitem[j].id_lab_item == $scope.listitemselect[i].id_lab_item) {
                                $scope.allitem.splice(j, 1);
                            }
                        }
                    }
                }
            }).catch(error => {
                console.log("เกิดข้อผิดพลาด ! : " , error)
              });
        });
        $scope.ClickDelItem = function (enteredValue) {

            for (var i = 0; i < $scope.listitemselect.length; i++) {
                if ($scope.listitemselect[i].id_lab_item == enteredValue) {
                    $scope.listitemselect.splice(i, 1);
                }
            }
            $http.get('/QC/Qc-selected/' + $scope.groupnow).then(function (response) {
                $scope.allitem = response.data.data;
                if ($scope.listitemselect.length > 0) {
                    for (var i = 0; i < $scope.listitemselect.length; i++) {
                        for (var j = 0; j < $scope.allitem.length; j++) {
                            if ($scope.allitem[j].id_lab_item == $scope.listitemselect[i].id_lab_item) {
                                $scope.allitem.splice(j, 1);
                            }
                        }
                    }
                }
            }).catch(error => {
                console.log("เกิดข้อผิดพลาด ! : " , error)
              });
        }

        $scope.ClickAddItem = function (enteredValue) {
            var index_find = -1;
            for (var i = 0; i < $scope.allitem.length; i++) {
                if ($scope.allitem[i].lab_item_code == enteredValue) {
                    $scope.listitemselect.push({
                        id_lab_item: $scope.allitem[i].id_lab_item,
                        id_lab_item_sub_group: $scope.allitem[i].id_lab_item_sub_group,
                        lab_item_code: $scope.allitem[i].lab_item_code,
                        lab_item_name: $scope.allitem[i].lab_item_name,
                        mean: 0,
                        sd: 0,
                        mean_normal: $scope.allitem[i].mean_normal,
                        sd_normal: $scope.allitem[i].sd_normal
                    });
                    index_find = i;
                }
            }
            if (index_find >= 0) {
                $scope.allitem.splice(index_find, 1);
            }
        }

        //add data
        $scope.AddProfile = function () {
            $("#modal-Addprofile").modal('show');
        }

        $scope.clickSave = function () {
            $scope.profile = $("input[name='profile']").val();
            $scope.department = $("#department option:selected").val();
            $scope.qcname = $("#qcname option:selected").val();
            $scope.qclevel = $("#qclevel option:selected").val();
            $scope.number = $("input[name='number']").val();
            $scope.userid = $("input[name='userid']").val();
            $scope.hospitalid = $("input[name='hospitalid']").val();
            $http.get('/QC/Qc-add-profilemaster/' + $scope.profile + '/' + $scope.department + '/' + $scope.qcname + '/' + $scope.qclevel + '/' + $scope.number + '/' + $scope.userid + '/' + $scope.hospitalid).then(function (response) {
                var url = $("#saveProfile").data('url');
                $.ajax({
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    cache: false,
                    data: {
                        Data: $scope.listitemselect
                    },
                    success: function (msg) {
                        window.location.reload();
                    }
                });
            });

        }
        $scope.clickSaveitem = function () {
            var id = $("input[name='idprofile']").val()
            var urlsave = $('#saveItem').data('url');
            var url = $("#saveItem").data('url');
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                cache: false,
                data: {
                    Data: $scope.listitemselectEdit,
                    id: id
                },
                success: function (msg) {
                    window.location.reload();
                }
            });
        }

        $http.get('/QC/Qc-allProfile').then(function (response) {
            $scope.listprofile = response.data.data;
        });

        // click row profile main
        $scope.DataProfile = function (PID) {
            $scope.PROID = PID;
            console.log('id',$scope.PROID);
            $http.get('/QC/Qc-list-department').then(function (response) {
                $scope.allDepartment = response.data.data;
            });

            // list qcname    
            $http.get('/QC/Qc-list-name').then(function (response) {
                $scope.listname = response.data.data;
            });

            // list qcLevel
            $http.get('/QC/Qc-list-level').then(function (response) {
                $scope.listlevel = response.data.data;
            });

            $("#savepro").prop('disabled', false);
            $("input[name='idprofile']").val($scope.PROID);
            $http.get('/QC/Qc-listProfileID/' + $scope.PROID).then(function (response) {
                $scope.DataProId = response.data.data;
                $scope.profilename = $scope.DataProId[0].profile_name;
                $scope.id_profile_qc = $scope.DataProId[0].id_profile_qc;
                $scope.lotnumber = $scope.DataProId[0].lot_number;
                $scope.fname = $scope.DataProId[0].fname_create;
                $scope.date = $scope.DataProId[0].date_create;
                $scope.department = $scope.DataProId[0].id_department;
                $scope.id_qc_name = $scope.DataProId[0].id_qc_name;
                $scope.id_qc_level = $scope.DataProId[0].id_qc_level;
                var time = $scope.date.split(" ");
                $('#DepartMent option[value=' + $scope.department + ']').attr('selected', 'selected');
                $('#QCname option[value=' + $scope.id_qc_name + ']').attr('selected', 'selected');
                $('#QClevel option[value=' + $scope.id_qc_level + ']').attr('selected', 'selected');
                $('input[name="lotnumber"]').val($scope.lotnumber);
                $('input[name="priflename"]').val($scope.profilename);
                $('input[name="fname"]').val($scope.fname);
                $('input[name="date"]').val(time[0]);
                $('input[name="time"]').val(time[1]);
            });

            $http.get('/QC/QueryItemProfile/' + $scope.PROID).then(function (response) {
                $scope.listitemselectEdit = response.data.data;
                console.log('listitemselect', $scope.listitemselectEdit)
            });

            $scope.groupnowEdit = $("#selectitem").val();
                $http.get('/QC/Qc-selected/' + $scope.groupnowEdit).then(function (response) {
                    $scope.allitemEdit = response.data.data;
                    if ($scope.listitemselectEdit.length > 0) {
                        for (var i = 0; i < $scope.listitemselectEdit.length; i++) {
                            for (var j = 0; j < $scope.allitemEdit.length; j++) {
                                if ($scope.allitemEdit[j].id_lab_item == $scope.listitemselectEdit[i].id_lab_item) {
                                    $scope.allitemEdit.splice(j, 1);
                                }
                            }
                        }
                    }
                }).catch(error => {
                    console.log("เกิดข้อผิดพลาด ! : " , error)
                  });

        }
        $scope.SaveProfile = function () {
            $("#modal-askConfirm").modal('show');
        }

        //delete Profile
        $scope.clickDel = function (PROID) {
            $("#modal-askDelete").modal('show');

            $("#confirm").click(function () {
                $http.get('/QC/Qc-DeleteProfileID/' + PROID).then(function (response) {
                    $http.get('/QC/Qc-allProfile').then(function (response) {
                        $scope.listprofile = response.data.data;
                    });
                });
                $("#modal-askDelete").modal('toggle');
            });
        }

        $("#selectitemEdit").change(function () {
            $scope.iditemEdit = $(this).val();
            $scope.groupnowEdit = $scope.iditemEdit;
            $http.get('/QC/Qc-selected/' + $scope.iditemEdit).then(function (response) {
                $scope.allitemEdit = response.data.data;
                if ($scope.allitemEdit.length > 0 && $scope.listitemselectEdit.length > 0 ) {
                    for (var i = 0; i < $scope.allitemEdit.length; i++) {
                        for (var j = 0; j < $scope.listitemselectEdit.length; j++) {
                            if ($scope.listitemselectEdit[j].id_lab_item == $scope.allitemEdit[i].id_lab_item) {
                                $scope.allitemEdit.splice(i, 1);
                            }
                        }
                    }
                }
            }).catch(error => {
                console.log("เกิดข้อผิดพลาด ! : " , error)
              });
        });

        $scope.ClickAddItemEdit = function (enteredValue) {
            var index_find = -1;
            for (var i = 0; i < $scope.allitemEdit.length; i++) {
                if ($scope.allitemEdit[i].id_lab_item == enteredValue) {
                    $scope.listitemselectEdit.push({
                        id_lab_item: $scope.allitemEdit[i].id_lab_item,
                        id_lab_item_sub_group: $scope.allitemEdit[i].id_lab_item_sub_group,
                        lab_item_code: $scope.allitemEdit[i].lab_item_code,
                        lab_item_name: $scope.allitemEdit[i].lab_item_name,
                        mean: 0,
                        sd: 0,
                        mean_normal: $scope.allitemEdit[i].mean_normal,
                        sd_normal: $scope.allitemEdit[i].sd_normal,
                        lab_item_unit: $scope.allitemEdit[i].lab_item_unit
                    });
                    index_find = i;
                }
            }
            if (index_find >= 0) {
                $scope.allitemEdit.splice(index_find, 1);
            }
        }

        $scope.ClickDelItemEdit = function (enteredValue){
            for (var i = 0; i < $scope.listitemselectEdit.length; i++) {
                if ($scope.listitemselectEdit[i].id_lab_item == enteredValue) {
                    $scope.listitemselectEdit.splice(i, 1);
                }
            }
            $http.get('/QC/Qc-selected/' + $scope.groupnowEdit).then(function (response) {
                $scope.allitemEdit = response.data.data;
                if ($scope.listitemselectEdit.length > 0) {
                    for (var i = 0; i < $scope.listitemselectEdit.length; i++) {
                        for (var j = 0; j < $scope.allitemEdit.length; j++) {
                            if ($scope.allitemEdit[j].id_lab_item == $scope.listitemselectEdit[i].id_lab_item) {
                                $scope.allitemEdit.splice(j, 1);
                            }
                        }
                    }
                }
            }).catch(error => {
                console.log("เกิดข้อผิดพลาด ! : " , error)
              });
        }
    });

    $("#confirm-Askconfirm").click(function () {
        var id = $("input[name='idprofile']").val();
        var department = $('#DepartMent').val();
        var profilename = $('input[name="priflename"]').val();
        var qcname = $('#QCname').val();
        var qclevel = $('#QClevel').val();
        var lotnumber = $("input[name='lotnumber']").val();
        var modify = $("input[name='modify']").val();
        var urlEdit = $("#savepro").attr('data-url');

        $.ajax({
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: urlEdit,
            cache: false,
            data: {
                id: id,
                department: department,
                profilename: profilename,
                qcname: qcname,
                qclevel: qclevel,
                lotnumber: lotnumber,
                modify: modify
            },
            success: function (msg) {
                if (msg == 1) {
                    window.location.reload();
                }
            }
        });
    })
})();
