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
    </style>
</head>

<body>           
    <header>
        <div style="font-size:26px; font-weight:bold;">Doctor Appointment</div>         
    </header>
    <main>
        <div style="border-bottom: 1px solid black; border-top: 1px solid black;">
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td><span style="font-weight:bold;">Hospital : </span><span style="font-weight:normal;"><?php echo e($data[0][10]); ?></span></td>
                        <td><span style="font-weight:bold; float:right">Print Date : <span style="font-weight:normal;"><?php echo date("Y/m/d");?></span></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-weight:bold;">Appointment : </span><span style="font-weight:bold;"> Date </span> <?php echo e($data[0][2]); ?>  <span style="font-weight:bold;">Time</span> <?php echo e($data[0][3]); ?> : <?php echo e($data[0][4]); ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div> 
        <table style="width:100%;">
            <tbody>
                <tr>
                    <td><span style="font-weight:bold;">Name - Surname : </span> <?php echo e($data[0][1]); ?></td>
                    <td><span style="font-weight:bold;">Sex : </span> <?php echo e($data[0][12]); ?></td>
                </tr>
                <tr>
                    <td><span style="font-weight:bold;">Age : </span> <?php echo e($data[0][11]); ?></td>
                </tr>
                <tr>
                    <td><span style="font-weight:bold;">Reason : </span><?php echo e($data[0][5]); ?></td>
                </tr>
            </tbody>
        </table> 
    </main> 
    <footer>
    <table style="width:100%;">
            <tbody>
                <tr>
                    <td><span style="font-weight:bold;">Doctor : </span> <?php echo e($data[0][0]); ?></td>
                    <td><span style="font-weight:bold;">Department : </span><?php echo e($data[0][8]); ?></td>
                    <td><span style="font-weight:bold;">Specialty Name : </span><?php echo e($data[0][9]); ?></td>
                </tr>
            </tbody>
        </table> 
        <div>
            <label><span style="font-weight:bold;">Note : </span><?php echo e($data[0][7]); ?></label>
        </div>
    </footer>
</body>
</html>