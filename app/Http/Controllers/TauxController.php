<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTauxRequest;
use App\Http\Requests\UpdateTauxRequest;
use App\Models\Taux;

class TauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTauxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTauxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taux  $taux
     * @return \Illuminate\Http\Response
     */
    public function show(Taux $taux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taux  $taux
     * @return \Illuminate\Http\Response
     */
    public function edit(Taux $taux)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTauxRequest  $request
     * @param  \App\Models\Taux  $taux
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTauxRequest $request, Taux $taux)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taux  $taux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taux $taux)
    {
        //
    }
}
