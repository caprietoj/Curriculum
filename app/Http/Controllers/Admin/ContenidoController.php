<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContenidoRequest;
use App\Http\Requests\StoreContenidoRequest;
use App\Http\Requests\UpdateContenidoRequest;
use App\Models\Contenido;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ContenidoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contenido_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contenidos = Contenido::all();

        return view('admin.contenidos.index', compact('contenidos'));
    }

    public function create()
    {
        abort_if(Gate::denies('contenido_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contenidos.create');
    }

    public function store(StoreContenidoRequest $request)
    {
        $contenido = Contenido::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contenido->id]);
        }

        return redirect()->route('admin.contenidos.index');
    }

    public function edit(Contenido $contenido)
    {
        abort_if(Gate::denies('contenido_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contenidos.edit', compact('contenido'));
    }

    public function update(UpdateContenidoRequest $request, Contenido $contenido)
    {
        $contenido->update($request->all());

        return redirect()->route('admin.contenidos.index');
    }

    public function show(Contenido $contenido)
    {
        abort_if(Gate::denies('contenido_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contenidos.show', compact('contenido'));
    }

    public function destroy(Contenido $contenido)
    {
        abort_if(Gate::denies('contenido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contenido->delete();

        return back();
    }

    public function massDestroy(MassDestroyContenidoRequest $request)
    {
        $contenidos = Contenido::find(request('ids'));

        foreach ($contenidos as $contenido) {
            $contenido->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contenido_create') && Gate::denies('contenido_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Contenido();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
