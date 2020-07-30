@extends('layouts.app-element')
@section('content')

<!-- START STATUS -->
<label class="status"> WELCOME BIOSYSTEMS LIS LAB  </label>
<!-- END STATUS -->

<script> var listdata = []; </script>

<div class="container-fluid" ng-controller="listdata">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body pt-0 mt-5">
                    <div class="col-lg-4">
                        <img src="{{URL::asset('/img/welcome/welcome_img_01.png')}}" width="100%" height="100%">
                    </div>
                    <div class="col-lg-5">
                        <div style="margin-top:140px;">
                            <p style="font-size: 45px; color: #4d79ff!important;">SpaceLab Lis Lab</p>
                            <p style="font-size: 24px; color:#333333;">SpaceLab Limited Partnership</p>
                            <p style="font-size: 20px; color:#555555;">Email : info@pymain.co.th</p>
                       <p style="font-size: 20px; color:#555555;">Address : 257/42 Suthep Rd. Maung Chiangmai 50200</p>
                            <p style="font-size: 20px; color:#555555;">Tel : 065-828-9474</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="background-color: white;">
                            <div class="card-header text-center"  style="margin-top:30px;">
                                <h5 style="padding-top: 20px;">General Information</h5>
                                </div><hr>
                            <div class="card-body" style="background-color: white; min-height: 500px;">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <img src="{{URL::asset('/img/welcome/welcome_img_02.png')}}" width="50%" height="50%">
                                    </div>
                                </div><hr>
                            <div class="text-left" style="margin-left: 35px; margin-top:35px;">
                                <p class="card-text">User Name : {{$user->fname ?? 'No Info'}}</p>
                                <p id="pname" class="card-text">User Group : {{$groupuser[0]["group_user_name"] ?? 'No Info'}}</p>
                                <p class="card-text">Register Date : {{$user->regis_date ?? 'No Info'}}</p>
                                <p class="card-text"></p>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/dashboard/form.js')}}"></script>
@endsection
