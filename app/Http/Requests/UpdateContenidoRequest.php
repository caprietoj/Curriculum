<?php

namespace App\Http\Requests;

use App\Models\Contenido;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContenidoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contenido_edit');
    }

    public function rules()
    {
        return [];
    }
}
