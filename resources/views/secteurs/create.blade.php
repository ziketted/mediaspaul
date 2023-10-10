@include('header.header')
<div class="wrapper">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-4 mt-4">
                <div class="card">
                    <form action="{{route('secteur.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h4 class="m-t-0 m-b-2">Ajouter un Secteur</h4>
                            <div class="row">
                                <div class="col-lg-12 mt-3 pb-3" style="padding-right: 50px; padding-left:50px;">
                                    <div class="form-group">
                                        <label>Secteur</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" name="libelle" class="form-control"
                                                    placeholder="Nom du secteur" id="nom" required>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-2">Liste des Seteurs</h4>

                        <div class="row">
                            <div class="col-lg-12 mt-3" style="padding-right: 50px; padding-left:50px;">

                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Secteur</th>
                                            <th class="text-center">options</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($secteurs as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->libelle }}</td>
                                                <td class="w-25 text-center">
                                                    <form action="{{ route('secteur.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                        @method('DELETE')
                                                       @csrf
                                                        <button class="btn btn-danger"
                                                            onclick="if (!confirm('Voulez-vous vraiment supprimer cet élément ?')) { return false }">Supprimer
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                    @endforeach
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
