<?php

namespace App\Http\Controllers;

use App\Models\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOperationsRequest;
use App\Http\Requests\UpdateOperationsRequest;
use App\Models\BilletCaisse;
use App\Models\Caisse;
use App\Models\Centre;
use App\Models\Compte;
use App\Models\Financement;
use App\Models\Secteur;
use Illuminate\Support\Facades\DB;

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

        $operationSortieAll = BilletCaisse::whereDate('date', '<>', Carbon::today())
                            ->where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntreeAll = BilletCaisse::whereDate('date', '<>', Carbon::today())->where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisseAll = $operationEntreeAll - $operationSortieAll;

        $operationSortie = BilletCaisse::whereDate('created_at', Carbon::today())->where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntree = BilletCaisse::whereDate('created_at', Carbon::today())->where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisse = ($operationTotalcaisseAll + $operationEntree) - $operationSortie;

        $operations = DB::table('caisses')
                        ->join('billet_caisses', 'caisses.id', '=', 'billet_caisses.devise')
                        ->whereDate('billet_caisses.created_at', Carbon::today())
                        ->select('billet_caisses.*', 'caisses.caisse')
                        ->get();


        return view('dashboard',
                         [
                        'operations' => $operations,
                        'operationSortie' => $operationSortie,
                        'operationEntree' => $operationEntree,
                        'operationTotalcaisse' => $operationTotalcaisse,
                        'caisses' => $caisse_all,
                         ]);
    }
    public function rapport()
    {
        $operationSortie = BilletCaisse::where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntree = BilletCaisse::where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        $operations = BilletCaisse::all();
        return view('operations.rapport',
            [
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

     $secteurs=Secteur::all();
     $financements=Financement::all();
     $comptes=Compte::all();
     $centres=Centre::all();

        $operationSortie = BilletCaisse::where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntree = BilletCaisse::where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        return view('operations.create', [
            'operationSortie' => $operationSortie,
            'operationEntree' => $operationEntree,
            'operationTotalcaisse' => $operationTotalcaisse,
            'caisse'=>$caisse,
            'secteurs'=>$secteurs,
            'financements'=>$financements,
            'comptes'=>$comptes,
            'centres'=>$centres
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
        $operation->save();

        return redirect()
               ->route('dashboard')
               ->with('status', "Opération réussie avec succès.");
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


    public function sms()
    {

             $key='dd9ac27d80347a9011f7cadbf1cc359e-63264e13-e2a8-483f-b2de-31e21e2604c7';
             $base_url='3ggkqj.api.infobip.com';

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://3ggkqj.api.infobip.com/sms/2/text/advanced',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS =>'{"messages":[{"destinations":[{"to":"+243821709829"}],"from":"SNEL","text":"Factue Septembre   Bonjour Mr. Gracia Biya Mukendi, Votre facture de la SNEL est de : 117500fc  Futa niongo svp!"}]}',
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: App $key",
                            'Content-Type: application/json',
                            'Accept: application/json'
                        ),
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;

        }
}
