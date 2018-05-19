<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use waynakay\Teacher;
use waynakay\School;
use RealRashid\SweetAlert\Facades\Alert;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::orderBy('id', 'DESC')->paginate(10);

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools = School::orderBy('id', 'DESC')->pluck('name', 'id');
        $boton = 'Guardar'; $icon = 'fa fa-save';
        return view('admin.teachers.create', compact('schools', 'boton', 'icon'));
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
        $teacher = Teacher::create($request->all());

        Alert::toast('El profesor se ha creado satisfactoriamente!', 'success', 'top-right');
        return redirect()->route('profesores.index');
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
        $teacher = Teacher::findOrFail($id);
        
        return view('admin.teachers.show', compact('teacher'));
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
        $teacher = Teacher::findOrFail($id);
        $schools = School::orderBy('id', 'DESC')->pluck('name', 'id');
        $boton = 'Actualizar'; $icon = 'fa fa-pencil';
        return view('admin.teachers.edit', compact('teacher', 'schools', 'boton', 'icon'));
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
        $teacher = Teacher::findOrFail($id);

        $teacher->update($request->all());

        Alert::toast('El profesor se ha actualizado satisfactoriamente!', 'info', 'top-right');
        return redirect()->route('profesores.index');
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
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        Alert::toast("El profesor {$teacher->name} se ha eliminado correctamente!", 'success', 'bottom-right');
        return redirect()->route('profesores.index');
    }
}
