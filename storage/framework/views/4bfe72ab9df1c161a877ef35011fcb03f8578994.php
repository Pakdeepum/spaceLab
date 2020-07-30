<div class="modal fade" id="modal-management-user-addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มผู้ใช้</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('management.AddUser')); ?>" method="post" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-lg-12"style="margin-bottom: 20px;border: 2px;border-style:groove;height: 360px;">
            <div class="col-lg-4">
              <div  class="row">
                <img align="right" src="https://cdn1.iconfinder.com/data/icons/metro-ui-dock-icon-set--icons-by-dakirby/512/Personal.png" id="img"style="height: auto;margin-top: 58px;max-width: 100%;">
                  <div>
                    <input type="file" name="images" id="imageinput"style="width: 200px;">
                  </div>
                </div>
              </div>
            <div class="col-lg-8"style="margin-top: 10px;">
              <div class="col-lg-4">
                <div class="row">
                  <div align="right" style="font-size: 16px;">
                    <label style="margin-bottom:16px;">Username  </label><br>      
                    <label style="margin-bottom:16px;">Password  </label><br>                                    
                    <label style="margin-bottom:16px;">คำนำหน้า  </label><br>
                    <label style="margin-bottom:16px;">ชื่อ  </label><br>
                    <label style="margin-bottom:16px;">นามสกุล  </label><br>
                    <label style="margin-bottom:16px;">ตำแหน่ง  </label><br>
                    <label style="margin-bottom:16px;">แผนก  </label><br>
                    <label style="margin-bottom:16px;">โรงพยาบาล </label><br>
                    <label style="margin-bottom:16px;">กลุ่มผู้ใช้ </label><br>
                   </div>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div align="left" >
                <input type="text" name="username" id="usernames"  ng-model="User" style="margin-bottom:8px;width: 100%;"required><br>
                <input type="password" name="password" id="passwords" ng-model="Pass" style="margin-bottom:8px;width: 100%;"required><br>
                <select id="Prefix" ng-controller="ListOptionUserController"   class="w3-select" name="prefix" style="margin-bottom:8px;height: 30px;width: 100%;"required>
                  <option value="0">เลือกคำนำหน้า</option>
                  <option ng-repeat="data in prefixname| orderBy : 'prefix_name'" value="{{data.id_prefix}}">{{data.prefix_name}}</option>
                </select>
                  <br>
                <input type="text" name="fname" style="margin-bottom:9px;width: 100%;"required><br>
                <input type="text" name="lname" style="margin-bottom:9px;width: 100%;"required><br>
                <select id="Position" ng-controller="ListOptionPositionController"  class="w3-select required" name="position" style="margin-bottom:8px;height: 30px;width: 100%;"required>
                  <option value="0">เลือกตำแหน่ง</option>
                  <option ng-repeat='data in position' value="{{data.id_position}}">{{data.position_name}}</option>
                </select>
                <br>
                <select id="Department" ng-controller="ListOptionDepartmentController" class="w3-select" name="department" style="margin-bottom:8px;height: 30px;width: 100%;"required>
                  <option value="0">เลือกแผนก</option>
                  <option ng-repeat='data in department' value="{{data.id_department}}">{{data.department_name}}</option>
                </select><br>
                <input type="text" name="hospital_name" style="margin-bottom:8px;width: 100%; background-color: #c0c0c0;" readonly required><br>
                <input type="text" name="id_hospital" style="display: none;">
                <select id="Groupuser" ng-controller="ListOptionGroupUserController"  class="w3-select required" name="groupuser" style="margin-bottom:8px;height: 30px;width: 100%;"required>
                  <option value="0">เลือกกลุ่มผู้ใช้</option>
                  <option ng-repeat='data in groupuser' value="{{data.id_group_user}}">{{data.group_user_name}}</option>
                </select>
                </div>
              </div>  
            </div>
              <div class="col-lg-2">
                <div ng-controller="LabOrderSearchBarController">
                  <div align="left">
                    <button type="button" ng-click="SearchHospital()" class="btn btn-success" style="float: left;margin-top: 264px;">เลือก</button>
                  </div>
                </div>    
              </div>
            </div>  
          </div>
        </div>
      </div>
        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>
      <div class="modal-footer">
        <button type="submit" id="adduser" class="btn save-button" style="float:left" disabled><i class="fa fa-save"></i> บันทึก</button>
        <button class="btn del-button" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
      </div>
    </div>
    </form>
  </div>
</div>


