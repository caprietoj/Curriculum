@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hability.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.habilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hability.fields.id') }}
                        </th>
                        <td>
                            {{ $hability->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hability.fields.nombre') }}
                        </th>
                        <td>
                            {{ $hability->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hability.fields.descripcion') }}
                        </th>
                        <td>
                            {!! $hability->descripcion !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.habilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection