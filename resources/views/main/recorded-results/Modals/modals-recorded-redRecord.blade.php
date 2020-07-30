<div class="modal fade" id="modal-RedRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" modal-lab-result>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin: auto;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Critical Report</h5>
            </div>
            <div class="modal-body">
                <div class="card card-small">
                    <div class="card-body pt-0 mt-5">
                      <div class="card-body table-responsive" style="overflow-y: auto; position:relative">
                          <table class="table table-hover tablePointer" style="width:100%; margin-top:15px;">
                            <thead>
                              <tr>
                                  <th></th>
                                  <th>HN</th>
                                  <th>Patient Firstname</th>
                                  <th>Patient Lastname</th>
                                  <th>Result</th>
                                  <th>Critical Value</th>
                                  <th>Report</th>
                                  <th>Cancel</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr ng-repeat="data in redRecordResult">
                                <td></td>
                                <td col-lg-5>@{{data.hn}}</td>
                                <td col-lg-5>@{{data.patient_firstname}}</td>
                                <td col-lg-5>@{{data.patient_lastname}}</td>
                                <td col-lg-5>@{{data.lab_result}}</td>
                                <td col-lg-5>@{{data.critical_value}}</td>
                                <td>
                                <button type="button" class="btn btn-success" ng-click="CriticalReport(data.id_lab_order_main, data.id_patient, data.id_lab_item)" style="float: left;">Report</button>
                                </td>
                                <td>
                                <button type="button" class="btn btn-danger" ng-click="Cancel(data.id_lab_order_main, data.id_patient, data.id_lab_item)" data-dismiss="modal">Cancel</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-success" ng-click="CriticalReport()" style="float: left;">Report</button>
                <button type="button" class="btn btn-danger" ng-click="Cancel()" data-dismiss="modal">Cancel</button>
            </div> -->
        </div>
    </div>
</div>
