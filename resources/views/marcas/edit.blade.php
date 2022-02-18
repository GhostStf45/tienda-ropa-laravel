@extends('home')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar marca</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="row">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="mb-3">
                        <label class="form-label">Nombre de la marca</label>
                        <input type="text" class="form-control" id="nombre_marca" name="nombre_marca"  @error('nombre_marca') is-invalid @enderror value="{{ $marca->nombre_marca }}" />
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
