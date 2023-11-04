<?php $__env->startSection('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Registro de Usuarios</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bell"></i> Registro de Usuarios</h4>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('userlog.index')); ?>" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                       placeholder="Buscar...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> BUSCAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">Nº</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">APARTADO</th>
                                <th scope="col">IP</th>
                                <th scope="col">NAVEGADOR</th>
                                <th scope="col">FECHA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row" style="text-align: center"><?php echo e(++$no + ($logs->currentPage()-1) * $logs->perPage()); ?></th>
                                    <td><?php echo e($user->getName($log->user_id)); ?></td>
                                    <td><?php echo e($log->log); ?></td>
                                    <td><?php echo e($log->ip); ?></td>
                                    <td><?php echo e($log->browser); ?></td>
                                    <td><?php echo e($log->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            <?php echo e($logs->links("vendor.pagination.bootstrap-4")); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\helpdesk-main\resources\views/loguser/index.blade.php ENDPATH**/ ?>