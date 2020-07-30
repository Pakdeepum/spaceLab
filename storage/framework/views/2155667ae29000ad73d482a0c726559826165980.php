<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> Home >> Lab Result Document Photo</label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row" ng-controller="ChooseLabController">
                <div class="col-lg-12">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div style="margin-top: 10px;" class="col-lg-12">
                                        <div class="col-lg-2 text-right">
                                            <label style="margin-top: 10px;" >Lab No: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input ng-model="LabNo" style="width: 100%;" disabled type="text"/>
                                        </div>
                                        <div class="col-lg-2 text-left" >
                                            <div ng-controller="selectLabController">
                                                <button type="button" class="main-button" ng-click="Search()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="margin-top: 10px;" class="col-lg-12">
                                        <div class="col-lg-2 text-right">
                                            <label style="margin-top: 10px;">Name - Lastname: </label>
                                            <p>
                                            <label style="margin-top: 10px;">Sex: </label>
                                            <p>
                                            <label style="margin-top: 10px;">Date Order : </label>
                                            <p>
                                        </div>
                                        <div class="col-lg-4 text-left">
                                            <input ng-model="name" style="width: 80%;" disabled type="text"/>
                                            <p>
                                            <input ng-model="gender" style="margin-top: 10px; width: 80%;" disabled type="text"/>
                                            <p>
                                            <input ng-model="orderDate" style="width: 80%;" disabled type="text"/>
                                        </div>
                                        <div class="col-lg-2 text-right">
                                            <label style="margin-top: 10px;">HN: </label>
                                            <p>
                                            <label style="margin-top: 10px;">Age: </label>
                                            <p>
                                        </div>
                                        <div class="col-lg-4 text-left">
                                            <input ng-model="HN" style="width: 80%;" disabled type="text"/>
                                            <p>
                                            <input ng-model="age" style="margin-top: 10px; width: 80%;" disabled type="text"/>
                                            <p>
                                        </div>
                                    </div>
                                </div><hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-2 text-right">
                                            <label>No: </label>
                                        </div>
                                        <div class="col-lg-5 text-left">
                                            <select style="width: 100%;" id="picNumber" ng-model="image_id"ng-change="preview">
                                                <!-- <option>--Select Picture--</option> -->
                                                <option ng-repeat="data in filename" value="{{data}}">{{data}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div style="margin-top: 10px;" class="col-lg-12">
                                        <div style="margin-top: 10px;" class="col-lg-2 text-right">
                                            <label>Picture Note : </label>
                                        </div>
                                        <div style="margin-top: 10px;" class="col-lg-10 text-left">
                                            <textarea type="text" ng-model="pictureNote" style="width: 100%; height: 100px;" disabled></textarea>
                                        </div>
                                    </div>
                                </div><hr>
                               <input type="hidden" id="photo_num" value=""/>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 text-right">
                                            <button type="button" class="print-button" id="print" ng-click="PrintPicture()">
                                                <i class="fa fa-print"></i> Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body text-center" style="background-color: #f1f5f9; width: 100%; min-height: 600px;" id="image">
                                <img src="<?php echo e(asset('img/Group_270.png')); ?>" id="img" name="img" class="text-center" style="width: 100%;"/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('modals-center.modals-select-lab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </main>
    </div>
</div>

<script src="<?php echo e(asset('js/main/result-document-photo/form.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>