<!-- MODAL REGISTER -->
<div class="modal fade" id="modal-recieveLab-reg" tabindex="-1" role="dialog" style="overflow-y: hidden;"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true" modal-labreveice>
  <div style="width: 80%; " class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="overflow: scroll;max-height:95vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lab Order</h5>
      </div>
            <div class="modal-body" ng-controller="LabOrderSearchBarController">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-5 text-right">
                            <span ng-if="hospital" class="valid-input">
                                {{invalid_hospital}}
                            </span>
                             <p>
                                Hospital :
                                <input style="width: 50%" name="hospital_name" type="text"/>
                                <input type="text" name="id_hospital" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchHospital()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelHospital()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                            <span ng-if="clinic" class="valid-input">
                            {{invalid_clinic}}
                            </span>
                            <p>
                                Clinic :
                                <input style="width: 50%" name="clinic_name" type="text"/>
                                <input type="text" name="id_clinic" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchClinic()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelClinic()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                            <span ng-if="department" class="valid-input">
                            {{invalid_departmanet}}
                            </span>
                            <p>
                                Department :
                                <input style="width: 50%" name="department_name" type="text"/>
                                <input type="text" name="id_department" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchDepartment()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelDepartment()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                            <span ng-if="doctor" class="valid-input">
                                {{invalid_doctor}}
                            </span>
                            <p>
                                Doctor :
                                <input style="width: 50%" name="doctor_name" type="text"/>
                                <input type="text" name="id_doctor" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchDoctor()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelDoctor()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                            <span ng-if="ward" class="valid-input">
                                {{invalid_ward}}
                            </span>
                            <p>
                                Ward :
                                <input style="width: 50%" name="ward_name" type="text"/>
                                <input type="text" name="id_ward" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchWard()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelWard()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                        </div>
                        <div class="col-lg-7 text-right">
                            <span ng-if="patient" class="valid-input">
                                {{invalid_patient}}
                            </span>
                            <p>
                                Patient HN :
                                <input style="width: 70%" name="hn" type="text" disabled="disabled"/>
                                <input type="text" name="id_patient" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchPatient()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelPatient()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                            <p>
                                Prefix :
                                <input style="width: 19%; margin-right: 3%;" name="prefix_name" type="text" />
                                Name :
                                <input style="width: 21%; margin-right: 3%;" name="patient_firstname" type="text" />
                                Surname :
                                <input style="width: 21%" name="patient_lastname" type="text"/>
                            </p>
                            <p>
                                Age :
                                <input style="width: 21%; margin-right: 7%;" name="age" type="text"/>
                                Sex :
                                <input style="width: 21%" name="gender" type="text"/>
                            </p>
                            <p>
                                Service Plan :
                                <input style="width: 70%" name="service_plan_name" type="text"/>
                                <input type="text" name="id_service_plan" style="display: none;">
                                <button type="button" class="main-button" ng-click="SearchServicePlan()">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button type="button" ng-click="DelServicePlan()" class="del-button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </p>
                            <p style="margin-right:59%">
                                Service Point :
                                <input type="radio" name="OPD_IPD" checked="checked" value="1"/>
                                <label style="padding-right: 10%">OPD</label>
                                <input type="radio" name="OPD_IPD" value="2"/>
                                <label style="padding-right: 10%">IPD</label>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <!--TAB-->
                <div class="row">
                    <div class="col-lg-12">
                        <span ng-if="labItem" class="valid-input">
                            {{invalid_labitem}}
                        </span>
                        <div class="col-lg-5 text-right">
                        <label>Lab Group Item : </label>
                            <select id="labgroupitem" name="labgroupitem" style="width: 70%" ng-options="lab.lab_sub_group_name for lab in LabSubGroup" ng-model="lab" ng-change="SelectLabSubGroupItem(lab.id_lab_sub_group_item)">
                                <option ng-value="lab.lab_sub_group_name"></option>
                                
                            </select>
                        </div>
                        <div class="row">
                        <div class="col-lg-6 text-right">
                          <label>Profile Test : </label>
                              <select id="profileTest" name="profileTest" style="width: 50%" ng-options="pro.profile_name for pro in profileTestByGroup" ng-model="pro" ng-change="SelectProfileTest(pro)">
                                  <option value=""></option>
                                  <option ng-value="pro.profile_name"></option>
                                  
                              </select>

                              <a href="/management/profileTest" target="_blank"><button class="edit-button">
                                      <i class="fa fa-pencil-square-o "></i>
                                  Setup Profile</button></a>
                                </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table" style="width:100%; margin-top:15px">
                            <thead>
                                <tr>
                                    <th style="width:20%;">Select</th>
                                    <th style="width:30%;">Lab Item Code</th>
                                    <th style="width:50%;">Lab Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="data in DataLabSubGroupItem">
                                    <td><input type="checkbox" name="{{data.lab_item_name}}" value="{{data.id_lab_item}}" ng-click="check(data.id_lab_item)" ng-checked="itemget.indexOf(data.id_lab_item) > -1" ng-click="toggleSelection(data.id_lab_item)"></td>
                                    <td>{{data.lab_item_code}}</td>
                                    <td>{{data.lab_item_name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--END TAB-->
            </div>
            <div class="modal-footer">
                <button data-url="<?php echo e(route('main.AddLabOrder')); ?>" data-url2="<?php echo e(route('main.AddLabOrderDetail')); ?>" id="AddLabOrder"
                    data-dismiss="modal" style="float: left;" type="button" class="save-button">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="button" class="del-button" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modals-center.modals-patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-department', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-hospital', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-clinic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-servicePlan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals-center.modals-ward', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- END MODAL REGISTER -->
