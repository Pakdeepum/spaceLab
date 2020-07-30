<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> จัดการระบบ >> จัดการเมนู </label>
<!-- END STATUS -->

<div class="container-fluid" ng-controller="listmaster">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        <div class="card">   
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>ข้อมูลกลุ่มผู้ใช้</h3>
                                </div>
                                <p align="center" class="profile-main">ตัวเลือกการจัดการ</p>
                                <hr>
                                <select id="selectMenu" class="form-control">
                                    <option value="0">เลือกรายการ</option>
                                    <option ng-repeat="data in listgroup" value="{{data.id_group_user}}">{{data.group_user_name}}</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="card">   
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>ข้อมูลเมนู</h3>
                                </div>
                                <button ng-click="AddMenu()" style="margin-bottom: 20px;" class="add-button">
                                    <i class="fa fa-plus"></i> เพิ่ม
                                </button>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>รายการ</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tr ng-repeat="allmenu in listMenu">
                                        <td>{{$index + 1}}</td>
                                        <td>{{allmenu.menu_name}}</td>
                                        <td>
                                            <button ng-click="deleteMenu(allmenu.menu_tag)" class="del-button">
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
        </main>
    </div>
    <?php echo $__env->make('management.management-menu.modals.modals-addMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php echo $__env->make('modals-center.modals-askDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('js/management/management-menu/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>