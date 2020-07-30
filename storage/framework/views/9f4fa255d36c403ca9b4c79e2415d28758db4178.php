<div class="modal fade" id="modal-report-12" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">รายงานเวลาตรวจเฉลี่ยแต่ละ Test</h5>
      </div>
      <div class="modal-body">
      <form id="report-12" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 text-right">
              <p style="margin-top: 15px;">ช่วงวันที่ : </p>
              <p style="margin-top: 25px;">ถึงวันที่ : </p>
              <p style="margin-top: 25px;">Visit Type : </p>
            </div>
            <div class="col-lg-8">
              <div class="inputgroup">
                <input type="date" name="dateStart" style="width:70%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
                <button class="input-main-button" style="margin-top: -2px;"><i class="fa fa-calendar"></i></button>
                <input type="date" name="dateEnd" style="width:70%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
                <button class="input-main-button" style="margin-top: -2px;"><i class="fa fa-calendar"></i></button>
              </div>
              <select id="visit" style="width:80%; margin-bottom: 15px;">
                <option></option>
                <option value="1">1111</option>
                <option value="2">2222</option>
                <option value="3">3333</option>
              </select>
            </div>
          </div>
        </div>    
      </div>
      <div class="modal-footer">
        <button class="save-button" ng-click="Show()" style="float:left">
          <i class="fa fa-save"></i> ตกลง
        </button>
        <button class="del-button" data-dismiss="modal">
          <i class="fa fa-times"></i> ยกเลิก
        </button>
      </div>
      </form>
    </div>
  </div>
</div>