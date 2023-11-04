<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Editar Ticket</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Editar ticket</h4>
                    </div>

                    <div class="card-body">

                        <form action="<?php echo e(route('tickets.update', $ticket->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                                <div class="form-group">
                                    <?php if(auth()->check() && auth()->user()->hasAnyRole('Admin|Helpdesk')): ?>
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('customer-project', ['customerId' => $ticket->customer_id])->html();
} elseif ($_instance->childHasBeenRendered('XZDpCf2')) {
    $componentId = $_instance->getRenderedChildComponentId('XZDpCf2');
    $componentTag = $_instance->getRenderedChildComponentTagName('XZDpCf2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XZDpCf2');
} else {
    $response = \Livewire\Livewire::mount('customer-project', ['customerId' => $ticket->customer_id]);
    $html = $response->html();
    $_instance->logRenderedChild('XZDpCf2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                                    <?php $__errorArgs = ['customer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php endif; ?>

                                    <input type="hidden" name="updated_customer" id="updated_customer" value="<?php echo e($ticket->customer_id); ?>">
                                    <?php if(auth()->check() && auth()->user()->hasRole('Teknisi')): ?>
                                    <div class="form-group">
                                        <label>AREA</label>
                                        <input type="text" name="customer" value="<?php echo e(old('customer', $customer->find($ticket->customer_id)->first()->value('name'))); ?>" class="form-control" readonly>
                                    </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label>Nº TICKET</label>
                                        <input type="text" name="ticket_no" value="<?php echo e(old('ticket_no', $ticket->number)); ?>" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>FECHA</label>
                                        <input type="date" name="reporteddate" value="<?php echo e(old('reporteddate', Carbon\Carbon::parse($ticket->reporteddate)->format('Y-m-d'))); ?>" class="form-control <?php $__errorArgs = ['reporteddate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(auth()->check() && auth()->user()->hasRole('Teknisi')): ?> readonly <?php endif; ?>>
                                        <?php $__errorArgs = ['reporteddate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>PROBLEMA ENCONTRADO</label>
                                        <input type="text" name="summary" value="<?php echo e(old('summary', $ticket->problemsummary)); ?>" class="form-control" <?php if(auth()->check() && auth()->user()->hasRole('Teknisi')): ?> readonly <?php endif; ?> >

                                        <?php $__errorArgs = ['summary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>DETALLE DEL PROBLEMA</label>
                                        <textarea name="detail" cols="30" rows="30" class="form-control" <?php if(auth()->check() && auth()->user()->hasRole('Teknisi')): ?> readonly <?php endif; ?>><?php echo e(old('detail', $ticket->problemdetail)); ?></textarea>
                                        <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <?php if(auth()->check() && auth()->user()->hasAnyRole('Admin|Helpdesk')): ?>
                                    <div class="form-group">
                                        <label>URGENCIA</label>
                                        <select class="form-control select-sla <?php $__errorArgs = ['sla_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sla_id">
                                            <option value="">- SELECCIONAR SLA -</option>
                                            <?php $__currentLoopData = $slas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($ticket->sla_id == $sla->id): ?>
                                                    <option value="<?php echo e($sla->id); ?>" selected><?php echo e($sla->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($sla->id); ?>"><?php echo e($sla->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['sla_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>ASIGNADO</label>
                                        <select class="form-control select-technician <?php $__errorArgs = ['technician_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="technician_id">
                                            <option value="">- TECNICO -</option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($ticket->assignee == $user->id): ?>
                                                    <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                                <?php endif; ?>
                                               
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['technician_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if(auth()->check() && auth()->user()->hasRole('Teknisi')): ?>
                                    <div class="form-group">
                                        <label>URGENCIA</label>
                                        <select class="form-control select-sla <?php $__errorArgs = ['sla_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sla_id" readonly>
                                            <option value="">- SELECCIONAR SLA -</option>
                                            <?php $__currentLoopData = $slas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($ticket->sla_id == $sla->id): ?>
                                                    <option value="<?php echo e($sla->id); ?>" selected><?php echo e($sla->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label>ASIGNADO</label>
                                    <select class="form-control select-technician <?php $__errorArgs = ['technician_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="technician_id" readonly>
                                        <option value="">- TECNICO -</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ticket->assignee == $user->id): ?>
                                                <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->name); ?></option>
                                            <?php endif; ?>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    <?php endif; ?>

                                    <?php if(auth()->check() && auth()->user()->hasAnyRole('Admin|Teknisi')): ?>
                                    <div class="form-group">
                                        <label>RESOLUCIÓN</label>
                                        <textarea name="resolution" cols="30" rows="30" class="form-control"><?php echo e(old('resolution', $ticket->resolution)); ?></textarea>
                                        <?php $__errorArgs = ['resolution'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback" style="display: block">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>ESTADO</label>
                                        <select name="status" id="status" class="form-control select-status <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                                            <option value="">-- ESTADO --</option>
                                            <option value="Asignado" <?php if($ticket->status == "Asignado"): ?> selected <?php endif; ?>>Asignado</option>
                                            <option value="Pendiente" <?php if($ticket->status == "Pendiente"): ?> selected <?php endif; ?>>Pendiente</option>
                                            <option value="Terminado" <?php if($ticket->status == "Terminado"): ?> selected <?php endif; ?>>Terminado</option>
                                        </select>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(auth()->check() && auth()->user()->hasRole('Helpdesk')): ?>
                                    <input type="hidden" name="status" id="status" value="<?php echo e($ticket->status); ?>">
                                    <?php endif; ?>
                                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> AGREGAR</button>
                                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> CANCELAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<script>
    window.addEventListener('customer-updated', event => {
        document.getElementById('updated_customer').value = event.detail.selectedCustomer;
    })
</script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\helpdesk-main\resources\views/tickets/edit.blade.php ENDPATH**/ ?>