<?php

namespace App\Http\Requests;

use App\Models\InformacionPersonal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInformacionPersonalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('informacion_personal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:informacion_personals,id',
        ];
    }
}
