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

        $caisse_all = Caisse::all();


        $All_entree_usd= BilletCaisse::where('type', 'Entrée')->where('devise', 1)->sum('billet_caisses.total');
        $All_entree_cdf= BilletCaisse::where('type', 'Entrée')->where('devise', 3)->sum('billet_caisses.total');
        $All_entree_euro= BilletCaisse::where('type', 'Entrée')->where('devise',4)->sum('billet_caisses.total');
        $All_entree_cfa= BilletCaisse::where('type', 'Entrée')->where('devise', 2)->sum('billet_caisses.total');

        $All_sortie_usd= BilletCaisse::where('type', 'Sortie')->where('devise', 1)->sum('billet_caisses.total');
        $All_sortie_cdf= BilletCaisse::where('type', 'Sortie')->where('devise', 3)->sum('billet_caisses.total');
        $All_sortie_euro= BilletCaisse::where('type', 'Sortie')->where('devise',4)->sum('billet_caisses.total');
        $All_sortie_cfa= BilletCaisse::where('type', 'Sortie')->where('devise', 2)->sum('billet_caisses.total');

        $total_usd=$All_entree_usd - $All_sortie_usd;
        $total_cdf=$All_entree_cdf - $All_sortie_cdf;
        $total_euro=$All_entree_euro - $All_sortie_euro;
        $total_cfa=$All_entree_cfa - $All_sortie_cfa;


        $operations = DB::table('caisses')
            ->join('billet_caisses', 'caisses.id', '=', 'billet_caisses.devise')
            ->whereNull('billet_caisses.deleted_at')
            ->whereDate('billet_caisses.created_at', Carbon::today())
            ->select('billet_caisses.*', 'caisses.caisse')
            ->get();

           // dd($operations);
            $usd_entree_sum = 0;
            $cdf_entree_sum = 0;
            $euro_entree_sum = 0;
            $cfa_entree_sum = 0;

            $usd_sortie_sum = 0;
            $cdf_sortie_sum = 0;
            $euro_sortie_sum = 0;
            $cfa_sortie_sum = 0;

            // Process the $operations collection and compute sums
            foreach ($operations as $operation) {
                $data = [
                    'id' => $operation->id,
                    'caisse' => $operation->caisse,
                    'type' => $operation->type,
                    'total' => $operation->total,
                ];

                // Use a nested switch to handle both 'caisse' and 'type'
                switch ($operation->caisse) {
                    case 'USD':
                        switch ($operation->type) {
                            case 'Entrée':
                                $usd_entree_sum += $data['total'];
                                break;
                            case 'Sortie':
                                $usd_sortie_sum += $data['total'];
                                break;
                        }
                        break;
                    case 'CDF':
                        switch ($operation->type) {
                            case 'Entrée':
                                $cdf_entree_sum += $data['total'];
                                break;
                            case 'Sortie':
                                $cdf_sortie_sum += $data['total'];
                                break;
                        }
                        break;
                    case 'EURO':
                        switch ($operation->type) {
                            case 'Entrée':
                                $euro_entree_sum += $data['total'];
                                break;
                            case 'Sortie':
                                $euro_sortie_sum += $data['total'];
                                break;
                        }
                        break;
                    case 'CFA':
                        switch ($operation->type) {
                            case 'Entrée':
                                $cfa_entree_sum += $data['total'];
                                break;
                            case 'Sortie':
                                $cfa_sortie_sum += $data['total'];
                                break;
                        }
                        break;
                    // Add more cases as needed for other types of operations
                }
            }




//dd($cfa_entree_sum);

        return view(
            'dashboard',
            [
                'total_usd'=> $total_usd,
                'total_cdf'=> $total_cdf,
                'total_euro'=> $total_euro,
                'total_cfa' => $total_cfa,
                'usd_entree_total' => $usd_entree_sum,
                'cdf_entree_total' => $cdf_entree_sum,
                'euro_entree_total' => $euro_entree_sum,
                'cfa_entree_total' => $cfa_entree_sum,
                'usd_sortie_total' => $usd_sortie_sum,
                'cdf_sortie_total' => $cdf_sortie_sum,
                'euro_sortie_total' => $euro_sortie_sum,
                'cfa_sortie_total' => $cfa_sortie_sum,
                'operations' => $operations,
                'caisses' => $caisse_all,
            ]
        );
    }
    public function rapport()
    {
        $operationSortie = BilletCaisse::where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntree = BilletCaisse::where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        $operations = BilletCaisse::all();
        return view(
            'operations.rapport',
            [
                'operations' => $operations,
                'operationSortie' => $operationSortie,
                'operationEntree' => $operationEntree,
                'operationTotalcaisse' => $operationTotalcaisse,
            ]
        );
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

        /*   $caisse = $id; */
      $caisseCode = Caisse::where('caisse', $id)->first();
      $caisseId=null;
      // Check if a matching record was found
      if ($caisseCode) {
          $caisseId = $caisseCode->id;
          // Now, $caisseId contains the value of the 'id' column for the matching record
      } else {
          // Handle the case where no matching record was found
          $caisseId = null; // or set to a default value
      }



        $secteurs = Secteur::all();
        $financements = Financement::all();
        $comptes = Compte::all();
        $centres = Centre::all();

        $operationSortie = BilletCaisse::where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntree = BilletCaisse::where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        return view('operations.create', [
            'operationSortie' => $operationSortie,
            'operationEntree' => $operationEntree,
            'operationTotalcaisse' => $operationTotalcaisse,
            'caisse' => $caisse,
            'caisseId' => $caisseId,
            'secteurs' => $secteurs,
            'financements' => $financements,
            'comptes' => $comptes,
            'centres' => $centres
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

        $operation->secteur_id = $request->secteur_id;
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
        $operations = BilletCaisse::find($operation);
        $operations->delete();
        return  redirect()->back();
    }
    public function dashboard1()
    {
        $operationSortie = BilletCaisse::where('type', 'Sortie')->sum('billet_caisses.total');
        $operationEntree = BilletCaisse::where('type', 'Entrée')->sum('billet_caisses.total');
        $operationTotalcaisse = $operationEntree - $operationSortie;
        $operations = BilletCaisse::all();

        //$type='Sortie'
        //Analyse 2
        $comparaison_S = DB::select('SELECT type, SUM(total) as somme, MONTHNAME(billet_caisses.date) as mois
        FROM `billet_caisses` where type='."'Sortie'".' GROUP by type, mois');
        $comparaison_E = DB::select('SELECT type, SUM(total) as somme, MONTHNAME(billet_caisses.date) as mois
                                        FROM `billet_caisses` where type='."'Entrée'".' GROUP by type, mois');

        $compa_type_S = [];
        $compa_somme_type_S = [];
        $compa_mois_S = [];
        foreach ($comparaison_S as $key => $value) {
            $compa_type_S[] = $value->type;
            $compa_somme_type_S[] = $value->somme;
            $compa_mois_S[] = $value->mois;
        }

        $compa_type = [];
        $compa_somme_type= [];
        $compa_mois= [];
        foreach ($comparaison_E as $key => $value) {
            $compa_type[] = $value->type;
            $compa_somme_type[] = $value->somme;
            $compa_mois[] = $value->mois;
        }





        //Analyse Entrée & Sortie
        $analysis_ES = DB::table('billet_caisses')
            ->selectRaw('type,sum(total) as somme')
            ->groupBy('type')
            ->get();

        $type = [];
        $somme_type = [];
        foreach ($analysis_ES as $key => $value) {
            # code...

            $type[] = $value->type;
            $somme_type[] = $value->somme;
        }
        return view(
            'operations.dashboard',
            [
                'operations' => $operations,
                'operationSortie' => $operationSortie,
                'operationEntree' => $operationEntree,
                'operationTotalcaisse' => $operationTotalcaisse,
                'type' => $type,
                'somme_type' => $somme_type,
                'compa_somme_type' => $compa_somme_type,
                'compa_type' => $compa_type,
                'compa_mois' => $compa_mois,
                'compa_somme_type_S' => $compa_somme_type_S,
                'compa_type_S' => $compa_type_S,
                'compa_mois_S' => $compa_mois_S,
            ]
        );
    }

    public function sms()
    {

        set_time_limit(0);

        $datas = DB::table('staff')
                        ->selectRaw('number')
                        ->get();

      /*   $datas = DB::table('data')
                        ->selectRaw('number')
                        ->get(); */

                    $key = 'dd9ac27d80347a9011f7cadbf1cc359e-63264e13-e2a8-483f-b2de-31e21e2604c7';
                    $base_url = '3ggkqj.api.infobip.com';

            foreach ($datas as  $value) {
                set_time_limit(0);
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
                        CURLOPT_POSTFIELDS => '{"messages":[{"destinations":[{"to":"+243'.$value->number.'"}],"from":"MITELEZI183","text":"VOTONS TOUS JONATHAN MITELEZI MBILA NUMERO 183 MONT AMBA"}]}',
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: App $key",
                            'Content-Type: application/json',
                            'Accept: application/json'
                        ),
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;
                          # code...
            }
    }
}
