
<div class="modal fade" id="modal-management-itemlab-editlab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:70%; height:auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit TEST ITEM</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('manageLabItem.EditDataItem')); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

          <div class="row">
          <div class="col-lg-12 text-center">
              <div class="col-lg-2 text-right">
              <label style="margin-top:17px;">Item Type: </label><br>
                <label style="margin-top:17px;">Item Code: </label><br>
                <label style="margin-top:17px;">Item Name: </label><br>
                <label style="margin-top:17px;">Thai Name: </label><br>
                <label style="margin-top:17px;">English Name: </label><br>
                <label style="margin-top:17px;">Hint: </label><br>
                <label style="margin-top:17px;">Default Value: </label><br>
                <label style="margin-top:17px;">Normal Value: </label><br>
                <label style="margin-top:17px;">Male Normal Value: </label><br>
                <label style="margin-top:17px;">Female Normal Value: </label><br>
                <label style="margin-top:17px;">Child Normal Value: </label><br>
                <label style="margin-top:17px;">Ped Normal Value: </label><br>
              </div>
              <div class="col-lg-4 text-left">
                <select name="ItemTypeAdd" id="ItemTypeAdd" ng-controller="EditItemTypeListController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select Lab Type</option>
                  <option name="ItemTypeShow" id="ItemTypeShow" value=""></option>
                  <option ng-repeat="data in ItemTypeData | orderBy: 'item_type_name'" value="{{data.id_Item_type}}">{{data.item_type_name}}</option>
                </select>
                <input name="ItemCodeAdd" id="ItemCodeAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="ItemNameAdd" id="ItemNameAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="ThaiNameAdd" id="ThaiNameAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="EnglishNameAdd" id="EnglishNameAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="HintAdd" id="HintAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="DefaultAdd" id="DefaultAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="NormalAdd" id="NormalAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="MaleNormalAdd" id="MaleNormalAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="FemaleNormalAdd" id="FemaleNormalAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="ChildNormalAdd" id="ChildNormalAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="PedNormalAdd" id="PedNormalAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="idLab" id="idLab" type="hidden" value = "">
                </div>
              <div class="col-lg-2 text-right">
                  <label style="margin-top:17px;">Group Barcode: </label><br>
                  <label style="margin-top:17px;">Group Result: </label><br>
                  <label style="margin-top:17px;">Lab Barcode: </label><br>
                  <label style="margin-top:17px;">Lab Specimen: </label><br>
                  <label style="margin-top:17px;">Unit: </label><br>
                  <label style="margin-top:17px;">Critical: </label><br>
                  <label style="margin-top:17px;">Out Lab: </label><br>
                  <label style="margin-top:17px;">Decimal: </label><br>
              </div>
              <div class="col-lg-4 text-left">
                <select name="GroupBarcodeAdd" id="GroupBarcodeAdd" ng-controller="EditGroupBarcodeListController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select Group Barcode</option>
                  <option ng-repeat="data in GroupBarcodeData | orderBy: 'group_barcode_name'" value="{{data.id_group_barcode}}">{{data.group_barcode_name}}</option>
                </select>
                <select name="GroupResultAdd" id="GroupResultAdd" ng-controller="EditGroupResultListController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select Group Result</option>

                  <option ng-repeat="data in GroupResultData | orderBy: 'group_result_name'" value="{{data.id_group_result}}">{{data.group_result_name}}</option>
                </select>
                <select name="LabBarcodeAdd" id="LabBarcodeAdd" ng-controller="EditLabBarcodeListController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select Lab Barcode</option>

                  <option ng-repeat="data in LabBarcodeData | orderBy: 'lab_barcode_name'" value="{{data.id_lab_barcode}}">{{data.lab_barcode_name}}</option>
                </select>
                <select name="LabSpecimenAdd" id="LabSpecimenAdd" ng-controller="EditListSpecimenListController" style="margin-top:10px; width: 100%;">
                  <option value="0">Select Lab Specimen</option>

                  <option ng-repeat="data in ListSpecimenData | orderBy: 'lab_specimen_item_name'" value="{{data.id_lab_specimen_item}}">{{data.lab_specimen_item_name}}</option>
                </select>
                <input name="UnitAdd" id="UnitAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <input name="CriticalAdd" id="CriticalAdd" type="text" style="width: 100%; margin-top: 10px;" required>
                <select name="OutLabAdd" id="OutLabAdd" style="margin-top:10px; width: 100%;">
                  <option value="0">Select Lab Specimen</option>
                  <option value="1">Yes</option>
                  <option value="2">No</option>
                </select>
                <input name="Decimale" id="Decimale" type="number" style="width: 100%; margin-top: 10px;" required>
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
