<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> User Management >> Set up Pincode </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12">
            <div ng-controller="UserController">
                  <div class="container">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-card">
                                    <h3>Set up Pincode</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                          <div class="row"  ng-show="userData.pincode!=null">
                                              <div class="col-lg-2 col-lg-offset-3">
                                                  <label>Current Pincode</label>
                                              </div>
                                                  <span style="color:red;" ng-if="notCorrect">Invalid Pincode</span>
                                              <div class="col-lg-5 push-down-5">
                                                  <input type="password" numbers-only placeholder="number only" name="pincode" ng-model="_pincode" ng-change="onPincodeChange()"
                                                      autocomplete="off" />
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-2 col-lg-offset-3">
                                                  <label>New Pincode</label>
                                              </div>
                                              <span style="color:red" ng-if="notMatch">Pincode not match</span>
                                              <div class="col-lg-5 push-down-5">
                                                  <input type="password" numbers-only placeholder="number only" name="new_pincode" ng-model="_newPincode"
                                                      ng-change="onNewPincodeChange()" autocomplete="off" />
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-2 col-lg-offset-3">
                                                  <label>Confirm New Pincode</label>
                                              </div>
                                              <span style="color:red" ng-if="notMatch">Pincode not match</span>
                                              <div class="col-lg-5 push-down-5">
                                                  <input type="password" numbers-only placeholder="number only" name="confirm_new_pincode" ng-model="_confirmNewPincode"
                                                      ng-change="onConfirmNewPincodeChange()" autocomplete="off" />
                                              </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-lg-5 col-lg-offset-3 push-down-5">
                                              <button type="button" class="btn btn-success" ng-click="updatePincode()">Save</button>
                                              </div>
                                              <span style="color:red" ng-if="dupplicate">Dupplicate Pincode, please choose new pincode</span>
                                          </div>
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

<script src="<?php echo e(asset('js/management/management-pincode/pincode.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>