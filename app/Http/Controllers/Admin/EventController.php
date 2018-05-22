<?php

namespace waynakay\Http\Controllers\Admin;

use Illuminate\Http\Request;
use waynakay\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManager;
use waynakay\event;
use Redirect;
use Image;
use File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('id', 'DESC')->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.events.create');
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
        $event = new Event;
        //dd($request->event_day);
        $event->title     = $request->title;
        $event->detail    = $request->detail;
        $event->country   = $request->country;
        $event->event_day = $request->event_day;

        //Si viene una imagen
        if ($request->file('image')) {
          $imagen = $request->file('image');
          $filename = time() . '.' . $imagen->getClientOriginalExtension();
          Image::make($imagen)->resize(700, 600)->save(public_path('evento/imagenes/'.$filename));
          $event->image = $filename;
          $event->save();
        }

        Alert::toast('El evento se ha creado correctamente!', 'success', 'top-right')->autoclose(8000);
        return Redirect::route('eventos.index');

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
        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event'));
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
        $event = Event::findOrFail($id);

        return view('admin.events.edit', compact('event'));
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
        $event = Event::findOrFail($id);

        $event->title     = $request->title;
        $event->detail    = $request->detail;
        $event->country   = $request->country;
        $event->event_day = $request->event_day;

        //dd($request->image);
        //si existe la imagen la eliminamos del directorio
        if (File::exists(public_path("/evento/imagenes/$event->image"))) {
          File::delete(public_path( "/evento/imagenes/$event->image"));
        }

        //dd($event);
        //si existe la nueva imagen que viene de actualizacion, guasrdela en el directorio
        if ($request->file('image')) {
          //dd("si hay imagen");
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(700, 600)->save(public_path( 'evento/imagenes/'.$filename));
          $event->image = $filename;
          $event->save();
        }

        Alert::toast('El evento se ha actusalizado correctamente!', 'info', 'top-right')->autoclose(8000);
        return Redirect::route('eventos.index');
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
        $event = Event::findOrFail($id);
        $event->delete();

        if (File::exists(public_path("/evento/imagenes/$event->image"))) {
          //dd("si existe la imagen");
          File::delete(public_path( "/evento/imagenes/$event->image"));
        }

        Alert::toast('Se ha eliminado el evento correctamente!', 'success', 'top-right')->autoclose(10000);
        return Redirect::route('eventos.index');

    }
}
