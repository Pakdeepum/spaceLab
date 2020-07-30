<div class="modal fade" id="modal-Cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" modal-lab-result>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin: auto;" ng-controller="criticalController">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cancel</h5>
            </div>
            <div class="modal-body">
                <div class="card card-small">
                    <div class="card-body pt-0 mt-5">
                          <h3>Why do you want to cancel?</h3>
                          <textarea name="reason" id="reason" style="width: 100%; height: 100px;"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" ng-click="SaveReason()" style="text-align:center;">Save</button>
                <button type="button" class="btn btn-danger" ng-click="cancelButton()" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
