<html>

<head>
    <style>
        @page {
            size: a5 landscape;
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
            bottom: 80px;
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
        <table style="border:solid 1px #000; line-height: 10px; width: 100%;">
            <tr>
                <td style="padding-left:10px"><b>Profile Name:</b></td>
                <td>{{$detail['profile_name']}}</td>
                <td><b>QC Name:</b></td>
                <td>{{$detail['qc_name']}}</td>

            </tr>
            <tr>
                <td style="padding-left:10px"><b>QC Test Date:</b></td>
                <td>{{date('d-m-Y', strtotime($detail[0]->qc_test_date))}}</td>
                <td><b>QC level:</b></td>
                <td>{{$detail['qc_level']}}</td>
            </tr>
            <tr>
               <td style="padding-left:10px"><b>QC Test Time:</b></td>
                <td>{{$detail[0]->qc_test_time}}</td>
                <td><b>Lot Number:</b></td>
                <td>{{$detail[0]->lot_number}}</td>
            </tr>
            <tr style="border-top:solid 1px #000;padding-top:5px;">
                <td style="border-top:solid 1px #000; text-align:left;padding-left:10px;" colspan="5">Note</td>
                <td style="border-top:solid 1px #000;"></td>
                <td style="border-top:solid 1px #000;"></td>
            </tr>
        </table>
    </header>
    <main>
        @php $i=0 @endphp
        @php $k=0 @endphp
        @php $all=0 @endphp
        @foreach($detail as $value)
        @if($i%15 == 0)
        <table class="tablebody" style="line-height: 10px;padding-top:20px">
            <thead style="border-bottom:solid 1px #000; text-align: center; ">
                <tr style="border-bottom:solid 1px #000;">
                    <th style="font-size: 14px!important;">Lab QC</th>
                    <th style="font-size: 14px!important;">RESULT</th>
                    <th style="font-size: 14px!important;">Mean</th>
                    <th style="font-size: 14px!important;">SD</th>
                    <th style="font-size: 14px!important;">UNIT</th>
                    <th style="font-size: 14px!important;">Comment</th>
                </tr>
            </thead>
            <tbody>
                @for ($l = $k; $l < $k+10; $l++)
                <tr>
                    <td style="text-align:left; font-size: 12px!important;"><b>{{$detail[$l]->lab_item_name ?? ''}}</b></td>
                    <td style="text-align:center; font-size: 12px!important;"><b>{{$detail[$l]->result?? ''}}</b></td>
                    <td style="text-align:center; font-size: 12px!important;">{{$detail[$l]->mean?? ''}}</td>
                    <td style="text-align:center; font-size: 12px!important;">{{$detail[$l]->sd ?? ''}}</td>
                    <td style="text-align:center; font-size: 12px!important;">{{$detail[$l]->lab_item_unit ?? ''}}</td>
                    <td style="text-align:center; font-size: 12px!important;">{{$detail[$l]->comment ?? ''}}</td>
                </tr>
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
                <!--<td><label>Reported By:</label></td>
                <td colspan="3" style="border-right:dotted 1px; text-align:left">{{$detail[0]->prefix_name_master_report}}{{$detail[0]->fname_report}}&nbsp;{{$detail[0]->lastname_report}}</td>
                <td><label>Approved By:</label></td>
                <td colspan="3" style="border-right:dotted 1px; text-align:left">{{$detail[0]->prefix_name_master_approve}}{{$detail[0]->fname_approve}}&nbsp;{{$detail[0]->lastname_approve}}</td>-->
                <td style="padding-left:10px">Printed Date: {{date("d-m-Y")}}</td>
            </tr>
        </table>
        <div style="line-height: 10px;">
            <!--<b style="margin-top: 0px; margin-bottom: 0px; font-size: 13px">หมายเหตุรายการที่มีเครื่องหมาย " ต่อท้าย
                หมายถึงรายการที่ส่งต่อภายนอก&nbsp;&nbsp; Remark : L =Low,H,Higth ,R=Repeated,CL=Critical Low,CH=
                Critical High,W=Warning&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SD-F-MT-12</b>
            <p style="margin-top: 0px; margin-bottom: 0px; font-size: 13px; font-weight: bold;">หมายเหตุรายการที่มีเครื่องหมาย
                * ต่อท้าย หมายถึงรายการที่อยู่ในขอบข่ายการรับรองมาตราฐาน ISO 15189:2012</p>-->
        </div>
    </footer>
</body>
</html>
