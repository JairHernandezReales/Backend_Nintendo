<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    // Dashboard 
    public function dashboard(Request $request)
    {
        $datos= Juegos::all();
        return view('dashboard', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $juegos = new Juegos();

        if ($request->hasFile('fileInput')){
            $image = $request->file('fileInput');
            $addressImg = 'portadas/';

            $nameGame = $request->input('title');
            $nameImg = 'portada_'.$nameGame.'.'.$image->getClientOriginalExtension();

            $imgFormer = $juegos->image;
            if($imgFormer && Storage::exists($imgFormer)){
                Storage::delete($imgFormer);
            }
            $uploadSuccess = $image->move($addressImg, $nameImg);
            $juegos -> image = $addressImg.$nameImg;

        }

        $juegos->title = $request->input('title');
        $juegos->plarform = $request->input('plarform');
        $juegos->category = $request->input('category');
        $juegos->year = $request->input('year');
        $juegos->save();
        return redirect()->route('juegos.dashboard')->with('success_message', 'juego agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Juegos $juegos)
    {
        return view('show', compact('juegos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juegos $juegos)
    {
        return view('edit', compact('juegos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juegos $juegos)
    {
        if ($request->hasFile('fileInput')){
            $image = $request->file('fileInput');
            $addressImg = 'portadas/';

            $nameGame = $request->input('title');
            $nameImg = 'portada_'.$nameGame.'.'.$image->getClientOriginalExtension();

            $imgFormer = $juegos->image;
            if($imgFormer && Storage::exists($imgFormer)){
                Storage::delete($imgFormer);
            }
            $uploadSuccess = $image->move($addressImg, $nameImg);
            $juegos -> image = $addressImg.$nameImg;
        }

        $juegos->title = $request->input('title');
        $juegos->plarform = $request->input('plarform');
        $juegos->category = $request->input('category');
        $juegos->year = $request->input('year');
        $juegos->save();
        return redirect()->route('juegos.dashboard')->with('success_message', 'juego editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juegos $juegos)
    {
        $juegos->delete();
        return back()->with('success', 'Juegos eliminado correctamente');
    }
}

// developed by JotaDev