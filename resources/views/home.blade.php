@extends('layout.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js">
    <div class="container">
       
            <center>
                <h3>Estadisticas de visitas de casos de uso por Pagina</h3>
            </center>
           
            <br>
            <div class="row">
                <canvas id="myChart" width="100%" height="50px"></canvas>
            </div>
    </div>

    <script>
        var ctx = document.getElementById('myChart');
        var data = {
            datasets: [{
                data: {!! Auth()->user()->getStatsPages() !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 3
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'CU1 Gestionar Clientes',
                'CU2 Gestionar Mascota',
                'CU3 Gestionar Veterinario',
                'CU4:Gestionar  Categoria',
                'CU5: Gestionar Producto',
                'CU6: Gestionar Ventas',
                'CU7: Gestionar Atenciones',
                'CU8: Reportes y Estadisticas',
            ]
        };

        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: Chart.defaults.Pie
        });
    </script>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->total()}}
</div>
@endsection
