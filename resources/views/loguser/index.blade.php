@extends('layouts.app')

@section('content')
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
                    <form action="{{ route('userlog.index') }}" method="GET">
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
                            @foreach ($logs as $no => $log)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($logs->currentPage()-1) * $logs->perPage() }}</th>
                                    <td>{{ $user->getName($log->user_id) }}</td>
                                    <td>{{ $log->log }}</td>
                                    <td>{{ $log->ip }}</td>
                                    <td>{{ $log->browser }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$logs->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


@stop