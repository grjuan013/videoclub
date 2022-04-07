<?php

namespace App\Http\Controllers;
use App\Models\Movie;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $arrayPeliculas = Movie::all();
        return view('catalog.index', array('arrayPeliculas' => $arrayPeliculas));
    }
    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array('id' => $id, 'pelicula' => $pelicula));
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula' => $pelicula));
    }

    public function postCreate(Request $request)
    {
        $pelicula = new Movie;
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        notify()->success('¡Haz ingresado una nueva película!');

        //$arrayPeliculas = Movie::all();
        //return view('catalog.index', array('arrayPeliculas' => $arrayPeliculas));
        return redirect()->action([CatalogController::class, 'getIndex']);
    }

    public function putEdit(Request $request,$id)
    {
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        notify()->success('¡Haz editado la película con éxito!');

        //return view('catalog.show', array('id' => $id, 'pelicula' => $pelicula));
        return redirect()->action([CatalogController::class, 'getShow'],array('id' => $id));
    }

    public function putRent(Request $request,$id)
    {
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented = true;
        $pelicula->save();
        notify()->success('¡Haz rentado la película con éxito!');

        return redirect()->action([CatalogController::class, 'getShow'],array('id' => $id));
    }

    public function putReturn(Request $request,$id)
    {
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented = false;
        $pelicula->save();
        notify()->success('¡Haz regresado la película con éxito!');

        return redirect()->action([CatalogController::class, 'getShow'],array('id' => $id));
    }

    public function deleteMovie(Request $request,$id)
    {
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->delete();
        notify()->success('¡Haz borrado la película con éxito!');
        return redirect()->action([CatalogController::class, 'getIndex']);
    }
}

