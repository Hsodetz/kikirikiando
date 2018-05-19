<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use waynakay\Student;
use waynakay\School;
use waynakay\Father;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listamos todos los registros de los estudiantes, lo ordenamos por id y paginamos
        $students = Student::orderBy('id', 'DESC')->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fathers = Father::orderBy('name', 'ASC')->pluck('name', 'id');
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.students.create', compact('fathers', 'schools'));
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
        $student = Student::create($request->all());

        Alert::toast("El estudiante {$student->name} se ha creado correctamente!", 'success', 'top-right')->autoclose(8000);
        return redirect()->route('estudiantes.index');
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
        $student = Student::findOrfail($id);

        return view('admin.students.show', compact('student'));
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
        $student = Student::findOrFail($id);

        $fathers = Father::orderBy('name', 'ASC')->pluck('name', 'id');
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.students.edit', compact('student', 'fathers', 'schools'));
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
        $student = Student::findOrFail($id);
        $student->update($request->all());

        Alert::toast("El estudiante {$student->name} se ha actializado correctamente!", 'info', 'top-right')->autoclose(8000);
        return redirect()->route('estudiantes.index');
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
        $student = Student::findOrFail($id);
        $student->delete();

        Alert::toast("El estudiante {$student->name} se ha eliminado correctamente", 'success', 'top-right')->autoclose(10000);
        return redirect()->route('estudiantes.index');
    }
}
