<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head class="Kanit">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Biosystem LIS Lab')); ?></title>

        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href='<?php echo e(asset("dependencies/css/theme-default.css")); ?>'/>
        <link rel="stylesheet" type="text/css" id="theme" href='<?php echo e(asset("css/custom/login.css")); ?>'/>

        <!-- EOF CSS INCLUDE -->

    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>  
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>            
    </body>
</html>
