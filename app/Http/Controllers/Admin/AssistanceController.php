<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use waynakay\Assistance;
use waynakay\Matter;
use waynakay\Student;
use RealRashid\SweetAlert\Facades\Alert;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assistances = Assistance::orderBy('id', 'DESC')->paginate(10);
        return view('admin.assistances.index', compact('assistances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $matters      = Matter::get();
        $students     = Student::get();
        return view('admin.assistances.create', compact('matters', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i=0; $i <= $request->student; $i++) {
          // code...

            $assistance = new Assistance;
            $assistance->matter_id          = $request->matter[$id];

            $assistance->student_id         = $request->student[$id];

            $assistance->assistance_result  = $request->assistance_result[$id];
            $assistance->date_time          = $request->date_time[$id];

            //dd($request->matter[$i], $request->student[$i], $request->assistance_result[$i], $request->date_time[$i]);

            $assistance->save();
          }
        Alert::toast('La asistencia se ha creado correctamente!', 'success', 'top-right')->autoclose(8000);
        return redirect()->route('asistencias.index', compact('assistance'));
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
        $assistance = Assistance::findOrFail($id);

        return view('admin.assistances.show', compact('assistance'));
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
        $assistance = Assistance::findOrFail($id);

        return view('admin.assistances.edit', compact('assistance'));
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
        $assistance = Assistance::findOrFail($id);
        $assistance->update($request->all());

        Alert::toast('La asistencia se ha actualizado correctamente!', 'info', 'top-right')->autoclose(8000);
        return redirect()->route('asistencias.index');
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
        $assistance = Assistance::findOrFail($id);
        $assistance->delete();

        Alert::toast('La asistencia ha sido eliminada correctamente!', 'success', 'top-right')->autoclose(10000);
        return redirect()->back();
    }
}
