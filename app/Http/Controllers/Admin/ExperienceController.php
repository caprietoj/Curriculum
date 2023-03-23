<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExperienceRequest;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Models\Experience;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExperienceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiences = Experience::all();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.experiences.create');
    }

    public function store(StoreExperienceRequest $request)
    {
        $experience = Experience::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $experience->id]);
        }

        return redirect()->route('admin.experiences.index');
    }

    public function edit(Experience $experience)
    {
        abort_if(Gate::denies('experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->all());

        return redirect()->route('admin.experiences.index');
    }

    public function show(Experience $experience)
    {
        abort_if(Gate::denies('experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.experiences.show', compact('experience'));
    }

    public function destroy(Experience $experience)
    {
        abort_if(Gate::denies('experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experience->delete();

        return back();
    }

    public function massDestroy(MassDestroyExperienceRequest $request)
    {
        $experiences = Experience::find(request('ids'));

        foreach ($experiences as $experience) {
            $experience->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('experience_create') && Gate::denies('experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Experience();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
