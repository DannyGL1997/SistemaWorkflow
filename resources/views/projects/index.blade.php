@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proyectos</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bell"></i> Proyectos</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('projects.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('projects.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('projects.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> NUEVO</a>
                                    </div>
                                @endcan
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
                                <th scope="col">PROYECTO</th>
                                <th scope="col">AREA</th>
                                <th scope="col">INICIO</th>
                                <th scope="col">FINALIZACIÓN</th>
                                <th scope="col">INICIO DE INSTALACIÓN</th>
                                <th scope="col">FINALIZACIÓN DE INSTALACIÓN</th>
                                <th scope="col">INICIO DE PRUEBAS</th>
                                <th scope="col">FINALIZACIÓN DE PRUEBAS</th>
                                <th scope="col">INICIO DE PAGO</th>
                                <th scope="col">FINAL DE PAGO</th>
                                <th scope="col">GARANTIA (MESES)</th>
                                <th scope="col">INICIO DE CONTRATO</th>
                                <th scope="col">PERIODO DE CONTRATO (MESES)</th>
                                <th scope="col" style="width: 15%;text-align: center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $no => $project)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($projects->currentPage()-1) * $projects->perPage() }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $customer->getName($project->customer_id) }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->deliverystart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->deliveryend)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->installstart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->installend)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->uatstart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->uatend)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->billstart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->billdue)->format('d M Y') }}</td>
                                    <td>{{ $project->warrantyperiod }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->contractstart)->format('d M Y') }}</td>
                                    <td>{{ $project->contractperiod }}</td>
                                    <td class="text-center">
                                        @can('projects.edit')
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('projects.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $project->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$projects->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "¿ESTÁ SEGURO?",
                text: "QUIERES ELIMINAR ESTOS DATOS!",
                icon: "warning",
                buttons: [
                    'NO',
                    'SI'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("projects.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'EXITOSO!',
                                    text: 'DATOS BORRADOS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'FALLO!',
                                    text: 'LOS DATOS NO SE PUDIERON ELIMINAR!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop