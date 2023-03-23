<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInformacionPersonalRequest;
use App\Http\Requests\StoreInformacionPersonalRequest;
use App\Http\Requests\UpdateInformacionPersonalRequest;
use App\Models\InformacionPersonal;
use App\Models\Language;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformacionPersonalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('informacion_personal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacionPersonals = InformacionPersonal::with(['idiomas'])->get();

        return view('admin.informacionPersonals.index', compact('informacionPersonals'));
    }

    public function create()
    {
        abort_if(Gate::denies('informacion_personal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomas = Language::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.informacionPersonals.create', compact('idiomas'));
    }

    public function store(StoreInformacionPersonalRequest $request)
    {
        $informacionPersonal = InformacionPersonal::create($request->all());

        return redirect()->route('admin.informacion-personals.index');
    }

    public function edit(InformacionPersonal $informacionPersonal)
    {
        abort_if(Gate::denies('informacion_personal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomas = Language::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $informacionPersonal->load('idiomas');

        return view('admin.informacionPersonals.edit', compact('idiomas', 'informacionPersonal'));
    }

    public function update(UpdateInformacionPersonalRequest $request, InformacionPersonal $informacionPersonal)
    {
        $informacionPersonal->update($request->all());

        return redirect()->route('admin.informacion-personals.index');
    }

    public function show(InformacionPersonal $informacionPersonal)
    {
        abort_if(Gate::denies('informacion_personal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacionPersonal->load('idiomas');

        return view('admin.informacionPersonals.show', compact('informacionPersonal'));
    }

    public function destroy(InformacionPersonal $informacionPersonal)
    {
        abort_if(Gate::denies('informacion_personal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacionPersonal->delete();

        return back();
    }

    public function massDestroy(MassDestroyInformacionPersonalRequest $request)
    {
        $informacionPersonals = InformacionPersonal::find(request('ids'));

        foreach ($informacionPersonals as $informacionPersonal) {
            $informacionPersonal->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
