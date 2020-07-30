<div class="modal fade" id="modal-hospital" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="overflow: scroll; max-height: -webkit-fill-available;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hospital</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div ng-controller="SelectHospitalController">
              <table class="table" style="width:100%">
                <thead>
                  <tr>
                    <th>Hospital name</th>
                    <th style="width:10%">Select</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="data in AllDataHospital">
                    <td>@{{data.hospital_name}}</td>
                    <td><button class="main-button" ng-click="Choose(data.id_hospital)" data-dismiss="modal" style="float:right">Select</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>
