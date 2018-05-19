<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use waynakay\School;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtenemos todos los registros de las ecuelas, ordenamos en forma descendente por id y paginamos de 10
        $schools = School::orderBy('id', 'DESC')->paginate(10);
        //Retornamos a la vista index de schools y le pasamos los datos en la variable schools.
        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retornamos a la vista, donde mostraremos el formulario de creacion.
        return view('admin.schools.create');
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
        $school = School::create($request->all());
        //Le pasamos la alerta de haberse creado correctamente el registro.!
        Alert::toast("El colegio {$school->name} ha sido creado correctamente!", 'succes', 'bottom-right')->autoclose(8000);
        //Retornamos redireccionando al metodo index del controlador schoolcontroller.
        return redirect()->route('colegios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Buscamos el id y lo metemos en la variable school
        $school = School::findOrFail($id);
        //retornamos a la vista show de schools y le pasamos los datos por la variable school.
        return view('admin.schools.show', compact('school'));
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
        $school = School::findOrFail($id);

        return view('admin.schools.edit', compact('school'));

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
        $school = School::findOrFail($id);
        $school->update($request->all());

        Alert::toast("El colegio {$school->name} se ha actualizado correctamente!", 'info', 'top-right');
        return redirect()->route('colegios.index');
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
        $school = School::findOrFail($id);
        $school->delete();

        Alert::toast("El colegio {$school->name} se ha eliminado correctamente!", 'succes', 'top-right');
        return back();
    }
}
