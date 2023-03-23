@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.experience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.experiences.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="empresa">{{ trans('cruds.experience.fields.empresa') }}</label>
                <input class="form-control {{ $errors->has('empresa') ? 'is-invalid' : '' }}" type="text" name="empresa" id="empresa" value="{{ old('empresa', '') }}">
                @if($errors->has('empresa'))
                    <span class="text-danger">{{ $errors->first('empresa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cargo">{{ trans('cruds.experience.fields.cargo') }}</label>
                <input class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" type="text" name="cargo" id="cargo" value="{{ old('cargo', '') }}">
                @if($errors->has('cargo'))
                    <span class="text-danger">{{ $errors->first('cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">{{ trans('cruds.experience.fields.fecha_inicio') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}">
                @if($errors->has('fecha_inicio'))
                    <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.fecha_inicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_final">{{ trans('cruds.experience.fields.fecha_final') }}</label>
                <input class="form-control date {{ $errors->has('fecha_final') ? 'is-invalid' : '' }}" type="text" name="fecha_final" id="fecha_final" value="{{ old('fecha_final') }}">
                @if($errors->has('fecha_final'))
                    <span class="text-danger">{{ $errors->first('fecha_final') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.fecha_final_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion_del_cargo">{{ trans('cruds.experience.fields.descripcion_del_cargo') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('descripcion_del_cargo') ? 'is-invalid' : '' }}" name="descripcion_del_cargo" id="descripcion_del_cargo">{!! old('descripcion_del_cargo') !!}</textarea>
                @if($errors->has('descripcion_del_cargo'))
                    <span class="text-danger">{{ $errors->first('descripcion_del_cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.descripcion_del_cargo_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.experiences.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $experience->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection