@extends('layouts.app')

@section('content')
<div class="home-layout">
    <x-nav />
    <div class="home-content">
        <div class="home-banner">
            <h2>Contas a Receber</h2>
        </div>
        <div class="home-form">
            <form method="POST" action="{{ route('receivables.insert') }}">
                @csrf
                <div class="column-group">
                    
                    
                    
                </div>
                
               
                
                <div class="column-footer">
                    <div>
                        <a href="{{ route('financial.index') }}">Voltar</a>
                    </div>
                    <button type="submit">Finalizar</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
