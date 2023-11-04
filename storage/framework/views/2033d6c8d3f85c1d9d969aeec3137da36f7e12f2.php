<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permisos</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-key"></i> Permisos</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('permissions.index')); ?>" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan nama">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btnprimary">
                                            <i class="fa fa-search"></i> BUSCAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width:6%">Nº</th>
                                        <th scope="col">NOMBRE DE PERMISOS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" style="text-align:
                                        center"><?php echo e(++$no + ($permissions->currentPage()-1) * $permissions->perPage()); ?></th>
                                        <td><?php echo e($permission->name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                <?php echo e($permissions->links("vendor.pagination.bootstrap-4")); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\helpdesk-main\resources\views/permissions/index.blade.php ENDPATH**/ ?>