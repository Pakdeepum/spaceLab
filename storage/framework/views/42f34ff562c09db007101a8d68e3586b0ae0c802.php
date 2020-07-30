<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> Main >> Receive Lab </label>
<!-- END STATUS -->

<div class="container-fluid" ng-controller="RecieveLabDataViewController">
    <div class="row">
        <div class="col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="profile-main">
                        Patient Data
                    </div>
                    <div ng-repeat="data in AllDataPatient">
                        <div class="text-center">
                            <img class="userimg" style="padding: 20px;" src="/img/Lis_icon/2018-08-20_12-42-15.png" alt="profile-img">
                        </div>
                        <div class="textProfile">
                            <p>HN: {{data.hn}}</p>
                            <p>Order By: {{data.ward_name}} Ward</p>
                            <p>Order Date: {{data.order_date}}</p>
                            <p>Order Time: {{data.order_time}}</p>
                            <p>Lab No.: {{data.lab_order_no}}</p>
                            <p>Department: {{data.department_name}}</p>
                            <p>Lab Note: {{data.note}}</p>
                            <h1 class="line"></h1>
                              <p><strong>Specimen</strong></p>
                              <p>{{spcimenData[0].lab_specimen_item_name}}</p>
                              <h1 class="line"></h1>
                              <p><strong>Test Order</strong></p>
                              <div ng-repeat="lab in LabDetail">
                              <p>{{lab.lab_item.lab_item_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12" style="padding:0 !important; margin:0 !important">
                                <label>Lab Status</label>
                                <object class="group-radio push-up-5">
                                    <input type="radio" name="status" ng-model="SearchStatus.status" ng-value=""
                                        ng-checked="true" ng-change="SearchStatusChange()"/>
                                    <label style="padding-right: 5px">ALL</label>
                                    <input type="radio" name="status" ng-model="SearchStatus.status" ng-value="0"  ng-change="SearchStatusChange()"/>
                                    <label style="padding-right: 5px">Registered</label>
                                    <input type="radio" name="status" ng-model="SearchStatus.status" ng-value="1"  ng-change="SearchStatusChange()"/>
                                    <label style="padding-right: 5px">Received</label>
                                    <input type="radio" name="status" ng-model="SearchStatus.status" ng-value="2"  ng-change="SearchStatusChange()"/>
                                    <label style="padding-right: 5px">Process</label>
                                    <input type="radio" name="status" ng-model="SearchStatus.status" ng-value="3"  ng-change="SearchStatusChange()"/>
                                    <label style="padding-right: 5px">Reported</label>
                                    <input type="radio" name="status" ng-model="SearchStatus.status" ng-value="4"  ng-change="SearchStatusChange()"/>
                                    <label style="padding-right: 5px">Approved</label>
                                </object>
                            </div>
                            <div class="col-lg-10" style="margin-right:50px;">
                                <div class="row">
                                <div class="col-sm-1" style="padding:0 !important; padding-right:2px !important;margin:0 !important" > Filter</div>
                                    <div class="col-sm-2" style="padding:0 !important; margin:0 !important" ng-repeat="lab in LabSubGroup" >
                                        <input  type="radio" id="labgroupitem" name="labgroupitem"  ng-click="SelectLabSubGroupItem(lab.id_lab_sub_group_item)"/>
                                        <label  for="labgroupitem" ng-value="lab.lab_sub_group_name" ng-model="lab" style="padding-right: 5px">{{lab.lab_sub_group_name}}</label>
                                    </div>
                                    <div class="col-sm-1" style="padding:0 !important; margin:0 !important">
                                        <input  type="radio" id="labgroupitem" name="labgroupitem" ng-click="ShowAll()"/>
                                        <label  for="labgroupitem" ng-value="All" ng-model="lab" style="padding-right: 5px">All</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label class="col-lg-3">HN :</label>
                                <div class="col-lg-9">
                                    <input type="text" name="hn" style="height:30px; width: 100%;" class="push-up-5" enabled="enabled">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-3">Lab No. :</label>
                                <div class="col-lg-9">
                                    <input type="text" name="labNo" style="height:30px; width: 100%;" class="push-up-5">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-3">Order Date:</label>
                                <div class="col-lg-9">
                                    <input type="date" name="fromdate" style="height:30px; width: 100%;" class="push-up-5">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label class="col-lg-3">To :</label>
                                <div class="col-lg-9">
                                    <input type="date" name="todate" style="height:30px; width: 100%;" class="push-up-5">
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <button class="main-button push-up-5" ng-click="searchLab()">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-top: 20px;" class="col-lg-12">
                            <div class="col-lg-12 inputgroup">
                              <div class="row">
                              <div class="col-lg-8">
                                <button style="margin-bottom: 10px;" class="reg-button" ng-click="Reg()">
                                    <i class="fa fa-user"></i> Register
                                </button>
                                Lab NO.:
                                <div style="display:inline-block">
                                    <form method="POST" action="<?php echo e(route('recieveLab.BarcodeGen')); ?>" id="labSubmit"
                                        target="_blank">
                                        <?php echo e(csrf_field()); ?>

                                        <input style="background-color:#dadadada;" type="text" ng-model="LabNo"
                                            readonly>
                                        <div ng-repeat="data in labChecked" style="display:none;">
                                            <input type="text" value="{{data}}" name="labChecked-{{$index}}">
                                        </div>
                                        <button type="button" class="print-button" ng-disabled="printBarCode" ng-click="submitBarcode()"><i
                                                class="fa fa-print"></i></button>
                                    </form>
                                </div>

                                  <button style="margin-bottom: 10px;" class="reg-button" ng-click="showExcel=!showExcel">
                                      <i class="fa fa-book"></i> Excel
                                  </button>
                                <div style="display:inline-flex" ng-if="showExcel">
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="col-lg-6">
                                    <h3 align="center">Import Excel File</h3>
                                    <?php if(count($errors)>0): ?>
                                    <div class="alert alert-danger">
                                        Upload Validation Error<br><br>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($message=Session::get('success')): ?>
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">x
                                        </button>
                                        <strong><?php echo e($message); ?></strong>
                                    </div>
                                    <?php endif; ?>
                                    <form action="<?php echo e(route('recieveLab.import')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="file" name="file" class="form-control">
                                    <br>
                                    <button class="btn btn-success">Import Excel Data</button>
                                    </form>
                                    </div>
                                    <div class="col-lg-6">
                                      <h3 align="center">Export Excel File</h3>                                      
                                      <form action="<?php echo e(route('recieveLab.export')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                          <input type="text" style="width:400px" name="limitRowExport" placeholder="The amount of lab order to be exported (0 or blank mean total)" class="form-control">
                                          <br>
                                        <button class="btn btn-success" >Export to Excel</button>
                                      </form>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <div  align="right">
                                  <input id="autoReceiveInput" placeholder="Please Scan Barcode To Receive Lab" ng-model="AutoReceiveBarcodeInput" ng-change="OnAutoReceiveInputChange()" name="autoReceiveInput" style="background-color:#ffffff;min-width:300px" type="text"  ng-show="AutoReceive_input">
                                  <button style="margin-bottom: 10px;" class="main-button" ng-click="AutoReceive()">Auto Receive
                                  </button>
                                </div>
                                </div>
                                </div>
                                <table class="table table-hover tablePointer" style="width:100%"><br>
                                    <thead>
                                        <tr align="center">
                                            <th><input type="checkbox" id="checkAll" ng-model="selectedAll" ng-click="checkAll($event)" disabled/></th>
                                            <th>Lab No.</th>
                                            <th>HN</th>
                                            <th align="center" style="width:15%;">Name Surname</th>
                                            <!--<th>Lab form</th>-->
                                            <th>Print Time</th>
                                            <th>Receive Time</th>
                                            <th>Report Time</th>
                                            <th>Date Order</th>
                                            <th>Appointment Date</th>
                                            <th><center>Appointment</center></th>
                                            <th><center>Receive</center></th>
                                            <th><center>Del</center></th>
                                            <th><center>Reject</center></th>
                                            <th><center>Edit</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-show="!isFiltered" id="Click" dir-paginate="data in AllDataLabOrderMain | filter:Search | filter:SearchPoint | filter:SearchStatus | itemsPerPage:10"
                                            pagination-id="value-paginate" current-page="currentPage" ng-click="Barcode(data.id_lab_order_main,data.lab_order_no)"
                                            ng-class="{highlight: selectedMain==data.id_lab_order_main}" >
                                            <td>
                                                <input type="checkbox" name="print-{{data.id_lab_order_main}}" id="chk-{{data.id_lab_order_main}}"
                                                    ng-model="data.selected" ng-click="toggleRecieve(data.id_lab_order_main ,data.lab_order_no,$event)"
                                                    >
                                                    
                                            </td>
                                            <td>{{data.lab_order_no.substring(0,9)}}</td>
                                            <td>{{data.patient['hn']}}</td>
                                            <td style="width:15%;">{{data.prefix['prefix_name']}}{{data.patient['patient_firstname']}}
                                                {{data.patient['patient_lastname']}}</td>
                                            <!--<td>-</td>-->
                                            <td>{{data.print_barcode_time}}</td>
                                            <td>{{data.receive_date}}</td>
                                            <td>{{data.date_ts}}</td>
                                            <td>{{data.order_date}}</td>
                                            <td>{{data.appoint[0]['date_order']}}</td>
                                            <td>
                                                <center><button class="appointment-button" ng-click="Appointment(data.id_lab_order_main)">
                                                        <i class="fa fa-calendar"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="print-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btnreceive" ng-click="ReceiveLabOrderMain(data.id_lab_order_main)"
                                                        ng-disabled="(!data.receive_date&&data.print_barcode_time) ? false : true">
                                                        <i class="fa fa-download"></i>***
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="del-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btndel" ng-click="DelLabOrderMain(data.id_lab_order_main)">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="reject-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btnreject" ng-click="RejectSpeciment(data.id_lab_order_main)">
                                                        <i class="fa fa-arrow-circle-left"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="edit-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btnedit" ng-click="EditLabOrderDetail(data.id_lab_order_main)">
                                                        <i class="fa fa-pencil-square-o "></i>
                                                        
                                                    </button></center>
                                            </td>
                                        </tr>
                                        <tr ng-show="isFiltered" id="Click" dir-paginate="data in newPosts | filter:Search | filter:SearchPoint | filter:SearchStatus | itemsPerPage:10 "
                                            pagination-id="value-paginate" current-page="currentPage" ng-click="Barcode(data.id_lab_order_main,data.lab_order_no)"
                                            ng-class="{highlight: selectedMain==data.id_lab_order_main}" style="font-size: 14px!important;">
                                            <td>
                                                <input type="checkbox" name="print-{{data.id_lab_order_main}}" id="chk-{{data.id_lab_order_main}}"
                                                    ng-model="data.selected" ng-click="toggleRecieve(data.id_lab_order_main ,data.lab_order_no,$event)"
                                                    >
                                                    
                                            </td>
                                            <td>{{data.lab_order_no.substring(0,9)}}</td>
                                            <td>{{data.patient['hn']}}</td>
                                            <td style="width:15%;">{{data.prefix['prefix_name']}}{{data.patient['patient_firstname']}}
                                                {{data.patient['patient_lastname']}}</td>
                                            <!--<td>-</td>-->
                                            <td>{{data.print_barcode_time}}</td>
                                            <td>{{data.receive_date}}</td>
                                            <td>{{data.date_ts}}</td>
                                            <td>{{data.order_date}}</td>
                                            <td>{{data.appoint[0]['date_order']}}</td>
                                            <td>
                                                <center><button class="appointment-button" ng-click="Appointment(data.id_lab_order_main)">
                                                        <i class="fa fa-calendar"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="print-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btnreceive" ng-click="ReceiveLabOrderMain(data.id_lab_order_main)"
                                                        ng-disabled="(!data.receive_date&&data.print_barcode_time) ? false : true">
                                                        <i class="fa fa-download"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="del-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btndel" ng-click="DelLabOrderMain(data.id_lab_order_main)">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="reject-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btnreject" ng-click="RejectSpeciment(data.id_lab_order_main)">
                                                        <i class="fa fa-arrow-circle-left"></i>
                                                    </button></center>
                                            </td>
                                            <td>
                                                <center><button class="edit-button" data-val="{{data.id_lab_order_main}}"
                                                        id="btnedit" ng-click="EditLabOrderDetail(data.id_lab_order_main)" ng-disabled="(data.status!=0&&data.status!=1)?  true : false">
                                                        <i class="fa fa-pencil-square-o "></i>
                                                    </button></center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <dir-pagination-controls pagination-id="value-paginate" class="pull-right" max-size="10"
                                    direction-links="true" boundary-links="true" on-page-change="pageChanged()">
                                </dir-pagination-controls>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin: 5px;" class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 text-right">
                                        <p style="margin-top:5px">Reason For Specimen Rejecting : </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <textarea name="Showreason" rows="6" cols="40" style="background-color:#c0c0c0;" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 text-right">
                                        <p style="margin-top:5px">Specimen Rejecting Time : </p>
                                    </div>
                                    <div class="col-lg-4 text-left">
                                        <input name="Datereject" style="width: 100%; margin-top: 10px;" type="text"
                                            placeholder="Date" />
                                    </div>
                                    <div class="col-lg-4">
                                        <input name="Timereject" style="width: 100%; margin-top: 10px;" type="text"
                                            placeholder="Time" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4 text-right">
                                        <p style="margin-top:15px">Specimen Rejector : </p>
                                    </div>
                                    <div class="col-lg-8 text-left">
                                        <input name="User" style="width: 100%; margin-top: 10px;" type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4 text-right">
                                          <p style="margin-top:15px">Specimen Keeping Time : </p>
                                    </div>
                                    <div class="col-lg-4 text-left">
                                        <input name="Datereceive" style="width: 100%; margin-top: 10px;" type="text"
                                            placeholder="Date" />
                                    </div>
                                    <div class="col-lg-4">
                                        <input name="Timereceive" style="width: 100%; margin-top: 10px;" type="text"
                                            placeholder="Time" />
                                    </div>
                                </div>
                                <div style="margin-top: 10px;" class="col-lg-12">
                                    <div class="col-lg-12 text-right">
                                        <button class="print-button">
                                            <i class="fa fa-print"></i>
                                            <a target="_blank" rel="noopener noreferrer" href="/report/patientDairy"
                                                style="color:#fff">Print Patient Daily List</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('main.recieve-lab.modals.modals-recieveLab-specimentreject', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
<?php echo $__env->make('main.recieve-lab.modals.modals-recieveLab-reg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('main.recieve-lab.modals.modals-recieveLab-edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('main.recieve-lab.modals.modals-recieveLab-appointment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('main.recieve-lab.modals.modals-recieveLab-specimentNote', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('modals-center.modals-doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-askDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-askSave', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('main.recieve-lab.modals.modals-recieveLab-tat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/main/recieve-lab/form.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>