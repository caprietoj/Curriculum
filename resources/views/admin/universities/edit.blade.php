@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.university.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.universities.update", [$university->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nombre_de_la_institucion">{{ trans('cruds.university.fields.nombre_de_la_institucion') }}</label>
                <input class="form-control {{ $errors->has('nombre_de_la_institucion') ? 'is-invalid' : '' }}" type="text" name="nombre_de_la_institucion" id="nombre_de_la_institucion" value="{{ old('nombre_de_la_institucion', $university->nombre_de_la_institucion) }}">
                @if($errors->has('nombre_de_la_institucion'))
                    <span class="text-danger">{{ $errors->first('nombre_de_la_institucion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.nombre_de_la_institucion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titulo">{{ trans('cruds.university.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', $university->titulo) }}">
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">{{ trans('cruds.university.fields.fecha_inicio') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', $university->fecha_inicio) }}">
                @if($errors->has('fecha_inicio'))
                    <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.fecha_inicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_final">{{ trans('cruds.university.fields.fecha_final') }}</label>
                <input class="form-control date {{ $errors->has('fecha_final') ? 'is-invalid' : '' }}" type="text" name="fecha_final" id="fecha_final" value="{{ old('fecha_final', $university->fecha_final) }}">
                @if($errors->has('fecha_final'))
                    <span class="text-danger">{{ $errors->first('fecha_final') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.fecha_final_helper') }}</span>
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