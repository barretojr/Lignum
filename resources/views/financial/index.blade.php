@extends('layouts.app')
@section('content')
<head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<div class="home-layout">
    <x-nav />
    <div class="home-content">
        <div class="home-banner">
            <h2>Financeiro</h2>
        </div>
        <div class="home-buttons">
            <a href="">Nova Entrada</a>
            <a href="">Nova Saída</a>
        </div>
        <div class="row">
            <!-- Cards da parte de cima -->
            <div class="col-md-4">
                <div class="card text-center financial-card">
                    <div class="card-header">
                        Total Receita
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">R$ 1.000,00</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center financial-card">
                    <div class="card-header">
                        Contas a Receber
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">R$ 500,00</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center financial-card">
                    <div class="card-header">
                        Lucro Líquido
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">R$ 300,00</h5>
                    </div>
                </div>
            </div>
        </div>
                <!-- Cards da parte de baixo -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center financial-card">
                    <div class="card-header">
                        Contas a Pagar
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">R$ 200,00</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center financial-card">
                    <div class="card-header">
                        Total Despesas
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">R$ 400,00</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center financial-card">
                    <div class="card-header">
                        Saldo Final do Mês
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">R$ 700,00</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card financial-card">
                    <div class="card-header">
                        Contas a Receber e Pagar
                    </div>
                    <div class="card-body">
                        <canvas class="my-4 w-100" id="myChart" width="697" height="294"
                                style="display: block; box-sizing: border-box; height: 294px; width: 697px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var contasReceberData = {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio"],
        datasets: [{
            label: 'Contas a Receber',
            data: [1000, 1200, 800, 1500, 50],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };
    var contasPagarData = {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio"],
        datasets: [{
            label: 'Contas a Pagar',
            data: [500, 700, 900, 1200, 1500],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };
    
    var contasReceberPagarData = {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio"],
        datasets: [{
            label: 'Contas a Receber e Pagar',
            data: [1500, 1900, 1700, 2700, 1550],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    };

    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    var contasReceberChart = new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: contasReceberPagarData,
        options: options
    });
</script>
@endsection
