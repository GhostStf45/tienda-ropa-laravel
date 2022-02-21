@extends('home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tipos de ropa</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar tipos de ropa</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre del tipo de ropa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre del tipo de ropa</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $tiposRopa as $tipoRopa)
                                    <tr>
                                        <td>{{ $tipoRopa->id }}</td>
                                        <td>{{ $tipoRopa->nombre_del_producto}}</td>
                                        <td>
                                            <a href="{{ route('tiposRopa.show', ['id' => $tipoRopa->id]) }}" class=" btn btn-primary my-1 mx-1 btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
        <!--Pagination-->
        <div id="pagination" class="mt-3 d-flex align-items-center justify-content-md-center col-md-12">
            {{$tiposRopa->appends(request()->except('page'))->links()}}
        </div>
        <!--End pagination-->
    </div>
    <div class="col-md-4">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Agregar tipo de ropa</h6>
                    </div>
                <div class="card-body">
                    <form action="{{url('/tiposRopa/crear')}}" method="post" class="row">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                            <label class="form-label">Nombre del tipo</label>
                            <input type="text" class="form-control" id="nombre_del_producto" name="nombre_del_producto"  @error('nombre_del_producto') is-invalid @enderror />
                            @error('nombre_del_producto')
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
