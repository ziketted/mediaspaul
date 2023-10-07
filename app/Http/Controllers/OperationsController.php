<?php

namespace App\Http\Controllers;

use App\Models\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOperationsRequest;
use App\Http\Requests\UpdateOperationsRequest;
use App\Models\Caisse;

class OperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $caisse_all= Caisse::all();

        $operationSortieAll = Operations::whereDate('date', '<>', Carbon::today())->where('type', 'Sortie')->sum('operations.montant');
        $operationEntreeAll = Operations::whereDate('date', '<>', Carbon::today())->where('type', 'Entrée')->sum('operations.montant');
        $operationTotalcaisseAll = $operationEntreeAll - $operationSortieAll;

        $operationSortie = Operations::whereDate('date', Carbon::today())->where('type', 'Sortie')->sum('operations.montant');
        $operationEntree = Operations::whereDate('date', Carbon::today())->where('type', 'Entrée')->sum('operations.montant');
        $operationTotalcaisse = ($operationTotalcaisseAll + $operationEntree) - $operationSortie;
        $operations = Operations::whereDate('date', Carbon::today())->get();
        return view('dashboard', [
            'operations' => $operations,
            'operationSortie' => $operationSortie,
            'operationEntree' => $operationEntree,
            'operationTotalcaisse' => $operationTotalcaisse,
            'caisses' => $caisse_all,
        ]);
    }
    public function rapport()
    {
        $operationSortie = Operations::where('type', 'Sortie')->sum('operations.montant');
        $operationEntree = Operations::where('type', 'Entrée')->sum('operations.montant');
        $operationTotalcaisse = $operationEntree - $operationSortie;

        $operations = Operations::all();
        return view('operations.rapport', [
            'operations' => $operations,
            'operationSortie' => $operationSortie,
            'operationEntree' => $operationEntree,
            'operationTotalcaisse' => $operationTotalcaisse,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

     $caisse = $id;

        $operationSortie = Operations::where('type', 'Sortie')->sum('operations.montant');
        $operationEntree = Operations::where('type', 'Entrée')->sum('operations.montant');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        return view('operations.create', [
            'operationSortie' => $operationSortie,
            'operationEntree' => $operationEntree,
            'operationTotalcaisse' => $operationTotalcaisse,
            'caisse'=>$caisse
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Operations $operation )
    {

        $operation->secteur_id= $request->secteur_id;
        $operation->financement_id = $request->financement_id;
        $operation->centre_id = $request->centre_id;
        $operation->devise = $request->devise;
        $operation->libelle = $request->libelle;
        $operation->date = $request->date;
        $operation->montant = $request->montant;
        $operation->beneficiaire = $request->beneficiaire;
        $operation->user_id = auth()->user()->id;
        $operation->type = $request->type;
        $operation->status = $request->status;
        $operation->description = $request->description;


        $operation->save();
        return redirect()->route('dashboard')->with('status', "Opération réussie avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function show(Operations $operations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function edit(Operations $operations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperationsRequest  $request
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operations $operations)
    {
        $status = "Encours";

        if ($request->has('valider')) {

            $status = "valider";
        } else {
            $status = "encours";
        }
        /* dd($request->description); */
        Operations::where('id', $request->id)
            ->update([
                'status' => $status,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function destroy($operation)
    {
        $operations = Operations::find($operation);
        $operations->delete();
        return back();
    }
}
