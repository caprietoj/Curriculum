@extends('layouts.admin')
@section('content')
@can('informacion_personal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.informacion-personals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.informacionPersonal.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informacionPersonal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-InformacionPersonal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.profesion') }}
                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.pagina_web') }}
                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.informacionPersonal.fields.idiomas') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($informacionPersonals as $key => $informacionPersonal)
                        <tr data-entry-id="{{ $informacionPersonal->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $informacionPersonal->id ?? '' }}
                            </td>
                            <td>
                                {{ $informacionPersonal->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $informacionPersonal->profesion ?? '' }}
                            </td>
                            <td>
                                {{ $informacionPersonal->pagina_web ?? '' }}
                            </td>
                            <td>
                                {{ $informacionPersonal->email ?? '' }}
                            </td>
                            <td>
                                {{ $informacionPersonal->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $informacionPersonal->idiomas->nombre ?? '' }}
                            </td>
                            <td>
                                @can('informacion_personal_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.informacion-personals.show', $informacionPersonal->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('informacion_personal_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.informacion-personals.edit', $informacionPersonal->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('informacion_personal_delete')
                                    <form action="{{ route('admin.informacion-personals.destroy', $informacionPersonal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('informacion_personal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.informacion-personals.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-InformacionPersonal:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection