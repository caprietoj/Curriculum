<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHabilityRequest;
use App\Http\Requests\UpdateHabilityRequest;
use App\Http\Resources\Admin\HabilityResource;
use App\Models\Hability;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HabilityApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hability_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HabilityResource(Hability::all());
    }

    public function store(StoreHabilityRequest $request)
    {
        $hability = Hability::create($request->all());

        return (new HabilityResource($hability))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hability $hability)
    {
        abort_if(Gate::denies('hability_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HabilityResource($hability);
    }

    public function update(UpdateHabilityRequest $request, Hability $hability)
    {
        $hability->update($request->all());

        return (new HabilityResource($hability))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hability $hability)
    {
        abort_if(Gate::denies('hability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hability->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
