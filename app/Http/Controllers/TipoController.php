<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Http\Requests\StoreTipoRequest;
use App\Http\Requests\UpdateTipoRequest;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = Tipo::all();

        return response()->json(['data' => $tipos]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoRequest  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoRequest $request, Tipo $tipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        //
    }
}
