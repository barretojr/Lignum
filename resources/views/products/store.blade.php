@extends('layouts.app')
@section('content')
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>NOVO PEDIDO</h2>
            </div>
            <div class="home-form">
                <form method="POST" action="{{ route("products.insert") }}">
                    @csrf
                    <div class="column-group">
                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <select name="client" required>
                                <option value="0">Sem cliente</option>
                                <?php
                                if($clients){
                                    foreach ($clients as $client){
                                        echo "<option value='{$client->id}'>{$client->name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product">Produto</label>
                            <select name="product" required>
                                <option value="0">Sem produto</option>
                                <?php
                                if($items){
                                    foreach ($items as $item){
                                        echo "<option value='{$item->id}'>{$item->type}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="room">Cômodo da casa</label>
                            <input type="text" name="room" required />
                        </div>
                        <div class="form-group">
                            <label for="itens">Itens do pedido</label>
                            <input type="text" name="itens" />
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="description">Descrição do pedido</label>
                            <input type="text" name="description" required />
                        </div>
                        <div class="form-group">
                            <label for="value">Valor do pedido</label>
                            <input type="text" name="value" id="valor" required />
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="description">Forma de pagamento</label>
                            <select name="method" required>
                                <option value="">Selecione</option>
                                <option>Boleto bancário</option>
                                <option>Cartão de crédito</option>
                                <option>PIX</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="installments">Parcelas</label>
                            <select name="installments" required>
                                <option value="1" selected>À vista</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="expiration">Prazo de entrega</label>
                            <input type="date" name="expiration" required />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" required>
                                <option value="active" selected>Ativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="column-footer">
                        <div>
                            <a href={{ route("products.index") }}>Voltar</a>
                        </div>
                        <button type="submit">Finalizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection