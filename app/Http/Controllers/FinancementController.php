<?php

namespace App\Http\Controllers;

use App\Models\Financement;
use App\Http\Requests\StoreFinancementRequest;
use App\Http\Requests\UpdateFinancementRequest;
use Illuminate\Http\Request;

class FinancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $financements= Financement::all();
        return view('financements.create', ["financements"=>$financements]);
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
     * @param  \App\Http\Requests\StoreFinancementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Financement $financement)
    {
        $financement->libelle = $request->libelle;
        $financement->user_id = auth()->user()->id;
        $financement->description = $request->description;
        $financement->save();
        return redirect()->route('financenment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financement  $financement
     * @return \Illuminate\Http\Response
     */
    public function show($financement)
    {
        //
        $financements = Financement::where('id', $financement)->get();
        return view('financements.show', ['financement'=>$financements]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financement  $financement
     * @return \Illuminate\Http\Response
     */
    public function edit(Financement $financement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinancementRequest  $request
     * @param  \App\Models\Financement  $financement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinancementRequest $request, Financement $financement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financement  $financement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financement $financement)
    {
        //
    }
}
