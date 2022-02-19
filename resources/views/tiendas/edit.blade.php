@extends('home')

@section('content')
<div class="col-md-6">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modificar tienda</h6>
            </div>
        <div class="card-body">
            <form action="{{ route('tiendas.update',['id' => $tienda->id]) }}" method="post" class="row">
                @csrf <!-- {{ csrf_field() }} -->
                <input type="hidden" name="_method" value="put" />
                <div class="mb-3">
                    <label class="form-label">Nombre de la tienda</label>
                    <input type="text" class="form-control" id="nombre_tienda" name="nombre_tienda"  @error('nombre_tienda') is-invalid @enderror value="{{ $tienda->nombre_tienda }}" />
                    @error('nombre_tienda')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Alquiler</label>
                    <input type="text" class="form-control" id="alquiler" name="alquiler"  @error('alquiler') is-invalid @enderror value="{{ $tienda->alquiler }}" />
                    @error('alquiler')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción (Ubicación)</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ $tienda->descripcion }}</textarea>
                    @error('descripcion')
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
@endsection
