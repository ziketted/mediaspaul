<?php

namespace App\Http\Controllers;

use App\Models\BilletCaisse;
use App\Http\Requests\StoreBilletCaisseRequest;
use App\Http\Requests\UpdateBilletCaisseRequest;

class BilletCaisseController extends Controller
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
     * @param  \App\Http\Requests\StoreBilletCaisseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBilletCaisseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BilletCaisse  $billetCaisse
     * @return \Illuminate\Http\Response
     */
    public function show(BilletCaisse $billetCaisse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BilletCaisse  $billetCaisse
     * @return \Illuminate\Http\Response
     */
    public function edit(BilletCaisse $billetCaisse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBilletCaisseRequest  $request
     * @param  \App\Models\BilletCaisse  $billetCaisse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBilletCaisseRequest $request, BilletCaisse $billetCaisse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BilletCaisse  $billetCaisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(BilletCaisse $billetCaisse)
    {
        //
    }
}
