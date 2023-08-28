<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Clientes;
use Illuminate\Support\Facades\DB; // Importa la fachada de DB

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clientes = clientes::all();
        return view('cliente.index')->with('Clientes', $Clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new clientes();
        $clientes->nombre = $request->get('nombre');
        $clientes->apellido = $request->get('apellido');
        $clientes->dni = $request->get('dni');
        $clientes->telefono = $request->get('telefono');
        $clientes->domicilio = $request->get('domicilio');
        $clientes->patente = $request->get('patente');
        $clientes->save();
        return redirect('/clientes');
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
             $cliente = clientes::find($id);
             return view('cliente.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = clientes::find($id);
        $cliente->nombre = $request->get('nombre');
        $cliente->apellido = $request->get('apellido');
        $cliente->dni = $request->get('dni');
        $cliente->telefono = $request->get('telefono');
        $cliente->domicilio = $request->get('domicilio');
        $cliente->patente = $request->get('patente');
        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::find($id);
        $cliente->delete();
        return redirect('/clientes');
    }

    public function obtenerNombreCliente($clienteId) {
        $cliente = Clientes::find($clienteId);
        return response()->json(['nombre' => $cliente->nombre]);
    }
    
    public function buscar(Request $request)
    {
        
        $searchTerm = $request->input('buscarCliente');
        
        $searchTermNumeric = intval($searchTerm);
       // dd($searchTerm); // Verifica si $searchTerm se recibe correctamente
        // Llama al procedimiento almacenado para buscar clientes
        $resultados = DB::select('CALL buscar_clientes(?)', [$searchTermNumeric]);
        
        return response()->json(['resultados' => $resultados]);
    }
}
