@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> Main Page >> Lab Result Record </label>
<!-- END STATUS -->

<div class="container-fluid" ng-controller="RecordedResultsDataviewController">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12" class="push-up-5">
                                            <div class="col-lg-3">
                                                <label class="col-lg-3">HN :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="resultHn" style="height:30px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="col-lg-3">Lab No. :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="labResultNo" style="height:30px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="col-lg-3">Name - Surname :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="fname" style="height:30px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="main-button push-up-5" ng-click="searchLabResult()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style=" margin-top: 10px!important; margin-bottom: 15px!important;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="statusbtn" ng-click="SearchStatusAll()"><i style="color: #000"
                                                    class="fa fa-circle"></i> All</button>
                                            <button class="statusbtn" ng-click="SearchStatusColor(0)"><i style="color: #a4c400"
                                                    class="fa fa-circle"></i> Registered</button>
                                            <button class="statusbtn" ng-click="SearchStatusColor(1)"><i style="color: #da532c"
                                                    class="fa fa-circle"></i> Pending</button>
                                            <button class="statusbtn" ng-click="SearchStatusColor(2)"><i style="color: #f1c40f"
                                                    class="fa fa-circle"></i> Process</button>
                                            <button class="statusbtn" ng-click="SearchStatusColor(3)"><i style="color: #27ae60"
                                                    class="fa fa-circle"></i> Reported</button>
                                            <button class="statusbtn" ng-click="SearchStatusColor(4)"><i style="color: #2b5797"
                                                    class="fa fa-circle"></i> Approved</button>
                                        </div>
                                        <div class="col-lg-9" style="padding-top:10px">
                                            <div class="row">
                                            <div class="col-sm-1" style="padding:0 !important; padding-right:2px !important;margin:0 !important" > Filter</div>
                                                <div class="col-sm-2" style="padding:0 !important; margin:0 !important" ng-repeat="lab in LabSubGroup" >
                                                    <input  type="radio" id="labgroupitem" name="labgroupitem"  ng-click="SelectLabSubGroupItem(lab.id_lab_sub_group_item)"/>
                                                    <label  for="labgroupitem" ng-value="lab.lab_sub_group_name" ng-model="lab" style="padding-right: 5px">@{{lab.lab_sub_group_name}}</label>
                                                </div>
                                                <div class="col-sm-1" style="padding:0 !important; margin:0 !important">
                                                    <input  type="radio" id="labgroupitem" name="labgroupitem" ng-click="ShowAll()"/>
                                                    <label  for="labgroupitem" ng-value="All" ng-model="lab" style="padding-right: 5px">All</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card">
                                  <div class="row">
                                      <div class="col-lg-12 text-right push-down-10">
                                        <form action="{{ route('main.exportWithSelectLab') }}" method="POST" enctype="multipart/form-data">
                                          {{csrf_field()}}
                                            <br>
                                            <input type="hidden" id="labCheckedId" name="labchecked" placeholder="" class="form-control">
                                            <button class="add-button" ng-click="ExportResultSelect()">
                                                <i class="fa fa-book"></i> Export
                                            </button>
                                        </form>
                                        <div  style="padding-left:0px; margin-top:20px;">
                                          <button class="main-button" ng-click="PrintAll()">
                                              <i class="fa fa-caret-square-o-right"></i> Print All
                                          </button>
                                        </div>
                                      </div>
                                  </div>
                                    <div class="card-body table-responsive" style="overflow-y: auto;width:100%;max-height: 550px;position:relative">
                                        <table class="table table-hover tablePointer" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>
                                                      <input style="padding-top:5px" type="checkbox" name="check-all" id="check-all" ng-model="isCheckAll"
                                                          ng-click="checkAll($event)">
                                                    </th>
                                                    <th>Lab No.</th>
                                                    <th>HN</th>
                                                    <th>Patient Name</th>
                                                    <th>Order Time</th>
                                                    <th>Print Lab</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr ng-show="!isFiltered" ng-repeat="data in recordResult | filter:Search | filter:SearchPoint | filter:SearchStatus"
                                                    ng-click="Choose(data.id_lab_order_main,data.lab_order_no,data.patient['hn'])"
                                                    id="@{{data.id_lab_order_main}}_lab" ng-class="{highlight: selected==data.id_lab_order_main}">
                                                    <td class="fa fa-circle @{{data.icon_status}}"></td>
                                                    <td>
                                                        <input type="checkbox" name="recieved-@{{data.id_lab_order_main}}" id="chk-@{{data.id_lab_order_main}}"
                                                            ng-model="options[$index]" ng-click="togglePrint(data.id_lab_order_main,$event)">
                                                    </td>
                                                    {{-- <td ng-class="{pFlag: data.isCriticalVal}">@{{data.lab_order_no.substring(0,9)}}</td> --}}
                                                    <td ng-class="{pFlag: data.isCriticalVal}">@{{data.lab_order_no}}</td>
                                                    <td ng-class="{pFlag: data.isCriticalVal}">@{{data.patient['hn']}}</td>
                                                    <td ng-class="{pFlag: data.isCriticalVal}">@{{data.patient['prefix']['prefix_name']}}
                                                        @{{data.patient['patient_firstname']}}
                                                        @{{data.patient['patient_lastname']}}</td>
                                                    <td>@{{data.order_date}}</td>

                                                    <td><a target="_blank" ng-href="@{{url}}" ng-mousedown="PDFLab(data.id_lab_order_main)">
                                                            <button class="print-button"><i class="fa fa-print"></i></button></a></td>
                                                    <input type="hidden" id="@{{data.lab_order_no}}_fullname" value="@{{data.patient['prefix']['prefix_name']}} @{{data.patient['patient_firstname']}} @{{data.patient['patient_lastname']}}" />
                                                    <input type="hidden" id="@{{data.lab_order_no}}_patient_age" value="@{{data.patient['age']}}" />
                                                    <input type="hidden" id="@{{data.lab_order_no}}_patient_sex" value="@{{data.patient['gender']}}" />
                                                </tr>
                                                <tr ng-show="isFiltered" ng-repeat="data in newPosts | filter:Search | filter:SearchPoint | filter:SearchStatus "
                                                    ng-click="Choose(data.id_lab_order_main,data.lab_order_no,data.patient['hn'])"
                                                    id="@{{data.id_lab_order_main}}_lab" ng-class="{highlight: selected==data.id_lab_order_main}">
                                                    <td class="fa fa-circle @{{data.icon_status}}"></td>
                                                    <td>
                                                        <input type="checkbox" name="recieved-@{{data.id_lab_order_main}}" id="chk-@{{data.id_lab_order_main}}"
                                                            ng-model="data.isChecked" ng-click="togglePrint(data.id_lab_order_main,$event)">
                                                    </td>
                                                    <td ng-class="{pFlag: data.isCriticalVal}">@{{data.lab_order_no.substring(0,9)}}</td>
                                                    <td ng-class="{pFlag: data.isCriticalVal}">@{{data.patient['hn']}}</td>
                                                    <td ng-class="{pFlag: data.isCriticalVal}">@{{data.patient['prefix']['prefix_name']}}
                                                        @{{data.patient['patient_firstname']}}
                                                        @{{data.patient['patient_lastname']}}</td>
                                                    <td>@{{data.order_date}}</td>

                                                    <td><a target="_blank" ng-href="@{{url}}" ng-mousedown="PDFLab(data.id_lab_order_main)">
                                                            <button class="print-button"><i class="fa fa-print"></i></button></a></td>
                                                    <input type="hidden" id="@{{data.lab_order_no}}_fullname" value="@{{data.patient['prefix']['prefix_name']}} @{{data.patient['patient_firstname']}} @{{data.patient['patient_lastname']}}" />
                                                    <input type="hidden" id="@{{data.lab_order_no}}_patient_age" value="@{{data.patient['age']}}" />
                                                    <input type="hidden" id="@{{data.lab_order_no}}_patient_sex" value="@{{data.patient['gender']}}" />
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form id="printform" method="get" action="/main/RecordedResults/printTotlaLab" target="_blank">
                                            <div id="formPrintData">

                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-right" style="padding-left:0px; margin-top:20px;">
                                            <button class="btn btn-success" ng-click="AutoResult()">
                                                <i class="fa fa-caret-square-o-right"></i> Auto Result
                                            </button>
                                            <button class="btn btn-danger" ng-click="AllRepeat()">
                                                <i class="fa fa-rotate-left"></i> All Repeat
                                            </button>
                                            <button class="btn btn-primary" ng-click="AllTransfer()">
                                                <i class="fa fa-exchange"></i> All Transfer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end div -->
                            <div class="col-lg-7">
                                <div class="card">
                                    <h4 class="labtesthd">Lab Test</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 ng-if="hasSelect">
                                                <span style="padding-right:10px; background-color: #ececec;">HN<span
                                                        ng-bind="hnNo"></span></span>
                                                <span style="background-color: #ececec;">Lab No.<span ng-bind="labNo"></span><span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-12">
                                        <hr style=" margin-top: 10px!important; margin-bottom: 15px!important;">
                                            <p>Specimen List</p>
                                            <div class="row" ng-controller="authenticationController">
                                                <div class="col-lg-6">
                                                    <label>Recorder : </label>
                                                    <input type="text" style="width:50%;" ng-model="fullname" id="nameEditResult" disabled="true">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Inspector : </label>
                                                    <input type="text" style="width:50%; margin-bottom:15px;" ng-model="fullname" id="nameEditApproveResult" disabled="true">
                                                </div>
                                            </div>
                                            <button class="add-button" ng-class="{ 'disabled-button' : disableButton }" ng-disabled="disableButton" ng-click="SaveResult()" style="margin-top:10px;">Save Result</button>
                                            <button class="main-button" ng-class="{ 'disabled-button' : disableButton }" ng-disabled="disableButton" ng-click="ConfirmResult()" style="margin-top:10px;">Confirm Result</button>
                                            <button class="cri-button" ng-class="{ 'disabled-button' : disableButton }" ng-disabled="disableButton" ng-click="CriticalReport()">Critical Report</button>
                                            <button class="edit-button" ng-show="labButton" ng-click="EditLabResult()">Edit Result</button>
                                            <button class="scan-button" ng-show="labButton" ng-click="eGFRIsClick=!eGFRIsClick">eGFR</button>
                                            <button class="reject-button" ng-show="labCancelApproveButton" ng-click="CancelApproveResult()">Cancel Approved Result</button>
                                        </div>
                                    </div>
									 <div class="row" ng-show="eGFRIsClick">
									  <div class="row">
                                        <div class="col-lg-12 push-up-5">
										<div class="col-lg-4">
                                                <label class="col-lg-7 push-up-5">@{{currentSelectLabNameForGFR}}:</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="labItemVal" disabled ng-value="labValForeGFR" style="height:20px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
										<div class="col-lg-4">
                                                <label class="col-lg-3 push-up-5">Height:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="_heightInput" placeholder="height in cm" ng-model="heightInput" ng-change="caleGFRInputChange()" style="height:20px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="col-lg-3 push-up-5">Age:</label>
                                                <div class="col-lg-7">
                                                    <input type="text" name="ageInput" ng-model="patient_age" ng-change="caleGFRInputChange()" style="height:20px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
										</div>
										</div>
										<div class="row">
										  <div class="col-lg-12 push-up-5">
										    <div class="col-lg-4">
                                                <label class="col-lg-3 push-up-5">eGFR:</label>
                                                <div class="col-lg-6">
                                                    <input disabled type="text" name="eGFRResult" ng-model="eGFRResult" style="height:20px; width: 100%;"
                                                        class="push-up-5">
                                                </div>
                                            </div>
											 <div class="col-lg-4">
                                                <div class="col-lg-9">
                                                     <button class="flip-button" ng-click="saveeGFR()">Save eGFR</button>
                                                </div>
                                            </div>
										  </div>
										</div>
									</div>
                                    <table id="table-sub" class="table table-hover tablePointer" style="width:100%; margin-top:15px;">
                                        <thead>
                                            <tr>
                                                <th>A</th>
                                                <th style="width:20%">Item</th>
												<th>eGFR</th>
                                                <th></th>
                                                <th style="width:10%">Result</th>
                                                <th style="width:10%">Repeat Result</th>
                                                <th style="text-align:center;">#</th>
                                                <th>Unit</th>
                                                <th style="width:20%">Normal Range</th>
                                                <th>Report</th>
                                                <th>Approve</th>
                                                <th>Transfer</th>
                                                <th>Repeat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="data in dataDetail" ng-click="detailLabitem(data.id_lab_item,data.order['id_patient'],data.lab_result,data.lab_item_name,data.id_lab_order_detail,data.check_status)">
                                                <td class="fa fa-circle @{{data.icon_status}}"></td>
                                                <td>@{{data.lab_item_name}}</td>
												<td>@{{data.eGFR}}</td>
                                                <td > @{{data.flag_compare}}
                                                </td>
                                                <td style="width: 15%;"><input type="textbox" style="width:100%" name="labResult[]" id="result@{{data.id_lab_order_detail}}"
                                                        ng-model='data.lab_result' ng-value="data.lab_result" ng-class="{ 'disabled-text' : data.status =='3' || data.status =='4' || data.repeat_flag=='1' }" ng-disabled="(data.status =='3' || data.status =='4') || data.repeat_flag=='1'" ></td>
                                                <td style="width: 15%;"><input type="textbox" style="width:100%;" name="result@{{data.id_lab_order_detail}}"
                                                        ng-model='data.lab_result_repeat' ng-value="data.lab_result_repeat" class="result_repeat_input" ng-class="{ 'disabled-text' : data.status =='3' || data.status =='4' || data.repeat_flag!='1'}" ng-disabled="(data.status =='3' || data.status =='4')|| data.repeat_flag!='1'"></td>
                                                <td ng-if="data.check_status == 'PH' || data.check_status == 'PL'">
                                                    <span id="tdicon" name="repeat-@{{data.id_lab_order_detail}}" ng-click="RedRecord()" style="color:red;">@{{data.check_status}}</span>
                                                </td>
                                                <td ng-if="data.check_status == 'None' || data.check_status == 'H' || data.check_status == 'Normal' || data.check_status == 'L' || data.check_status == 'Repeat' || data.check_status == 'ERR' || data.check_status == 'DH' || data.check_status == 'DL' || data.check_status == 'WN'">
                                                    <span id="tdicon" name="repeat-@{{data.id_lab_order_detail}}">@{{data.check_status}}</span>
                                                </td>
                                                <td>@{{data.lab_item_unit}}</td>
                                                <td>
                                                    <input readonly type="text" list="test@{{$index}}" style="width:100%; background-color:#c0c0c0"
                                                        ng-value="data.normal_range" name="normal_range" ng-model="data.normal_range">
                                                </td>
											  <td ng-class="{'editResultName-text': data.roles_edit!=null }" ng-show="data.roles_edit==null" >
                                                   
                                                    <p style="color:#000;"  >  
                                                        @{{data.roles['prefix']['prefix_name']}}
                                                        @{{data.roles['fname']}}
                                                        @{{data.roles['lastname']}}</p> 
                                                </td>
                                                <td ng-class="{'editResultName-text': data.roles_edit!=null }" ng-show="data.roles_edit!=null" >
                                                
                                                    <p style="color:#000;"> 
                                                        @{{data.roles_edit['prefix']['prefix_name']}}
                                                        @{{data.roles_edit['fname']}} 
                                                        @{{data.roles_edit['lastname']}}</p> 
                                                </td>
                                                <td   ng-class="{'editResultName-text': (data.roles_edit!=null && data.approve['id_user']==data.roles_edit['id_user'])|| data.edit_approve!=null }">
                                                    <p style="color:#000;"> @{{data.approve_fullname}}</p> 
                                                </td>
                                                <!-- <td ng-class="{'editResultName-text': data.roles_edit!=null }" ng-show="data.roles_edit==null" >
                                                    @{{data.roles['prefix']['prefix_name']}}
                                                    @{{data.roles['fname']}}
                                                    @{{data.roles['lastname']}}
                                                </td>
                                                <td ng-class="{'editResultName-text': data.roles_edit!=null }" ng-show="data.roles_edit!=null" >
                                                      @{{data.roles_edit['prefix']['prefix_name']}}
                                                      @{{data.roles_edit['fname']}}
                                                      @{{data.roles_edit['lastname']}}
                                                </td>
                                                <td  ng-class="{'editResultName-text': (data.roles_edit!=null && data.approve['id_user']==data.roles_edit['id_user'])|| data.edit_approve!=null }">
                                                  @{{data.approve_fullname}}
                                                </td> -->
                                                <td>
                                                    <center><button class="main-button" ng-disabled="((data.status =='3' || data.status =='4')&&disabled)" ng-click="Transfer(data.id_lab_order_detail, data.lab_result_repeat, data.id_lab_order_main)">
                                                            <i class="fa fa-exchange"></i>
                                                        </button></center>
                                                    <input type="hidden" style="width:100%" ng-model="data.repeat_flag">
                                                </td>
                                                <td>
                                                    <center><button class="main-button" ng-disabled="disabled" ng-click="Repeat(data.id_lab_order_detail, data.lab_result, data.id_lab_order_main)">
                                                            <i class="fa fa-refresh"></i>
                                                        </button></center>
                                                    <input type="hidden" style="width:100%" ng-model="data.repeat_flag">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div style="margin-top: 20px;" class="card">
                                            <div class="card-body">
                                                <p style="color: #1CAF9A;" class="text-center">Lab Result History</p>
                                                <p style="" class="text-center">Graph of comparative result</p>
                                                <div id="curve_chart" style="width: 100%; height: auto; "></div>
                                                <div id="curve" style="width: 100%; height: auto; "></div>
                                                <table class="table" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Date Approve</th>
                                                            <th>Result

                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="data in historyRecorded">
                                                            <td>@{{data.created_at}}</td>
                                                            <td>@{{data.lab_approve | number :
                                                                data.decimal['_decimal']}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-lg-5 text-left">
                                                        <label>Appointment : </label>
                                                        <input type="hidden" id="note" />
                                                        <input type="hidden" id="department_app" />
                                                        <input type="hidden" id="special_app" />
                                                        <input type="hidden" id="hospital_app" />
                                                        <input ng-model="lab_order_no" name="lab_order_no" id="lab_order_no"
                                                            type="text" style="width:50%; margin-left:8px;">
                                                    </div>
                                                    <div class="col-lg-7 text-left inputgroup">
                                                        <label style="margin-right: 5px;">Appointment Date : </label>
                                                        <input ng-model="date_order" name="date_order" id="date_order"
                                                            type="text" style="width:42%;">
                                                        <label style="margin-right: 5px;"></label>
                                                        <input type="text" ng-model="time_order" name="time_order" id="time_order"
                                                            style="width:33%;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-left">
                                                        <label>Appointment Doctor : </label>
                                                        <input ng-model="namedoctor" name="namedoctor" id="namedoctor"
                                                            type="text" style="width:52%; margin-top:10px;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-left" style="margin-left:33px;">
                                                        <label>for : </label>
                                                        <input ng-model="appointmentfor" name="appointmentfor" id="appointmentfor"
                                                            type="text" style="width:52%; margin-top:10px;">
                                                        <button class="print-button" id="print_appointment"><i class="fa fa-print"></i>
                                                            Print Appointment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end lab history -->
                            </div>
                            <!-- end-->
                        </div>
                    </div>
                </div>
            </div>
            @include('main.recorded-results.Modals.modals-recorded-resultsReport')
            @include('main.recorded-results.Modals.modals-recorded-redRecord')
            @include('main.recorded-results.Modals.modals-recorded-cancel')
            @include('main.recorded-results.Modals.modals-recorded-transfer')
        </div>
        @include('main.recorded-results.Modals.modals-recorded-editLabResult')
        @include('modals-center.modals-askRepeat')
        {{-- @include('modals-center.modals-askSave') --}}
        @include('modals-center.modals-askSaveWithPincode')
        {{-- @include('modals-center.modals-askConfirm') --}}
        @include('modals-center.modals-askConfirmWithPincode')
        @include('main.recorded-results.Modals.modals-recorded-confirmCancelApprove')
        <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/google/gstatic-chart/loader.js")}}'></script>
        <script src="{{asset('js/main/recorded-results/form.js')}}"></script>
        @endsection
