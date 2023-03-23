<?php

namespace App\Http\Requests;

use App\Models\Contenido;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContenidoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contenido_create');
    }

    public function rules()
    {
        return [];
    }
}
