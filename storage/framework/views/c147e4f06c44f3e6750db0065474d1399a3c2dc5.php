<div class="modal fade" id="modal-report-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">	สถิติการตรวจนับผู้ป่วย</h5>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4 text-right">
                                <p style="margin-top: 20px;">ช่วงวันที่ : </p>
                                <p style="margin-top: 30px;">ถึงวันที่ : </p>
                                <p style="margin-top: 25px;">โรงพยาบาล : </p>
                                <p style="margin-top: 25px;">แผนก : </p>
                                <p style="margin-top: 25px;">Visit Type : </p>
                                <p style="margin-top: 25px;">หอผู้ป่วย : </p>
                                <p style="margin-top: 25px;">สิทธิการรักษา : </p>
                            </div>
                            <div class="col-lg-8">
                                <div class="inputgroup">
                                    <input type="date" id="date_s3" ng-model="date_s3" required style="width:75%; margin-bottom:15px; margin-top:15px; height: 29px;padding: 4px 10px;">
                                    <input type="date" id="date_e3" ng-model="date_e3" required style="width:75%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
                                </div>
                                <select id="hospital3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="department3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="visit3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="patient_department3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="serviceplan3" style="width:85%; margin-bottom:15px;"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="save-button" style="float:left" ng-click="printReport3()"><i class="fa fa-save"></i> บันทึก</button>
                    <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
                </div>
        </div>
    </div>
</div>