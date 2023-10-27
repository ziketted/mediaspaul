<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Http\Requests\StoreCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       /*  $comptes=Compte::all(); */
        $comptes = DB::table('detail_caisses')
                    ->join('comptes', 'detail_caisses.compte_id', '=', 'comptes.id')
                    ->select('comptes.id','comptes.numero', 'comptes.compte', DB::raw('SUM(detail_caisses.montant) as total'))
                    ->groupBy('comptes.id','comptes.numero', 'comptes.compte')
                    ->get();


        return view('comptes.create', ["comptes"=>$comptes]);
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
     * @param  \App\Http\Requests\StoreCompteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Compte $compte)
    {
        //
        $compte->compte = $request->compte;
        $compte->numero = $request->numero;
        $compte->user_id = auth()->user()->id;
        $compte->save();

        return redirect()->route('compte.index')->with("message", "saved success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function show(Compte $compte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompteRequest  $request
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompteRequest $request, Compte $compte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compte $compte)
    {
        //
    }
}
