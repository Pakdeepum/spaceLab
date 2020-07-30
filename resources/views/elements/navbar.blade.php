<!-- START PAGE CONTAINER -->
<div class="navBar">
@php

$i=1;
$Access=[];
while($i<=23){
    $Access[$i] = in_array($i,$listmenu);
    //echo "<script>console.log('Access[',$i,']:',$Access[$i]);</script>";
    $i++;
}

@endphp
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal">
        <li class="xn-logo">
            <a class="btn" href="{{url('/Welcome')}}"><h2 style="color:#4d79ff; text-align:center; margin-top:7px; ">SPACELAB</h3></a>
            <!-- <img class="logomain" src="{{URL::asset('/img/welcome/logo-biosytem.png')}}">  -->
        </li>

        <div class="dropdown">
            <button class="dropbtn">Home<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    @if($Access["1"] == true)
                        <a id="nav1" href="{{url('/main/recieveLab')}}">Recieve Lab </a>
                    @else

                    @endif

                    @if($Access["2"] == true)
                        <a id="nav2" href="{{url('/main/RecordedResults')}}">Lab Result Record</a>
                    @else

                    @endif

                    @if($Access["3"] == true)
                        <a id="nav3" href="{{url('/main/HistoryResults')}}">Lab Result History</a>
                    @else

                    @endif

                    @if($Access["4"] == true)
                        <a id="nav4" href="{{url('/main/resultCopyScan')}}">Lab Result Copy Scan</a>
                    @else

                    @endif

                    @if($Access["5"] == true)
                        <a id="nav5" href="{{url('/main/resultDocumentPhoto')}}">Lab Result Document Photo</a>
                    @else

                    @endif
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">System Management<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    @if($Access["7"] == true)
                        <a id="nav7" href="{{url('/management/manageUser')}}">User Management</a>
                    @else

                    @endif
                    @if($Access["21"] == true)
                        <a id="nav21" href="{{url('/management/managePatient')}}">Patients Management</a>
                    @endif
                    @if($Access["22"] == true)
                          <a id="nav22" href="{{url('/management/manageDoctor')}}">Doctor Information Management</a>
                    @endif
                    @if($Access["23"] == true)
                        <a id="nav23" href="{{url('/management/manageLabitem')}}"> Lab Item Data Management</a>
                    @endif

                        <!-- <a id="nav21" href="">จัดการผู้ป่วย</a> -->



                    @if($Access["8"] == true)
                        <a id="nav8" href="{{url('/management/manageData')}}">Data Management</a>
                    @else

                    @endif

                    @if($Access["9"] == true)
                        <a id="nav9" href="{{url('/management/manageMenu')}}">Menu Management</a>
                    @else

                    @endif

                    @if($Access["11"] == true)
                        <a id="nav11" href="{{url('/management/manageConfig')}}">Lab Group Information Management</a>
                    @else

                    @endif

                    @if($Access["13"] == true)
                        <!-- <a id="nav13" href="{{url('/management/manageLogfile')}}">Log File</a> -->
                    @else

                    @endif
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">QC<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    @if($Access["16"] == true)
                        <a id="nav16" href="{{url('/QC/QCInput')}}">QC Input</a>
                    @else

                    @endif

                    @if($Access["17"] == true)
                        <a id="nav17" href="{{url('/QC/QCSetup')}}">QC Setup</a>
                    @else

                    @endif

                    @if($Access["18"] == true)
                        <a id="nav18" href="{{url('/QC/QCViewer')}}">QC Viewer</a>
                    @else

                    @endif
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Report<span class="fa fa-angle-down"></span></button>
                <div class="dropdown-content">
                    @if($Access["19"] == true)
                        <!--<a id="nav19" href="{{url('/report/HISreport')}}">รายงาน HIS</a> -->
                    @else

                    @endif

                    @if($Access["20"] == true)
                        <a id="nav20" href="{{url('/report/LISreport')}}">LIS Report</a>
                    @else

                    @endif
                </div>
        </div>
        <!-- SIGN OUT -->
        <div class="dropdown pull-right">
            <button class="logout">
                <img class="text-left" style="width: 25px;height: 20%;margin-top: 5px;" src="{{URL::asset('/img/welcome/user_img.png')}}">
                <label class="text-right" style="font-size: 10px;">{{$user->fname ??'Admin'}}</label>
                <span class="fa fa-angle-down"></span>
            </button>
                <div class="dropdown-content">
                    <a href="{{route('manageUser.SetPinCode')}}">Setup Pincode</a>
                    <a href="{{route('login.logout')}}">Sigh Out</a>
                </div>
        </div>
        <!-- END SIGN OUT -->

    </ul>
    <!-- END X-NAVIGATION VERTICAL -->
</div>
<!-- end  -->
