@include('header.header')
<div class="wrapper">

    <form action="{{route('operation.store')}}" method="POST">
        @csrf
    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-2">Opération de caisse  <code class="text-nowrap" style="width: 12rem; color:black">{{ $caisse }}</code>.</h4>

                            <div class="row">
                                <div class="col-lg-12" style="padding-right: 50px; padding-left:50px;">

                                    <div class="form-group">
                                        <label>Date opération</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="date" name="date" class="form-control" placeholder="mm/dd/yyyy"
                                                    id="datepicker" required>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Béneficiare</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" name="beneficiare" class="form-control" placeholder="Noms du Béneficiaire" required>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="pe-5">Moyen de paiement</label>
                                        <select class="form-control txt-20" name="moyen" aria-label="Default select example" required>
                                            <option value="Cash" selected>Cash</option>
                                            <option value="Cheque">Chèque</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-12" style="padding-right: 50px; padding-left:50px;">

                                    <div class="form-group">
                                        <label>Type de transaction</label>
                                        <div>
                                            <select class="form-control" name="type" aria-label="Default select example" required>
                                                <option value="Entrée" selected>Entrée</option>
                                                <option value="Sortie">Sortie</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Secteur</label>
                                        <div>
                                            <select class="form-control" name="secteur_id" aria-label="Default select example" required>
                                                <option value="1" selected>Entrée</option>
                                                <option value="2">Sortie</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Financement</label>
                                        <div>
                                            <select class="form-control" name="financement_id" aria-label="Default select example" required>
                                                <option value="1" selected>Fond Propre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Centre d'intérêt</label>
                                        <div>
                                            <select class="form-control" name="centre_id" aria-label="Default select example">
                                                <option value="1" selected>Kinshasa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div><!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-->
            <div class="col-lg-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 ">Détails de l'opération.</h4>
                        <div class="ps-5 pe-5" style="">
                            <table  class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Compte</th>
                                    <th>Libelle</th>
                                    <th>Montant</th>
                                    <th class="text-center w-25">Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="p-0 bg-white">
                                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Compte" name="compte_id[]">
                                        <datalist id="datalistOptions">
                                          <option value="San Francisco">
                                          <option value="New York">
                                          <option value="Seattle">
                                          <option value="Los Angeles">
                                    </td>
                                    <td class="p-0 bg-white">
                                        <input type="text" name="libelle[]" id="" placeholder="Libelle" class="form-control w-100 h-100 border-0">
                                    </td>
                                    <td class="p-0 bg-white">
                                        <input type="number" name="montant[]" id="" placeholder="En {{strtolower($caisse)}}" class=" form-control w-100 h-100 border-0">
                                    </td>
                                    <td class="w-25 text-center p-0 btn-info">
                                        <button class="btn btn-info mx-auto w-100"
                                        onclick="insRow()"><i class="mdi mdi-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <button class="btn btn-success w-100 text-uppercase" type="submit">Valider l'opération</button>
                    </div><!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div><!-- End row -->
</form>
</div>
<!-- end wrapper -->
<div class="d-none">
    @include('header.footer')
</div>
