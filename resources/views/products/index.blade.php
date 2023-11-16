@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>Pedidos</h2>
            </div>
            <div class="home-buttons">
                <a href="{{ route('products.store') }}">NOVOS Pedidos</a>
                <a href="{{ route('products.list') }}">Pedidos</a>
            </div>
            <div>
                <?php
                if(isset($created)){
                    echo "<div class='alert'><p>Pedido inserido com sucesso.</p></div>";
                }

                if(isset($updated)){
                    echo "<div class='alert'><p>Pedido atualizado com sucesso.</p></div>";
                }
                ?>
            </div>
        </div>
    </div>
@endsection
