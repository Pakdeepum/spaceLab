<div class="modal fade" id="modal-lab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div style="width:70% height: 70%" class="modal-content" style="overflow: scroll; max-height: -webkit-fill-available;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lab</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div ng-controller="selectDataLabController">
              <table class="table" style="width:100%">
                <thead>
                  <tr style="width:100%;">
                    <th>Lab No.</th>
                    <th>HN</th>
                    <th>ชื่อ - สกุล</th>
                    <th>เพศ</th>
                    <th>อายุ</th>
                    <th>Date Order</th>
                    <th>Note</th>
                    <th>เลือก</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="data in posts">
                    <td>@{{data.lab_order_no}}</td>
                    <td>@{{data.hn}}</td>
                    <td>@{{data.pataint_firstname}} @{{data.pataint_lastname}}</td>
                    <td>@{{data.gender}}</td>
                    <td>@{{data.age}}</td>
                    <td>@{{data.order_date}}</td>
                    <td>@{{data.note}}</td>
                    <td>
                      <button ng-controller="ChooseLabController" class="main-button" ng-click="ChooseLab(data.lab_order_no)" data-dismiss="modal">
                        เลือก
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="del-button" data-dismiss="modal">
            <i class="fa fa-times"></i> ยกเลิก
        </button>
      </div>
    </div>
  </div>
</div>
