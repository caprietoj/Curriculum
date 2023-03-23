<?php

namespace App\Http\Requests;

use App\Models\Experience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('experience_edit');
    }

    public function rules()
    {
        return [
            'empresa' => [
                'string',
                'nullable',
            ],
            'cargo' => [
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
