@include('header.header')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row m-5 p-3 ">
            <!-- Basic example -->
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-30">Opération de caisse.</h4>

                        <form action="{{route('operation.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4" style="padding-right: 50px; padding-left:50px; ">
                                    <div class="form-group">
                                        <label>Moyen de paiement</label>
                                        <div>
                                            <select class="form-control" name="type" aria-label="Default select example" required>
                                                <option value="Cash" selected>Cash</option>
                                                <option value="Cheque">Chèque</option>
        
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-4" style="border-right: 1px #F0F0F0 solid; padding-right: 50px; padding-left: 50px;">
                                    <div class="form-group">
                                        <label>Caisse</label>
                                        <div>
                                            <select class="form-control" name="caisse" aria-label="Default select example" disabled>
                                                <option value="Entrée" selected disabled>Caisse Principale USD</option>         
                                            </select>
                                        </div>
                                    </div>
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
                                            <select class="form-control" name="type" aria-label="Default select example" required>
                                                <option value="Entrée" selected>Entrée</option>
                                                <option value="Sortie">Sortie</option>
        
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-4" style="padding-right: 50px; padding-left: 50px; ">
                                    <div class="form-group">
                                        <label>Secteur</label>
                                        <div>
                                            <select class="form-control" name="secteur" aria-label="Default select example">
                                                <option value="" selected>Entrée</option>
                                                <option value="">Sortie</option>
        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Financement</label>
                                        <div>
                                            <select class="form-control" name="financement" aria-label="Default select example" required>
                                                <option value="" selected>Fond Propre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Centre d'intérêt</label>
                                        <div>
                                            <select class="form-control" name="centre" aria-label="Default select example">
                                                <option value="" selected>Kinshasa</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-lg-4" style="border-left: 1px #F0F0F0 solid; padding-right: 50px; padding-left: 50px; ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Libellé de l'opération</label>
                                        <input type="text" name="libelle" class="form-control" id="exampleInputEmail1"
                                            placeholder="Libellé de l'opération" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Montant</label>
                                        <input type="number" name="montant" class="form-control" id="exampleInputEmail1"
                                            placeholder="Ex.100$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                                            placeholder="Description de l'opération">
                                    </div>
                                </div>
                                
                            </div>
                           
                            <button type="submit" class="btn btn-primary waves-effect waves-light mt-5">Enregistrer</button>
                        </form>
                    </div><!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-->

       {{--      <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                <div class="row m-5 p-3">
                    <div class="w-100">
                        <div class="col-lg-12">
                           
                                    <h4 class="m-b-30 m-t-0">Buttons Example</h4>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
                                            <td>$327,900</td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
                                            <td>$205,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
                                            <td>$103,600</td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>$90,560</td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
                                            <td>$470,600</td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>$313,500</td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
                                            <td>$385,750</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>66</td>
                                            <td>2012/11/27</td>
                                            <td>$198,500</td>
                                        </tr>
                                        <tr>
                                            <td>Serge Baldwin</td>
                                            <td>Data Coordinator</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2012/04/09</td>
                                            <td>$138,575</td>
                                        </tr>
                                        <tr>
                                            <td>Zenaida Frank</td>
                                            <td>Software Engineer</td>
                                            <td>New York</td>
                                            <td>63</td>
                                            <td>2010/01/04</td>
                                            <td>$125,250</td>
                                        </tr>
                                        <tr>
                                            <td>Zorita Serrano</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>56</td>
                                            <td>2012/06/01</td>
                                            <td>$115,000</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Acosta</td>
                                            <td>Junior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>43</td>
                                            <td>2013/02/01</td>
                                            <td>$75,650</td>
                                        </tr>
                                        <tr>
                                            <td>Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td>Hermione Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
                                        </tr>
                                        <tr>
                                            <td>Lael Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jonas Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
                                        </tr>
                                        <tr>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                 
                    </div> <!-- End Row -->
                </div>
            </div> --}}

            <!-- Horizontal form -->
           {{--  <div class="col-lg-4">
                <h3>Title</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dicta dolore aliquid quas et nobis
                    suscipit iste illo ratione. Quibusdam illo eius omnis ab pariatur ratione fugit eaque asperiores
                    officia.</p>
            </div> --}} <!-- col -->

        </div>
    </div><!-- End row -->


</div>
<!-- end wrapper -->
@include('header.footer')
