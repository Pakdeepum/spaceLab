<!-- MODAL APPOINTMENT -->                                                      
<div class="modal fade" id="modals-recieveLab-specimentreject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div style="width: 50%; height:70%;" class="modal-dialog" role="document">
        <div class="modal-content" >
           
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ปฏิเสธสิ่งส่งตรวจ</h5>
            </div>
            <div class="modal-body" >
                <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="col-lg-2 text-right"style="margin-top: 6px;">
                            เหตุผล : 
                        </div>
                        <div class="col-lg-8">
                        <select id="reasonselectbox"    class="w3-select" name="prefix" style="margin-bottom:8px;height: 30px;width: 105%;">
                            <option value="0">เลือกเหตุผล</option>
                            <option ng-repeat="data in Rej" value="{{data.id_specimen_item_reject_note}}">{{data.specimen_item_reject_note}}</option>
                        </select>
                        </div>
                        <div class="col-lg-2 text-left">
                        <button id="btn-add"  ng-click="AddReason()" class="add-button" style="margin-bottom:15px;"disabled>
                            <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div style="margin-bottom: 10px;" class="col-lg-12">
                        <div class="card-body" >
                                <table class="table table-hover tablePointer" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th> 
                                            <th>Reason</th>
                                            <th class="text-right">Delete</th>
                                        </tr>
                                    </thead>
                                    <tr id="idtr" value="0" ng-repeat="data in listitemreason" class="row-profile">
                                        <td>{{$index+1}}</td> 
                                        <td >{{data.specimen_item_reject_note}}</td>
                                        <input name="idspecimentitem[]"  value="{{data.id_specimen_item_reject_note}}" type="hidden"/>
                                        <td>
                                            <button class="del-button" style="float: right;" ng-click="DelReason(data.id_specimen_item_reject_note)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addappointment" data-url="<?php echo e(route('recieveLab.SaveRejectSpeciment')); ?>" ng-click="saveSpeciment()"  style="float: left;" class="save-button"disabled>
                    <i class="fa fa-save"></i> บันทึก
                </button>
                <!-- <button style="float: left; margin-left: 10px;" class="print-button">
                    <i class="fa fa-print"></i> พิมพ์บัตรนัด
                </button> -->
                <button class="del-button" data-dismiss="modal">
                     ยกเลิก
                </button>
            </div>
    </div>
</div>
</div>

<!-- END MODAL APPOINTMENT -->