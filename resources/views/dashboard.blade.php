@include('header.header')
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<!-- jQuery (make sure to include it before SweetAlert2) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Aujourd'hui / <b> {{ date('Y-m-d') }}</b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       {{--  <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title m-0">Entrées</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h2>{{$operationEntree}} <span class="text-secondary"><b>usd</b></span></h2>
                            <p class="mt-4 mb-0 text-muted">0.0 cdf<span class=""><i
                                        class="fa fa-caret-up m-r-5"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title m-0">Sorties</h3>
                    </div>
                    <div class="card-body">
                        <div>

                            <h2>{{$operationSortie}} <span class="text-secondary"><b>usd</b></span></h2>

                            <p class="mt-4 mb-0 text-muted">0.0 cdf<span class=""><i
                                        class="fa fa-caret-up m-r-5"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title m-0">Solde en caisse</h3>
                    </div>
                    <div class="card-body">
                        <div>

                            <h2>{{$operationTotalcaisse}} <span class="text-secondary"><b>usd</b></span></h2>

                            <p class="mt-4 mb-0 text-muted">0.0 cdf<span class=""><i
                                        class="fa fa-caret-up m-r-5"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div>


                            <div>
                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#custom-width-modal"> + Ajouter une
                                    opération</a>

                                <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="custom-width-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title m-0" id="custom-width-modalLabel">Choisissez une
                                                    caisse</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body p-5">
                                                <div class="container">
                                                    <div class="row">

                                                        @foreach ($caisses as $item)
                                                        <div class="col-lg-12 p-1">
                                                            <a href="{{route('operation.create', ['id' => $item->caisse])}}/"
                                                                class="btn btn-block btn-danger text-uppercase">
                                                                Caisse {{$item->caisse}}
                                                            </a>
                                                        </div>
                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>

                            <p class="mt-4 mb-0 text-muted">Passez une opération d'entrée ou sortie de caisse.<span
                                    class="float-right"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                      Devise : <code><b>Dollar ($)</b></code>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Entrée : <code>{{$usd_entree_total}}$</code></a>
                    <a href="#" class="list-group-item list-group-item-action">Sortie : <code>{{$usd_sortie_total}}$</code></a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Solde en caisse: <code>{{$total_usd}}$</code></a>
                  </div>
            </div>
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                      Devise : <code><b>Franc congolais (Fc)</b></code>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Entrée : <code>{{$cdf_entree_total}}Fc</code></a>
                    <a href="#" class="list-group-item list-group-item-action">Sortie : <code>{{$cdf_sortie_total}}Fc</code></a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Solde en caisse: <code>{{$total_cdf}}Fc</code></a>
                  </div>
            </div>
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                      Devise : <code><b>Euro (£)</b></code>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Entrée : <code>{{$euro_entree_total}}£</code></a>
                    <a href="#" class="list-group-item list-group-item-action">Sortie : <code>{{$euro_sortie_total}}£</code></a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Solde en caisse: <code>{{$total_euro}}£</code></a>
                  </div>
            </div>
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                      Devise : <code><b>Cfa (-)</b></code>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Entrée : <code>{{$cfa_entree_total}}Cfa</code></a>
                    <a href="#" class="list-group-item list-group-item-action">Sortie : <code>{{$cfa_sortie_total}}Cfa</code></a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Solde en caisse: <code>{{$total_cfa}}Cfa</code></a>
                  </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0"></h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Date opération</th>
                                    <th>Bénéficiaire</th>
                                    <th>Type</th>
                                    <th>Montant</th>
                                    <th>Devise</th>
                                    <th>options</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                $k=1
                                @endphp
                                @foreach ($operations as $item)

                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->beneficiaire}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->caisse}}</td>
                                    <td>
                                        <a class="btn btn-secondary text-white">Voir </a>


                                        <a class="btn btn-primary" href="{{ route('operation.destroy', $item->id) }}"
                                            data-garage-id="{{ $item->id }}">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div> <!-- End Row -->


    </div>
</div>
<!-- end wrapper -->
<style>
    .my-swal-container {
    display: flex;
    justify-content: space-between;
}

.my-swal-confirm,
.my-swal-cancel {
    margin-right: 10px; /* Adjust the margin/padding as needed */
}
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('.table tbody tr').each(function() {
            $(this).find('.btn-primary').click(function(event) {
                event.preventDefault(); // Prevent default link behavior

                const garageId = $(this).data('garage-id'); // Get the garage ID from the button

                // Use SweetAlert2 for confirmation
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        container: 'my-swal-container', // Add a custom class to the container
                        confirmButton: 'btn btn-success my-swal-confirm', // Add padding to the confirm button
                        cancelButton: 'btn btn-danger my-swal-cancel' // Add padding to the cancel button
                    },
                    buttonsStyling: false
                });

                    swalWithBootstrapButtons.fire({
                    title: "Etes-vous sûr de supprimer cet élément ?",
                    text: "Vous ne pourrez plus revenir en arrière !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer ",
                    cancelButtonText: "Annuler ",
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                        title: "Suppression !",
                        text: "Cet élément a été supprimé avec succès.",
                        icon: "success"
                        }).then(() => {
                            // Redirect after the user clicks 'OK' in the success modal
                            window.location.href = `/operation/destroy/${garageId}`;
                        });

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                        title: "Annulation ",
                        text: "Vous avez annulé cette opération",
                        icon: "error"
                        });
                    }
                    });

            });
        });
    });

</script>


@include('header.footer')
