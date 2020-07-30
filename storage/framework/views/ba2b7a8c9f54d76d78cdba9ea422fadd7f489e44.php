<!-- START PAGE CONTAINER -->
<div class="navBar">
<?php

$i=1;
$Access=[];
while($i<=23){
    $Access[$i] = in_array($i,$listmenu);
    //echo "<script>console.log('Access[',$i,']:',$Access[$i]);</script>";
    $i++;
}

?>
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal">
        <li class="xn-logo">
            <a href="<?php echo e(url('/Welcome')); ?>"><img class="logomain" src="<?php echo e(URL::asset('/img/welcome/logo-biosytem.png')); ?>"> </a>
        </li>

        <div class="dropdown">
            <button class="dropbtn">หน้าหลัก<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    <?php if($Access["1"] == true): ?>
                        <a id="nav1" href="<?php echo e(url('/main/recieveLab')); ?>">รับสิ่งส่งตรวจ</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["2"] == true): ?>
                        <a id="nav2" href="<?php echo e(url('/main/RecordedResults')); ?>">ลงผลตรวจ</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["3"] == true): ?>
                        <a id="nav3" href="<?php echo e(url('/main/HistoryResults')); ?>">ย้อนดูผลตรวจ</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["4"] == true): ?>
                        <a id="nav4" href="<?php echo e(url('/main/resultCopyScan')); ?>">สำเนาผลตรวจ</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["5"] == true): ?>
                        <a id="nav5" href="<?php echo e(url('/main/resultDocumentPhoto')); ?>">ผลตรวจรูปภาพ</a>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">จัดการระบบ<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    <?php if($Access["7"] == true): ?>
                        <a id="nav7" href="<?php echo e(url('/management/manageUser')); ?>">จัดการผู้ใช้</a>
                    <?php else: ?>

                    <?php endif; ?>
                    <?php if($Access["21"] == true): ?>
                        <a id="nav21" href="<?php echo e(url('/management/managePatient')); ?>">จัดการผู้ป่วย</a>
                    <?php endif; ?>
                    <?php if($Access["22"] == true): ?>
                          <a id="nav22" href="<?php echo e(url('/management/manageDoctor')); ?>">จัดการข้อมูลแพทย์</a>
                    <?php endif; ?>
                    <?php if($Access["23"] == true): ?>
                        <a id="nav23" href="<?php echo e(url('/management/manageLabitem')); ?>">จัดการข้อมูล LAB ITEM</a>
                    <?php endif; ?>

                        <!-- <a id="nav21" href="">จัดการผู้ป่วย</a> -->



                    <?php if($Access["8"] == true): ?>
                        <a id="nav8" href="<?php echo e(url('/management/manageData')); ?>">จัดการข้อมูล</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["9"] == true): ?>
                        <a id="nav9" href="<?php echo e(url('/management/manageMenu')); ?>">จัดการเมนู</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["11"] == true): ?>
                        <a id="nav11" href="<?php echo e(url('/management/manageConfig')); ?>">จัดการข้อมูลกลุ่มแลป</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["13"] == true): ?>
                        <!-- <a id="nav13" href="<?php echo e(url('/management/manageLogfile')); ?>">Log File</a> -->
                    <?php else: ?>

                    <?php endif; ?>
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">QC<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    <?php if($Access["16"] == true): ?>
                        <a id="nav16" href="<?php echo e(url('/QC/QCInput')); ?>">QC Input</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["17"] == true): ?>
                        <a id="nav17" href="<?php echo e(url('/QC/QCSetup')); ?>">QC Setup</a>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["18"] == true): ?>
                        <a id="nav18" href="<?php echo e(url('/QC/QCViewer')); ?>">QC Viewer</a>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">รายงาน<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    <?php if($Access["19"] == true): ?>
                        <!--<a id="nav19" href="<?php echo e(url('/report/HISreport')); ?>">รายงาน HIS</a> -->
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if($Access["20"] == true): ?>
                        <a id="nav20" href="<?php echo e(url('/report/LISreport')); ?>">รายงาน LIS</a>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
        </div>
        <!-- SIGN OUT -->
        <div class="dropdown pull-right">
            <button class="logout">
                <img class="text-left" style="width: 25px;height: 20%;margin-top: 5px;" src="<?php echo e(URL::asset('/img/welcome/user_img.png')); ?>">
                <label class="text-right" style="font-size: 10px;"><?php echo e($user->fname ??'Admin'); ?></label>
                <span class="fa fa-angle-down"></span>
            </button>
                <div class="dropdown-content">
                    <a href="<?php echo e(route('login.logout')); ?>">Sigh Out</a>
                </div>
        </div>
        <!-- END SIGN OUT -->

    </ul>
    <!-- END X-NAVIGATION VERTICAL -->
</div>
<!-- end  -->
