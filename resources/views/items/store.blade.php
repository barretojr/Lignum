@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>NOVO PRODUTO</h2>
            </div>
            <div class="home-form">
                <form method="POST" action="{{ route("items.insert") }}">
                    @csrf
                    <div class="column-group">
                        <div class="form-group">
                            <label for="description">Descrição do produto</label>
                            <input type="text" name="description" required/>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <input type="text" name="type" required/>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="unity">Unidade de medida</label>
                            <input type="text" name="unity" id="unity" required/>
                        </div>
                        <div class="form-group">
                            <label for="partner">Fornecedor</label>
                            <select name="partner" required>
                                <option value="0">Sem fornecedor</option>
                                <?php
                                if($partners){
                                    foreach ($partners as $partner){
                                        echo "<option value='{$partner->id}'>{$partner->name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="quantity">Quantidade</label>
                            <input type="number" name="quantity" required/>
                        </div>
                        
                    </div>
                    <div class="column-footer">
                        <div>
                            <a href={{ route("stock.index") }}>Voltar</a>
                        </div>
                        <button type="submit">Finalizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection