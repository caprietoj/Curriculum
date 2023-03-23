@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informacionPersonal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.informacion-personals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">{{ trans('cruds.informacionPersonal.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}">
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacionPersonal.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profesion">{{ trans('cruds.informacionPersonal.fields.profesion') }}</label>
                <input class="form-control {{ $errors->has('profesion') ? 'is-invalid' : '' }}" type="text" name="profesion" id="profesion" value="{{ old('profesion', '') }}">
                @if($errors->has('profesion'))
                    <span class="text-danger">{{ $errors->first('profesion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacionPersonal.fields.profesion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pagina_web">{{ trans('cruds.informacionPersonal.fields.pagina_web') }}</label>
                <input class="form-control {{ $errors->has('pagina_web') ? 'is-invalid' : '' }}" type="text" name="pagina_web" id="pagina_web" value="{{ old('pagina_web', '') }}">
                @if($errors->has('pagina_web'))
                    <span class="text-danger">{{ $errors->first('pagina_web') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacionPersonal.fields.pagina_web_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.informacionPersonal.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacionPersonal.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.informacionPersonal.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacionPersonal.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idiomas_id">{{ trans('cruds.informacionPersonal.fields.idiomas') }}</label>
                <select class="form-control select2 {{ $errors->has('idiomas') ? 'is-invalid' : '' }}" name="idiomas_id" id="idiomas_id">
                    @foreach($idiomas as $id => $entry)
                        <option value="{{ $id }}" {{ old('idiomas_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('idiomas'))
                    <span class="text-danger">{{ $errors->first('idiomas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacionPersonal.fields.idiomas_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection