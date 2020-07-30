<div class="modal fade" id="modal-report-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">	Patient Counting Statistics</h5>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4 text-right">
                                <p style="margin-top: 20px;">Date Range : </p>
                                <p style="margin-top: 30px;">To : </p>
                                <p style="margin-top: 25px;">Hospital Name : </p>
                                <p style="margin-top: 25px;">Department : </p>
                                <p style="margin-top: 25px;">Physician : </p>
                                <p style="margin-top: 25px;">Visit Type : </p>
                                <p style="margin-top: 25px;">Ward : </p>
                                <p style="margin-top: 25px;">Service Plan : </p>
                            </div>
                            <div class="col-lg-8">
                                <div class="inputgroup">
                                    <input type="date" id="date_s3" ng-model="date_s3" required style="width:75%; margin-bottom:15px; margin-top:15px; height: 29px;padding: 4px 10px;">
                                    <input type="date" id="date_e3" ng-model="date_e3" required style="width:75%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
                                </div>
                                <select id="hospital3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="department3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="doctor3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="visit3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="patient_department3" style="width:85%; margin-bottom:15px;"></select>
                                <select id="serviceplan3" style="width:85%; margin-bottom:15px;"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="save-button" style="float:left" ng-click="printReport3()"><i class="fa fa-save"></i> Save</button>
                    <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                </div>
        </div>
    </div>
</div>
