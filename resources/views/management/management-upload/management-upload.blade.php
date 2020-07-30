@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> System Management >> Upload File </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">   
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-8">
                                        <div ng-controller="ButtonCenterController">
                                            <button class="add-button" ng-click="Upload()">
                                                <i class="fa fa-upload"></i> Upload
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" style="margin-bottom:15px; width:80%">
                                        <button class="main-button">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">    
                                    <table class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>File Name</th>
                                                <th>User Upload</th>
                                                <th>Time</th>
                                                <th>Download</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>1</td>
                                            <td>ADMIN</td> 
                                            <td>ADMIN</td>
                                            <td>13:52:05</td>
                                            <td>
                                                <button class="save-button">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button class="del-button">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>SUNISA</td> 
                                            <td>Mr Shiro Iwasaki</td>
                                            <td>13:52:05</td>
                                            <td>
                                                <button class="save-button">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </td>
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
            </div>
        </main>
    </div>
</div>

@include('modals-center.modals-uploadFile')
<script src="{{asset('js/center/form.js')}}"></script>

@endsection