@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.experience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.id') }}
                        </th>
                        <td>
                            {{ $experience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.empresa') }}
                        </th>
                        <td>
                            {{ $experience->empresa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.cargo') }}
                        </th>
                        <td>
                            {{ $experience->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.fecha_inicio') }}
                        </th>
                        <td>
                            {{ $experience->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.fecha_final') }}
                        </th>
                        <td>
                            {{ $experience->fecha_final }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.descripcion_del_cargo') }}
                        </th>
                        <td>
                            {!! $experience->descripcion_del_cargo !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection