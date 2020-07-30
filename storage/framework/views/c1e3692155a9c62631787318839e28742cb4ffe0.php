<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> จัดการระบบ >> จัดการข้อมูล TEST ITEM </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12" ng-controller="LabItemController">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">   
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="header-card">
                                            <h3>จัดการข้อมูล LAB ITEM</h3> 
                                        </div>
                                            <div class="col-lg-8">
                                                <button class="add-button" ng-click="Add()">
                                                    <i class="fa fa-plus"></i> เพิ่มข้อมูล
                                                </button>
                                            </div>
                                        <div class="col-lg-4">
                                            ค้นหา : <input name="search" placeholder="Item Code , Item Name" type="text" ng-model="filter" ng-change="clearFilter()" style="margin-bottom:15px; width:80%">
                                            <button type="submit" class="main-button" ng-click="searchLabItem()">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">    
                                        <table  class="table tableScroll" style="width:100%; height:500px;">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">ID ITEM</th>
                                                    <th>ลำดับ</th>
                                                    <th>Item Code</th>
                                                    <th>Item Name</th>
                                                    <th>Unit</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbodyScroll" style="height:500px">
                                                <tr ng-repeat="data in LabItemGroup"  class= "trScroll">
                                                    <td style="display: none;">{{data.id_lab_item}}</td>
                                                    <td>{{$index+1}}</td>
                                                    <td>{{data.lab_item_code}}</td>
                                                    <td>{{data.lab_item_name}}</td>
                                                    <td>{{data.lab_item_unit}}</td>
                                                    <td>
                                                        <button data-val="{{data.id_lab_item}}" id="btnedit" class="edit-button" ng-click="EditLab(data.id_lab_item)">
                                                        <input name="edithidden" type="hidden" value="{{data.id_lab_item}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button data-val="{{data.id_lab_item}}" id="btndel" class="del-button" ng-click="DelLab(data.id_lab_item)">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>                                        
                                        </table>
                                    </div>
                                </div>        
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('modals-center.modals-askDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </main>
    </div>
</div>

<?php echo $__env->make('management.management-labitem.Modals.management-labitem-add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('management.management-labitem.Modals.management-labitem-edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('js/management/management-labitem/form.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>