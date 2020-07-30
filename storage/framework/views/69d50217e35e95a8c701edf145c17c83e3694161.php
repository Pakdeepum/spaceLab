<div class="modal fade" id="modal-report-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">สถิติการทำ Repeat</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 text-right">
              <p style="margin-top: 10px;">วันที่เริ่มต้น : </p>
              <p style="margin-top: 25px;">วันที่สิ้นสุด : </p>
              <p style="margin-top: 25px;">แผนก : </p>
              <p style="margin-top: 25px;">Analyzer : </p>
            </div>
            <div class="col-lg-8">
              <div class="inputgroup">
              <input type="date" name="dateStart2" ng-model="dateStart2" required  style="width:75%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
                <input type="date" name="dateEnd2" ng-model="dateEnd2" required style="width:75%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
              </div>
              <select id="labgroup2" style="width:85%; margin-bottom:15px;">
              </select>
              <select id="analyzer2" style="width:85%; margin-bottom:15px;">
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="save-button" ng-click="Showereport2()" style="float:left">
          <i class="fa fa-save"></i> บันทึก
        </button>
        <button class="del-button" data-dismiss="modal">
          <i class="fa fa-times"></i> ยกเลิก
        </button>
      </div>
    </div>
  </div>
</div>
