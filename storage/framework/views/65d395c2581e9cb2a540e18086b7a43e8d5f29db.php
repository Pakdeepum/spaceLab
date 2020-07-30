<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> Profile Test >> Profile Test Setup </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row" ng-controller="listgroupitem">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-bottom: 20px;" class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Profile Test</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div style="margin-bottom:15px; margin-top:15px;">
                                                <label>Profile</label>
                                            </div>
                                            <div style="margin-bottom:15px; margin-top:15px;">
                                              <button class="main-button" ng-click="CreateProfile(true)"><i class="fa fa-save"></i> Create Profile</button>
                                              <label>Or</label>
                                              <button class="edit-button" ng-click="CreateProfile(false)"><i class="fa fa-edit"></i> Edit Profile</button>
                                            </div>

                                            <div class="row" ng-show="IsCreateProfile">
                                            <div class="col-lg-6">
                                                <div align="right">
                                                    <label>Profile Name : </label>
                                                    <input  type="text" name="nameCreateProfile" ng-model="nameCreateProfile" style="width: 60%; margin-bottom:5px;">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div align="right">
                                                    <label>Create By : </label>
                                                    <input type="text" name="fname" disabled style="width: 70%; margin-bottom:5px;">
                                                    <input type="text" name="date" style="width: 34%; margin-bottom:5px;"
                                                        disabled>
                                                    <input type="text" name="time" style="width: 34%; margin-bottom:5px;"
                                                        disabled>
                                                    <p>
                                                        <label>Modify By : </label>
                                                        <?php $times = date_default_timezone_set('Asia/Bangkok');
                                                        $datetoday = date('d-m-Y'); $timetoday = date('H:i:s'); ?>
                                                        <input type="text" style="width: 70%; margin-bottom:5px;" name="modify"
                                                            value="<?php echo e($user['fname']); ?>" disabled>
                                                        <input type="text" style="width: 34%;" value="<?php echo e($datetoday); ?>" disabled>
                                                        <input type="text" style="width: 34%;" value="<?php echo e($timetoday); ?>" disabled>
                                                        <input type="hidden" name="idprofile" >
                                                </div>
                                            </div>
                                          </div>
                                          <!--end CreateProfile row -->
                                          <!--Edit Profile row -->
                                          <div class="row" ng-show="!IsCreateProfile">
                                            <div class="col-lg-12">
                                            <div style="margin-bottom:15px; margin-top:15px;">
                                                <label>Edit Profile Test</label>
                                            </div>
                                            <div>
                                                <label>Please Select Profile For Edit</label>
                                                <select id="profileSelectForEdit" ng-options="data.profile_name for data in listAllProfile"  ng-model="data" ng-change="selectEditProfile(data.id_profile_test)" class="form-control">
                                                  <option value="data.profile_name"></option>
                                                </select>
                                                <div ng-show="nameEditProfile.length>0">
                                                <label>Edit Profile Name : </label><input type="text" name="nameEditProfile" ng-model="nameEditProfile" style="width: 60%;margin-left:10px; margin-top:15px; margin-bottom:5px;">
                                                <button class="del-button" ng-click="clickDel(listLabItemOfProfile.id_profile_test)">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                <br>

                                              </div>
                                            </div>
                                            </div>
                                          </div>
                                          <!--end EditProfile row -->
                                                <div class="row">
                                                  <div class="col-lg-12">
                                                      <hr>
                                                      <label>Profile Item</label>
                                                      <button ng-show="IsCreateProfile" class="save-button" id="savepro" style="float:right;" ng-click="SaveProfile()" ng-disabled="listitemselectEdit.length<=0||nameCreateProfile.length==0"
                                                          data-url="<?php echo e(route('profileTest-CreateProfileTest')); ?>">
                                                          <i class="fa fa-save"></i> Create Profile</button>
                                                      <button ng-show="!IsCreateProfile" ng-click="clickSaveitem()" id="saveItem" data-url="<?php echo e(route('profileTest-EditProfileTest')); ?>" ng-disabled="listitemselectEdit.length<=0||nameEditProfile.length==0"
                                                          class="save-button" style="float:right; margin-bottom:15px;">
                                                          <i class="fa fa-save"></i> Edit Profile Item</button>
                                                      </div>
                                                      <table class="table" style="width:100%">
                                                          <thead>
                                                              <tr>
                                                                  <th>No.</th>
                                                                  <th>Code</th>
                                                                  <th>Name</th>
                                                                  <th>Unit</th>
                                                                  <th>Delete</th>
                                                              </tr>
                                                          </thead>
                                                          <tr ng-repeat="dataitemqc in listitemselectEdit">
                                                              <td>{{$index+1}}</td>
                                                              <td>{{dataitemqc.lab_item_code}}</td>
                                                              <td>{{dataitemqc.lab_item_name}}</td>
                                                              <td>{{dataitemqc.lab_item_unit}}</td>
                                                              <td>
                                                                  <button class="del-button" ng-click="ClickDelItemEdit(dataitemqc.id_lab_item)">
                                                                      <i class="fa fa-trash-o"></i>
                                                                  </button>
                                                              </td>
                                                          </tr>
                                                      </table>
                                                  </div>

                                        </div>

                                        <div class="col-lg-6">

                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <div style="margin-bottom:15px; margin-top:15px;">
                                                              <label>Lab Group</label>
                                                          </div>
                                                            <div class="form-group">

                                                                <select name="selectitemEdit" id="selectitemEdit" class="form-control" ng-disabled="listitemselectEdit.length>0">
                                                                    <option ng-repeat="data in listgroup"  ng-model="data.id_lab_sub_group_item" value="{{data.id_lab_sub_group_item}}">{{data.lab_sub_group_name}}</option>
                                                                </select>
                                                            </div>
                                                            <p style="margin-bottom:15px;">Test Item</p>
                                                            <input type="text" ng-model="serchitem" style="width:80%;margin-bottom:15px;">
                                                            <button class="main-button"><i class="fa fa-search"></i></button>
                                                            <table class="table" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Code</th>
                                                                        <th>Name</th>
                                                                        <th>Unit</th>
                                                                        <th>Group</th>
                                                                        <th>Add</th>
                                                                    </tr>
                                                                </thead>
                                                                <tr ng-repeat="allitems in allitemEdit | filter : serchitem">
                                                                    <td>{{allitems.lab_item_code}}</td>
                                                                    <td>{{allitems.lab_item_name}}</td>
                                                                    <td>{{allitems.lab_item_unit}}</td>
                                                                    <td>{{allitems.id_lab_item_sub_group}}</td>
                                                                    <td>
                                                                        <button class="add-button" ng-click="ClickAddItemEdit(allitems.id_lab_item)">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>

                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</div>
<?php echo $__env->make('modals-center.modals-askDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-askConfirm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/management/management-profileTest/profileTest.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>