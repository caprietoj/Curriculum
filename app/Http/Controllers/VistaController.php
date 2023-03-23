<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use App\Models\Experience;
use App\Models\Hability;
use App\Models\InformacionPersonal;
use App\Models\Language;
use App\Models\University;

use Illuminate\Http\Request;


class VistaController extends Controller
{
    public function index(){

        $contenido = Contenido::all();
        $experiencia = Experience::all();
        $habilidad = Hability::all();
        $informacion = InformacionPersonal::all();
        $idioma = Language::all();
        $universidad = University::all();

        return view('perfil.index', compact('contenido', 'experiencia', 'habilidad', 'informacion', 'idioma', 'universidad'));
    }
}
