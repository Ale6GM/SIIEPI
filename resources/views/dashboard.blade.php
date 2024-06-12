@extends('adminlte::page')

@section('title', 'Panel Principal SIIEPI')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
<div class="row">
    <div class="alertas col wow fadeInUp">
        <div class="alert alert-primary text-center">
            <i class="fas fa-map"></i>
            <h3>Total de Areas</h3>
            <h4>{{$cantidadAreas}}</h4>
        </div>
    </div>
    <div class="alertas col wow fadeInUp" data-wow-delay="0.5s">
        <div class="alert alert-success text-center">
            <i class="fas fa-plug"></i>
            <h3>Total de UPS</h3>
            <h4>{{$cantidadUps}}</h4>
        </div>
    </div>
    <div class="alertas col wow fadeInUp" data-wow-delay="1s">
        <div class="alert alert-info text-center">
            <i class="fas fa-desktop"></i>
            <h3>Total de Computadoras</h3>
            <h4>{{$cantidadComputadoras}}</h4>
        </div>
    </div>
    <div class="alertas col wow fadeInUp" data-wow-delay="1.5s">
        <div class="alert alert-secondary text-center">
            <i class="fas fa-users"></i>
            <h3>Total de Usuarios</h3>
            <h4>{{$cantidadUsuarios}}</h4>
        </div>
    </div>
</div>
{{-- Area del Grafico --}}
<div class="card">
    <div class="row">
        <div class="col wow fadeInUp" data-wow-delay="2s">
            <div class="card-header bg-dark">
                <h5>Computadoras Por Areas</h5>
        
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h6>Selector de Gráfico</h6>
                        <div>
                            <select id="selectorGrafico1" class="form-control">
                                <option value="bar">Barra</option>
                                <option value="doughnut">Dona</option>
                                <option value="polarArea">Area Polar</option>
                                <option value="radar">Radar</option>
                                <option value="line">Linea</option>
                                <option value="pie">Pastel</option>

                            </select>
                        </div>
                    </div>
                </div>
                <canvas style="max-width: 700px; max-height: 500px;" id="grafico"></canvas>
            </div>
            <div class="card-footer">
                <button id="btnExport1" class="btn btn-success"> <i class="fas fa-file-export"></i> Exportar a PNG</button>
            </div>
        </div>
        <div class="col wow fadeInUp" data-wow-delay="2.3s">
            <div class="card-header bg-dark">
                <h5>UPS por Area</h5>
        
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h6>Selector de Gráfico</h6>
                        <div>
                            <select id="selectorGrafico2" class="form-control">
                                <option value="line">Linea</option>
                                <option value="bar">Barra</option>
                                <option value="doughnut">Dona</option>
                                <option value="polarArea">Area Polar</option>
                                <option value="radar">Radar</option>
                                <option value="pie">Pastel</option>

                            </select>
                        </div>
                    </div>
                </div>
                <canvas style="max-width: 700px; max-height: 500px;" id="grafico2"></canvas>
            </div>
            <div class="card-footer">
                <button id="btnExport2" class="btn btn-success"> <i class="fas fa-file-export"></i> Exportar a PNG</button>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
@stop

@section('css')
   {{--  <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    <script>
        new WOW().init();
    </script>

    <script>
        
        function generarGraficoDinamico() {
            let tipoGrafico = document.getElementById('selectorGrafico1'); 
    fetch('http://siiepi.test/admin/computadoras_areas')
        .then(response => response.json())
        .then(data => {
            const areas = data;
            const ctx = document.getElementById('grafico').getContext('2d');
            let chart = Chart.getChart(ctx); // Obtener el gráfico existente, si hay uno

            if (chart) {
                chart.destroy(); // Destruir el gráfico existente si existe
            }

            const chartData = {
                labels: areas.map(item => item.area),
                datasets: [{
                    label: 'Computadoras',
                    data: areas.map(item => item.cantidad),
                    borderWidth: 1
                }]
            };

            
            chart = new Chart(ctx, {
                type: tipoGrafico.value,
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function generarGraficoDinamico2() {
    let tipoGrafico2 = document.getElementById('selectorGrafico2');	
	fetch('http://siiepi.test/admin/ups_areas')
        .then(response => response.json())
        .then(data => {
            const areas = data;
            const ctx = document.getElementById('grafico2').getContext('2d');
            let chart = Chart.getChart(ctx); // Obtener el gráfico existente, si hay uno

            if (chart) {
                chart.destroy(); // Destruir el gráfico existente si existe
            }

            const chartData = {
                labels: areas.map(item => item.area),
                datasets: [{
                    label: 'UPS',
                    data: areas.map(item => item.cantidad),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            chart = new Chart(ctx, {
                type: tipoGrafico2.value ,
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

generarGraficoDinamico();
generarGraficoDinamico2();

document.getElementById('selectorGrafico2').addEventListener('change', function () {
    generarGraficoDinamico2();
});

document.getElementById('selectorGrafico1').addEventListener('change', function () {
    generarGraficoDinamico();
});

//Para Exportar Graficos a PNG Grafico 1
document.getElementById('btnExport1').addEventListener('click', function() {
    let canvas = document.getElementById('grafico');
    let url = canvas.toDataURL('image/png');
		let a = document.createElement('a');
		a.href = url;
		a.download = 'grafico.png';
		document.body.appendChild(a);
		a.click();
		document.body.removeChild(a);
})

// para exportar graficos a PNG Grafico 2
document.getElementById('btnExport2').addEventListener('click', function() {
    let canvas = document.getElementById('grafico2');
    let url = canvas.toDataURL('image/png');
		let a = document.createElement('a');
		a.href = url;
		a.download = 'grafico.png';
		document.body.appendChild(a);
		a.click();
		document.body.removeChild(a);
})

    </script>
@stop
