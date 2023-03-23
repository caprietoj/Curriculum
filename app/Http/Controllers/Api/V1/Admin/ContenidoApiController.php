<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContenidoRequest;
use App\Http\Requests\UpdateContenidoRequest;
use App\Http\Resources\Admin\ContenidoResource;
use App\Models\Contenido;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContenidoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contenido_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContenidoResource(Contenido::all());
    }

    public function store(StoreContenidoRequest $request)
    {
        $contenido = Contenido::create($request->all());

        return (new ContenidoResource($contenido))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contenido $contenido)
    {
        abort_if(Gate::denies('contenido_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContenidoResource($contenido);
    }

    public function update(UpdateContenidoRequest $request, Contenido $contenido)
    {
        $contenido->update($request->all());

        return (new ContenidoResource($contenido))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Contenido $contenido)
    {
        abort_if(Gate::denies('contenido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contenido->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
