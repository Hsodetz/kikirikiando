<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use waynakay\Father;
use RealRashid\SweetAlert\Facades\Alert;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtenemos todos los regisros, ordenamos por id y paginamos.
        $fathers = Father::orderBy('id', 'DESC')->paginate(10);

        //Retornamos a la vista index, y le enviamos los datos fathers.
        return view('admin.fathers.index', compact('fathers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.fathers.create', compact('boton'));
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
        $father = new Father;

        $father->name       = $request->name;
        $father->lastname   = $request->lastname;
        $father->city       = $request->city;
        $father->email      = $request->email;
        $father->password   = bcrypt($request->password);
        $father->phone      = $request->phone;
        
        $father->save();

        //alerta creada con un toast de la libreria sweet alert 2
        Alert::toast('Padre Creado Satisfactoriamente', 'success', 'top-right')->autoclose(5000);
        return redirect()->route('padres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $father = Father::findOrFail($id);
        //Retornamos a la vista show, y le pasamos los datos 
        return view('admin.fathers.show', compact('father'));

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
        $father = Father::findOrFail($id);

        return view('admin.fathers.edit', compact('father', 'boton'));
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
        $father = Father::findOrFail($id);
        $father->update($request->all());

        Alert::toast('El padre se actualizo correctamente', 'info', 'top-right')->autoclose(5000);
        return redirect()->route('padres.index');
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
        $father = Father::findOrFail($id);
        $father->delete();

        Alert::toast("El padre $father->name se ha eliminado satisfactoriamente!", 'success', 'top-right')->autoclose(5000);
        return redirect()->route('padres.index');
    }
}
