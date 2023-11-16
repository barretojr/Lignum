@extends('layouts.app')

@section('content')
<div class="home-layout">
    <x-nav />
    <div class="home-content">
        <div class="home-banner">
            <h2>Contas a Pagar</h2>
        </div>
        <div class="home-form">
            <form method="POST" action="{{ route('payables.insert') }}">
                @csrf
                <div class="column-group">
                    <!-- Outros campos do formulário -->
                    
                    <div class="form-group">
                        <label for="typefinancial">Tipo Financeiro</label>
                        <select name="typefinancial" required>
                            <option value="1">Entrada</option>
                            <option value="2">Saída</option>
                        </select>
                    </div>
                </div>
                
                <!-- Restante do formulário -->
                
                <div class="column-footer">
                    <div>
                        <a href="{{ route('financial.index') }}">Voltar</a>
                    </div>
                    <button type="submit">Finalizar</button>
                </div>
            </form>
        </div>
        <!-- Seu script JavaScript aqui -->
    </div>
</div>
@endsection
