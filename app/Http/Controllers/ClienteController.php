<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        //
        $clientes=Cliente::orderBy('id','DESC')->paginate(3);
        return view('Cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         //
         return view('Cliente.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         //
         $this->validate($request, [ 'nombre'=>'required', 'email'=>'required', 'sexo'=>'required', 'ocupacion_id'=>'required']);
         Cliente::create($request->all());
         return redirect()->route('cliente.index')->with('success', 'Registro creado satisfactoriamente');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $clientes=Cliente::find($id);
        return view('cliente.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=cliente::find($id);
        return view('cliente.edit',compact('cliente'));
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
         //
         $this->validate($request,[ 'nombre'=>'required', 'email'=>'required', 'sexo'=>'required', 'ocupacion_id'=>'required']);
         cliente::find($id)->update($request->all());
         return redirect()->route('cliente.index')->with('success','Registro actualizado satisfactoriamente');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         //
         Cliente::find($id)->delete();
         return redirect()->route('cliente.index')->with('success','Registro eliminado satisfactoriamente');
     }
}
