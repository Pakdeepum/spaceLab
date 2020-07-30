<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @page { size: a4 ; }
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
            }
            html,body {
                font-family: 'THSarabunNew'!important;;
                font-size: 14pt;
            }
            .text-head { 
                font-size: 16pt;
            }
            .table {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .td {
                border-left: 1px solid black;
                border-right: 1px solid black;
                border-collapse: collapse;
                padding-left: 10px;
                padding-right: 10px;
            }
            td {
                line-height:0.9;
            }
            .bf { position: fixed; bottom: 150px; }
            .f { position: fixed; bottom: 40px; }
            header { position: fixed; top: -20px; left: 0px; right: 0px; height: 50px; }
            footer { position: fixed; bottom: 40px; }
            .page_break { page-break-after: always; }

            .pagenum:before {
                content: counter(page);
            }
            .push-left { padding-left:10px}
            .padding-0 {padding:0px}
            .left {float:left}
        </style>
    </head>
    <body>
        <div class="padding-0">
            Page <span class="pagenum">
        </div>
        <header>
            <h3 align="center">Daily List</h3> 
        </header>        
        <table>
            <tr>
                <th>Hn</th>
                <th class="push-left">Name - Surname</th>
            </tr>
            @foreach($patient as $val)
            <tr>
                <td>{{$val->hn}}</td>
                <td class="push-left">{{$val->prefix['prefix_name']}} {{$val->patient_firstname}} {{$val->patient_lastname}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>