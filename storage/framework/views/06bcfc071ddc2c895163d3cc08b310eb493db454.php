<div class="modal fade" id="modal-report-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" modal-lab-item>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">	สถิติการตรวจนับ Test</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4 text-right">
                            <p style="margin-top: 20px;">ช่วงวันที่ : </p>
                            <p style="margin-top: 30px;">ถึงวันที่ : </p>
                            <p style="margin-top: 25px;">โรงพยาบาล : </p>
                            <p style="margin-top: 25px;">Visit Type : </p>
                            <p style="margin-top: 25px;">หอผู้ป่วย : </p>
                            <p style="margin-top: 25px;">Analyzer : </p>
                        </div>
                        <div class="col-lg-8">
                            <div class="inputgroup" style="width: 100%;">
                                <span ng-if="valid_date_s" class="valid-input">
                                    {{invalid_date_s}}
                                </span>
                                <input type="date" ng-model="dateS" ng-change="dateOnChangeS()" id="date_s" style="width:85%; margin-bottom:15px; margin-top:15px; height: 29px;padding: 4px 10px;">
                             </div>
                            <div class="inputgroup" style="width: 100%;">
                                <span ng-if="valid_date_e" class="valid-input">
                                    {{invalid_date_e}}
                                </span>
                                <input type="date" ng-model="dateE" ng-change="dateOnChangeE()" id="date_e" style="width:85%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
                            </div>
                            <select id="hospital1" style="width:85%; margin-bottom:15px;"></select>
                            <select id="visit1" style="width:85%; margin-bottom:15px;"></select>
                            <select id="ward1" style="width:85%; margin-bottom:15px;"></select>
                            <select id="analyzer1" style="width:85%; margin-bottom:15px;"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" ng-click="printReport1()" class="save-button" style="float: left;">
                    <i class="fa fa-save"></i> บันทึก
                </button>
                <button type="button" class="del-button" data-dismiss="modal">
                    <i class="fa fa-times"></i> ยกเลิก
                </button>
            </div>
        </div>
    </div>
</div>
