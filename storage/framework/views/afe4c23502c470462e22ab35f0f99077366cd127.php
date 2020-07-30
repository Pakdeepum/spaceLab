<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> QC >> QC Viewer </label>
<!-- END STATUS -->

<div class="container-fluid" ng-controller="QCViewerDataViewController"  style="font-size: 14px;">
    <div class="row">
        <main class="main-content col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>QC Type : </label>
                                    <div style="width:100%">
                                        <input type="radio" name="QCtype" ng-model="searchType.analyzerType" ng-value="" checked> All
                                        <input type="radio" name="QCtype" style="margin-left:20px;" ng-model="searchType.analyzerType" ng-value="2"> Automation
                                        <input type="radio" name="QCtype" style="margin-left:20px;" ng-model="searchType.analyzerType" ng-value="1"> Key In
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Checklist : </label>
                                    <select id="selectProfile" ng-model="profile" ng-change="searchProfile()" style="width:100%">
                                        <option ng-repeat="data in listprofile" value="{{data.id_profile_qc}}">{{data.profile_name}}</option>
                                    </select>
                                 </div>
                                <div class="col-lg-3">
                                    <label>QC Level : </label>
                                    <select style="width:100%" ng-model="level" ng-change="searchLevel()">
                                        <option ng-repeat="data in listLevel" value="{{data.id_qc_level}}">{{data.qc_level}}</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label style="margin-right: 5px;">Lot.Number : </label>
                                    <input type="text" name="lot-number" ng-model="searchLot.lot_number" style="width: 100%;">
                                </div>
                                <div class="col-lg-3">
                                    <label class="txtlabelqcview">QC Name : </label>
                                    <select style="width:100%" ng-model="qcName" ng-change="searchQcName()">
                                        <option ng-repeat="data in listQcName" value="{{data.id_qc_name}}">{{data.qc_name}}</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label class="txtlabelqcview" style="margin-right: 10px;">Date : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                        <input style="z-index: 0;" type="date" class="form-control" ng-model="date_s" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="txtlabelqcview" style="margin-right: 10px;">Date To : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                        <input style="z-index: 0;" type="date" class="form-control" ng-model="date_e" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <button class="main-button" style="margin-top: 21px;" ng-click="serachResult()">Search</button>
                                </div>
                                <!--<div class="col-lg-4 inputgroup">
                                <label style="margin-right: 10px;">Accept : </label>
                                <input type="radio" name="Accept"> All
                                <input type="radio" name="Accept" style="margin-left:20px;"> OK
                                <input type="radio" name="Accept" style="margin-left:20px;"> None
                                </div>-->
                                <!--<label>เครื่องตรวจสอบ : </label>
                                <select style="width: 70%;">
                                    <option>all</option>
                                </select> -->
                             </div>
                             <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table tableScroll" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Lot Number</th>
                                                <th>Analyzer</th>
                                                <th>Test</th>
                                                <th>Result</th>
                                                <th>Unit</th>
                                                <th>Normal</th>
                                                <th>Comment</th>
                                                <th>Mean</th>
                                                <th>SD</th>
                                                <th>+3SD</th>
                                                <th>+2SD</th>
                                                <th>+1SD</th>
                                                <th>-1SD</th>
                                                <th>-2SD</th>
                                                <th>-3SD</th>
                                                <th>QC Record time </th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbodyScroll">
                                            <tr ng-repeat="data in listitemResult | filter:searchType | filter:searchLot" class="trScroll" ng-class="{'selectedRow':$index == selectedRow}"
                                                ng-click="clickRowMain(data.id_lab_item,$index,data.id_qc_level)">
                                                <td style="word-break: break-word;">{{data.lot_number}}</td>
                                                <td style="word-break: break-word;">{{data.analyzer}}</td>
                                                <td style="word-break: break-word;">{{data.lab_item_name}}</td>
                                                <td style="word-break: break-word;">{{data.result}}</td>
                                                <td style="word-break: break-word;">{{data.lab_item_unit}}</td>
                                                <td style="word-break: break-word;">-</td>
                                                <td style="word-break: break-word;">{{data.comment}}</td>
                                                <td style="word-break: break-word;">{{data.mean}}</td>
                                                <td style="word-break: break-word;">{{data.sd| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.P3SD| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.P2SD| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.P1SD| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.N1SD| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.N2SD| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.N3SD| number:3}}</td>
                                                <td style="word-break: break-word;">{{data.qc_test_date}} {{data.qc_test_time}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							<br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-3">
                                        <table class="table tableScroll" style="width:100%; height:300px;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbodyScroll" style="height:300px">
                                                <tr ng-repeat="data in RowItemSelect" class="trScroll">
                                                    <td>{{$index+1}}</td>
                                                    <td>{{data.qc_test_date}}</td>
                                                    <td>{{data.qc_test_time}}</td>
                                                    <td>{{data.result}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-3">
                                        <div align="right">
                                            <label>Mean : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="Allmean" ng-value="Allmean | number:3"><br>
                                            <label>SD+3 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllP3SD" ng-value="AllP3SD | number:3"><br>
                                            <label>SD+2 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllP2SD" ng-value="AllP2SD | number:3"><br>
                                            <label>SD+1 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllP1SD" ng-value="AllP1SD | number:3"><br>
                                            <label>SD : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="Allsd" ng-value="Allsd | number:3"><br>
                                            <label>SD-1 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllN1SD" ng-value="AllN1SD | number:3"><br>
                                            <label>SD-2 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllN2SD" ng-value="AllN2SD | number:3"><br>
                                            <label>SD-3 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllN3SD" ng-value="AllN3SD | number:3"><br>
                                            <label>Scale MIN Value : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllMinValue" ng-value="AllMinValue | number:3"><br>
                                            <label>Scale MAX Value : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllMaxValue" ng-value="AllMaxValue | number:3"><br>
                                            <label>CV : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="CV" ng-value="CV | number:3">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <p>
                                            <label style="color: #1CAF9A;">L&J Graph</label>
                                            <br>
                                            <label>Graph of comparative results of past results</label>
                                        </p>
                                        <div id="curve_chart" style="width: 100%; height: 100%; "></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-3">
                                        <table class="table tableScroll" style="width:100%; height:300px;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbodyScroll" style="height:300px">
                                            <tr ng-repeat="data in RowItemSelect" class="trScroll">
                                                    <td>{{$index+1}}</td>
                                                    <td>{{data.qc_test_date}}</td>
                                                    <td>{{data.qc_test_time}}</td>
                                                    <td>{{data.result}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-3">
                                        <div align="right">
                                            <label>Mean : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="Allmean2" ng-value="Allmean2 | number:3"><br>
                                            <label>SD+3 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllP3SD2" ng-value="AllP3SD2 | number:3"><br>
                                            <label>SD+2 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllP2SD2" ng-value="AllP2SD2 | number:3"><br>
                                            <label>SD+1 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllP1SD2" ng-value="AllP1SD2 | number:3"><br>
                                            <label>SD : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="Allsd2" ng-value="Allsd2 | number:3"><br>
                                            <label>SD-1 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllN1SD2" ng-value="AllN1SD2 | number:3"><br>
                                            <label>SD-2 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllN2SD2" ng-value="AllN2SD2 | number:3"><br>
                                            <label>SD-3 : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllN3SD2" ng-value="AllN3SD2 | number:3"><br>
                                            <label>Scale MIN Value : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllMinValue" ng-value="AllMinValue | number:3"><br>
                                            <label>Scale MAX Value : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="AllMaxValue" ng-value="AllMaxValue | number:3"><br>
                                            <label>CV : </label>
                                            <input type="text" style="margin-bottom:5px;" ng-model="CV2" ng-value="CV2 | number:3">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <p>
                                            <label style="color: #1CAF9A;">X-R Graph</label>
                                            <br>
                                            <label>Graph of comparative results of past results</label>
                                        </p>
                                        <div id="curve_chart2" style="width: 100%; height: 100%; "></div>
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
<script type="text/javascript" src='<?php echo e(asset("dependencies/js/plugins/google/gstatic-chart/loader.js")); ?>'></script>
<script src="<?php echo e(asset('js/QC/QC-viewer/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>