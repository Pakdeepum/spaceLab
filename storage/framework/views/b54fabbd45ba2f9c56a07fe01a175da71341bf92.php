<html>

<head>
    <style>
        @page  {
            size: a5 landscape;
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("<?php echo e(public_path('fonts/THSarabunNew.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("<?php echo e(public_path('fonts/THSarabunNew Bold.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("<?php echo e(public_path('fonts/THSarabunNew Italic.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("<?php echo e(public_path('fonts/THSarabunNew BoldItalic.ttf')); ?>") format('truetype');
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
        main {
            padding-top : 30px;            
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
        <div style="font-size:26px; font-weight:bold;">ผลตรวจรูปภาพ</div>         
    </header>
    <main>
        <div style="border-bottom: 1px solid black; border-top: 1px solid black;">
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="with:80%"><span style="font-weight:bold;">Lab No : </span><span style="font-weight:normal;"><?php echo e($dataLab[0]['lab_order_no']); ?></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-weight:bold;">ชื่อ - สกุล : </span><span style="font-weight:normal;"><?php echo e($dataLab[0]['patient_firstname']); ?> <?php echo e($dataLab[0]['patient_lastname']); ?></span></td>
                        <td><span style="font-weight:bold;">HN : </span><span style="font-weight:normal;"><?php echo e($dataLab[0]['hn']); ?></span></td>
                        <td><span style="font-weight:bold;">เพศ : </span><span style="font-weight:normal;"><?php echo e($dataLab[0]['gender']); ?></span></td>
                        <td><span style="font-weight:bold;">อายุ : </span><span style="font-weight:normal;"><?php echo e($dataLab[0]['age']); ?></span></td>
                        <td><span style="font-weight:bold;">order date : </span><span style="font-weight:normal;"><?php echo e($dataLab[0]['order_date']); ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div> 
        <table style="width:100%;">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <img src="<?php echo e(public_path('storage/img/LabResult/').'/'.$dataLab[0]['id_hospital'].'/'.$dataLab[0]['lab_order_no'].'/'.$dataLab[0]['filename']); ?>" height="330px" width="500px">
                    </td>
                </tr>
            </tbody>
        </table> 
    </main> 
    <footer>
    <table style="width:100%;">
            <tbody>
                <tr>
                    <td style="with:20%"><span style="font-weight:bold; float:right">วันที่พิมพ์ : <span style="font-weight:normal;"><?php echo date("Y/m/d");?></span></span></td>
                </tr>
            </tbody>
        </table> 
    </footer>
</body>
</html>