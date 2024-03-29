@include('header.header')
<div class="wrapper">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <form action="{{route('operation.store')}}" method="POST">
        @csrf
    <div class="container-fluid">

        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-6 mt-4">
                @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Votre Billet de Caisse a été validé avec succes. <a href="/show" class="alert-link">Voir toutes les opérations</a>.
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-2">Opération de caisse en {{ $caisse }}.</h4>

                            <div class="row">
                                <div class="col-lg-12" style="padding-right: 50px; padding-left:50px;">
                                    <input type="text" name="devise" style=" display: none"  value="{{$caisseId }}">
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
                                                <input type="text" name="beneficiaire" class="form-control" placeholder="Noms du Béneficiaire" required>
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
                                        <label>Secteur</label>
                                        <div>
                                            <select class="form-control" name="secteur_id" aria-label="Default select example" required>
                                               @foreach ($secteurs as $item)
                                                 <option value="{{ $item->id }}" selected>{{ $item->libelle }}</option>
                                               @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Financement</label>
                                        <div>
                                            <select class="form-control" name="financement_id" aria-label="Default select example" required>
                                              @foreach ($financements as $item)
                                                  <option value="{{ $item->id }}" selected>{{ $item->libelle }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Centre d'intérêt</label>
                                        <div>
                                            <select class="form-control" name="centre_id" aria-label="Default select example">
                                               @foreach ($centres as $item)
                                                 <option value="{{ $item->id }}" selected>{{ $item->libelle }}</option>
                                               @endforeach
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
                        <div class="ps-5 pe-5" style="padding-left: 50px; padding-right: 50px;">
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

                                                <select name="compte_id[]" class="form-control" id="">
                                                @foreach ($comptes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->numero }} - {{ $item->compte }}</option>

                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-0 bg-white">
                                            <input type="text" name="libelle[]" placeholder="Libelle" class="form-control w-100 h-100 border-0" required>
                                        </td>
                                        <td class="p-0 bg-white">
                                            <input type="number" name="montant[]" placeholder="En {{strtolower($caisse)}}" class="form-control w-100 h-100 border-0" required>
                                        </td>
                                        <td class="w-25 text-center p-0">
                                            <a class="btn btn-info mx-auto w-100 addRowBtn"><i class="mdi mdi-plus"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3 class="fw-bold"><span id="totalSum"></span> {{$caisse}}</h3>
                        </div>

                        {{-- <button class="btn btn-success w-100 text-uppercase" type="submit">Valider l'opération</button> --}}
                    </div><!-- card-body -->
                </div> <!-- card -->

                <div class="card mt-3 pb-3">
                    <div class="card-body">
                        <h4 class="m-t-0 ">Pièces Justificatives</h4>
                        <div class="ps-5 pe-5" style="padding-left: 50px; padding-right: 50px;">
                            <div class="form-group">
                                <label class="pe-5">Pièce Justificative</label>
                                <select class="form-control txt-20" name="piece" aria-label="Default select example" onchange="handlePieceSelection(this)">
                                    <option value="" selected>Aucune Pièce</option>
                                    <option value="Proforma">Proforma</option>
                                    <option value="Facture">Facture</option>
                                    <option value="Ord. Paiement">Ordre de Paiement</option>
                                    <option value="Cheque">Chèque</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Numéro</label>
                                <div>
                                    <div class="input-group">
                                        <input type="text" name="num_piece" class="form-control" placeholder="Numéro de la pièce justificative" id="numero_piece" disabled>
                                    </div><!-- input-group -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <div>
                                    <div class="input-group">
                                        <input type="text" name="description" class="form-control" placeholder="Description" id="description" disabled>
                                    </div><!-- input-group -->
                                </div>
                            </div>
                            <button class="btn btn-success w-100 text-uppercase" type="submit">Valider l'opération</button>
                        </div>

                    </div><!-- card-body -->
                </div> <!-- card -->
            </div>

        </div>
    </div><!-- End row -->
</form>
</div>
<script>

function handlePieceSelection(select) {
        console.log("Function called");
        var numeroPieceInput = document.getElementById('numero_piece');
        var descriptionInput = document.getElementById('description');

        if (select.value === "Proforma" || select.value === "Facture" || select.value === "Ord. Paiement" || select.value === "Cheque") {
            numeroPieceInput.disabled = false;
            descriptionInput.disabled = false;
            numeroPieceInput.setAttribute("required", "required");
        } else {
            numeroPieceInput.disabled = true;
            descriptionInput.disabled = true;
            numeroPieceInput.removeAttribute("required");
        }
    }

 $(document).ready(function () {



    function updateTotalSum() {
        var total = 0;
        $('input[name="montant[]"]').each(function () {
            var value = parseFloat($(this).val());
            if (!isNaN(value)) {
                total += value;
            }
        });

        // Mettre à jour le paragraphe avec la somme totale
        $('#totalSum').text('Total : ' + total);
    }

    // Gestionnaire d'événement pour le bouton d'ajout de ligne
    $(document).on('click', '.addRowBtn', function () {
        addRow(this);
    });

    // Gestionnaire d'événement pour le bouton de suppression de ligne
    $(document).on('click', '.deleteRowBtn', function () {
        removeRow(this);
        updateTotalSum(); // Mettre à jour le montant total après la suppression
    });

    // Gestionnaire d'événement pour la modification de la valeur de l'input
    $(document).on('input', 'input[name="montant[]"]', function () {
        updateTotalSum();
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

        cell1.innerHTML = '<select name="compte_id[]" class="form-control" id="">@foreach ($comptes as $item) <option value="{{ $item->id }}">{{ $item->numero }} - {{ $item->compte }} </option> @endforeach </select>';
        cell2.innerHTML = '<input type="text" name="libelle[]" placeholder="Libelle" class="form-control w-100 h-100 border-0" required>';
        cell3.innerHTML = '<input type="number" name="montant[]" placeholder="En {{strtolower($caisse)}}" class="form-control w-100 h-100 border-0" required>';
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

    // Fonction pour supprimer une ligne
    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Appel initial pour mettre à jour la somme totale
    updateTotalSum();
});

</script>

<!-- end wrapper -->
<div class="d-none">
    @include('header.footer')
</div>
