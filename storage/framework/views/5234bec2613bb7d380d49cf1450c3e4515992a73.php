<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> รายงาน >> รายงาน HIS </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        <div class="card">   
                            <div class="card-body">
                                <p align="center" class="profile-main">ข้อมูลทั่วไป</p>
                                <hr>
                                <center><img class="userimg" src="<?php echo e(asset('img\Lis_icon\2018-08-20_12-42-15.png')); ?>"></center>
                                <p style="margin-top: 15px;">ประเภท : OPD</p>
                                <p>Lab No. : 1292058</p>
                                <p>HN : 000130159</p>      
                                <p>ชื่อ - สกุล : นางอารีย์ ดวงทิพย์</p>                                 
                                <p>อายุ : 57 ปี 5 เดือน 11 วัน</p>                                 
                                <p>เพศ : หญิง</p>                                 
                                <p>วันเดือนปีเกิด : 06-03-2504</p>                                  
                                <p>Order By : สิริธร ชัยเกตุ</p>                                  
                                <p>Order Date : 17-08-2561</p>                                   
                                <p>Order Time : 10:30:22</p>                                   
                                <p>ห้องที่ส่งตรวจ : ห้องผู้ป่วยนัด</p>                                   
                                <p>สิทธิ : บัตรทอง จ.30 บาท</p>                                   
                                <p>ราคาที่สั่งตรวจ : 355 บาท</p>                                 
                                <p>Lab Note : </p>
                                <hr>
                                <p>รายงานข้อมูลทั่วไป</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">        
                        <div class="card">   
                            <div class="card-body">
                                <input type="text" style="margin-bottom:15px;" size="50px">
                                <button class="main-button">ค้นหา</button>
                                <table class="table" style="width:100%">
                                    <tr>
                                        <th>No.</th>
                                        <th>รายงาน HIS</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>รายงานสถิติการสั่งการรักษาตามช่วงเวลา</td> 
                                        <td><button class="main-button" style="float:right" id="report-1">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>รายงานผลตรวจแยกตามกลุ่ม</td> 
                                        <td><button class="main-button" style="float:right" id="report-2">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>รายงานผลตรวจแยกตามบุคคล</td> 
                                        <td><button class="main-button" style="float:right" id="report-3">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>สถิติการรับและรายงานสิ่งส่งตรวจ</td> 
                                        <td><button class="main-button" style="float:right" id="report-4">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>รายงานตรวจผลแลปนอก</td> 
                                        <td><button class="main-button" style="float:right" id="report-5">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>ข้อมูล Workload ผู้ใช้งาน</td> 
                                        <td><button class="main-button" style="float:right" id="report-6">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>รายชื่อผู้ป่วยที่ยังไม่ได้ลงผลตรวจ และยังไม่ได้รับสิ่งส่งตรวจ</td> 
                                        <td><button class="main-button" style="float:right" id="report-7">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>สถิติการส่งตรวจแยกตามแผนก</td> 
                                        <td><button class="main-button" style="float:right" id="report-8">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>สถิติการส่งตรวจแยกตามสิทธิ</td> 
                                        <td><button class="main-button" style="float:right" id="report-9">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>รายงานปฏิเสธสิ่งส่งตรวจ</td> 
                                        <td><button class="main-button" style="float:right" id="report-10">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>รายงานตามระยะเวลารอคอย</td> 
                                        <td><button class="main-button" style="float:right" id="report-11">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>รายงานเวลาตรวจเฉลี่ยแต่ละ Test</td> 
                                        <td><button class="main-button" style="float:right" id="report-12">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>ข้อมูลการายงานผลตรวจ</td> 
                                        <td><button class="main-button" style="float:right" id="report-13">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>รายงานสถิติการตรวจนับ Specimen</td> 
                                        <td><button class="main-button" style="float:right" id="report-14">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>สถิติการส่งตรวจแยก คน/ครั้ง ตามช่วงเวลา</td> 
                                        <td><button class="main-button" style="float:right" id="report-15">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>รายงานรายชื่อผู้ป่วยส่งสิ่งส่งตรวจด่วน</td> 
                                        <td><button class="main-button" style="float:right" id="report-16">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>สถิติการส่งตรวจด่วนแยกตามห้องส่งตรวจ</td> 
                                        <td><button class="main-button" style="float:right" id="report-17">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>สถิติการรับและรายงานสิ่งส่งตรวจเวลาเฉลี่ย</td> 
                                        <td><button class="main-button" style="float:right" id="report-18">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>รายงานค่า GFR</td> 
                                        <td><button class="main-button" style="float:right" id="report-19">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>รายงานกลุ่มที่ตรวจเกินกำหนดจาก Visit</td> 
                                        <td><button class="main-button" style="float:right" id="report-20">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>รายงานระยะเวลารอคอย ราย Test</td> 
                                        <td><button class="main-button" style="float:right"id="report-21">ข้อมูลรายงาน</button></td>
                                    </tr>
                                    <tr>
                                        <td>41</td>
                                        <td>รายงานสรุปผล</td> 
                                        <td><button class="main-button" style="float:right">ข้อมูลรายงาน</button></td>
                                    </tr>
                                </table>
                            </div>    
                        </div>
                    </div>    
                </div>
            </div>
        </main>
    </div>
</div>
<script src="<?php echo e(asset('js/report/form.js')); ?>"></script>

<?php echo $__env->make('report.Modals.modals-report-1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-5', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-6', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-7', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-8', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-9', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-10', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-11', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-12', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-13', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-14', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-15', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-16', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-17', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-18', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-19', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-20', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php echo $__env->make('report.Modals.modals-report-21', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>