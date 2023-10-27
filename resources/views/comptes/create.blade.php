@include('header.header')
<div class="wrapper">

        <form action="{{route('compte.store')}}" method="POST">
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
                                                <input type="number" name="numero" class="form-control"
                                                    placeholder="numero du compte" id="numero" required>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nom du Compte</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" name="compte" class="form-control"
                                                    placeholder="Nom du Compte" id="nom" required>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     </form>
    <div class="col-lg-8 mt-4">

        <div class="card">
            <div class="card-header">


                      <h4 class="header-title">Tous les détails sur vos comptes.</h4>

            </div>
            <div class="card-body d-flex justify-content-center">
                <form class="form-inline">
                    <div class="form-group mx-2">
                        <label for="">Du </label>
                    </div>
                    <div class="form-group mx-2">
                        <input type="date" class="form-control" id="fromDate" name="fromDate" required>
                    </div>


                    <div class="form-group mx-sm-3">
                       au
                    </div>
                    <div class="form-group mx-sm-3  ">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="date" class="form-control" id="toDate" name="toDate" required>
                    </div>
                    <button type="submit" class="btn btn-primary " onclick="return validateDateRange();"><i class="fas fa-search"></i>&nbsp;
                        Rechercher</button>
                </form>
            </div>
        </div>
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
                                    <th>Comptant ($)</th>
                                    <th class="text-center">options</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($comptes as $item)
                                
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->numero }}</td>
                                    <td>{{ $item->compte }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td class="w-25 text-center">
                                        <a href="#" class="btn btn-primary"> <i class="fas-fa-eye"></i>&nbsp; Voir les détails.</a>
                                        <form action="{{ route('compte.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            {{-- --}} @csrf
                                            @method('DELETE')

                                            {{-- <button class="btn btn-danger">Supprimer
                                            </button> --}}
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
<script>
    function validateDateRange() {
        const fromDate = new Date(document.getElementById('fromDate').value);
        const toDate = new Date(document.getElementById('toDate').value);

        if (fromDate > toDate) {
            alert("From Date must be less than To Date.");
            return false;
        }

        return true;
    }
    </script>
@include('header.footer')
