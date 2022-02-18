@extends('home')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Vendedores</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar vendedores</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Celular</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Direccion</th>
                                    <th>Estado</th>
                                    <th width="45%">Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Celular</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Direccion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $vendedores as $vendedor)
                                    <tr>
                                        <td>{{ $vendedor->id }}</td>
                                        <td>{{ $vendedor->DNI }}</td>
                                        <td>{{ $vendedor->nombre }}</td>
                                        <td>{{ $vendedor->apellido }}</td>
                                        <td>{{ $vendedor->celular }}</td>
                                        <td>{{ $vendedor->fecha_nacimiento }}</td>
                                        <td>{{ $vendedor->direccion }}</td>
                                        @if($vendedor->Estado == 1)
                                            <td class="badge bg-success my-2 mx-2">Habilitado</td>
                                        @endif
                                        @if($vendedor->Estado == 0)
                                            <td class="badge bg-danger my-2 mx-2">Inhabilitado</td>
                                        @endif


                                        <td>
                                            <a href="{{ route('vendedores.show', ['id' => $vendedor->id]) }}" class=" btn btn-primary my-1 mx-1 btn-sm">Editar</a>
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
                        <h6 class="m-0 font-weight-bold text-primary">Agregar vendedor</h6>
                    </div>
                <div class="card-body">
                    <form action="{{url('/vendedores/crear')}}" method="post" class="row">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"  @error('nombre') is-invalid @enderror />
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"  @error('apellido') is-invalid @enderror/>
                            @error('apellido')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Celular</label>
                            <input type="number" class="form-control" id="celular" name="celular"  @error('celular') is-invalid @enderror/>
                            @error('celular')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" @error('direccion') is-invalid @enderror />
                            @error('direccion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">DNI</label>
                            <input type="number" class="form-control" id="dni" name="dni" @error('dni') is-invalid @enderror />
                            @error('dni')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" @error('dni') is-invalid @enderror/>
                            @error('fecha_nacimiento')
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
