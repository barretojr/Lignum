@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>EDITAR PEDIDO</h2>
            </div>
            <div class="home-form">
                <form method="POST" action="{{ route("products.update", ["product" => $products->id]) }}">
                    @csrf
                    @if($clients)
                        <div class="column-group">
                            <div class="form-group">
                                <label for="client">Cliente</label>
                                <select name="client" required>
                                    <option selected>{{ $clients->name }}</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="column-group">
                        <div class="form-group">
                            <label for="room">Cômodo da casa</label>
                            <input type="text" name="room" value="{{ $products->room }}" required />
                        </div>
                        <div class="form-group">
                            <label for="itens">Itens do pedido</label>
                            <input type="text" name="itens" value="{{ $products->itens }}" />
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="description">Descrição do pedido</label>
                            <input type="text" name="description" required value="{{ $products->description }}"/>
                        </div>
                        <div class="form-group">
                            <label for="value">Valor do pedido</label>
                            <input type="number" name="value" id="valor" required value="{{ $products->value }}"/>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="description">Forma de pagamento</label>
                            <select name="method" required>
                                <option value="">Selecione</option>
                                <option <?php if($products->method == "Boleto bancário"){ echo "selected"; } ?>>Boleto bancário</option>
                                <option <?php if($products->method == "Cartão de crédito"){ echo "selected"; } ?>>Cartão de crédito</option>
                                <option <?php if($products->method == "PIX"){ echo "selected"; } ?>>PIX</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="installments">Parcelas</label>
                            <select name="installments" required>
                                <option value="1" <?php if($products->installments == 1){ echo "selected"; } ?>>À vista</option>
                                <option <?php if($products->installments == 2){ echo "selected"; } ?>>2</option>
                                <option <?php if($products->installments == 3){ echo "selected"; } ?>>3</option>
                                <option <?php if($products->installments == 4){ echo "selected"; } ?>>4</option>
                                <option <?php if($products->installments == 5){ echo "selected"; } ?>>5</option>
                                <option <?php if($products->installments == 6){ echo "selected"; } ?>>6</option>
                                <option <?php if($products->installments == 7){ echo "selected"; } ?>>7</option>
                                <option <?php if($products->installments == 8){ echo "selected"; } ?>>8</option>
                                <option <?php if($products->installments == 9){ echo "selected"; } ?>>9</option>
                                <option <?php if($products->installments == 10){ echo "selected"; } ?>>10</option>
                                <option <?php if($products->installments == 11){ echo "selected"; } ?>>11</option>
                                <option <?php if($products->installments == 12){ echo "selected"; } ?>>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="expiration">Prazo de entrega</label>
                            <input type="date" name="expiration" value="<?php echo date('Y-m-d', $products->expiration); ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" required>
                                <option value="active" <?php if($products->status == "active"){ echo "selected"; } ?>>Ativo</option>
                                <option value="waiting" <?php if($products->status == "waiting"){ echo "selected"; } ?>>Em andamento</option>
                                <option value="finished" <?php if($products->status == "finished"){ echo "selected"; } ?>>Concluído</option>
                                <option value="canceled" <?php if($products->status == "canceled"){ echo "selected"; } ?>>Cancelado</option>
                            </select>
                        </div>
                    </div>
                    <div class="column-footer">
                        <div>
                            <a href={{ route("products.list") }}>Voltar</a>
                        </div>
                        <button type="submit">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection