@include('header.header')
<div class="wrapper">
    <div class="container-fluid ">
        <!-- Page-Title -->
        <br>
        <h3 class="fs-5">Rapport des opérations</h3>
        <p>la dévise de base utilisée est : <b>USD</b></p>
        <hr>
        <div class="row">
            <div class="col-4">
                <div class="card">

                    <h4 class="card-header">ENTREES <span class="badge badge-primary fs-2 float-right p-2">78.000
                            USD</span>
                    </h4>


                    <div class="card-body">
                        <p class="card-text">Toutes les opérations d'entrée provenant de la caisse <br> vous
                            pouvez aussi ajouter d'autres opérations<a href="#">ici </a></p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">

                    <h4 class="card-header">SORTIES <span class="badge badge-primary fs-2 float-right p-2">78.000
                            USD</span>
                    </h4>


                    <div class="card-body">

                        <p class="card-text">Toutes les opérations de sortie provenant de la caisse <br> vous
                            pouvez aussi ajouter d'autres opérations<a href="#">ici </a></p>

                    </div>
                </div>
            </div>
            <div class="col-4">

                <div class="card">

                    <h4 class="card-header">CAISSE ACTUELLE : <span  class="badge badge-success fs-2 float-right p-2 text-dark">00.000
                            USD</span>
                    </h4>


                    <div class="card-body">

                        <p class="card-text">La situation financière actuelle, calculée sur base de la différence entre les entrées et les sorties.</p>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-3 ">
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
            <div class="col-3 ">
                <div class="card">

                    <h5 class="card-header">Nos secteurs <span class="badge badge-info fs-2 float-right">02</span></h5>


                    <div class="card-body">

                        <p class="card-text">Les secteurs nous permettent d'affecter les ressouces que la structure
                            possède et voir les affectations liées pour chaque compte <a href="#">ici </a></p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                    </div>
                </div>
            </div>
            <div class="col-3 ">
                <div class="card">
                    <h5 class="card-header">Nos centres d'intérêt <span
                            class="badge badge-info fs-2 float-right">03</span></h5>
                    <div class="card-body">
                        <p class="card-text">Tous les comptes que notre sociéte possède ainsi que les détails de chaque
                            compte. <br> vous pouvez aussi créer d'autre compte <a href="#">ici </a></p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                    </div>
                </div>
            </div>
            <div class="col-3 ">
                <div class="card">
                    <h5 class="card-header">Nos Caisses <span class="badge badge-info fs-2 float-right">04</span></h5>
                    <div class="card-body">
                        <p class="card-text">Toutes les caisses (sommes et disponibilités) en diverse dévise. <a
                                href="#">ici </a></p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i>&nbsp; &nbsp;Voir le détail</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-30">Statistiques des entrées - sorties </h4>
                        <canvas id="myChart" width="150" height="150"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-30">Realtime Statistics</h4>
                        <canvas id="myChart1" width="150" height="150"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Entrees', 'Sorties'],
            datasets: [{
                label: 'Sample Data',
                data: [15, 10],
                backgroundColor: ['orange', 'blue']
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janvier', 'fevrier', 'Mars', 'Avril', 'Mais', 'Juin'],
            datasets: [{
                label: 'Sample Data',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: ['red', 'blue', 'blue', 'green', 'purple', 'orange']
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


@include('header.footer')
