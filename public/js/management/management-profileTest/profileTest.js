(function () {
    'use strict';
    var app = angular.module('application', []);

  

    // modal listgroupitem
    app.controller('listgroupitem', function ($scope, $http) {
        $scope.listitemselect = [];
        $scope.groupnow;
        $scope.groupnowEdit = $scope.iditemEdit;
        $scope.listitemselectEdit = [];
        $scope.IsCreateProfile = true;
        $scope.nameCreateProfile = "";
        $scope.IsEditProfileChangeSelect = true;
        $scope.nameEditProfile="";
        $scope.CreateProfile = function(isCreate){
          $scope.IsCreateProfile = isCreate;
          if($scope.IsCreateProfile==false){
            $http.get('/management/profileTest/getAllProfile').then(function (response) {
              $scope.listAllProfile = response.data.data;
              console.log('$scope.listAllProfile',$scope.listAllProfile);
              //$("#profileSelectForEdit").trigger("change");
            });
          }
          $scope.listitemselectEdit.length=0;
          $scope.nameEditProfile="";
        }
        $scope.selectEditProfile = function(id){
          $scope.IsEditProfileChangeSelect = true;
            if(id=="undefined"||id==null){
              return;
            }
            $scope.listitemselectEdit.length=0;
            console.log('selectedEditProfile:',id);
            $http.get('/management/profileTest/getProfile/'+id).then(function (response) {
              $scope.listLabItemOfProfile = response.data.data;
              $scope.nameEditProfile = $scope.listLabItemOfProfile.profile_name;
              console.log('select profile:',$scope.nameEditProfile);
              console.log('listLabItemOfProfile',  $scope.listLabItemOfProfile);
              var id_lab_sub_group = $scope.listLabItemOfProfile.id_lab_sub_group_item;
              console.log('lab sub group:',id_lab_sub_group);
              $("#selectitemEdit").val(id_lab_sub_group);
              $("#selectitemEdit").trigger("change");
              //$("#selectitemEdit option[value="+id_lab_sub_group+"]").prop('selected', 'selected');
            //$scope.listitemselectEdit =   $scope.listLabItemOfProfile.profile_test_item_detail;
            });
        }
        // $("#profileSelectForEdit").change(function(){
        //   console.log('selectEditProfile id:');
        // });
        $http.get('/QC/Qc-listgroupitem').then(function (response) {
            $scope.listgroup = response.data.data;
            console.log('$scope.listgroup',$scope.listgroup);
            $("#selectitemEdit").trigger("change");
            $("#selectitem").trigger("change");
        });


        $scope.clickSaveitem = function () {
          console.log("Edit profile clcik save item");
            var profile_name_edit = $scope.nameEditProfile;
            var url = $("#saveItem").data('url');
            console.log("profile_name_edit:",profile_name_edit);
            console.log("$scope.listitemselectEdit:",$scope.listitemselectEdit);
            var id_profile_test = $scope.listLabItemOfProfile.id_profile_test;
            var id_lab_sub_group =$scope.iditemEdit;
            console.log("id_profile_test",id_profile_test);
            console.log("id_lab_sub_group",id_lab_sub_group);
            console.log('url:',url);
            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                cache: false,
                data: {
                  id: id_profile_test,
                  profile_name:profile_name_edit,
                  id_lab_sub_group_item: id_lab_sub_group,
                  lab_item: $scope.listitemselectEdit,
                },
                success: function (msg) {
                  if(msg.success){
                    console.log('edit profile success:',msg);
                    window.location.reload();
                  }else{
                    console.log('error edit profile test:',msg);
                  }

                }
            });
        }

        $http.get('/QC/Qc-allProfile').then(function (response) {
            $scope.listprofile = response.data.data;
        });



        $scope.SaveProfile = function () {
            $("#modal-askConfirm").modal('show');
        }

        //delete Profile
        $scope.clickDel = function (PROID) {
            $("#modal-askDelete").modal('show');
            console.log('clickDel:',PROID);
            $("#confirm").click(function () {
                $http.get('/management/profileTest/DeleteProfileTest/' + PROID).then(function (response) {
                  console.log('success delete profile test',response);
                  $http.get('/management/profileTest/getAllProfile').then(function (response) {
                    $scope.listAllProfile = response.data.data;
                    $scope.nameEditProfile="";
                    console.log('$scope.listAllProfile',$scope.listAllProfile);
                  });
                });
                $("#modal-askDelete").modal('toggle');
            });
        }

        $("#selectitemEdit").change(function () {
          console.log('this:',$(this).val());

            $scope.iditemEdit = $(this).val();
            if($scope.iditemEdit==null){
                $scope.iditemEdit= $scope.listgroup[0].id_lab_sub_group_item;
                  console.log('iditemEdit:',$scope.iditemEdit);
            }
            $scope.groupnowEdit = $scope.iditemEdit;
            if($scope.iditemEdit!=null){
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
                  if($scope.IsEditProfileChangeSelect){
                    if($scope.listLabItemOfProfile!=null){
                      $scope.listitemselectEdit.length=0;
                      for(var i=0;i<$scope.listLabItemOfProfile.profile_test_item_detail.length;i++){
                        $scope.ClickAddItemEdit($scope.listLabItemOfProfile.profile_test_item_detail[i].id_lab_item);
                      }
                    }
                    $scope.IsEditProfileChangeSelect = false;
                  }

              }).catch(error => {
                  console.log("เกิดข้อผิดพลาด ! : " , error)
                });
            }

        });

        $scope.ClickAddItemEdit = function (enteredValue) {
          //console.log('$scope.ClickAddItemEdit',enteredValue);
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
        $("#confirm-Askconfirm").click(function () {
          console.log("confirm-Askconfirm");

            var id_lab_sub_group = $("select[name='selectitemEdit']").find(':selected').val();
            var nameCreate = $("input[name='nameCreateProfile']").val();//$scope.nameCreateProfile;
            var urlCreate = $("#savepro").attr('data-url');
            console.log("nameCreate:",nameCreate);
            console.log("urlCreate:",urlCreate);
            console.log("id_lab_sub_group:",id_lab_sub_group);
            console.log("lab item data:",$scope.listitemselectEdit);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: urlCreate,
                cache: false,
                data: {
                    id_lab_sub_group_item: id_lab_sub_group,
                    profile_name: nameCreate,
                    lab_item : $scope.listitemselectEdit,
                },
                success: function (msg) {
                    if(msg.success){
                        window.location.reload();
                    }else{
                      console.log("error:",msg);
                    }
                }
            });
        })
    });
})();
