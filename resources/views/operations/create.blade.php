@include('header.header')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-30">Opération de caisse.</h4>

                        <form action="{{route('operation.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6" >
                                    <label>Moyen de paiement</label>

                                    <div>
                                        <code class="text-nowrap" style="width: 12rem; color:black">Selectionner le moyen de paiement</code>
                                        <select class="form-control txt-20" name="moyen" aria-label="Default select example" required>
                                            <option value="Cash" selected>Cash</option>
                                            <option value="Cheque">Chèque</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-6" style="padding-right: 50px; padding-left:50px; ">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Caisse</label>
                                            <div>
                                                <select class="form-control" name="devise" aria-label="Default select example" disabled>
                                                    <option value="{{ $caisse }}" selected disabled>Caisse Principale {{ $caisse }}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-lg-4" style="border-right: 1px #F0F0F0 solid; padding-right: 50px; padding-left: 50px;">



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
                                        <label>Type opération</label>
                                        <div>
                                            <select class="form-control" name="type" aria-label="Default select example" required>
                                                <option value="Entrée" selected>Entrée</option>
                                                <option value="Sortie">Sortie</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4" style="padding-right: 50px; padding-left: 50px; ">
                                    <div class="form-group">
                                        <label>Secteur</label>
                                        <div>
                                            <select class="form-control" name="secteur_id" aria-label="Default select example">
                                                <option value="" selected>Entrée</option>
                                                <option value="">Sortie</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Financement</label>
                                        <div>
                                            <select class="form-control" name="financement_id" aria-label="Default select example" required>
                                                <option value="" selected>Fond Propre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Centre d'intérêt</label>
                                        <div>
                                            <select class="form-control" name="centre_id" aria-label="Default select example">
                                                <option value="" selected>Kinshasa</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4" style="border-left: 1px #F0F0F0 solid; padding-right: 50px; padding-left: 50px; ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Libellé de l'opération</label>
                                        <input type="text" name="libelle" class="form-control" id="exampleInputEmail1"
                                            placeholder="Libellé de l'opération" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Montant</label>
                                        <input type="number" name="montant" class="form-control" id="exampleInputEmail1"
                                            placeholder="Ex.100$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                                            placeholder="Description de l'opération">
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light mt-5">Enregistrer</button>
                        </form>
                    </div><!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-->

        </div>
    </div><!-- End row -->


</div>
<!-- end wrapper -->
@include('header.footer')
