@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> QC >> QC Input </label>
<!-- END STATUS -->

<div class="container-fluid" ng-controller="QCinputDataViewController">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-bottom: 10px;" class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <label>WORKLIST Profile : </label>
                                    <select style="width:60%; margin-top:15px;" id="selectProfile">
                                        <option value="">Select Profile</option>
                                        <option ng-repeat="data in listprofile" value="@{{data.id_profile_qc}}">@{{data.profile_name}}</option>
                                    </select>
                                    <button ng-click="AddProfile()" id="btn-add" class="add-button ng-scope" style="margin-bottom:15px; margin-top:15px;">
                                        <i class="fa fa-plus"></i> Add Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>WORKLIST</h3>
                                </div>
                                <table class="table table-hover table-hover tablePointer" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Profile</th>
                                            <th>QC Name</th>
                                            <th>QC Level</th>
                                            <th>Lot.Number</th>
                                            <th>Input By</th>
                                            <th>Delete</th>
                                            <th>Print QC</th>
                                        </tr>
                                    </thead>
                                    <tr ng-repeat="data in DataProfile" ng-class="{'selectedRow':$index == selectedRow}"
                                        ng-click="clickRowMain(data.id_qc_profile_order,$index)">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{data.qc_test_date}}</td>
                                        <td>@{{data.qc_test_time}}</td>
                                        <td>@{{data.profile_name}}</td>
                                        <td>@{{data.qc_name}}</td>
                                        <td>@{{data.qc_level}}</td>
                                        <td>@{{data.lot_number}}</td>
                                        <td>@{{data.user.fname}}</td>
                                        <td>
                                            <button class="del-button" ng-click="DeleteProfile(data.id_qc_profile_order)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                        <td><a target="_blank" ng-href="@{{url}}" ng-mousedown="PDFLabQC(data.id_qc_profile_order)">
                                                <button class="print-button"><i class="fa fa-print"></i></button></a>
                                       </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6 text-left">
                                            <div class="header-card">
                                                <h3>ITEM LIST</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button ng-click="AddAllResult()" disabled id="btn-save" class="add-button ng-scope" style="margin-bottom:15px; margin-top:15px;">
                                                <i class="fa fa-save"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Test</th>
                                            <th>Result</th>
                                            <th>Unit</th>
                                            <th>Mean</th>
                                            <th>SD</th>
                                            <th>Comment</th>
                                            <th>Reject</th>
                                        </tr>
                                    </thead>
                                    <tr ng-repeat="dataItem in AllItemProfile">
                                        <td>@{{dataItem.lab_item_name}}</td>
                                        <td ng-model="result"><input type="text" name="result[]" value="@{{dataItem.result | number: dataItem.result_decimal}} "></td>
                                        <td>@{{dataItem.lab_item_unit}}</td>
                                        <td>@{{dataItem.mean}}</td>
                                        <td>@{{dataItem.sd}}</td>
                                        <td><input type="text" name="textComment[]" value="@{{dataItem.comment}}"></td>
                                        <td>
                                            <button class="reject-button"  id="btnreject" ng-click="RejectData(dataItem.id_lab_item)">
                                                <i class="fa fa-arrow-circle-left"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@include('modals-center.modals-askDelete')
@include('QC.QC-input.Modals.modals-inputAdd')
<script src="{{asset('js/QC/QC-input/form.js')}}"></script>
@endsection
