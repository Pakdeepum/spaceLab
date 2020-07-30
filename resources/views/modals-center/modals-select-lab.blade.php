<div class="modal fade" id="modal-lab" tabindex="-1" role="dialog" style="overflow-y: hidden;" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
modal-history>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div style="width:100%;" class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lab</h5>
      </div>
      <div class="modal-body" style="overflow: scroll;  max-height:90vh;">
        <div class="row">
          <div class="col-lg-12">
             <div class="row push-down-5">
                <div class="col-lg-4" ng-repeat="lab in LabSubGroup" >
                  <input  type="radio" id="labgroupitem" name="labgroupitem"  ng-click="SelectLabSubGroupItem(lab.id_lab_sub_group_item)"/>
                  <label  for="labgroupitem" ng-value="lab.lab_sub_group_name" ng-model="lab" style="padding-right: 5px">@{{lab.lab_sub_group_name}}</label>
                </div>
                <div class="col-lg-4">
                  <input  type="radio" id="labgroupitemAll" name="labgroupitem" ng-click="ShowAll()" checked/>
                  <label  for="labgroupitemAll" ng-value="All" ng-model="lab" style="padding-right: 5px">All</label>
                </div>
              </div>
            
              <div class="row push-down-5">
                <div class="col-lg-4">
                  <input type="text" name="labNo" ng-model="search.lab_order_no" placeHolder="Lab No."/>
                </div>
                <div class="col-lg-4">
                  <input type="text" name="hn" ng-model="search.hn" placeHolder="HN"/>
                </div>
                <div class="col-lg-4">
                  <input type="text" name="patient" ng-model="patient" placeHolder="Name - Lastname"/>
                </div>
              </div>
              <table class="table" style="width:100%">
                <thead>
                  <tr style="width:100%;">
                    <th style="display: none;">Lab ID</th>
                    <th style="display: none;">Hospital ID</th>
                    <th>Lab No.</th>
                    <th>HN</th>
                    <th>Title Name</th>
                    <th>Name - Lastname</th>
                    <th>Age</th>
                    <th>Date Order</th>
                    <th style="display: none;">Note</th>
                    <th>Select</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-if="!isFiltered" ng-repeat="data in posts | filter:search | filter:patient">
                    <td style="display: none;">@{{data.id_lab_order_main}}</td>
                    <td style="display: none;">@{{data.id_hospital}}</td>
                    <td>@{{data.lab_order_no}}</td>
                    <td>@{{data.hn}}</td>
                    <td>@{{data.prefix_name}}</td>
                    <td>@{{data.patient_firstname}} @{{data.patient_lastname}}</td>
                    <td>@{{data.age}}</td>
                    <td>@{{data.order_date}}</td>
                    <td style="display: none;">@{{data.note}}</td>
                    <td>
                      <button class="main-button" ng-click="ChooseLab(data.id_lab_order_main)" data-dismiss="modal">
                        Select
                      </button>
                    </td>
                  </tr>
                  <tr ng-if="isFiltered" ng-repeat="data in newPosts | filter:search | filter:patient  track by $index ">
                    <td style="display: none;">@{{data.id_lab_order_main}}</td>
                    <td style="display: none;">@{{data.id_hospital}}</td>
                    <td>@{{data.lab_order_no}}</td>
                    <td>@{{data.hn}}</td>
                    <td>@{{data.prefix_name}}</td>
                    <td>@{{data.patient_firstname}} @{{data.patient_lastname}}</td>
                    <td>@{{data.age}}</td>
                    <td>@{{data.order_date}}</td>
                    <td style="display: none;">@{{data.note}}</td>
                    <td>
                      <button class="main-button" ng-click="ChooseLab(data.id_lab_order_main)" data-dismiss="modal">
                        Select
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="del-button" data-dismiss="modal">
              <i class="fa fa-times"></i> Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
