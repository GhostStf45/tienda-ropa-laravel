@extends('home')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar tipo de ropa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('tiposRopa.update', ['id' => $tipoRopa->id]) }}" method="post" class="row">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="_method" value="put" />
                    <div class="mb-3">
                        <label class="form-label">Nombre del tipo de ropa</label>
                        <input type="text" class="form-control" id="nombre_del_producto" name="nombre_del_producto"  @error('nombre_del_producto') is-invalid @enderror value="{{ $tipoRopa->nombre_del_producto }}" />
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
