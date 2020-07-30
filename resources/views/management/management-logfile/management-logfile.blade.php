@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> System Management >> Log File </label>
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
                                    <div class="col-lg-4">
                                        <label>Type : </label>
                                        <select style="width:80%; margin-top:15px;">
                                            <option>all</option>
                                            <option>1111</option>
                                            <option>2222</option>
                                            <option>3333</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputgroup">
                                        <label style="margin-right: 10px;">Date : </label>
                                        <input type="text" style="width:25%; margin-top:15px;">
                                        <button class="input-main-button" style="margin-right: 10px;">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                        <label style="margin-right: 10px;">Date To : </label>
                                        <input type="text" style="width:25%; margin-top:15px;">
                                        <button class="input-main-button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </div>
                                    <div class="col-lg-4">
                                        <div align="right">
                                            <input type="text" style="margin-top:15px;">
                                            <input type="button" class="main-button" value="ค้นหา" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div align="right" style="margin-bottom:10px;">
                                <label>show</label>
                                <input type="text" size="3px">
                                <label>entries</label>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-3">
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Code</th>
                                                    <th>User List</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>1</td>
                                                <td>0001</td>
                                                <td>USER LEVEL</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>0002</td>
                                                <td>page</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-lg-9">
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Type</th>
                                                    <th>List</th>
                                                    <th>Default Value</th>
                                                    <th>Change Value</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>1</td>
                                                <td>17-08-2018</td>
                                                <td>00:01:05</td>
                                                <td>Appeove</td>
                                                <td>Appeove Number : 1234567</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>17-08-2018</td>
                                                <td>00:01:05</td>
                                                <td>Result</td>
                                                <td>Change Value LabNO : 1234567</td>
                                                <td>12</td>
                                                <td>12</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
