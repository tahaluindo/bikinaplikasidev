<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <?php echo $__env->make("layouts.dashboard", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">User / Disukai
                            <div class="card-action">

                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-circle mr-2 text-primary"></i>User
                                </li>
                                <li class="list-inline-item"><i class="fa fa-circle mr-2" style="color: #ade2f9"></i>Disukai
                                </li>
                            </ul>
                            <canvas id="chart1" height="115"></canvas>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-header">Hari Ini
                            <div class="card-action">

                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart2" height="180"></canvas>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <tbody>
                                <tr>
                                    <td><i class="fa fa-circle text-primary mr-2"></i>User Baru</td>
                                    <td><?php echo e($users_baru->count()); ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-circle text-success mr-2"></i>Disukai Baru</td>
                                    <td><?php echo e($disukai_baru->count()); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\api-admin-rumah-kevin.bikinaplikasi.dev\new\resources\views/dashboard.blade.php ENDPATH**/ ?>