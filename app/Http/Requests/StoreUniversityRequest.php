<?php

namespace App\Http\Requests;

use App\Models\University;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUniversityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('university_create');
    }

    public function rules()
    {
        return [
            'nombre_de_la_institucion' => [
                'string',
                'nullable',
            ],
            'titulo' => [
                'string',
                'nullable',
            ],
            'fecha_inicio' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_final' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
