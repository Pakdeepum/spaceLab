@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> QC >> QC Config </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-5">
                        <div class="card">   
                            <div class="card-body">
                            <div ng-controller="QCconfigDataViewController">
                                <button class="add-button" style="margin-bottom:15px; margin-top:15px;" ng-click="Add()">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Code</th>
                                            <th>List</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>0001</td> 
                                        <td>Analyzer</td>
                                        <td>
                                            <button class="del-button">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>0002</td> 
                                        <td>QC Level</td>
                                        <td>
                                            <button class="del-button">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">   
                            <div class="card-body">
                            <div ng-controller="QCconfigDataViewController">
                                <button class="add-button" style="margin-bottom:15px; margin-top:15px;" ng-click="InfoAdd()">
                                    <i class="fa fa-plus"></i> Add Data
                                </button>
                            </div>  
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>List</th>
                                            <th>Note</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>002</td> 
                                        <td>DxC1</td>
                                        <td></td>
                                        <td>
                                            <button class="del-button">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>003</td> 
                                        <td>DxC2</td>
                                        <td></td>
                                        <td>
                                            <button class="del-button">
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
</div>


@include('QC.QC-config.Modals.modals-configAdd')
@include('QC.QC-config.Modals.modals-config-infoAdd')

<script src="{{asset('js/QC/QC-config/form.js')}}"></script>
<script src="{{asset('js/angtest/app.js')}}"></script>
@endsection


