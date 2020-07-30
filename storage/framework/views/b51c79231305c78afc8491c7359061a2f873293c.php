<!-- MODAL APPOINTMENT -->
<div class="modal fade" id="modal-recieveLab-appointment" tabindex="-1" style="z-index:1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div style="width: 50%; height:70%;" class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('recieveLab.SaveAppointment')); ?>" method="post" id="form1" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">นัดผู้ป่วย</h5>
                </div>
                <div class="modal-body" ng-controller="RecieveLabDataViewController">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-2 text-right">
                                แพทย์ผู้นัด:
                            </div>
                            <div class="col-lg-8">
                                <input style="width: 80%" name="doctor_name" id="doctor_name" type="text" required>
                                <input type="text" name="id_doctor" style="display: none;">
                                <input type="text" name="id_lab_order_main" style="display: none;">
                                <input type="hidden" id="hospital_app">
                                <input type="hidden" id="special_app">
                                <input type="hidden" id="department_app">
                                <input type="hidden" id="age_app">
                                <input type="hidden" id="sex_app">
                                <button type="button" class="main-button" style="margin-left: 6px;" ng-click="doctor()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="Deldoctor()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <div class="col-lg-1">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-1">

                            </div>
                            <div style="margin-top: 10px;" class="col-lg-2 text-right">
                                คนไข้:
                            </div>
                            <div class="col-lg-8 text-left">
                                <input name='fullname' id="fullname" style="margin-top: 10px; width:100%;" type="text" readonly />
                            </div>
                            <div class="col-lg-1">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-1">

                            </div>
                            <div style="margin-top: 14px;" class="col-lg-2 text-right">
                                วันที่นัด:
                            </div>
                            <div class="col-lg-3">
                                <input type="date" class="form-control" id="datepicker" name='datepicker' style="margin-top: 10px;width: 150px; ">
                            </div>
                            <div class="col-lg-1 text-right" style="margin-top: 14px;">
                                เวลา:
                            </div>
                            <div class="col-lg-2 text-left">
                                <select name="Hr" id="Hr" style="margin-top: 10px;width: 80px;">
                                    <option value="00" selected>00:00</option>
                                    <option value="01">01:00</option>
                                    <option value="02">02:00</option>
                                    <option value="03">03:00</option>
                                    <option value="04">04:00</option>
                                    <option value="05">05:00</option>
                                    <option value="06">06:00</option>
                                    <option value="07">07:00</option>
                                    <option value="08">08:00</option>
                                    <option value="09">09:00</option>
                                    <option value="10">10:00</option>
                                    <option value="11">11:00</option>
                                    <option value="12">12:00</option>
                                    <option value="13">13:00</option>
                                    <option value="14">14:00</option>
                                    <option value="15">15:00</option>
                                    <option value="16">16:00</option>
                                    <option value="17">17:00</option>
                                    <option value="18">18:00</option>
                                    <option value="19">19:00</option>
                                    <option value="20">20:00</option>
                                    <option value="21">21:00</option>
                                    <option value="22">22:00</option>
                                    <option value="23">23:00</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select name="Minute" id="Minute" style="margin-top: 10px;width: 60px;" align="center">
                                    <option value="00" selected>00</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-1">

                            </div>
                            <div style="margin-top: 10px;" class="col-lg-2 text-right">
                                เพื่อ:
                            </div>
                            <div class="col-lg-8 text-left">
                                <input value="" name='appointmentfor' id="appointmentfor" style="margin-top: 10px; width:100%;" type="text"
                                    required>
                            </div>
                            <div class="col-lg-1">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-1">

                            </div>
                            <div style="margin-top: 10px;" class="col-lg-2 text-right">
                                รายการ:
                            </div>
                            <div class="col-lg-8 text-left">
                                <input name='laborderno' id="laborderno" style="margin-top: 10px; width:100%;" type="text" readonly />
                            </div>
                            <div class="col-lg-1">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col-lg-12">
                            <div class="col-lg-1">

                            </div>
                            <div style="margin-top: 10px; margin-bottom: 10px;" class="col-lg-2 text-right">
                                หมายเหตุ:
                            </div>
                            <div class="col-lg-8 text-left">
                                <input name='note' id="note" style="margin-top: 10px; width:100%;" type="text" />
                            </div>
                            <div class="col-lg-1">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="addappointment" form="form1" style="float: left;" type="submit" class="save-button">
                        <i class="fa fa-save"></i> บันทึก
                    </button>
                    <button type="button" style="float: left; margin-left: 10px;" class="print-button" id="appointment_print">
                        <i class="fa fa-print"></i> พิมพ์บัตรนัด
                    </button>
                    <button class="del-button" data-dismiss="modal">
                        <img src='<?php echo e(asset("img/Lis_icon/cancle_icon.png")); ?>' /> ยกเลิก
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END MODAL APPOINTMENT -->
