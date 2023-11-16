@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>EDITAR PRODUTO</h2>
            </div>
            <div class="home-form">
                <form method="POST" action="{{ route("items.update", ["item" => $items->id]) }}">
                    @csrf
                    <div class="column-group">
                        <div class="form-group">
                            <label for="description">Descrição do produto</label>
                            <input type="text" name="description" value="{{ $items->description }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <input type="text" name="type" value="{{ $items->type }}" required/>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="unity">Unidade de medida</label>
                            <input type="text" name="unity" id="unity" value="{{ $items->unity }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="partner">Fornecedor</label>
                            <select name="partner" required>
                                <option value="{{ $partners->id }}" selected>{{ $partners->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="quantity">Quantidade</label>
                            <input type="number" name="quantity" value="{{ $items->quantity }}" required/>
                        </div>
                        
                    </div>
                    <div class="column-footer">
                        <div>
                            <a href={{ route("items.list") }}>Voltar</a>
                        </div>
                        <button type="submit">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection