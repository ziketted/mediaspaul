@include('header.header')
<div class="wrapper">
    <div class="container-fluid ">
        <!-- Page-Title -->
        <br>


        <div class="card">
            <div class="card-header">


                <figure>
                    <blockquote class="blockquote">
                      <p>Tous les détails sur vos comptes.</p>
                       Vous avez au total  compte. <cite title="Source Title"><b>178</b>compte(s)</cite>
                    </blockquote>
                  </figure>
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
                                    <th>Comptes </th>
                                    <th>Montant</th>
                                    <th>options</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>002457</td>
                                    <td>Compte  libéral</td>
                                    <td>4578000 USD</td>
                                    @include('header.header')
                                    <div class="wrapper">
                                        <div class="container-fluid ">
                                            <!-- Page-Title -->
                                            <br>
                                            <div class="row">
                                                <div class="col-6 ">
                                                    <div class="card">

                                                        <h5 class="card-header">Nos comptes <span class="badge badge-info fs-2 float-right p-2">01</span>
                                                        </h5>


                                                        <div class="card-body">

                                                            <p class="card-text">Tous les comptes que notre sociéte possède ainsi que les détails de chaque
                                                                compte. <br> vous pouvez aussi créer d'autre compte <a href="#">ici </a></p>
                                                            <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 ">
                                                    <div class="card">

                                                        <h5 class="card-header">Nos secteurs <span class="badge badge-info fs-2 float-right">02</span></h5>


                                                        <div class="card-body">

                                                            <p class="card-text">Les secteurs nous permettent d'affecter les ressouces que la structure
                                                                possède et voir les affectations liées pour chaque compte <a href="#">ici </a></p>
                                                            <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 ">
                                                    <div class="card">
                                                        <h5 class="card-header">Nos comptes <span class="badge badge-info fs-2 float-right">03</span></h5>
                                                        <div class="card-body">
                                                            <p class="card-text">Tous les comptes que notre sociéte possède ainsi que les détails de chaque
                                                                compte. <br> vous pouvez aussi créer d'autre compte <a href="#">ici </a></p>
                                                            <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 ">
                                                    <div class="card">
                                                        <h5 class="card-header">Nos comptes <span class="badge badge-info fs-2 float-right">04</span></h5>
                                                        <div class="card-body">
                                                            <p class="card-text">Tous les comptes que notre sociéte possède ainsi que les détails de chaque
                                                                compte.<br> vous pouvez aussi créer d'autre compte <a href="#">ici </a></p>
                                                            <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"></div>

                                        </div>
                                    </div>

                                    @include('header.footer')
                                           <td colspan="1" style="min-width: 25% !important ;" > <a class="btn btn-info  text-white" href="#"><i class="fas fa-eye"></i> Voir les opérations </a></td>
                                </tr>
                                {{-- @foreach ($operations as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->beneficiaire}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->caisse}}</td>
                                    <td>
                                        <a class="btn btn-secondary text-white">Voir </a>
                                        <form action="{{route('operation.destroy',$item->id )  }}" method="POST"
                                            style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="if (!confirm('Voulez-vous vraiment supprimer cet élément ?')) { return false }">Supprimer
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                --}}
                            </tbody>
                        </table>

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
