<div class="modal fade" id="modal-editLabResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Authentication</h5>
            </div>
            <div ng-controller="authenticationController">
                <div class="modal-body">
                    <div class="card card-small">
                        <div class="card-body pt-0 mt-5">
                            <div class="row">
                                <div class="col-lg-2 col-lg-offset-3">                                   
                                    <label>username</label>
                                </div>
                                <span style="color:red;" ng-if="permission">Username permission is denied</span>
                                    <span style="color:red;" ng-if="hasUser">Invalid Username</span>
                                <div class="col-lg-5 push-down-5">                                    
                                    <input type="text" name="username" ng-model="_user" ng-change="onUsernameChange()"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-lg-offset-3">                                    
                                    <label>password</label>
                                </div>
                                <span style="color:red" ng-if="hasPwd">Invalid password</span>
                                <div class="col-lg-5 push-down-5">
                                    <input type="password" name="password" ng-model="_pwd"
                                        ng-change="onPasswordChange()" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" ng-click="authen()">ระบุตัวตน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>