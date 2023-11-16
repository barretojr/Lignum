@extends('layouts.app')
@section('content')
<div class="home-layout">
    <x-nav />
    <div class="home-content">
        <div class="home-banner">
            <h2>Clientes</h2>
        </div>
        <div class="home-products">
            <?php
            if ($clients) {
                echo $clients;
            }
            ?>
        </div>
    </div>
</div>
@endsection