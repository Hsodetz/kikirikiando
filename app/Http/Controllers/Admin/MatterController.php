<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use waynakay\Matter;
use waynakay\School;
use waynakay\Teacher;

use RealRashid\SweetAlert\Facades\Alert;

class MatterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matters = Matter::orderBy('id', 'DESC')->paginate(10);

        return view('admin.matters.index', compact('matters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos los registros (columna nombre e id) de schools y teachers, y lo pasamos a la vista create
        $schools    = School::orderBy('name', 'ASC')->pluck('name', 'id');
        $teachers   = Teacher::orderBy('name', 'ASC')->pluck('name', 'id'); 
        return view('admin.matters.create', compact('schools', 'teachers'));
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
        $matter = Matter::create($request->all());

        Alert::toast("La materia {$matter->name} se ha creado correctamente!", 'succes', 'top-right')->autoclose(8000);
        return redirect()->route('materias.index');
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
        $matter = Matter::findOrFail($id);

        return view('admin.matters.show', compact('matter'));
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
        $matter = Matter::findOrFail($id);

        //Obtenemos los registros (columna nombre e id) de schools y teachers, y lo pasamos a la vista create
        $schools    = School::orderBy('name', 'ASC')->pluck('name', 'id');
        $teachers   = Teacher::orderBy('name', 'ASC')->pluck('name', 'id'); 

        return view('admin.matters.edit', compact('matter', 'schools', 'teachers'));
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
        $matter = Matter::findOrFail($id);
        $matter->update($request->all());

        Alert::toast("La materia {$matter->name} se ha actualizado correctamente!", 'info', 'top-right')->autoclose(8000);
        return redirect()->route('materias.index');
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
        $matter = Matter::findOrFail($id);
        $matter->delete();

        Alert::toast("La materia {$matter->name} se ha eliminado correctamente!", 'success', 'top-right')->autoclose(10000);
        return redirect()->route('materias.index');
    }
}
