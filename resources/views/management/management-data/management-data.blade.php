@extends('layouts.app-element')
@section('content')
<!-- START STATUS -->
<label class="status"> System Management >> Data Management </label>
<!-- END STATUS -->
<div class="container-fluid" ng-controller="listmaster">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>General Information Management</h3>
                                </div>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>List</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="data in posts" ng-click="IDlistData(data.id_table)" 
                                            ng-class = "{highlight : select_id == data.id_table}">
                                            <td>@{{$index+1}}</td>
                                            <td>@{{data.table_name_show}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="id_table_button" value="@{{id_table_button}}">
                                <div class="header-card">
                                    <h3>Sub Data Management</h3>
                                </div>
                                <button id="btnadd_Master" ng-click="showmodalAdd()" class="add-button" disabled
                                    style="margin-bottom:15px;">
                                    <i class="fa fa-plus"></i> Add Data
                                </button>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th ng-repeat="subdata in listsubtable">@{{subdata.table_field_name_show}}
                                            </th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr dir-paginate="row in listsubtableDataArray |itemsPerPage:10"
                                            pagination-id="value-paginate">
                                            <td ng-repeat="cell in row">@{{cell}}</td>
                                            <td>
                                                <button ng-click="showmodalEdit(row.id_temp)" class="edit-button"
                                                    id="@{{row.id_temp}}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button ng-click="softDeleteId(row.id_temp)" class="del-button"
                                                    id="@{{row.id_temp}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <dir-pagination-controls pagination-id="value-paginate" class="pull-right" max-size="10"
                                    direction-links="true" boundary-links="true">
                                </dir-pagination-controls>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('modals-center.modals-askDelete')
    @include('management.management-data.modals.modals-EditMaster')
    @include('management.management-data.modals.modals-AddMaster')
</div>
<script src="{{asset('js/management/management-data/form.js')}}"></script>
@endsection
