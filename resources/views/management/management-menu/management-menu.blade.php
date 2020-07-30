@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> System Management >> Menu Management </label>
<!-- END STATUS -->

<div class="container-fluid" ng-controller="listmaster">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        <div class="card">   
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>User Group Data</h3>
                                </div>
                                <p align="center" class="profile-main">Management options</p>
                                <hr>
                                <select id="selectMenu" class="form-control">
                                    <option value="0">Select List</option>
                                    <option ng-repeat="data in listgroup" value="@{{data.id_group_user}}">@{{data.group_user_name}}</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="card">   
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>Menu Data</h3>
                                </div>
                                <button ng-click="AddMenu()" style="margin-bottom: 20px;" class="add-button">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>List</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tr ng-repeat="allmenu in listMenu">
                                        <td>@{{$index + 1}}</td>
                                        <td>@{{allmenu.menu_name}}</td>
                                        <td>
                                            <button ng-click="deleteMenu(allmenu.menu_tag)" class="del-button">
                                                <i class="fa fa-trash-o"></i>
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
    @include('management.management-menu.modals.modals-addMenu')

</div>
@include('modals-center.modals-askDelete')
<script src="{{asset('js/management/management-menu/form.js')}}"></script>
@endsection