<div class="modal fade bd-example-modal-lg"  id="modal-addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="overflow: scroll; max-height: -webkit-fill-available;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มรายการเมนู</h5>
    </div>
      <div class="modal-body" >
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>เลือก</th>
                  <th>รายชื่อเมนู</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="data in listAllMenu">
                  <td><input type="checkbox" name="menu[]" value="{{data.menu_tag}}"></td>
                  <td>{{data.menu_name}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer" >
        <button data-url="<?php echo e(route('managemenu.Addmenu')); ?>" ng-click="" class="btn save-button" id="Addconfirm"  style="float:left">ตกลง</button>
        <button class="btn del-button" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>
