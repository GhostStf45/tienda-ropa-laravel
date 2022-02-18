@extends('home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Marcas</h1>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif

<div class="row">
    <div class="col-md-8">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar marcas</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de la marca</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de la marca</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $marcas as $marca)
                                    <tr>
                                        <td>{{ $marca->id }}</td>
                                        <td>{{ $marca->nombre_marca}}</td>
                                        <td>
                                            <a href="{{ route('marcas.show', ['id' => $marca->id]) }}" class=" btn btn-primary my-1 mx-1 btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
    <div class="col-md-4">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Agregar marca</h6>
                    </div>
                <div class="card-body">
                    <form action="{{url('/marcas/crear')}}" method="post" class="row">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                            <label class="form-label">Nombre de la marca</label>
                            <input type="text" class="form-control" id="nombre_marca" name="nombre_marca"  @error('nombre_marca') is-invalid @enderror />
                            @error('nombre_marca')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer d-block">
                            <button type="submit" id="#ajaxSubmit" class="btn btn-block btn-primary float-end">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>

@endsection
