<!-- MODAL TAT -->                                                        
<div class="modal fade" id="modal-recieveLab-tat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div style="width: 50%; height:50%;" class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ข้อมูลตั้งค่า TAT</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-left" class="col-lg-12">
                            <input style="margin-top: 10px;" type="text"/>
                            <button class="main-button">
                                <i class="fa fa-search"></i>
                            </button>
                            <!--TABLE-->
                            <table class="table" style="width:100%"><br>
                                <thead>
                                    <tr>
                                        <th>Process</th>
                                        <th>Process Group</th>
                                        <th>Burst time(minute)</th>
                                        <th>Turnaround time(minute)</th>
                                        <th>Priority</th>
                                        <th>Save</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="number"/></td>
                                        <td>-</td>
                                        <td>
                                            <button type="button" class="save-button">
                                                <i class="fa fa-save"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="number"/></td>
                                        <td>-</td>
                                        <td>
                                            <button type="button" class="save-button">
                                                <i class="fa fa-save"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="number"/></td>
                                        <td>-</td>
                                        <td>
                                            <button type="button" class="save-button">
                                                <i class="fa fa-save"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--END TABLE-->
                        </div>
                    </div>
                </div>                                                                                
            </div>
            <div class="modal-footer">
                <button style="float: left;" type="button" class="main-button">
                    Set Defult TAT
                </button>
                <button class="save-button">
                    <i class="fa fa-save"></i> บันทึกทั้งหมด
                </button>
                <button class="del-button" data-dismiss="modal">
                    <img src='<?php echo e(asset("img/Lis_icon/cancle_icon.png")); ?>'/> ยกเลิก
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL TAT -->