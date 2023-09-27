@include('header.header')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row m-5 p-3">
            <!-- Basic example -->
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-30">Opération de caisse.</h4>

                        <form action="{{route('operation.store')}}" method="POST">
                            @csrf
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
                                <label>Type opération</label>
                                <div>
                                    <select class="form-control" name="type" aria-label="Default select example">
                                        <option value="Entrée" selected>Entrée</option>
                                        <option value="Sortie">Sortie</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Montant</label>
                                <input type="number" name="montant" class="form-control" id="exampleInputEmail1"
                                    placeholder="Ex.100$" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bénéficiaire</label>
                                <input type="text" name="beneficiaire" class="form-control" id="exampleInputEmail1"
                                    placeholder="Bénéficiaire" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                                    placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
                        </form>
                    </div><!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-->

            <!-- Horizontal form -->
            <div class="col-lg-4">
                <h3>Title</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dicta dolore aliquid quas et nobis
                    suscipit iste illo ratione. Quibusdam illo eius omnis ab pariatur ratione fugit eaque asperiores
                    officia.</p>
            </div> <!-- col -->

        </div>
    </div><!-- End row -->


</div>
</div>
<!-- end wrapper -->
@include('header.footer')
