<?php

namespace App\Http\Controllers;

use App\Models\BilletCaisse;
use App\Http\Requests\StoreBilletCaisseRequest;
use App\Http\Requests\UpdateBilletCaisseRequest;
use App\Models\DetailCaisse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BilletCaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request, BilletCaisse $operation, DetailCaisse $detailCaisse)
    {


        $operation->secteur_id = $request->secteur_id;
        $operation->financement_id = $request->financement_id;
        $operation->centre_id = $request->centre_id;
        $operation->devise = $request->devise;
        $operation->date = $request->date;
        $operation->moyen = $request->moyen;
        $operation->devise = 1;
        $operation->beneficiaire = $request->beneficiaire;
        $operation->user_id = auth()->user()->id;
        $operation->type = $request->type;
        $operation->save();

        $ligne  = $request->libelle;
        $detail_caisse = [];
        $total = 0;
        for ($i = 0; $i < count($ligne); $i++) {
            # code...
            $detail_caisse = [
                'compte_id' => $request->compte_id[$i],
                'libelle' => $request->libelle[$i],
                'montant' => $request->montant[$i],
                'billetcaisse_id' => $operation->id,
                'user_id' => auth()->user()->id
            ];
            DB::table('detail_caisses')->insert($detail_caisse);
            $total += $request->montant[$i];
        }

        $operation = BilletCaisse::findOrFail($operation->id);
        $operation->total =  $total;
        $operation->save();
        return redirect()->back()->with('status', "Opération réussie avec succès.");
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
