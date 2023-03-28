<?php

namespace App\Http\Controllers;

use App\Models\noticia;
use App\Http\Requests\StorenoticiaRequest;
use App\Http\Requests\UpdatenoticiaRequest;
use Illuminate\Support\Facades\Cache;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = [];

        // if(Cache::has('dez_primeiras_noticias')) {
        //     $noticias = Cache::get('dez_primeiras_noticias');
        // } else {
        //     $noticias = noticia::orderByDesc('id')->limit(10)->get();
        //     Cache::put('dez_primeiras_noticias', $noticias, 15);
        // }

        $noticias = Cache::remember('dez_primeiras_noticias', 15, function() {
            return noticia::orderByDesc('id')->limit(10)->get();
        });

        return view('noticias', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenoticiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenoticiaRequest $request, noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(noticia $noticia)
    {
        //
    }
}
