<div class="modal fade" id="modal-ResultMaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">แจ้งค่าวิกฤต</h5>
      </div>
      <div class="modal-body">
      <div class="card card-small">
                                            <div class="card-body pt-0 mt-5">
                                                <table class="table" style="width:100%">
                                                    <tr>
                                                        <th style="background-color: #E8E8E8;">Date Entered</th>
                                                        <th style="background-color: #E8E8E8;">Entered By</th>
                                                        <th style="background-color: #E8E8E8;">Section</th>
                                                        <th style="background-color: #E8E8E8;">Course</th>
                                                        <th style="background-color: #E8E8E8;">Status</th>
                                                    </tr>
                                                    <tr>
                                                        <td>27-08-2561</td>
                                                        <td>Admin Admin Lastname</td>
                                                        <td>ทดสอบ</td>
                                                        <td>ทดสอบสาเหตุ</td>
                                                        <td>Open</td>
                                                    </tr>
                                                    <tr>
                                                        <td>27-08-2561</td>
                                                        <td>Admin Admin Lastname</td>
                                                        <td>ทดสอบ1</td>
                                                        <td>ทดสอบสาเหตุ</td>
                                                        <td>Open</td>
                                                    </tr>
                                                    <tr>
                                                        <td>27-08-2561</td>
                                                        <td>Admin Admin Lastname</td>
                                                        <td>ทดสอบ2</td>
                                                        <td>ทดสอบสาเหตุ</td>
                                                        <td>Open</td>
                                                    </tr>
                                                    <tr>
                                                        <td>27-08-2561</td>
                                                        <td>Admin Admin Lastname</td>
                                                        <td>ทดสอบ3</td>
                                                        <td>ทดสอบสาเหตุ</td>
                                                        <td>Open</td>
                                                    </tr>
                                                    <tr>
                                                        <td>27-08-2561</td>
                                                        <td>Admin Admin Lastname</td>
                                                        <td>ทดสอบ4</td>
                                                        <td>ทดสอบสาเหตุ</td>
                                                        <td>Open</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
      </div>
      <div class="modal-footer">
        <div ng-controller="CriticalReportFooterController">
            <button type="button" ng-click="CriticalReport()" class="btn btn-info" style="float: left;">Critical Report</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $__env->make('main.recorded-results.Modals.modals-recorded-resultsReport', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>