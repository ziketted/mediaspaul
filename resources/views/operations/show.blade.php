@include('header.header')
<div class="wrapper">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container-fluid">
       
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body p-5">
                        <h4 class="m-t-0 m-b-2">Liste des opérations éffectuées.</h4>
                        <div class="mt-3"> 
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Date opération</th>
                                        <th>Désignation</th>
                                        <th>Bénéficiaire</th>
                                        <th>Type</th>
                                        <th>Montant</th>
                                        <th>options</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a class="btn btn-secondary text-white">Voir </a>
                                            <form action="" method="POST"
                                                style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"
                                                    onclick="if (!confirm('Voulez-vous vraiment supprimer cet élément ?')) { return false }">Supprimer
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-none">
    @include('header.footer')
</div>