<?php

namespace App\Http\Requests;

use App\Models\Contenido;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContenidoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contenido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contenidos,id',
        ];
    }
}
