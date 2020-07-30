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
            font-size : 18px;
            /*color: grey;*/
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
            width: 300px;
            padding: 0px;
            padding-bottom: 20px;
            margin: 0px;
        }
        tr {
            margin: 10px;
            padding-bottom: 10px; 
        }
        header {
            position: fixed;
            top: -20px;
            left: 0px;
            right: 0px;
            height: 50px;
        }
        main {
            padding-top : 10px;
        }
        footer {
            position: fixed;
            bottom: 40px;
        }
        .tablebody {
            page-break-after: always;
            margin-top: 60px;
        }
        .tablebody:last-child {
            page-break-after: never;
        }
        .half {
            height: 50% !important;
        }
    </style>
</head>

<body>
    <header>
        <div style="font-size:26px; font-weight:bold;">Lab Result Document Photo</div>
    </header>
    <main>
        <!-- <div style="border-bottom: 1px solid black; border-top: 1px solid black;"> -->
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:80%"><span style="font-weight:bold; ">Lab No : {{$dataLab[0]['lab_order_no']}}</span></td>
						<td style="width:80%"><span style="font-weight:bold;">Name - Lastname : {{$dataLab[0]['patient_firstname']}} {{$dataLab[0]['patient_lastname']}}</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-weight:bold;">HN : {{$dataLab[0]['hn']}}</span></td>
                        <td><span style="font-weight:bold;">Sex : {{$dataLab[0]['gender']}}</span></td>
                        <td><span style="font-weight:bold;">Age : {{$dataLab[0]['age']}}</span></td>
                        <td><span style="font-weight:bold;">Order date : {{$dataLab[0]['order_date']}}</span></td>
                    </tr>
                    
                </tbody>
            </table>
        <!-- </div> -->
        <table style="width:100%;">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <br>
                        <br>
                        <?php if ($dataLab['image']== asset('img/Group_270.png')): ?>
                            <?php echo '<img max-width="500" max-height="300" src="img/Group_270.png"'?>
                        <?php else: ?>
                            <?php echo '<img width="'.$dataLab['imageWidth'].'" height="'.$dataLab['imageHeight'].'" src="'.$dataLab['image'].'"'?>
                        <?php endif ?>                   
                    </td>
                </tr>
            </tbody>
        </table>
       
    </main>
    <footer>
    <table style="width:100%;">
            <tbody>
                <tr>
                  <td style="padding-bottom:20px !important;"><span style="font-weight:bold;">Picture Note : <?php echo $dataLab['imageDescription']?> </span></td>
                </tr>
                <tr>
                  <td style="margin-botton:10px;"><span style="font-weight:bold;"><span style="font-weight:normal;"><b><?php echo "Print Date : ".date("Y/m/d");?></span></span></td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>
</html>
