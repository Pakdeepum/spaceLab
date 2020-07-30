(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('LabItemController', function($scope, $http){
        document.getElementById("saveOrder").style.display = "none";
        $http.get('/management/manageLabitem/ListItemLab').then(function(response){
            $scope.LabItemGroup = response.data.data;
        });
        $(function () {
            var fixHelperModified = function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width())
                    $(this).height($originals.eq(index).height())
                });
                    return $helper;
            },
            
            updateIndex = function(e, ui) {
                                
                $('td.index', ui.item.parent()).each(function (i) {
                    $(this).html(i + 1);
                                    
                });
                document.getElementById("saveOrder").style.display = "block";
            };
            $("#sortable").sortable({
                scroll: true,
                axis: 'y',
                items: 'tr',
                containment: 'parent',
                cursor: 'move',
                tolerance: 'pointer',
                helper: fixHelperModified,
                stop: updateIndex,
                update: function (event, ui) {
                    var order = $(this).sortable('serialize');
                }
            }).disableSelection();
            $('#saveOrder').on('click', function () {
                var r = $("#sortable").sortable("toArray");
                var a = $("#sortable").sortable("serialize", {
                    attribute: "id"
                });
                console.log(r, a);
                $.ajax({
                    url: "/management/manageLabitem/UpdateOrder",
                    type:'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    data: {itemID: r},
                    })
                    window.location.reload();
            });
        });
        $scope.searchLabItem = function(){
            $http.get('/management/manageLabitem/getItemLab?filter='+$scope.filter).then(function(response){
                  $scope.LabItemGroup = response.data.data;
            });
        }

        $scope.Add = function(){
            $("#modal-management-LabItem-addItem").modal('show');
        }
        $scope.EditLab = function(IDLab){
            $http.get('/management/manageLabitem/ListItemLab/'+IDLab).then(function(response){
                $scope.DatalabEdit = response.data.data;
                $("input[name='ItemCodeAdd']").val($scope.DatalabEdit[0].lab_item_code);
                $("input[name='ItemNameAdd']").val($scope.DatalabEdit[0].lab_item_name);
                $("input[name='ThaiNameAdd']").val($scope.DatalabEdit[0].thai_name);
                $("input[name='EnglishNameAdd']").val($scope.DatalabEdit[0].eng_name);
                $("input[name='HintAdd']").val($scope.DatalabEdit[0].hint);
                $("input[name='DefaultAdd']").val($scope.DatalabEdit[0].lab_default_value);
                $("input[name='NormalAdd']").val($scope.DatalabEdit[0].lab_normal_value);
                $("input[name='MaleNormalAdd']").val($scope.DatalabEdit[0].lab_male_normal_value);
                $("input[name='FemaleNormalAdd']").val($scope.DatalabEdit[0].lab_female_normal_value);
                $("input[name='ChildNormalAdd']").val($scope.DatalabEdit[0].lab_child_normal_value);
                $("input[name='PedNormalAdd']").val($scope.DatalabEdit[0].lab_pad_normal_value);
                $("input[name='idLab']").val($scope.DatalabEdit[0].id_lab_item);
                $("input[name='UnitAdd']").val($scope.DatalabEdit[0].lab_item_unit);
                $("input[name='CriticalAdd']").val($scope.DatalabEdit[0].critical_value);
                $("#ItemTypeShow").val($scope.DatalabEdit[0].id_Item_type);
                $("#ItemTypeShow").text( $scope.DatalabEdit[0].item_type_name);
                $("#ItemTypeShow").attr('selected','selected');
                $("#GroupBarcodeAdd option[value='"+$scope.DatalabEdit[0].id_group_barcode+"']").attr('selected','selected');
                $("#GroupResultAdd option[value='"+$scope.DatalabEdit[0].id_group_result+"']").attr('selected','selected');
                $("#LabBarcodeAdd option[value='"+$scope.DatalabEdit[0].id_lab_barcode+"']").attr('selected','selected');
                $("#LabSpecimenAdd option[value='"+$scope.DatalabEdit[0].id_lab_specimen_item+"']").attr('selected','selected');
                $("#OutLabAdd option[value='"+$scope.DatalabEdit[0].out_lab+"']").attr('selected','selected');
                $("input[name='Decimale']").val($scope.DatalabEdit[0]._decimal);
            }).catch(error =>{
                console.log(error)
            });
            $("#modal-management-itemlab-editlab").modal('show');
        }
        $scope.DelLab = function(ItemID){
            $scope.ItemID = ItemID;
            $("#modal-askDelete").modal('show');
        }
        $("#confirm").click(function(){
            $http.get('/management/manageLabitem/DelLab/'+ $scope.ItemID).then(function(response){
                // window.location.reload();
                $("#modal-askDelete").modal('hide');

            });
            $http.get('/management/manageLabitem/ListItemLab').then(function(response){
                $scope.LabItemGroup = response.data.data;
            });
        });
    });

    app.controller('ItemTypeListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListItemLabType').then(function(response){
            $scope.ItemTypeData = response.data.data;
        });
    });

    app.controller('GroupBarcodeListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListGroupBarcode').then(function(response){
            $scope.GroupBarcodeData = response.data.data;
        });
    });

    app.controller('GroupResultListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListGroupResult').then(function(response){
            $scope.GroupResultData = response.data.data;
        });
    });

    app.controller('LabBarcodeListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListLabBarcode').then(function(response){
            $scope.LabBarcodeData = response.data.data;
        });
    });

    app.controller('ListSpecimenListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListSpecimen').then(function(response){
            $scope.ListSpecimenData = response.data.data;
        });
    });


    app.controller('EditItemTypeListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListItemLabType').then(function(response){
            $scope.ItemTypeData = response.data.data;
        });
    });

    app.controller('EditGroupBarcodeListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListGroupBarcode').then(function(response){
            $scope.GroupBarcodeData = response.data.data;
        });
    });

    app.controller('EditGroupResultListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListGroupResult').then(function(response){
            $scope.GroupResultData = response.data.data;
        });
    });

    app.controller('EditLabBarcodeListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListLabBarcode').then(function(response){
            $scope.LabBarcodeData = response.data.data;
        });
    });

    app.controller('EditListSpecimenListController', function($scope,$http){
        // combobox list data PrefixMaster
        $http.get('/management/manageLabitem/ListSpecimen').then(function(response){
            $scope.ListSpecimenData = response.data.data;
        });
    });

})();
