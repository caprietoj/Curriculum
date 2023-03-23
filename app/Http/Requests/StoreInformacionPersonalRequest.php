<?php

namespace App\Http\Requests;

use App\Models\InformacionPersonal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInformacionPersonalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('informacion_personal_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
            'profesion' => [
                'string',
                'nullable',
            ],
            'pagina_web' => [
                'string',
                'nullable',
            ],
            'telefono' => [
                'string',
                'nullable',
            ],
        ];
    }
}
