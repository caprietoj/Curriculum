<?php

namespace App\Http\Requests;

use App\Models\Hability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHabilityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hability_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
        ];
    }
}
