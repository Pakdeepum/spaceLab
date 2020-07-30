<div class="modal fade" id="modal-askSave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <h3 style="text-align:center; margin-top:20px;">Do you want to save ?</h3>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-3" align="center">
                <h4 class="push-down-5" style="padding-top:5px"><label>Pincode</label></h4>
            </div>
            <div class="col-lg-4 push-down-5">
                <input id="askSavePincodeInput" type="password" name="pincode" ng-model="_pincode" numbers-only placeholder="number only"
                    autocomplete="off" />
            </div>
            <div style="padding-top:5px">
              <span style="color:red;" ng-show="permission">Invalid Pincode</span>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h5 style="text-align:center; margin-top:10px;color:red;">@{{pinError}}</h5>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="save-button" type="button" id="confirm-Asksave" style="float:left">Submit</button>
        <button class="del-button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
