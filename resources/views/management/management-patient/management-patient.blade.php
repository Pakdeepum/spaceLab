@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> System Management >> Patients Management</label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12" ng-controller="PatientController">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="header-card">
                                            <h3>Patients Management</h3>
                                        </div>
                                        <div class="col-lg-8">
                                            <button class="add-button" ng-click="Add()">
                                                <i class="fa fa-plus"></i> Add Data
                                            </button>
                                        </div>
                                        <div class="col-lg-4">
                                            Search: <input name="search" placeholder="HN, Name-Latname, ID Card Number"
                                                type="text" style="margin-bottom:15px; width:80%">
                                            <button type="submit" class="main-button" ng-click="Search()">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">ID PATIENT</th>
                                                    <th>No.</th>
                                                    <th>HN</th>
                                                    <th>Name-Latname</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Blood Type</th>
                                                    <th>Address</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr dir-paginate="data in posts | itemsPerPage:8" pagination-id="value-paginate">
                                                    <td style="display: none;">@{{data.id_patient}}</td>
                                                    <td>@{{$index+1}}</td>
                                                    <td>@{{data.hn}}</td>
                                                    <td>@{{data.prefix_name}} @{{data.patient_firstname}}
                                                        @{{data.patient_lastname}}</td>
                                                    <td>@{{data.age}}-Year-Old</td>
                                                    <td>@{{data.gender}}</td>
                                                    <td>@{{data.blood_group}}</td>
                                                    <td>@{{data.patient_address}} @{{data.district_name}}
                                                        @{{data.amphur_name}} @{{data.province_name}}</td>
                                                    <td>
                                                        <button data-val="@{{data.id_patient}}" id="btnedit" class="edit-button"
                                                            ng-click="EditPatient(data.id_patient)">
                                                            <input name="edithidden" type="hidden" value="@{{data.id_patient}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button data-val="@{{data.id_patient}}" id="btndel" class="del-button"
                                                            ng-click="DelPatient(data.id_patient)">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <dir-pagination-controls pagination-id="value-paginate" class="pull-right"
                                            max-size="10" direction-links="true" boundary-links="true">
                                        </dir-pagination-controls>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('modals-center.modals-askDelete')
            @include('management.management-patient.Modals.management-patient-addPatient')
            @include('management.management-patient.Modals.management-patient-editPatient')
            @include('modals-center.modals-doctor')
        </main>
    </div>
</div>
<script src="{{asset('js/management/management-patient/form.js')}}"></script>

@endsection
