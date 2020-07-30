<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> System Management >> Test Data Management</label>
<!-- END STATUS -->

<div class="parent container-fluid">
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
                                            <h3>LAB ITEM Data Management</h3>
                                        </div>
                                            <div class="col-lg-8">
                                                <button class="add-button" ng-click="Add()">
                                                    <i class="fa fa-plus"></i> Add Data
                                                </button>
                                            </div>
                                        <div class="col-lg-4">
                                            Search : <input name="search" placeholder="Item Code , Item Name" type="text" ng-model="filter" ng-change="clearFilter()" style="margin-bottom:15px; width:80%">
                                            <button type="submit" class="main-button" ng-click="searchLabItem()">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                        <div  class="col-lg-8" style="float: right;">
                                            <button id="saveOrder" class="btn btn-success" ng-click="saveOrder()">Save order</button>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">    
                                        <table  class="table tableScroll" style="width:100%; height:600px;">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">ID ITEM</th>
                                                    <th>No</th>
                                                    <th>Item Code</th>
                                                    <th>Item Name</th>
                                                    <th>Unit</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    <th>Order</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sortable" class="tbodyScroll " >
                                                <tr id="{{data.id_lab_item}}" ng-value="{{data}}" ng-repeat="data in LabItemGroup"  class= "trScroll customSortable">
                                                    <td class="fixed index">{{$index+1}}</td>    
                                                    <td style="display: none;">{{data.id_lab_item}}</td>  
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
                                                    <td><i class="fa fa-sort" aria-hidden="true"></i></td>
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