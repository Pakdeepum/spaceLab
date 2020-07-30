<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> หน้าหลัก >> ย้อนดูผลตรวจ </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div>
        <div class="row">
            <div class="col-lg-12" ng-controller="ChooseLabController">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <p>ข้อมูลผู้ป่วย</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 text-right">
                                        <p>
                                            HN :
                                            <input type="text" ng-model="hn" style="width:70%; margin-right:10%"
                                                disabled>
                                        </p>
                                        <p>
                                            อายุ :
                                            <input type="text" ng-model="age" style="width:70%; margin-right:10%"
                                                disabled>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <p>
                                            ชื่อ - สกุล :
                                            <input type="text" ng-model="name" style="width:70%" disabled>
                                        </p>
                                        <button class="main-button" ng-click="Search()">ค้นหา</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <label style="color: #1CAF9A;">Lab Profile</label>
                            <br>
                            <label style="color: #555555;">กราฟแสดงผลเปรียบเทียบผลการตรวจ</label>
                            <br>
                            <div id="curve_chart" style="width: 100%; height: auto; "></div>
                            <table class="table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Date Approve</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tr ng-repeat="data in DataHistoryRecorded">
                                    <td>{{data.created_at}}</td>
                                    <td>{{data.lab_approve | number : data.decimal['_decimal']}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <p>รายการสั่งตรวจ</p>
                            <table class="table" style="width:100%;" id="tbldata">
                                <thead>
                                    <tr>
                                        <th>Lab No.</th>
                                        <th>HN</th>
                                        <!-- <th>VN</th>
                                        <th>Form_name</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="data in DataLabOrder">
                                        <td>{{data.lab_order_no}}</td>
                                        <td>{{data.hn}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>ผลตรวจ</p>
                            <table class="table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Lab_item_name</th>
                                        <th>Lab_result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="data in DataLabDetail" ng-click="detailLabitem(data.id_lab_item, data.id_patient)">
                                        <td>{{data.lab_item_name}}</td>
                                        <td>{{data.lab_result | number : data.labitem['_decimal']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo $__env->make('modals-center.modals-select-lab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<script type="text/javascript" src='<?php echo e(asset("dependencies/js/plugins/google/gstatic-chart/loader.js")); ?>'></script>
<script src="<?php echo e(asset('js/main/history-results/form.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>