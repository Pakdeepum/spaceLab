<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> QC >> QC Setup </label>
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
                                    <h2> แบบฟอร์ม QC </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 header-card">
                                            <div class="col-lg-6 text-left">
                                                <h3>ชื่อแบบฟอร์ม QC</h3>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <button ng-controller="Add-profile" id="btn-add" ng-click="AddProfile()"
                                                    class="add-button" style="margin-bottom:15px; margin-top:15px;">
                                                    <i class="fa fa-plus"></i> Add Profile
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-hover tablePointer" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Profile name</th>
                                                <th>Department</th>
                                                <th>QC Name</th>
                                                <th>QC Level</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tr ng-repeat="data in listprofile" class="row-profile" ng-click="DataProfile(data.id_profile_qc)"
                                            data-idprofile="{{data.id_profile_qc}}">

                                            <td>{{$index+1}}</td>
                                            <td>{{data.profile_name}}</td>
                                            <td>{{data.department_name}}</td>
                                            <td>{{data.qc_name}}</td>
                                            <td>{{data.qc_level}}</td>
                                            <td>
                                                <button class="del-button" ng-click="clickDel(data.id_profile_qc)">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div style="margin-bottom:15px; margin-top:15px;">
                                                <label>Profile</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <div align="right">
                                                    <label>Profile Name : </label>
                                                    <input type="text" name="priflename" style="width: 60%; margin-bottom:5px;">
                                                    <br>
                                                    <label>Department : </label>
                                                    <select style="width: 60%; margin-bottom:5px;" id="DepartMent">
                                                        <option ng-repeat="val in allDepartment" value="{{val.id_department}}">{{val.department_name}}</option>
                                                    </select>
                                                    <br>
                                                    <label>QC Name : </label>
                                                    <select style="width: 60%; margin-bottom:5px;" id="QCname">
                                                        <option ng-repeat="data in listname" value="{{data.id_qc_name}}">{{data.qc_name}}</option>
                                                    </select>
                                                    <br>
                                                    <label>QC Level : </label>
                                                    <select style="width: 60%; margin-bottom:5px;" id="QClevel">
                                                        <option ng-repeat="data in listlevel" value="{{data.id_qc_level}}">{{data.qc_level}}</option>
                                                    </select>
                                                    <br>
                                                    <label>Lot. Number : </label>
                                                    <input type="text" style="width:60%; margin-bottom:5px;" name="lotnumber">
                                                    <br>
                                                    <input type="hidden" id="idProfile" name="idProfile" value="{{id_profile_qc}}">
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
                                                            value="<?php echo e($user['fname']); ?>">
                                                        <input type="text" style="width: 34%;" value="<?php echo e($datetoday); ?>">
                                                        <input type="text" style="width: 34%;" value="<?php echo e($timetoday); ?>">
                                                        <input type="hidden" name="idprofile">
                                                </div>
                                            </div>
                                            <button class="save-button" id="savepro" style="float:right;" ng-click="SaveProfile()"
                                                disabled data-url="<?php echo e(route('QC-setup-EditProfile')); ?>">
                                                <i class="fa fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                    <div class="col-lg-12">
                                            <hr>
                                            <div class="col-lg-12">
                                                <label>Profile Item</label>
                                                <button ng-click="clickSaveitem()" id="saveItem" data-url="<?php echo e(route('QC-setup-EditProfileItem')); ?>"
                                                    class="save-button" style="float:right; margin-bottom:15px;">
                                                    <i class="fa fa-save"></i> Save Profile Item</button>
                                                <table class="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>Mean</th>
                                                            <th>SD</th>
                                                            <!--<th>Mean Normal</th>
                                                            <th>SD Normal</th> -->
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tr ng-repeat="dataitemqc in listitemselectEdit">
                                                        <td>{{index+1}}</td>
                                                        <td>{{dataitemqc.lab_item_code}}</td>
                                                        <td>{{dataitemqc.lab_item_name}}</td>
                                                        <td><input type="text" size="5" class="text-right" ng-model='dataitemqc.mean'></td>
                                                        <td><input type="text" size="5" class="text-right" ng-model='dataitemqc.sd'></td>
                                                        <!--<td>{{dataitemqc.mean_normal}}</td>
                                                        <td>{{dataitemqc.sd_normal}}</td> -->
                                                        <td>
                                                            <button class="del-button" ng-click="ClickDelItemEdit(dataitemqc.id_lab_item)">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <select id="selectitemEdit" class="form-control">
                                                                <option ng-repeat="data in listgroup" value="{{data.id_lab_sub_group_item}}">{{data.lab_sub_group_name}}</option>
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
<?php echo $__env->make('QC.QC-setup.Modals.modals-addprofile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/QC/QC-setup/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>