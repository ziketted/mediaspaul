@include('header.header')
<div class="wrapper">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->

            <div class="col-lg-4 mt-4">
                <form action="{{route('centre.store')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-t-0 m-b-2">Ajouter un Centre</h4>
                            <div class="row">
                                <div class="col-lg-12 mt-3 pb-3">
                                    <div class="form-group">
                                        <label>Centre</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" name="libelle" class="form-control"
                                                    placeholder="Nom du centre" id="nom" required>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-lg-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-2">Liste des Centres</h4>

                        <div class="row">
                            <div class="col-lg-12 mt-3" style="padding-right: 50px; padding-left:50px;">

                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Centre</th>
                                            <th class="text-center">option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="w-25 text-center">
                                                <form action="" method="POST" style="display:inline;">
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
</div>
@include('header.footer')
