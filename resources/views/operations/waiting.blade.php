@include('header.header')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body p-5">
                        <h4 class="m-t-0 m-b-30">Opération en attente de validation.</h4>

                   
                
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
                                                        <a class="btn btn-secondary text-white" href="#">Voir </a>
                                                        
                                                            <button class="btn btn-danger"
                                                                onclick="if (!confirm('Voulez-vous vraiment supprimer cet élément ?')) { return false }">Supprimer
                                                            </button>
                                                        </a>
                                                    </td>
                
                                                </tr>
                                               
                
                                            </tbody>
                                        </table>
                
                
                     
                    </div><!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-->          
        </div>
    </div><!-- End row -->
</div>
<!-- end wrapper -->
@include('header.footer')