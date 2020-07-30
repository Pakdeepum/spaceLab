<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> Home >> Lab Result Copy Scan </label>
<!-- END STATUS -->

<div class="container-fluid">
    <form action="<?php echo e(route('main.uploadFile')); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="row" ng-controller="ChooseLabController">
            <div class="col-lg-12" >
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div style="margin-top: 10px;" class="col-lg-12">
                                    <div class="col-lg-2 text-right">
                                        <label style="margin-top: 10px;" >Lab No: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input ng-model="LabNo" style="width: 100%;" disabled type="text" required/>
                                        <input name="hiddenLabNo" style="width: 100%;" type="hidden" required/>
                                    </div>
                                    <div class="col-lg-2 text-left" >
                                        <div ng-controller="selectLabController">
                                            <button type="button" class="main-button" name="find" ng-click="Search()">Select</button>
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
                                        <input ng-model="name" style="width: 80%;" disabled type="text" required/>
                                        <input name="hiddenName" style="width: 80%;" type="hidden" required/>
                                        <input name="hiddenHospitalID" style="width: 100%;" type="hidden" required/>
                                        <input name="hiddenLabID" style="width: 100%;" type="hidden" required/>
                                        <p>
                                        <input ng-model="gender" style="margin-top: 10px; width: 80%;" disabled type="text" required/>
                                        <input name="hiddenGender" style="margin-top: 10px; width: 80%;" type="hidden" required/>
                                        <p>
                                        <input ng-model="orderDate" style="width: 80%;" disabled type="text" required/>
                                        <input name="hiddenOrderDate" style="width: 80%;" type="hidden" required/>
                                    </div>
                                    <div class="col-lg-2 text-right">
                                        <label style="margin-top: 10px;">HN: </label>
                                        <p>
                                        <label style="margin-top: 10px;">Age: </label>
                                        <p>
                                    </div>
                                    <div class="col-lg-4 text-left">
                                        <input ng-model="HN" style="width: 80%;" disabled type="text" required/>
                                        <input name="hiddenHN" style="width: 80%;" type="hidden" required/>
                                        <p>
                                        <input ng-model="age" style="margin-top: 10px; width: 80%;" disabled type="text" required/>
                                        <input name="hiddenAge" style="margin-top: 10px; width: 80%;" type="hidden" required/>
                                        <p>
                                    </div>
                                </div>
                            </div><hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-2 text-right">
                                        <label>Picture Note : </label>
                                    </div>
                                    <div class="col-lg-8 text-left">
                                        <textarea type="text" name="pictureNote" style="width: 100%; height: 100px;"></textarea>
                                    </div>
                                    <div class="col-lg-2 text-left" ng-controller="insertPicture" >
                                        <input type="file" name="photo" id="photo" style="display: none;">
                                        <button type="button" class="scan-button" id="browse_file" name="upload" ng-click="InsertPic()">
                                            <img style="padding: 10px;" src='<?php echo e(asset("img/Lis_icon/scan_icon.png")); ?>'>
                                            <label style="font-size: 20px;">Upload</label>
                                        </button>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label>Image Size:
                                        <input for="range" id="imgSize" style="width: 30%;" type="text"> %</label>
                                    </div>
                                    <div class="col-lg-8 text-left">
                                        <div>
                                            <input type="range" name="range" id="range" min="0" max="100" step="1" value="100"/>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="" id="image_height" name="image_height"/>
                                <input type="hidden" value="" id="image_width"  name="image_width"/>
                            </div><hr>
                            <div class="row" ng-controller="insertPicture">
                                <div style="margin-top: 10px;" class="col-lg-9 text-left">

                                    <button type="button" class="log-button" id="originalSize">
                                        <i class="fa fa-arrows-alt"></i> Original Size
                                    </button>
                                </div>
                                
                                <div style="margin-top: 10px;" class="col-lg-3 text-right">
                                    <button type="button" class="print-button" id="print" ng-click="PrintPicture()">
                                                <i class="fa fa-print"></i> Print
                                    </button>    
                                    <button type="submit" id="save" name="save" class="save-button">
                                        <i class="fa fa-save"></i> SAVE
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body text-center" style="background-color: #f1f5f9; width: 100%; min-height: 600px;">
                            <img src="<?php echo e(asset('img/Group_270.png')); ?>" id="img" name="img" class="text-center"/>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('modals-center.modals-select-lab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </form>
</div>

<script src="<?php echo e(asset('js/main/result-copy-scan/form.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>