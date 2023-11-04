<div>
    <div class="form-group">
        <label>AREAS</label>
        <select wire:model="selectedCustomer" class="form-control">
                <option value ="">- SELECCIONA AREA-</option>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <?php if(!is_null($projects)): ?>
        <div class="form-group">
                <label>PROYECTO</label>
                <select class="form-control" wire:model="selectedProject">
                    <option value="">- SELECCIONA PROYECTO-</option>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
        </div>

        <?php if(!is_null($customerProject)): ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>PERIODO DE GARANTIA</label>
                        <?php echo e($customerProject['warrantyperiod']); ?> MESES
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>PERIODO DE CONTRATO</label>
                        <?php echo e($customerProject['warrantyperiod']); ?> MESES
                    </div>  
                </div>
            </div>
        <?php endif; ?>

        <hr>
        
    <?php endif; ?>

</div>
<?php /**PATH C:\laragon\www\helpdesk-main\resources\views/livewire/customer-project.blade.php ENDPATH**/ ?>