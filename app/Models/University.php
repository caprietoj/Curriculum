<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'universities';

    protected $dates = [
        'fecha_inicio',
        'fecha_final',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre_de_la_institucion',
        'titulo',
        'fecha_inicio',
        'fecha_final',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getFechaInicioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinalAttribute($value)
    {
        $this->attributes['fecha_final'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
