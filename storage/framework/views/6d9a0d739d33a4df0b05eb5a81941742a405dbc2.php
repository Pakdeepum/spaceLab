
<div class="modal fade" id="modal-management-patient-editPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%; height:auto;max-height: -webkit-fill-available;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Patients</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('managePatient.SaveEditPatient')); ?>" method="post" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4">
              <img align="center" name="img_e" id="img_e" src="https://cdn1.iconfinder.com/data/icons/metro-ui-dock-icon-set--icons-by-dakirby/512/Personal.png" style="max-height:50%; margin:auto; max-width: 50%;">
              <input type="file" name="image_e" id="image_e"style="width: 50%; margin-top: 20px;">
              <input type="hidden" name="ofile_e" id="ofile_e"/>
                <div class="col-lg-12">
                  <div class="col-lg-4 text-right">
                    <label style="margin-top:20px;">ID card number: </label><br>
                    <label style="margin-top:20px;">HN: </label><br>
                    <label style="margin-top:15px;">Title Name: </label><br>
                    <label style="margin-top:15px;">Name: </label><br>
                    <label style="margin-top:15px;">Lastname: </label><br>
                    <label style="margin-top:15px;">Tel: </label><br>
                  </div>
                  <div class="col-lg-8 text-left">
                    <input name="IDnumberEdit" id="IDnumberEdit" type="text" style="width: 100%; margin-top: 20px;">
                    <input name="HNumber" id="HNumber" type="text" style="width: 100%; margin-top: 20px;" required>
                    <select name="PrefixEdit" id="PrefixEdit" ng-controller="ListPrefixPatientController" style="margin-top:10px; width: 100%;">
                      <option value="0">Select Title Name</option>
                      <option ng-repeat="data in prefixname | orderBy: 'prefix_name'" value="{{data.id_prefix}}">{{data.prefix_name}}</option>
                    </select>
                    <input name="firstNameEdit" id="firstNameEdit" type="text" style="width: 100%; margin-top: 10px;" required>
                    <input name="lastNameEdit" id="lastNameEdit" type="text" style="width: 100%; margin-top: 10px;">
                    <input name="telNoEdit" id="telNoEdit" type="text" style="width: 100%; margin-top: 10px;">
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
              <div class="col-lg-12">
                <div class="col-lg-4 text-right">
                  <label style="margin-top:15px;">Email: </label><br>
                  <label style="margin-top:15px;">birthday: </label><br>
                  <label style="margin-top:30px;">Gender: </label><br>
                  <label style="margin-top:15px;">Blood Type: </label><br>
                  <label style="margin-top:15px;">Status: </label><br>
                  <label style="margin-top:20px;">Ethnicity: </label><br>
                  <label style="margin-top:15px;">Nationality: </label><br>
                  <label style="margin-top:15px;">Religion: </label><br>
                  <label style="margin-top:20px;">Father's Name: </label><br>
                  <label style="margin-top:15px;">Mother's Name: </label><br>
                </div>
                <div class="col-lg-8 text-left">
                  <input name="emailEdit" id="emailEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <input name="birthDayEdit" id="birthDayEdit" type="date" style="width: 100%; height:30px; margin-top: 10px;" required>
                  <select name="genderEdit" id="genderEdit" style="margin-top:10px; width: 100%;">
                    <option value="0">Select Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select>
                  <input name="bloodGroupEdit" id="bloodGroupEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <select name="statusEdit" id="statusEdit" style="margin-top:10px; width: 100%;">
                    <option value="0">Select Status</option>
                    <option value="1">Single</option>
                    <option value="2">Married</option>
                    <option value="3">Widow</option>
                    <option value="4">Divorce</option>
                    <option value="5">Separated</option>
                  </select>
                  <select name="ethnicityEdit" id="ethnicityEdit" ng-controller="ListEthnicityMasterController" style="margin-top:10px; width: 100%;">
                    <option value="0">Select ethnicity</option>
                    <option ng-repeat="data in ethnicity | orderBy: 'ethnicity_name'" value="{{data.id_ethnicity}}">{{data.ethnicity_name}}</option>
                  </select>
                  <select name="nationalityEdit" id="nationalityEdit" ng-controller="ListNationalityMasterController" style="margin-top:10px; width: 100%;">
                    <option value="0">Select nationality</option>
                    <option ng-repeat="data in nationality | orderBy: 'nationality_name'" value="{{data.id_nationality}}">{{data.nationality_name}}</option>
                  </select>
                  <select name="religionEdit" id="religionEdit" ng-controller="ListReligionMasterController" style="margin-top:10px; width: 100%;">
                    <option value="0">Select nationality</option>
                    <option ng-repeat="data in religion | orderBy: 'religion_name'" value="{{data.id_religion}}">{{data.religion_name}}</option>
                  </select>
                  <input name="fatherNameEdit" id="fatherNameEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <input name="motherNameEdit" id="motherNameEdit" type="text" style="width: 100%; margin-top: 10px;">
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="col-lg-12">
                <div class="col-lg-4 text-right">
                  <label style="margin-top:15px;">Zip Code: </label><br>
                  <label style="margin-top:20px;">Province: </label><br>
                  <label style="margin-top:15px;">District: </label><br>
                  <label style="margin-top:15px;">Subdistrict: </label><br>
                  <label style="margin-top:20px;">Address: </label><br>
                  <label style="margin-top:15px;">Weight: </label><br>
                  <label style="margin-top:15px;">Height: </label><br>
                  <label style="margin-top:15px;">Patient type: </label><br>
                  <label style="margin-top:15px;">Drug Allergy: </label><br>
                  <label style="margin-top:15px;">Physician: </label><br>
                </div>
                <div class="col-lg-8 text-left">
                  <input name="zipcodeEdit" id="zipcodeEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <div ng-controller="listProvinceControllerEdit" ng-init="loadProvinceEdit()">
                    <select name="provinceEdit" id="provinceEdit" style="margin-top:10px; width: 100%;">
                      <option value="0">Select Provinces</option>
                      <option id="provinceShow" name="provinceShow" value=""></option>
                      <option ng-repeat="data in province | orderBy: 'province_name_en'" value="{{data.province_id}}">{{data.province_name_en}}</option>
                    </select>
                    <select name="amphurEdit" id="amphurEdit" style="margin-top:10px; width: 100%;">
                      <option value="0">Select Districts</option>
                      <option ng-repeat="data in amphur | orderBy: 'amphur_name_en'" value="{{data.amphur_id}}">{{data.amphur_name_en}}</option>
                      <option id="amphurShow" name="amphurShow" value=""></option>
                    </select>
                    <select name="districtEdit" id="districtEdit" style="margin-top:10px; width: 100%;">
                      <option value="0">Select Subdistrict</option>
                      <option name="district" ng-repeat="data in district | orderBy: 'district_name_en'" value="{{data.district_id}}">{{data.district_name_en}}</option>
                      <option id="districtShow" name="districtShow" value=""></option>
                    </select>
                  </div>
                  <input name="addressEdit" id="addressEdit" type="text" style="width: 100%; margin-top: 10px;" >
                  <input name="weightEdit" id="weightEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <input name="heightEdit" id="heightEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <select name="typeEdit" id="typeEdit" ng-controller="ListPatientTypeDataController" style="margin-top:10px; width: 100%;">
                    <option value="0">Select Patient Type</option>
                    <option ng-repeat="data in patientType | orderBy: 'patient_type_name'" value="{{data.id_patient_type}}">{{data.patient_type_name}}</option>
                  </select>
                  <input name="medAllergyEdit" id="medAllergyEdit" type="text" style="width: 100%; margin-top: 10px;">
                  <div ng-controller="SelectDoctorController">
                    <input name="doctor" id="doctor" type="text" style="width: 78%; margin-top: 10px; background-color: #c0c0c0 !important" readonly required>
                    <input name="iddoctor" id="iddoctor" type="hidden" value = "">
                    <input name="idpatientEdit" id="idpatientEdit" type="hidden" value = "">
                    <button ng-controller="SearchDoctorController" type="button" class="main-button text-right" ng-click="SearchDoctor()">
                      <i class="fa fa-search"></i>
                    </button>
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
        <button type="submit" id="addPatient" class="save-button" style="float:left"><i class="fa fa-save"></i> Save</button>
        <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div>
    </form>
  </div>
</div>
