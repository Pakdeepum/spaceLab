<div class="modal fade" id="modal-report-10" tabindex="-1"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form ng-submit="onSubmit()">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">รายงานปฏิเสธสิ่งส่งตรวจ</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 text-right">
              <p style="margin-top: 15px;">ช่วงวันที่ : </p>
              <p style="margin-top: 25px;">ถึงวันที่ : </p>
            </div>
            <div class="col-lg-8">
              <div class="inputgroup">
                <input type="date" ng-model="fromDate" style="width:70%; margin-bottom:15px;" required>
                <input type="date" ng-model="toDate" style="width:70%; margin-bottom:15px;" required>
              </div>
            </div>
          </div>
        </div>    
      </div>
      <div class="modal-footer">
        <button type="submit" class="save-button" style="float:left">
          <i class="fa fa-save"></i> บันทึก
        </button>

        <button class="del-button" data-dismiss="modal">
          <i class="fa fa-times"></i> ยกเลิก
        </button>
      </div>
    </div>
    </form>
  </div>
</div>