<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // Importa la clase DB
use Carbon\Carbon;
use App\Models\AlquilerCamping;
use Illuminate\Http\Request;

class AlquilerCampingController extends Controller
{
    public function index()
{
    $reservas = DB::select('CALL obtenerAlquileresCamping()');
    return view('alquilerCamping')->with('Alquileres', $reservas);
}
}
