<div class="modal fade" ng-controller="listgroupitem" id="modal-Addprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width:70%">
        <div class="modal-content" style="overflow: scroll;max-height: -webkit-fill-available;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Profile</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-2 text-right">
                            <div class="form-group">
                                <p style="margin-top:15px; margin-bottom:20px">Profile : </p>
                            </div>
                            <div class="form-group">
                                <p style="margin-top:15px; margin-bottom:20px">Department : </p>
                            </div>
                            <div class="form-group">
                                <p style="margin-top:15px; margin-bottom:20px">QC Name : </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" name="profile" style="width:80%;">
                            </div>
                            <div class="form-group" ng-controller="listdepartment">
                                <select style="width:80%" id="department">
                                    <option ng-repeat="data in listDepartment" value="@{{data.id_department}}">@{{data.department_name}}</option>
                                </select>
                            </div>
                            <div class="form-group" ng-controller="listname">
                                <select style="width:80%" id="qcname">
                                    <option ng-repeat="data in listall" value="@{{data.id_qc_name}}">@{{data.qc_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 text-right">
                            <div class="form-group">
                                <p style="margin-top:15px; margin-bottom:20px">QC Level : </p>
                            </div>
                            <div class="form-group">
                                <p style="margin-top:15px; margin-bottom:20px">Lot. Number : </p>
                            </div>
                            <div class="form-group">
                                <p style="margin-top:15px; margin-bottom:20px">Input By : </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group" ng-controller="listlevel">
                                <select style="width:80%" id="qclevel">
                                    <option ng-repeat="data in listlevel" value="@{{data.id_qc_level}}">@{{data.qc_level}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" style="width:80%;" name="number">
                            </div>
                            <div class="form-group">
                                @php date_default_timezone_set("Asia/Bangkok"); $date = date('d-m-Y');
                                $time=date('H:i'); @endphp
                                <input disabled type="text" style="width:40%;" value="{{$date}}">
                                <input disabled type="text" style="width:19%;" value="{{$time}}">
                                <input type="hidden" name="userid" value="{{$user['id_user']}}">
                                <input type="hidden" name="hospitalid" value="{{$user['id_hospital']}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <div class="col-lg-12">
                        <label>Profile Item</label>
                        <table id="tableAdditem" class="table table-hover tablePointer" style="width:100% center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Mean</th>
                                    <th>SD</th>
                                    <!--<th>Mean Normal</th>
                                    <th>SD Normal</th> -->
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="dataitems in listitemselect">
                                    <td>@{{$index+1}}</td>
                                    <td>@{{dataitems.lab_item_code}}</td>
                                    <td>@{{dataitems.lab_item_name}}</td>
                                    <td><input type="text" size="10" class="text-right" ng-model='dataitems.mean'></td>
                                    <td><input type="text" size="10" class="text-right" ng-model='dataitems.sd'></td>
                                    <!--<td>@{{dataitems.mean_normal}}</td>
                                    <td>@{{dataitems.sd_normal}}</td> -->
                                    <td>
                                        <button class="del-button" ng-click="ClickDelItem(dataitems.id_lab_item)">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select id="selectitem" class="form-control">
                                                <option ng-repeat="data in listgroup" value="@{{data.id_lab_sub_group_item}}">@{{data.lab_sub_group_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <label style="margin-bottom:15px;">Test Item</label>
                                        <input type="text" ng-model="serchitem" style="width:80%;margin-bottom:15px;">
                                        <button class="main-button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Unit</th>
                                            <th>Group</th>
                                            <th>Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="data in allitem | filter : serchitem">
                                            <td>@{{data.lab_item_code}}</td>
                                            <td>@{{data.lab_item_name}}</td>
                                            <td>@{{data.lab_item_unit}}</td>
                                            <td>@{{data.id_lab_item_sub_group}}</td>
                                            <td>
                                                <button ng-click="ClickAddItem(data.lab_item_code)" class="add-button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button ng-click="clickSave()" class="btn save-button" id="saveProfile" style="float:left" data-url="{{route('QC.AddprofileitemDetail')}}">
                    <i class="fa fa-save"></i> Save</button>
                <button class="btn del-button" data-dismiss="modal">
                    <img src='{{asset("img/Lis_icon/cancle_icon.png")}}' /> Cancel</button>
            </div>
        </div>
