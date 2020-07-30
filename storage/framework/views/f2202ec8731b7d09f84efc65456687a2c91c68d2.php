<div class="modal fade" id="modal-inputAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Profile</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 text-right">
              <p style="margin-top:15px; margin-bottom:20px">Profile : </p>
              <p style="margin-top:15px; margin-bottom:20px">Department : </p>          
              <p style="margin-top:15px; margin-bottom:20px">QC Name : </p>           
              <p style="margin-top:15px; margin-bottom:20px">QC Level : </p>         
              <p style="margin-top:15px; margin-bottom:20px">Lot. Number : </p>          
              <p style="margin-top:15px; margin-bottom:20px">Input By : </p>          
            </div>
            <div class="col-lg-8">
              <input type="text" style="width:80%; margin-top:10px;">
              <input type="text" style="width:80%; margin-top:15px;">
              <input type="text" style="width:80%; margin-top:15px;">
              <input type="text" style="width:80%; margin-top:15px;">
              <input type="text" style="width:80%; margin-top:15px;">
              <input type="text" style="width:40%; margin-top:15px;">
              <input type="text" style="width:19%; margin-top:15px;">
              <input type="text" style="width:19%; margin-top:15px;">
            </div>
          </div>
        </div>      
      </div>
      <div class="modal-footer">
        <button class="btn save-button" style="float:left">
          <i class="fa fa-save"></i> บันทึก</button>
        <button class="btn del-button" data-dismiss="modal">
          <img src='<?php echo e(asset("img/Lis_icon/cancle_icon.png")); ?>'/> ยกเลิก</button>
      </div>
    </div>
  </div>
</div>