<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> จัดการระบบ >> จัดการข้อมูลกลุ่มแลป </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12" ng-controller="listitem">
            <div class="main-content-container container-fluid px-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>ข้อมูลรายการตรวจที่ไม่มีกลุ่มแลป</h3>
                                </div>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Item name</th>
                                            <th>Unit</th>
                                            <th>เพิ่ม</th>
                                        </tr>
                                    </thead>
                                    <tr ng-repeat="data in listitem">
                                        <td>{{$index+1}}</td>
                                        <td>{{data.lab_item_name}}</td>
                                        <td>{{data.lab_item_unit}}</td>
                                        <td>
                                            <button class="add-button" ng-click="ClickAddItem(data.id_lab_item)">
                                                <i class="fa fa-plus"></i>
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
                                <div class="col-lg-12">
                                    <div class="form-group text-right">
                                        <button ng-click="SaveData()" id="btn-saveItem"
                                            data-url="<?php echo e(route('Config.UpdateItemConfig')); ?>" class="main-button">
                                            <i class="fa fa-save"></i> บันทึกกลุ่มแลป
                                        </button>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 style="color: #1b1e24; font-size: 15px; font-weight: 500;">ข้อมูลกลุ่มแลป
                                        </h3>
                                    </div>
                                    <div class="col-lg-10 text-right" style="margin-bottom: 20px;">
                                        <select id="selectitem" class="form-control">
                                            <option ng-repeat="data in listgroup"
                                                value="{{data.id_lab_sub_group_item}}">{{data.lab_sub_group_name}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Group</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tr ng-repeat="data in allitem | filter : serchitem">
                                    <td>{{data.lab_item_code}}</td>
                                    <td>{{data.lab_item_name}}</td>
                                    <td>{{data.lab_item_unit}}</td>
                                    <td>{{data.id_lab_item_sub_group}}</td>
                                    <td>
                                        <button class="del-button" ng-click="ClickDelItem(data.id_lab_item)">
                                            <i class="fa fa-trash-o"></i>
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
</main>
</div>
</div>
<script src="<?php echo e(asset('js/management/management-setitem/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>