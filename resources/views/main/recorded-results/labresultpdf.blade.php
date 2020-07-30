<html>

<head>
    <style>
        @page {
            size: a5 landscape;//a4 portrait;
			
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }


        body {
            font-family: "THSarabunNew";
            //color: grey;

        }

        th {
            font: bold;
            width: 110px;
        }

        table {
            width: 90px;
            text-align: center;
        }

        td {
            text-align: left;
            width: 82px;
            padding: 0px;
            margin: 0px;
        }

        tr {
            margin: 1px;
        }

        header {
            position: fixed;
            top: -20px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: 80px;//57%;
        }

        .tablebody {
            page-break-after: always;
            margin-top: 60px;
        }

        .tablebody:last-child {
            page-break-after: never;
        }

    </style>
</head>

<body>
    <header>
        <table style="border:solid 1px #000; line-height: 10px; width: 200px;">
            <tr  style="font-size: 20px!important;">
                <td rowspan="5" style="border-right: 1px solid #000;">
                    <img src="" width="80px;" height="80px;" style="padding-left: 0px;">
                </td>
                <td><b>HN:</b></td>
                <td>{{$detail[0]->hn}}</td>
                <td><b>Name:</b></td>
                <td colspan="3">{{$detail[0]->prefix_name_patient}} {{$detail[0]->patient_firstname}}&nbsp;{{$detail[0]->patient_lastname}}</td>
                <td></td>
                <td></td>
                <td style="border:solid 1px #000;" rowspan="5">
                    <img src="" width="85px;" height="60px;">
                </td>
            </tr>
            <tr style="font-size: 18px!important;">
                <td><b>Sex:</td>
                <td>{{$detail[0]->gender}}</td>
                <td><b>Age:</td>
                <td>{{$detail[0]->age}}</td>
                <td><b>Request Date:</td>
                <td>{{date('d-m-Y', strtotime($detail[0]->report_date))}}</td>
            </tr>
            <tr style="border-bottom:solid 1px #000;font-size: 18px!important;">
                <td><label><b>Hospital:</label></td>
                <td colspan="5" style="text-align:left">{{$detail[0]->hospital_name}}</td>
            </tr>
            <tr style="border-top:solid 1px #000;font-size: 18px!important;">
                <!--<td style="border-top:solid 1px #000; text-align:left" colspan="4">AMS Clinical Service Center</td>-->
                <td style="border-top:solid 1px #000;"><b>Request NO:</td>
                <td style="border-top:solid 1px #000;"></td>
            </tr>
            <tr style="font-size: 18px!important;">
                <td><b>Note: </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </header>
    <main>
        @php $i=0 @endphp
        @php $k=0 @endphp
        @php $all=0 @endphp
        @foreach($detail as $value)
        @if($i%10 == 0)
        <div style="position:relative; top:60px;font-size: 18px!important;"><b>Lab No. : {{$detail[0]->lab_order_no}}</div>
        <table class="tablebody" style="line-height: 15px;">
            <thead style="border-bottom:solid 1px #000; text-align: center; ">
                <tr style="border-bottom:solid 1px #000;">
                    <th style="font-size: 14px!important;">Lab Test</th>
                    <th style="font-size: 14px!important;">RESULT</th>
                    <th style="font-size: 14px!important;">Classified</th>
                    <th style="font-size: 14px!important;">Reference range</th>
                    <th style="font-size: 14px!important;">UNIT</th>
                    <th style="font-size: 14px!important;">Comment</th>
                </tr>
            </thead>
            <tbody>
                @for ($l = $k; $l < $k+10; $l++)
                <tr>
                    <td style="text-align:left; font-size: 18px!important;"><b>{{$detail[$l]->lab_item_name ?? ''}}</b></td>
                    <td style="text-align:center; font-size: 18px!important;"><b>{{$detail[$l]->lab_result?? ''}}</b></td>
					<td style="text-align:center; font-size: 18px!important;">
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '1'  )> L </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '4'  )> PL </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '3'  )> N </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '2'  )> H </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '5'  )> PH </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '6'  )> ERR </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '7'  )> DH </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '8'  )> DL </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '9'  )> WN </b>  @endif
                        <b @if ( $l < count($detail) && $detail[$l]->result_flag  == '0'  )> </b>  @endif
					</td>
                  
                    <td style="text-align:center; font-size: 18px!important;"><b>{{$detail[$l]->lab_normal_value ?? ''}}</b></td>
                    <td style="text-align:center; font-size: 18px!important;"><b>{{$detail[$l]->lab_item_unit ?? ''}}</b></td>
                    <td style="text-align:center; font-size: 18px!important;"><b>{{$detail[$l]->labMain['note'] ?? ''}}</b></td>
                </tr>
				
				@if ($l < count($detail) && $detail[$l]->eGFR)
					<tr>
						<td style="text-align:left; font-size: 18px!important;"><b>eGFR</b></td>
						<td style="text-align:center; font-size: 18px!important;"><b>{{$detail[$l]->eGFR ?? ''}}</b></td>
					</tr> 
				@endif
				
					
                @endfor
            </tbody>
        </table>
		
        @endif
        @php $k++ @endphp
        @php $i++ @endphp
        @endforeach
    </main>
    <footer>
        @if(count($detail[0]['critical']) > 0)
        <div style="padding-bottom:10px">
            <span style="font-weight: bold;font-size: 16px">Critical Recipient </span>: <span style="font-size: 16px">{{$detail[0]->critical[0]['reciver_name']}}</span>
            <span style="font-weight: bold;font-size: 16px">Critical Reporter </span>: <span style="font-size: 16px">{{$detail[0]->critical[0]['report_name']}}</span>
            <span style="font-weight: bold;font-size: 16px">Notified Department </span>: <span style="font-size: 16px">{{$detail[0]->critical[0]['department']}} </span>
            <span style="font-weight: bold;font-size: 16px;">Cause </span>: <span style="font-size: 16px">{{$detail[0]->critical[0]['cause']}} </span>
        </div>
        @endif
        <table style="width: 700px; border-top:groove 1px; border-bottom:solid 1px;">
            <tr>
                <td><label><b>Reported By:</label></td>
                <td colspan="3" style="border-right:dotted 1px; text-align:left">{{$detail[0]->prefix_name_master_report}}{{$detail[0]->fname_report}}&nbsp;{{$detail[0]->lastname_report}}</td>
                <td><label><b>Approved By:</label></td>
                <td colspan="3" style="border-right:dotted 1px; text-align:left">{{$detail[0]->prefix_name_master_approve}}{{$detail[0]->fname_approve}}&nbsp;{{$detail[0]->lastname_approve}}</td>
                <td><b>Printed Date: {{date("d-m-Y")}}</td>
            </tr>
        </table>
        <div style="line-height: 10px;">
            <b style="margin-top: 0px; margin-bottom: 0px; font-size: 13px">Note: Items marked with " refer to items list that are forwarded outside.&nbsp;&nbsp; Remark : L =Low,H,Higth ,R=Repeated,CL=Critical Low,CH=
                Critical High,W=Warning&nbsp;SD-F-MT-12</b>
            <p style="margin-top: 0px; margin-bottom: 0px; font-size: 13px; font-weight: bold;">Note: Items marked with * at the end refer to items list within the scope of standard certification ISO 15189:2012</p>
        </div>
    </footer>
</body>
</html>
