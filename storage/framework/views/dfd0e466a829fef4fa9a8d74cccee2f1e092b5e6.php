<div class="modal fade" ng-controller="listmaster" id="modal-editmaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล</h5>
      </div>
      <div class="modal-body" >
        <div class="row">
          <div class="col-lg-12">
          <input type="hidden"  name="id_table" value = "{{id_table}}">
          <input type="hidden"  name="id_table_edit" value = "{{id_table_edit}}">
            <div class="row" ng-repeat = "data in listdataEdit" >
              <div class="form-group">
                <div class="col-lg-4 text-right">
                    <label>{{data.table_name}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="hidden"  name="id_field[]" value = "{{data.table_id}}">
                    <input type="text"  name="results[]" value = "{{data.table_value}}">
                </div>
                </div>
                <br><br>
            </div>
          </div>
        </div>    
      </div>
      <div class="modal-footer" >
        <button data-url="<?php echo e(route('manageData.DataEdit')); ?>" class="btn save-button" id="Ediconfirm"  style="float:left">ตกลง</button>
        <button class="btn del-button" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>