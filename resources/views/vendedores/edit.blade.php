@extends('home')

@section('content')
<div class="row">

    <div class="col-md-6 mx-auto">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Actualizar vendedor</h6>
            </div>
        <div class="card-body">
            <form action="{{ route('vendedores.update',['id' => $vendedor->id])}}" method="post" class="row">
                @csrf <!-- {{ csrf_field() }} -->
                <input type="hidden" name="_method" value="put" />
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  @error('nombre') is-invalid @enderror value="{{ $vendedor->nombre }}"/>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido"  @error('apellido') is-invalid @enderror value="{{ $vendedor->apellido }}"/>
                    @error('apellido')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Celular</label>
                    <input type="number" class="form-control" id="celular" name="celular"  @error('celular') is-invalid @enderror value="{{ $vendedor->celular }}"/>
                    @error('celular')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" @error('direccion') is-invalid @enderror value="{{ $vendedor->direccion }}" />
                    @error('direccion')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">DNI</label>
                    <input type="number" class="form-control" id="dni" name="dni" @error('dni') is-invalid @enderror value="{{ $vendedor->DNI }}" />
                    @error('dni')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" @error('dni') is-invalid @enderror value="{{ $vendedor->fecha_nacimiento }}"/>
                    @error('fecha_nacimiento')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select class="form-select" aria-label="Default select example" name="estado">
                        @if($vendedor->Estado == 1 ){
                            <option selected value="1">Habilitado</option>
                            <option  value="0">Deshabilitado</option>
                        }
                        @endif
                        @if($vendedor->Estado == 0 ){
                            <option  value="1">Habilitado</option>
                            <option selected value="0">Deshabilitado</option>
                        }
                        @endif
                    </select>
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
