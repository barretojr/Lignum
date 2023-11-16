@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>Estoque</h2>
            </div>
            <div class="home-buttons">
                <a href="{{ route('partners.store') }}">NOVOS Fornecedores</a>
                <a href="{{ route('partners.list') }}">Fornecedores</a>
            </div>
            <div class="home-buttons">
                <a href="{{ route('items.store') }}">NOVOS Produtos</a>
                <a href="{{ route('items.list') }}">Produtos</a>
            </div>
            <div>
                <?php
                if(isset($created)){
                    echo "<div class='alert'><p>Item inserido com sucesso.</p></div>";
                }

                if(isset($updated)){
                    echo "<div class='alert'><p>Item atualizado com sucesso.</p></div>";
                }
                ?>
            </div>
        </div>
    </div>
@endsection