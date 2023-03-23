<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformacionPersonal extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'informacion_personals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'profesion',
        'pagina_web',
        'email',
        'telefono',
        'idiomas_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function idiomas()
    {
        return $this->belongsTo(Language::class, 'idiomas_id');
    }
}
