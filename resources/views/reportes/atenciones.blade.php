@extends('layout.app')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Reporte: Frecuencia de atenciones</h3>
        </div>
      </div>
    </div>
    <div class="card-body" role="alert">
        <div id="container"></div>
   </div>
   
</div>
@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    //HIGHCHARTS WITH DATA LABELS
    Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Atenciones registradas mensualmente'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Cantidad de atenciones'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'atenciones registradas',
        data: @json($counts)
    }
    ]
});
</script>
@endpush
@section('footer')

<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(8)}}
</div>
@endsection

