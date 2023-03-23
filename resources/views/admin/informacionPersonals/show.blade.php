@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informacionPersonal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.informacion-personals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.id') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.nombre') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.profesion') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->profesion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.pagina_web') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->pagina_web }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.email') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.telefono') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.idiomas') }}
                        </th>
                        <td>
                            {{ $informacionPersonal->idiomas->nombre ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.informacion-personals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection