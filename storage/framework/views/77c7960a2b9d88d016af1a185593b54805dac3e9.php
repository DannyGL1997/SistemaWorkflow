<?php $__env->startSection('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
          <div class="container">

            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fa fa-ticket-alt text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>TICKETS DEL MES</h4>
                    </div>
                    <div class="card-body">
                       <?php echo e($report->getMonthlyTickets() ?? '0'); ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fa fa-skull-crossbones text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>SLA ACEPTADOS</h4>
                    </div>
                    <div class="card-body">
                      <?php echo e($report->getOverdueTickets('red') ?? '0'); ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fa fa-exclamation-triangle text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>APROXIMACIÓN SLA</h4>
                    </div>
                    <div class="card-body">
                      <?php echo e($report->getOverdueTickets('yellow') ?? '0'); ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa fa-smile-wink text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>TICKETS TERMINADOS</h4>
                    </div>
                    <div class="card-body">
                      <?php echo e($report->getMonthlyDoneTickets() ?? '0'); ?>

                    </div>
                  </div>
                </div>  
              </div>              
            </div>

            <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-header">
                      <h4><i class="fas fa-clipboard-list"></i> INFORME DEL MES</h4>
                  </div>
    
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col" style="text-align: center;width: 6%">Nº</th>
                                  <th scope="col">NOMBRE</th>
                                  <th scope="col">ASIGNADOS</th>
                                  <th scope="col">EXPIRADOS</th>
                                  <th scope="col">ADVERTENCIAS</th>
                                  <th scope="col">PENDIENTES</th>
                                  <th scope="col">ACABADOS</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $__currentLoopData = $allReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <th scope="row" style="text-align: center"><?php echo e(++$no); ?></th>
                                      <td><?php echo e($item['name']); ?></td>
                                      <td><span class="badge badge-primary"><?php echo e($item['assigned']); ?></span></td>
                                      <td><span class="badge badge-danger"><?php echo e($item['expired']); ?></span></td>
                                      <td><span class="badge badge-warning"><?php echo e($item['warning']); ?></span></td>
                                      <td><span class="badge badge-dark"><?php echo e($item['pending']); ?></span></td>
                                      <td><span class="badge badge-success"><?php echo e($item['done']); ?></span></td>
                                  </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                      <h4><i class="fas fa-clipboard-list"></i> NOVEDADES</h4>
                  </div>
                  <div class="card-body">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo e($item->title); ?></h5>
                          </div>
                          <p class="mb-1"><?php echo e($item->detail); ?></p>
                          <small>created by : <?php echo e($user->getName($item->user_id)); ?></small>
                          <small> - <?php echo e(Carbon\Carbon::parse($item->updated_at)->diffForHumans()); ?></small>
                        </a>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sisdataperu\resources\views/dashboard.blade.php ENDPATH**/ ?>