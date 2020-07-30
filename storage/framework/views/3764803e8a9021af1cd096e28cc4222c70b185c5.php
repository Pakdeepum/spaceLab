<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> WELCOME BIOSYSTEMS LIS LAB  </label>
<!-- END STATUS -->

<script> var listdata = []; </script>

<div class="container-fluid" ng-controller="listdata">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-body pt-0 mt-5">
                    <div class="col-lg-4">
                        <img src="<?php echo e(URL::asset('/img/welcome/welcome_img_01.png')); ?>" width="100%" height="100%">
                    </div>
                    <div class="col-lg-5">
                        <div style="margin-top:140px;">
                            <h1>Biosystems Thailand</h1>
                            <h2 style="color:#333333">Biosystems to use</h2>
                            <br><br>
                            <p style="font-size: 45px; color: #da1616!important;">Biosystems Lis Lab</p>
                            <p style="font-size: 24px; color:#333333;">Biosystems Limited Partnership</p>
                            <p style="font-size: 20px; color:#555555;">Email : hotline@biosystems.co.th</p>
                       <p style="font-size: 20px; color:#555555;">Address : 68/12 CEC Building Room A1 Kampaengphet 6 Rd.,  Ladyao,Chatuchak, Bangkok 10800</p>
                            <p style="font-size: 20px; color:#555555;">Tel :02-118-3798</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="background-color: white;">
                            <div class="card-header text-center"  style="margin-top:30px;">
                                <h5 style="padding-top: 20px;">ข้อมูลทั่วไป</h5>
                                </div><hr>
                            <div class="card-body" style="background-color: white; min-height: 500px;">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <img src="<?php echo e(URL::asset('/img/welcome/welcome_img_02.png')); ?>" width="50%" height="50%">     
                                    </div>
                                </div><hr>
                            <div class="text-left" style="margin-left: 35px; margin-top:35px;">
                                <p class="card-text">ชื่อผู้ใช้ : <?php echo e($user->fname ?? 'ไม่มีข้อมูล'); ?></p>
                                <p id="pname" class="card-text">กลุ่มผู้ใช้ : <?php echo e($groupuser[0]["group_user_name"] ?? 'ไม่มีข้อมูล'); ?></p>
                                <p class="card-text">วันที่ลงทะเบียน : <?php echo e($user->regis_date ?? 'ไม่มีข้อมูล'); ?></p>
                                <p class="card-text"></p>
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

<script src="<?php echo e(asset('js/dashboard/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>