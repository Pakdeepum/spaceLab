<div class="modal fade" id="modal-report-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">รายงานระยะเวลารอคอยของผู้ป่วย/ครั้งที่มารับบริการ</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 text-right">
              <p style="margin-top: 15px;">ช่วงวันที่ : </p>
              <p style="margin-top: 25px;">ถึงวันที่ : </p>
              <p style="margin-top: 25px;">Visit Type : </p>
            </div>
            <div class="col-lg-8">
            <div class="inputgroup">
                <input type="date" name="dateStart4" ng-model="dateStart4" required style="width:75%; margin-bottom:15px; margin-top:9px; height: 29px;padding: 4px 10px;">
                <input type="date" name="dateEnd4" ng-model="dateEnd4" required style="width:75%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
              </div> 
              <select id="visit4" style="width:85%; margin-bottom:15px;">
              </select>
            </div>
          </div>
        </div>    
      </div>
      <div class="modal-footer">
        <button class="save-button" ng-click="Showereport4()" style="float:left">
          <i class="fa fa-save"></i> บันทึก
        </button>
        <button class="del-button" data-dismiss="modal">
          <i class="fa fa-times"></i> ยกเลิก
        </button>
      </div>
    </div>
  </div>
</div>