<div class="modal fade" id="modal-report-7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Average Time For Each Test Per Hospital</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 text-right">
              <p style="margin-top: 15px;">Date Range : </p>
              <p style="margin-top: 25px;">To : </p>
              <p style="margin-top: 25px;">Hospital Name : </p>
            </div>
            <div class="col-lg-8">
              <div class="inputgroup">
              <input type="date" name="dateStart7" style="width:75%; margin-bottom:15px; margin-top:9px; height: 29px;padding: 4px 10px;">
                <input type="date" name="dateEnd7" style="width:75%; margin-bottom:15px; height: 29px;padding: 4px 10px;">
              </div>
              <select id="hospital7" style="width:80%; margin-bottom:15px;"></select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="save-button" ng-click="Showereport7()" style="float:left">
          <i class="fa fa-save"></i> Save
        </button>
        <button class="del-button" data-dismiss="modal">
          <i class="fa fa-times"></i> Cancel
        </button>
      </div>
    </div>
  </div>
</div>
