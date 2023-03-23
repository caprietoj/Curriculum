<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHabilityRequest;
use App\Http\Requests\StoreHabilityRequest;
use App\Http\Requests\UpdateHabilityRequest;
use App\Models\Hability;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HabilityController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hability_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $habilities = Hability::all();

        return view('admin.habilities.index', compact('habilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('hability_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habilities.create');
    }

    public function store(StoreHabilityRequest $request)
    {
        $hability = Hability::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hability->id]);
        }

        return redirect()->route('admin.habilities.index');
    }

    public function edit(Hability $hability)
    {
        abort_if(Gate::denies('hability_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habilities.edit', compact('hability'));
    }

    public function update(UpdateHabilityRequest $request, Hability $hability)
    {
        $hability->update($request->all());

        return redirect()->route('admin.habilities.index');
    }

    public function show(Hability $hability)
    {
        abort_if(Gate::denies('hability_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habilities.show', compact('hability'));
    }

    public function destroy(Hability $hability)
    {
        abort_if(Gate::denies('hability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hability->delete();

        return back();
    }

    public function massDestroy(MassDestroyHabilityRequest $request)
    {
        $habilities = Hability::find(request('ids'));

        foreach ($habilities as $hability) {
            $hability->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hability_create') && Gate::denies('hability_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hability();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
