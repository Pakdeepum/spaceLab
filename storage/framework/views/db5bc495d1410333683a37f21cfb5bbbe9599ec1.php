<div class="modal fade" id="modal-management-patient-addPatient" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%; height:auto;max-height: -webkit-fill-available;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มผู้ป่วย</h5>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('management.AddPatient')); ?>" method="post" enctype="multipart/form-data" id="from_patient_submit">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img align="center" name="img" id="img"
                                        src="https://cdn1.iconfinder.com/data/icons/metro-ui-dock-icon-set--icons-by-dakirby/512/Personal.png"
                                        style="max-height:50%; margin:auto; max-width: 50%;">
                                    <input type="file" name="image" id="image"
                                        style="width: 50%;  margin-top: 10px; margin-bottom: 20px;">
                                    <div class="form-group">
                                        <span ng-if="_idCard" class="valid-input col-xs-offset-4">
                                            กรุณาระบุเลขบัตรประจำตัวประชาชน
                                        </span>
                                        <label class="col-lg-5" style="text-align: right;">เลขบัตรประจำตัวประชาชน: </label>
                                        <input name="IDnumberAdd" id="IDnumberAdd" type="text" ng-model="_idNumber" ng-change="idNumber()"
                                            style="height:30px;width:55%;" required><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_HName" class="valid-input">
                                            กรุณาระบุ HN
                                        </span>
                                        <label class="col-lg-5" style="text-align: right;">HN: </label>
                                        <input name="HNumber" id="HNumber" type="text" ng-model="_HNChange" ng-change="onHNChange()" maxlength="8"
                                            style="height:30px; width:55%" required> <span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                       <span ng-if="_preFix" class="valid-input">
                                            กรุณาระบุคำนำหน้า
                                        </span>
                                        <label class="col-lg-5" style="text-align: right;">คำนำหน้า: </label>
                                        <select name="PrefixAdd" id="PrefixAdd"
                                            ng-controller="ListPrefixPatientController" style="height:30px; width:55%;">
                                            <option value="0">เลือกคำนำหน้า</option>
                                            <option ng-repeat="data in prefixname | orderBy: 'prefix_name'"
                                                value="{{data.id_prefix}}">{{data.prefix_name}}</option>
                                        </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_Name" class="valid-input">
                                            กรุณาระบุชื่อ
                                        </span>
                                        <label class="col-lg-5" style="text-align: right;">ชื่อ: </label>
                                        <input name="firstNameAdd" id="firstNameAdd" type="text" ng-model="_NameChange" ng-change="onNameChange()"
                                            style="height:30px; width:55%" required> <span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_lname" class="valid-input">
                                            กรุณาระบุนามสกุล
                                        </span>
                                        <label class="col-lg-5" style="text-align: right;">นามสกุล: </label>
                                        <input name="lastNameAdd" id="lastNameAdd" type="text" ng-model="_lnameChange" ng-change="onlNameChange()"
                                            style="height:30px; width:55%" required><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group push-down-10">
                                        <label class="col-lg-5" style="text-align: right;">เบอร์โทรศัพท์: </label>
                                        <input name="telNoAdd" id="telNoAdd" type="text"
                                            style="height:30px; width:55%;">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">Email: </label>
                                        <input name="emailAdd" id="emailAdd" type="text"
                                            style="height:30px; width:55%;">
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_birth" class="valid-input">
                                            กรุณาระบุวันเกิด
                                        </span>
                                        <label class="col-lg-4" style="text-align: right;">วันเกิด: </label>
                                        <input name="birthDayAdd" id="birthDayAdd" type="date" ng-model="_birthDate" ng-change="onBirthDate()"
                                            style="height:30px; width:55%" required> <span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_sex" class="valid-input">
                                            กรุณาระบุเพศ
                                        </span>
                                        <label class="col-lg-4" style="text-align: right;">เพศ: </label>
                                        <select name="genderAdd" id="genderAdd" style="width: 55%;">
                                            <option value="0">เลือกเพศ</option>
                                            <option value="1">ชาย</option>
                                            <option value="2">หญิง</option>
                                        </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">หมู่เลือด: </label>
                                        <input name="bloodGroupAdd" id="bloodGroupAdd" type="text"
                                            style="height:30px; width:55%;">
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_status" class="valid-input">
                                            กรุณาระบุสถานะ
                                        </span>
                                        <label class="col-lg-4" style="text-align: right;">สถานะ: </label>
                                        <select name="statusAdd" id="statusAdd" style="height:30px; width: 55%;">
                                            <option value="0">เลือกสถานะ</option>
                                            <option value="1">โสด</option>
                                            <option value="2">สมรส</option>
                                            <option value="3">หม้าย</option>
                                            <option value="4">หย่า</option>
                                            <option value="5">แยกกันอยู่</option>
                                        </select><span style="color:red; font-size:14px;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_ethnicity" class="valid-input">
                                            กรุณาระบุเชื้อชาติ
                                        </span>
                                        <label class="col-lg-4" style="text-align: right;">เชื้อชาติ: </label>
                                        <select name="ethnicityAdd" id="ethnicityAdd"
                                            ng-controller="ListEthnicityMasterController"
                                            style="height:30px; width: 55%;">
                                            <option value="0">เลือกเชื้อชาติ</option>
                                            <option ng-repeat="data in ethnicity | orderBy: 'ethnicity_name'"
                                                value="{{data.id_ethnicity}}">{{data.ethnicity_name}}</option>
                                        </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <span ng-if="_nationality" class="valid-input">
                                            กรุณาระบุสัญชาติ
                                        </span>
                                        <label class="col-lg-4" style="text-align: right;">สัญชาติ: </label>
                                        <select name="nationalityAdd" id="nationalityAdd"
                                            ng-controller="ListNationalityMasterController"
                                            style="height:30px; width: 55%;">
                                            <option value="0">เลือกสัญชาติ</option>
                                            <option ng-repeat="data in nationality | orderBy: 'nationality_name'"
                                                value="{{data.id_nationality}}">{{data.nationality_name}}</option>
                                        </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                      <span ng-if="_religion" class="valid-input">
                                            กรุณาระบุศาสนา
                                        </span>
                                        <label class="col-lg-4" style="text-align: right;">ศาสนา: </label>
                                        <select name="religionAdd" id="religionAdd"
                                            ng-controller="ListReligionMasterController"
                                            style="height:30px; width: 55%;">
                                            <option value="0">เลือกศาสนา</option>
                                            <option ng-repeat="data in religion | orderBy: 'religion_name'"
                                                value="{{data.id_religion}}">{{data.religion_name}}</option>
                                        </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">ชื่อ-สกุล บิดา: </label>
                                        <input name="fatherNameAdd" id="fatherNameAdd" type="text"
                                            style="height:30px; width:55%;">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">ชื่อ-สกุล มารดา: </label>
                                        <input name="motherNameAdd" id="motherNameAdd" type="text"
                                            style="height:30px; width:55%;">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">รหัสไปรษณีย์: </label>
                                        <input name="zipcodeAdd" id="zipcodeAdd" type="text"
                                            style="height:30px; width: 55%;">
                                    </div>
                                    <div class="form-group">
                                        <div ng-controller="listProvinceControllerAdd" ng-init="loadProvinceAdd()">
                                            <div class="form-group">
                                              <span ng-if="_province" class="valid-input">
                                                กรุณาระบุจังหวัด
                                              </span>
                                                <label class="col-lg-4" style="text-align: right;">จังหวัด: </label>
                                                <select name="provinceAdd" id="provinceAdd"
                                                    style="height:30px; width: 55%;">
                                                    <option value="0">เลือกจังหวัด</option>
                                                    <option ng-repeat="data in province | orderBy: 'province_name'"
                                                        value="{{data.province_id}}">{{data.province_name}}</option>
                                                </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                            </div>
                                            <div class="form-group">
                                              <span ng-if="_amphur" class="valid-input">
                                                กรุณาระบุอำเภอ
                                              </span>
                                                <label class="col-lg-4" style="text-align: right;">อำเภอ: </label>
                                                <select name="amphurAdd" id="amphurAdd"
                                                    style="height:30px; width: 55%;">
                                                    <option value="0">เลือกอำเภอ</option>
                                                    <option ng-repeat="data in amphur | orderBy: 'amphur_name'"
                                                        value="{{data.amphur_id}}">{{data.amphur_name}}</option>
                                                </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                            </div>
                                            <div class="form-group">
                                              <span ng-if="_district" class="valid-input">
                                                กรุณาระบุตำบล
                                              </span>
                                                <label class="col-lg-4" style="text-align: right;">ตำบล: </label>
                                                <select name="districtAdd" id="districtAdd"
                                                    style="height:30px; width: 55%;">
                                                    <option value="0">เลือกตำบล</option>
                                                    <option ng-repeat="data in district | orderBy: 'district_name'"
                                                        value="{{data.district_id}}">{{data.district_name}}</option>
                                                </select>
                                                <span style="color:red; font-size:14px; position: absolute;">*</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">ที่อยู่: </label>
                                        <input name="addressAdd" id="addressAdd" type="text"
                                            style="width: 55%; height:30px;">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">น้ำหนัก: </label>
                                        <input name="weightAdd" id="weightAdd" type="text"
                                            style="width: 55%; height:30px;">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">ส่วนสูง: </label>
                                        <input name="heightAdd" id="heightAdd" type="text"
                                            style="width: 55%; height:30px;">
                                    </div>

                                    <div class="form-group">
                                      <span ng-if="_patientType" class="valid-input">
                                        กรุณาระบุประเภทผู้ป่วย
                                      </span>
                                        <label class="col-lg-4" style="text-align: right;">ประเภทผู้ป่วย: </label>
                                        <select name="typeAdd" id="typeAdd"
                                            ng-controller="ListPatientTypeDataController"
                                            style="height:30px; width: 55%;">
                                            <option value="0" style="text-align: right;">เลือกประเภทผู้ป่วย</option>
                                            <option ng-repeat="data in patientType | orderBy: 'patient_type_name'"
                                                value="{{data.id_patient_type}}">{{data.patient_type_name}}</option>
                                        </select><span style="color:red; font-size:14px; position: absolute;">*</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4" style="text-align: right;">แพ้ยา: </label>
                                        <input name="medAllergyAdd" id="medAllergyAdd" type="text" value="-"
                                            style="width: 55%; height:30px;">
                                    </div>
                                    <div class="form-group">
                                    <span ng-if="_doctor" class="valid-input col-xs-offset-4">
                                        กรุณาระบุแพทย์ประจำตัวผู้ป่วย
                                    </span>
                                    <span style="color:red; font-size:14px; position: absolute;">*</span>
                                        <div ng-controller="SelectDoctorController">
                                            <label class="col-lg-4" style="text-align: right;">แพทย์ประจำตัวผู้ป่วย: </label>
                                            <input name="doctor" id="doctor" type="text"
                                                style="width: 55%; background-color: #c0c0c0 !important" readonly
                                                required>
                                            <input name="iddoctor" id="iddoctor" type="hidden" value="">
                                            <input name="idpatientAdd" id="idpatientAdd" type="hidden" value="" >
                                            <button ng-controller="SearchDoctorController" type="button"
                                                style="position: absolute;" class="main-button text-right"
                                                ng-click="SearchDoctor()">
                                                <i class="fa fa-search"></i>
                                            </button>
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
                        <button type="button" id="addPatient" ng-click="savePatient()" class="save-button" style="float:left"><i
                                class="fa fa-save"></i> บันทึก</button>
                        <button class="del-button" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
