<div class="modal fade" id="modal-patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width:70%">
    <div class="modal-content" style="overflow: scroll; max-height: -webkit-fill-available;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">คนไข้</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div ng-controller="SelectPatientController">
              <div class="row push-down-5">
                <div class="col-lg-4">
                  <input type="text" name="hn" ng-model="SearchPatient.hn" placeHolder="HN"/>
                </div>
              </div>
              <table class="table" style="width:100%">
                <thead>
                  <tr>
                    <th><center>HN</center></th>
                    <th style="width:15%"><center>ชื่อ - สกุล</center></th>
                    <th><center>อายุ</th>
                    <th style="width:20%"><center>ที่อยู่</center></th>
                    <th><center>สัญชาติ</center></th>
                    <th><center>กรุ๊ปเลือด</center></th>
                    <th><center>ประวัติแพ้ยา</center></th>
                    <th><center>น้ำหนัก</center></th>
                    <th><center>ส่วนสูง</center></th>
                    <th><center>เลือก</center></th>
                  </tr>
                </thead>
                <tbody>
                  <tr dir-paginate="data in AllDataPatient | filter:SearchPatient |itemsPerPage:10" pagination-id="paginate-patient">
                    <td>{{data.hn}}</td>
                    <td>{{data.prefix['prefix_name']}}{{data.patient_firstname}} {{data.patient_lastname}}</td>
                    <td><center>{{data.age}}</center></td>
                    <td>{{data.patient_address}} {{data.district_name}} {{data.amphur_name}} {{data.province_name}} {{data.patient_zipcode}}</td>
                    <td>{{data.nationality['nationality_name']}}</td>
                    <td><center>{{data.blood_group}}</center></td>
                    <td>{{data.drug_allergy}}</td>
                    <td><center>{{data.weight}}</center></td>
                    <td><center>{{data.height}}</center></td>
                    <td><button class="main-button" ng-click="Choose(data.id_patient)" data-dismiss="modal" style="float:right"> เลือก</button></td>
                  </tr>
                </tbody>
              </table>
              <dir-pagination-controls pagination-id="paginate-patient" class="pull-right" max-size="10"
                  direction-links="true" boundary-links="true">
              </dir-pagination-controls>
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
