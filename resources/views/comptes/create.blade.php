@include('header.header')
<div class="wrapper">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <form action="{{route('operation.store')}}" method="POST">
        @csrf
    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-2">Ajouter un Compte</h4>
                        <div class="row">
                            <div class="col-lg-12 mt-3 pb-3" style="padding-right: 50px; padding-left:50px;">
                                <div class="form-group">
                                    <label>Numero du Compte</label>
                                    <div>
                                        <div class="input-group">
                                            <input type="number" name="numero" class="form-control" placeholder="numero du compte"
                                                id="numero" required>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nom du Compte</label>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" name="nom" class="form-control" placeholder="Nom du Compte"
                                                id="nom" required>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-2">Liste des comptes</h4>

                        <div class="row">
                            <div class="col-lg-12 mt-3" style="padding-right: 50px; padding-left:50px;">

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Numéro du Compte</th>
                                <th>Nom du Compte</th>
                                <th class="text-center">options</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="w-25 text-center">
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
    </form>
</div>
@include('header.footer')