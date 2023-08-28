<?php




namespace App\Http\Controllers;
use App\Models\Apart; 
use App\Models\ReservasAparts;

use Illuminate\Http\Request;

class reservasApartsController extends Controller
{
    public function index()
    {
        return view('simple_view');
    }
    
    public function show($id)
    {
        // Lógica para mostrar un recurso específico
    }
    
    public function create()
    {
        // Lógica para mostrar el formulario de creación
    }
    
    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo recurso
    }
    
    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición
    }
    
    public function update(Request $request, $id)
    {
        // Encuentra el registro que deseas actualizar
    $apart = Apart::findOrFail($id);


    }
    
    public function destroy($id)
    {
        // Lógica para eliminar un recurso
    }
    
}
