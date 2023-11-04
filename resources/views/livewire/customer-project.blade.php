<div>
    <div class="form-group">
        <label>AREAS</label>
        <select wire:model="selectedCustomer" class="form-control">
                <option value ="">- SELECCIONA AREA-</option>
            @foreach ($customers as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    @if (!is_null($projects))
        <div class="form-group">
                <label>PROYECTO</label>
                <select class="form-control" wire:model="selectedProject">
                    <option value="">- SELECCIONA PROYECTO-</option>
                    @foreach ($projects as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
        </div>

        @if (!is_null($customerProject))
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>PERIODO DE GARANTIA</label>
                        {{ $customerProject['warrantyperiod'] }} MESES
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>PERIODO DE CONTRATO</label>
                        {{ $customerProject['warrantyperiod'] }} MESES
                    </div>  
                </div>
            </div>
        @endif

        <hr>
        
    @endif

</div>
