
<div class="modal fade" id="modal-management-doctor-editDoctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:50%; height:auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Doctor Data</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('manageDoctor.SaveEditDoctor')); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

          <div class="row">
            <div class="col-lg-12">
              <div class="col-lg-2 text-center">
              </div>
              <div class="col-lg-2 text-right">
                <label style="margin-top:20px;">Title Name: </label><br>
                <label style="margin-top:15px;">Name: </label><br>
                <label style="margin-top:15px;">Lastname: </label><br>
                <label style="margin-top:15px;">Department: </label><br>
                <label style="margin-top:15px;">Position: </label><br>
                <label style="margin-top:20px;">Tel : </label><br>
                <label style="margin-top:15px;">Expertise: </label><br>
              </div>
              <div class="col-lg-6 text-left">
                <select name="PrefixEdit" id="PrefixEdit" ng-controller="ListPrefixDoctorController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select title name</option>
                  <option name="prefixShow" id="prefixShow" value=""></option>
                  <option ng-repeat="data in prefixname | orderBy: 'prefix_name'" value="{{data.id_prefix}}">{{data.prefix_name}}</option>
                </select>
                <input name="firstNameEdit" id="firstNameEdit" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="lastNameEdit" id="lastNameEdit" type="text" style="width: 100%; margin-top: 10px;" required>
                <select name="departmentEdit" id="departmentEdit" ng-controller="ListDepartmentMasterController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select department</option>
                  <option ng-repeat="data in department | orderBy: 'department_name'" value="{{data.id_department}}">{{data.department_name}}</option>
                </select>
                <select name="positionEdit" id="positionEdit" ng-controller="ListPositionMasterController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select position</option>
                  <option ng-repeat="data in position | orderBy: 'position_name'" value="{{data.id_position}}">{{data.position_name}}</option>
                </select>
                <input name="telNoEdit" id="telNoEdit" type="text" style="width: 100%; margin-top: 10px;" required>
                <select name="specialtyEdit" id="specialtyEdit" ng-controller="ListSpecialtyController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select expertise</option>
                  <option ng-repeat="data in specialty | orderBy: 'specialty_name'" value="{{data.id_specialty}}">{{data.specialty_name}}</option>
                </select>
                <input name="iddoctor" id="iddoctor" type="hidden" value = "">
              </div>
              <div class="col-lg-2 text-center">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="addDoctor" class="save-button" style="float:left"><i class="fa fa-save"></i> Save</button>
          <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
