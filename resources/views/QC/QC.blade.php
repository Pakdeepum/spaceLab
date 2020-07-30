<@extends('layouts.app-element')
@section('content')


    <div class="list-group" ng-controller="postController" > 
        <p> @{{var3}} </p>  
        <div ng-show="var3">
          <button class="btn btn-default">Order</button>
        </div>
                      <!-- ชื่อของ Controller as ชื่อเรียกในส่วนนี้(Alias)-->
                      <table>
                      <tr>
                        <th>No 1</th>
                        <th>No 2</th>
                        <th>No 3</th>
                        </tr>
                        <tr ng-repeat="post in posts">
                            <td>@{{post.lab_specimen_item_name}}</td>
                            <td>@{{post.lab_specimen_item_code}}</td>
                            <td>@{{post.lab_specimen_item_note}}</td>
                        </tr>

                      </table>
    </div>



<script src="{{asset('js/angular-1.7.2/angular.min.js')}}"></script>
<script src="{{asset('js/angtest/app.js')}}"></script>
@endsection
