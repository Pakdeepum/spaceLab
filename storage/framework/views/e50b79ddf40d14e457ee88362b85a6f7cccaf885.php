<!-- CSS INCLUDE -->        
<link rel="stylesheet" type="text/css" id="theme" href='<?php echo e(asset("dependencies/css/theme-default.css")); ?>'/>
<link rel="stylesheet" type="text/css" id="theme" href='<?php echo e(asset("css/custom/main.css")); ?>'/>
<!-- EOF CSS INCLUDE -->

<?php $__env->startSection('content'); ?>

<div class="loginbg">
<div class="container">
    <div class="row">
    <!-- <img src="<?php echo e(URL::asset('/dependencies/img/login/login_bg.png')); ?>"> -->
        <div class="col-lg-offset-3 col-lg-6" style="margin-top:180px;" >
            <div class="panel panel-default panelbg" style="border-top: 0;border-radius: 3px;">
                <div class="panel-heading red" ">
                    <h3 class="loginhd">BioSystems Login</h3>
                </div>
                <div class="panel-body">
                    <?php if(session('msg')): ?>
                        <div class="alert alert-danger text-center">
                            <?php echo e(session('msg')); ?> 
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div>
                            <div class="form-group form-group-lg<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                <label for="username" class="col-lg-4 control-label"></label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input id="text" placeholder="username" type="text" class="login-input form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus> 
                                    <?php if($errors->has('username')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('username')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-group-lg<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-lg-10 col-lg-offset-1">
                                <input id="password" placeholder="Password" type="password" class="form-control login-input" name="password" required>
                                
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-5 col-lg-offset-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                         keep me signed in
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- <?php if(session('msg')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session('msg')); ?>

                                </div>
                            <?php endif; ?> -->
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button type="submit" class="loginbtn btn-block btn-lg">
                                    Sign In
                                </button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>