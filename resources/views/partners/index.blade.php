@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>Clientes</h2>
            </div>
            <div class="home-buttons">
                <a href="{{ route('clients.store') }}">Novo Cliente</a>
                <a href="{{ route('clients.list') }}">Clientes</a>
            </div>
            <div>
                <?php
                if(isset($created)){
                    echo "<div class='alert'><p>Cliente inserido com sucesso.</p></div>";
                }

                if(isset($updated)){
                    echo "<div class='alert'><p>Cliente atualizado com sucesso.</p></div>";
                }
                ?>
            </div>
        </div>
    </div>
@endsection