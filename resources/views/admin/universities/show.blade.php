@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.university.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.universities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.id') }}
                        </th>
                        <td>
                            {{ $university->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.nombre_de_la_institucion') }}
                        </th>
                        <td>
                            {{ $university->nombre_de_la_institucion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.titulo') }}
                        </th>
                        <td>
                            {{ $university->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.fecha_inicio') }}
                        </th>
                        <td>
                            {{ $university->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.fecha_final') }}
                        </th>
                        <td>
                            {{ $university->fecha_final }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.universities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection