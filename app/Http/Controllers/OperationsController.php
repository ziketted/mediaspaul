<?php

namespace App\Http\Controllers;

use App\Models\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOperationsRequest;
use App\Http\Requests\UpdateOperationsRequest;

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
    public function create()
    {
        //
        $operationSortie = Operations::where('type', 'Sortie')->sum('operations.montant');
        $operationEntree = Operations::where('type', 'Entrée')->sum('operations.montant');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        return view('operations.create', [
            'operationSortie' => $operationSortie,
            'operationEntree' => $operationEntree,
            'operationTotalcaisse' => $operationTotalcaisse,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Operations $operation)
    {
        $operation->date = $request->date;
        $operation->montant = $request->montant;
        $operation->beneficiaire = $request->beneficiaire;
        $operation->user_id = auth()->user()->id;
        $operation->type = $request->type;
        $operation->description = $request->description;
        $operation->save();
        return redirect()->route('dashboard');
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
    public function update(UpdateOperationsRequest $request, Operations $operations)
    {
        //
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
