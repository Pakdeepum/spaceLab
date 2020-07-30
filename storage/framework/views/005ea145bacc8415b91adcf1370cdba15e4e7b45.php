<div class="modal fade" id="modal-doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="overflow: scroll; max-height: -webkit-fill-available;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">แพทย์</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div ng-controller="SelectDoctorController">
              <table class="table" style="width:100%">
                <thead>
                  <tr>
                    <th>ชื่อ - สกุล</th>
                    <th>แผนก</th>
                    <th>specialty name</th>
                    <th style="width:10%">เลือก</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="data in AllDataDoctor">
                    <td>{{data.prefix['prefix_name']}} {{data.doctor_name}} {{data.doctor_lastname}}</td>
                    <td>{{data.department['department_name']}}</td>
                    <td>{{data.specialty['specialty_name']}}</td>
                    <td><button class="main-button" ng-click="Choose(data.id_doctor)" style="float:right"> เลือก</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
      </div>
    </div>
  </div>
</div>
