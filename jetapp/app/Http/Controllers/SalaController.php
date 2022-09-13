<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use Illuminate\Support\Facades\Validator;

class SalaController extends Controller
{
    public function postHome()
    {
        return Request::input('hrinicio');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salas = Sala::all();
        return view('sala.index')->with('salas',$salas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'asientos' => 'required',
            'hrinicio' => 'required',
            'hrfin' => 'required',
        ];

        $messages = [
            'nombre' => 'Debe poner un nombre',
            'descripcion' => 'Debe poner una descripcion',
            'asientos' => 'Debe poner No. de asientos',
            'hrinicio' => 'Debe poner hora inicial',
            'hrfin' => 'Debe poner hora final',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $salas = new Sala();

        $salas -> nombre = $request->get('nombre');
        $salas -> descripcion = $request->get('descripcion');
        $salas -> asientos = $request->get('asientos');
        $salas -> hrinicio = $request->get('hrinicio');
        $salas -> hrfin = $request->get('hrfin');

        $salas->save();

        

        

        

        return redirect('/salas');
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::find($id);
        return view('sala.edit')->with('sala', $sala);
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

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'asientos' => 'required',
            'hrinicio' => 'required',
            'hrfin' => 'required',
        ];

        $messages = [
            'nombre' => 'Debe poner un nombre',
            'descripcion' => 'Debe poner una descripcion',
            'asientos' => 'Debe poner No. de asientos',
            'hrinicio' => 'Debe poner hora inicial',
            'hrfin' => 'Debe poner hora final',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $sala = Sala::find($id);

        $sala -> nombre = $request->get('nombre');
        $sala -> descripcion = $request->get('descripcion');
        $sala -> asientos = $request->get('asientos');
        $sala -> hrinicio = $request->get('hrinicio');
        $sala -> hrfin = $request->get('hrfin');

        $sala->save();

        return redirect('/salas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::find($id);
        $sala->delete();
        return redirect('/salas');
    }
}
