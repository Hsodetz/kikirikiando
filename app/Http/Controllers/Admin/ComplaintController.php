<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;
use waynakay\Student;
use waynakay\Father;
use waynakay\Complaint;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;
//Invocamos la clase de almacenado, para almacenar imagenes, entre otros
use Illuminate\Support\Facades\Storage;
use Image;
use File;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $complaints = Complaint::orderBy('id', 'DESC')->paginate(10);

        return view('admin.complaints.index', compact('complaints'));
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
        $students = Student::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.complaints.create', compact('fathers', 'students'));
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
        $complaint = new Complaint;

        $complaint->father_id     = $request->father_id;
        $complaint->student_id    = $request->student_id;
        $complaint->affair        = $request->affair;
        $complaint->text          = $request->text;
        $complaint->gravity       = $request->gravity;

        //Aqui agregamos la imagen si existe
        /*
        if ($request->file('image')) {
            // Le decimos que se almacene en la variable $path el nombre del archivo, y a su vez se guarde en public/image
            $path = Storage::disk('public')->put('denuncia/imagenes', $request->file('image'));
            //actualizamos y salvamos con la extension necesaria, ejm http://xxxx/imagexxxx.jpg
            $complaint->fill(['image' => asset($path)])->save();
        }
        */
        if($request->file('image')){
         // Obtenemos el archivo de la foto y se lo pasamos a la variable $foto
         $image = $request->file('image');
         // Creamos un nombre para el archivo, en este caso con el tiempo y la extension del archivo
         $filename = time() . '.' . $image->getClientOriginalExtension();
         // Le cambiamos el tamano a la foto y lo guardamos con el nombre $filename
         Image::make($image)->resize(700, 600)->save(public_path('denuncia/imagenes/' . $filename));

         // Luego le decimos que el campo de la tabla va a llevar el mismo nobmre del archivo guardado
         $complaint->image = $filename;
         // Ahora guardamos los datos en la tabla autos
         $complaint->save();
        }

        //Aqui agregamos el archivo si existe
        if ($request->file('file')) {
            // Le decimos que se almacene en la variable $path el nombre del archivo, y a su vez se guarde en public/image
            $path = Storage::disk('public')->put('denuncia/archivos', $request->file('file'));
            //actualizamos y salvamos con la extension necesaria, ejm http://xxxx/imagexxxx.jpg
            $complaint->fill(['file' => asset($path)])->save();
        }

        Alert::toast('Se han almacenado los datos correctamente', 'info', 'top-right')->autoclose(8000);
        return redirect()->route('denuncias.index');
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
        $complaint = Complaint::findOrFail($id);

        return view('admin.complaints.show', compact('complaint'));
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
        $complaint = Complaint::findOrFail($id);

        $fathers = Father::orderBy('name', 'ASC')->pluck('name', 'id');
        $students = Student::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.complaints.edit', compact('complaint', 'fathers', 'students'));
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
        $complaint = Complaint::findOrFail($id);

        $complaint->father_id     = $request->father_id;
        $complaint->student_id    = $request->student_id;
        $complaint->affair        = $request->affair;
        $complaint->text          = $request->text;
        $complaint->gravity       = $request->gravity;

        //si existe el archivo con el nombre que traemos del formulario eliminalo del directorio
        if (File::exists(public_path("denuncia/imagenes/$complaint->image"))) {
          File::delete(public_path( "denuncia/imagenes/$complaint->image"));
        }

        //si hay un archivo imagen que viene del formulario, ingresa la imagen al diredtorio y a la bd el nombre
        if($request->file('image')){
         // Obtenemos el archivo de la foto y se lo pasamos a la variable $foto
         $image = $request->file('image');
         // Creamos un nombre para el archivo, en este caso con el tiempo y la extension del archivo
         $filename = time() . '.' . $image->getClientOriginalExtension();
         // Le cambiamos el tamano a la foto y lo guardamos con el nombre $filename
         Image::make($image)->resize(700, 600)->save(public_path('denuncia/imagenes/' . $filename));

         // Luego le decimos que el campo de la tabla va a llevar el mismo nobmre del archivo guardado
         $complaint->image = $filename;
         // Ahora guardamos los datos en la tabla
         $complaint->save();
        }

        //Aqui agregamos el archivo si existe
        if ($request->file('file')) {
            // Le decimos que se almacene en la variable $path el nombre del archivo, y a su vez se guarde en public/image
            $path = Storage::disk('public')->put('denuncia/archivos', $request->file('file'));
            //actualizamos y salvamos con la extension necesaria, ejm http://xxxx/imagexxxx.jpg
            $complaint->fill(['file' => asset($path)])->save();
        }

        Alert::toast('Los datos de la denunciase han actualizado correctamente!', 'info', 'top-right');
        return redirect()->route('denuncias.index');
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
        $complaint = Complaint::findOrFail($id);
        //dd($complaint->image);
        $complaint->delete();

        //Si existe el archivo imagen, se elimina del directorio.
        if(File::exists(public_path("/denuncia/imagenes/$complaint->image"))){
            //dd('la imagen existe');
            File::delete(public_path("/denuncia/imagenes/$complaint->image"));
        }

        Alert::toast('El registro se ha eliminado correctamente', 'info', 'top-right')->autoclose(1000);
        return redirect()->back();
    }
}
