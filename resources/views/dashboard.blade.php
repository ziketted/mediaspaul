@include('header.header')
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

        <div class="row">
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
                                <a href="{{route('operation.create')}}" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal"> + Ajouter une
                                    opération</a>

                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title m-0" id="custom-width-modalLabel">Choisissez une caisse</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-6 p-1">
                                                                <a href="#">
                                                                    <div class="shadow rounded">
                                                                        <i class="fas fa-dollar-sign fa-5x p-5"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6 p-1">
                                                                <a href="#">
                                                                    <div class="shadow rounded">
                                                                        <i class="fas fa-dollar-sign fa-5x p-5"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6 p-1">
                                                                <a href="#">
                                                                    <div class="shadow rounded">
                                                                        <i class="fas fa-dollar-sign fa-5x p-5"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6 p-1">
                                                                <a href="#">
                                                                    <div class="shadow rounded">
                                                                        <i class="fas fa-dollar-sign fa-5x p-5"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
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
                                    <th>Date opération</th>
                                    <th>Désignation</th>
                                    <th>Bénéficiaire</th>
                                    <th>Type</th>
                                    <th>Montant</th>
                                    <th>options</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($operations as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->beneficiaire}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->montant}}</td>
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

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div> <!-- End Row -->


    </div>
</div>
<!-- end wrapper -->



@include('header.footer')
