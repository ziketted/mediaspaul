@include('header.header')
<div class="wrapper">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Compte</th>
                                        <th>Libelle</th>
                                        <th>Montant</th>
                                        <th class="text-center w-25">Option</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    <!-- Ligne initiale -->
                                    <tr>
                                        <td class="p-0 bg-white">
                                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Compte" name="compte_id[]">
                                            <datalist id="datalistOptions">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                            </datalist>
                                        </td>
                                        <td class="p-0 bg-white">
                                            <input type="text" name="libelle[]" placeholder="Libelle" class="form-control w-100 h-100 border-0">
                                        </td>
                                        <td class="p-0 bg-white">
                                            <input type="number" name="montant[]" placeholder="En {{strtolower($caisse)}}" class="form-control w-100 h-100 border-0">
                                        </td>
                                        <td class="w-25 text-center p-0">
                                            <a class="btn btn-info mx-auto w-100 addRowBtn"><i class="mdi mdi-plus"></i></a>
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
<script>
    $(document).ready(function () {
        // Gestionnaire d'événement pour le bouton d'ajout de ligne
        $(document).on('click', '.addRowBtn', function () {
            addRow(this);
        });

        // Fonction pour ajouter une nouvelle ligne
        function addRow(button) {
            // Créer une nouvelle ligne
            var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
            var row = table.insertRow(table.rows.length);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);

            cell1.className = "p-0 bg-white";
            cell2.className = "p-0 bg-white";
            cell3.className = "p-0 bg-white";
            cell4.className = "w-25 text-center p-0";

            cell1.innerHTML = '<input class="form-control" list="datalistOptions" placeholder="Compte" name="compte_id[]"><datalist id="datalistOptions"><option value="San Francisco"><option value="New York"><option value="Seattle"><option value="Los Angeles"></datalist>';
            cell2.innerHTML = '<input type="text" name="libelle[]" placeholder="Libelle" class="form-control w-100 h-100 border-0">';
            cell3.innerHTML = '<input type="number" name="montant[]" placeholder="En {{strtolower($caisse)}}" class="form-control w-100 h-100 border-0">';
            cell4.innerHTML = '<a class="btn btn-danger mx-auto w-100 deleteRowBtn"><i class="mdi mdi-minus"></i></a>';

            // Désactiver le bouton "+" sur toutes les lignes précédentes
            $('.addRowBtn').removeClass('addRowBtn').addClass('deleteRowBtn');
            $('.deleteRowBtn i').removeClass('mdi mdi-plus').addClass('mdi mdi-minus');
            $('.deleteRowBtn').removeClass('btn-info').addClass('btn-danger');
            // Réactiver le bouton "+" sur la dernière ligne
            $(row).find('.deleteRowBtn').removeClass('deleteRowBtn').addClass('addRowBtn');
            $(row).find('.addRowBtn i').removeClass('mdi mdi-minus').addClass('mdi mdi-plus');
            $(row).find('.addRowBtn').removeClass('btn-danger').addClass('btn-info');
        }

        // Gestionnaire d'événement pour le bouton de suppression de ligne
        $(document).on('click', '.deleteRowBtn', function () {
            removeRow(this);
        });

        // Fonction pour supprimer une ligne
        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    });
</script>
<!-- end wrapper -->
<div class="d-none">
    @include('header.footer')
</div>
