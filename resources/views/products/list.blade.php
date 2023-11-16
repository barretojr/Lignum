@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>Pedidos</h2>
            </div>
            <div class="home-products">
                <?php
                    if($view){
                        echo $view;
                    }
                ?>
            </div>
        </div>
    </div>
@endsection