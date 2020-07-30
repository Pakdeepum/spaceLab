@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> System Management >> User Management </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12">
            <div ng-controller="UserController">
                <div class="row" ng-controller="listuser">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>User Management</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-8">
                                            <button class="add-button" ng-click="Add()">
                                                <i class="fa fa-plus"></i> Add Data
                                            </button>
                                        </div>
                                        <div class="col-lg-4">
                                            Search : <input ng-model="S" type="text" style="margin-bottom:15px; width:80%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>User Name</th>
                                                    <th>Name - Lastname</th>
                                                    <th style="display: none;">ID USER</th>
                                                    <th>Level User</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="data in posts | filter: S ">
                                                    <td>@{{$index+1}}</td>
                                                    <td>@{{data.username}}</td>
                                                    <td>@{{data.fname}}&nbsp;@{{data.lastname}}</td>
                                                    <td>@{{data.group_user_name}}</td>
                                                    <td>
                                                        <button data-val="@{{data.id_user}}" id="btnedit" class="edit-button"
                                                            ng-click="EditUser(data.id_user)">
                                                            <input name="edithidden" type="hidden" value="@{{data.id_user}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button data-val="@{{data.id_user}}" id="btndel" class="del-button"
                                                            ng-click="DelUser(data.id_user)">
                                                            <input name="delhidden" type="hidden" value="@{{data.id_user}}">
                                                            <i class="fa fa-trash-o"></i>
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
                </div>
            </div>
            @include('modals-center.modals-askDelete')
        </main>
    </div>

</div>
@include('management.management-user.Modals.management-user-addUser')
@include('management.management-user.Modals.management-user-editUser')
@include('modals-center.modals-hospital')

<script src="{{asset('js/management/management-user/form.js')}}"></script>

@endsection
