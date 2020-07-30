<div class="modal fade" id="modal-report-9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">สถิติการส่งตรวจแยกตามสิทธิ</h5>
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
                <input type="date" name="dateStart" style="width:70%; margin-bottom:15px;">
                <input type="date" name="dateEnd" style="width:70%; margin-bottom:15px;">
              </div>
            </div>
          </div>
        </div>    
      </div>
      <div class="modal-footer">
        <button class="save-button"  ng-click="Showereport9()" style="float:left">
          <i class="fa fa-save"></i> บันทึก
        </button>
        <button class="del-button" data-dismiss="modal">
          <i class="fa fa-times"></i> ยกเลิก
        </button>
      </div>
    </div>
  </div>
</div>