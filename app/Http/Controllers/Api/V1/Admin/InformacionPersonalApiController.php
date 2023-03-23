<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInformacionPersonalRequest;
use App\Http\Requests\UpdateInformacionPersonalRequest;
use App\Http\Resources\Admin\InformacionPersonalResource;
use App\Models\InformacionPersonal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformacionPersonalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('informacion_personal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformacionPersonalResource(InformacionPersonal::with(['idiomas'])->get());
    }

    public function store(StoreInformacionPersonalRequest $request)
    {
        $informacionPersonal = InformacionPersonal::create($request->all());

        return (new InformacionPersonalResource($informacionPersonal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InformacionPersonal $informacionPersonal)
    {
        abort_if(Gate::denies('informacion_personal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformacionPersonalResource($informacionPersonal->load(['idiomas']));
    }

    public function update(UpdateInformacionPersonalRequest $request, InformacionPersonal $informacionPersonal)
    {
        $informacionPersonal->update($request->all());

        return (new InformacionPersonalResource($informacionPersonal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InformacionPersonal $informacionPersonal)
    {
        abort_if(Gate::denies('informacion_personal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacionPersonal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
