<div class="modal fade" id="modal-ResultReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" modal-lab-result>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin: auto;" ng-controller="criticalController">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รายงานค่าวิกฤต</h5>
            </div>
            <div class="modal-body">
                <div class="card card-small">
                    <div class="card-body pt-0 mt-5">
                          <h4 style="color:#1caf9a">ข้อมูลการรายงาน</h4>
                          <div class="row push-down-5">
                              <label>ผู้รับทราบค่าวิกฤต</label>
                              <div class="col-lg-12">
                                <span ng-if="recevied" class="valid-input">
                                  {{invalid_receives}}
                                </span>
                                <input type="text" name="recevied" id="receives" ng-change="receiveChange()" ng-model="receives" style="width: 100%;">
                              </div>                              
                          </div>
                          
                          <div class="row push-down-5">
                              <label> ผู้รายงานค่าวิกฤต</label>
                              <div class="col-lg-12">
                                <span ng-if="reporter" class="valid-input">
                                  {{invalid_reporter}}
                                </span>
                                  <input type="text" name="reporter" id="reporters" ng-change="reporterChange()" ng-model="reporters" style="width: 100%;">
                              </div>                              
                          </div>
                          <div class="row push-down-5">
                              <label> หน่วยงานที่รับแจ้ง</label>
                              <div class="col-lg-12">
                                <span ng-if="department" class="valid-input">
                                  {{invalid_department}}
                                </span>
                                 <input type="text" name="department" id="departments" ng-change="departmentChange()" ng-model="departments" style="width: 100%;">
                              </div>                              
                          </div>
                          <div class="row push-down-5">
                              <label>สาเหตุ </label>
                              <div class="col-lg-12">
                                <span ng-if="cause" class="valid-input">
                                  {{invalid_cause}}
                                </span>
                                  <textarea name="cause" id="cause" ng-model="causes" ng-change="causeChange()" style="width: 100%;" rows="5"></textarea>
                              </div>                              
                          </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" ng-click="saveCri()"style="float: left;">บันทึก</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
