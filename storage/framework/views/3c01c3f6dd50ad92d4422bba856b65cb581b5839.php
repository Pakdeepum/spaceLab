<?php $__env->startSection('content'); ?>

<!-- START STATUS -->
<label class="status"> System Management >> Medical Information Management </label>
<!-- END STATUS -->

<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-12" ng-controller="doctorController">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="header-card">
                                            <h3>Medical Information Management</h3>
                                        </div>
                                            <div class="col-lg-8">
                                                <button class="add-button" ng-click="Add()">
                                                    <i class="fa fa-plus"></i> Add Data
                                                </button>
                                            </div>
                                        <div class="col-lg-4">
                                            Search : <input name="search" placeholder="Name - Lastname" type="text" style="margin-bottom:15px; width:80%">
                                            <button type="submit" class="main-button" ng-click="Search()">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                        </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">ID DOCTOR</th>
                                                    <th>No.</th>
                                                    <th>Name-Lastname</th>
                                                    <th>Expertise</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="data in posts">
                                                    <td style="display: none;">{{data.id_doctor}}</td>
                                                    <td>{{$index+1}}</td>
                                                    <td>{{data.prefix_name}} {{data.doctor_name}} {{data.doctor_lastname}}</td>
                                                    <td>{{data.specialty_name}}</td>
                                                    <td>
                                                        <button data-val="{{data.id_doctor}}" id="btnedit" class="edit-button" ng-click="EditDoctor(data.id_doctor)">
                                                        <input name="edithidden" type="hidden" value="{{data.id_doctor}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button data-val="{{data.id_doctor}}" id="btndel" class="del-button" ng-click="DelDoctor(data.id_doctor)">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('modals-center.modals-askDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </main>
    </div>
</div>

<?php echo $__env->make('management.management-doctor.Modals.management-doctor-addDoctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('management.management-doctor.Modals.management-doctor-editDoctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/management/management-doctor/form.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>