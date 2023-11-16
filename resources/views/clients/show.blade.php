@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<div class="home-layout">
    <x-nav />
    <div class="home-content">
        <div class="home-banner">
            <h2>Editar Cliente</h2>
        </div>
        <div class="home-form">
            <form method="POST" action="{{ route("clients.update", ["client" => $clients->id]) }}">
                @csrf
                <div class="column-group">
                    <div class="form-group">
                        <label for="type">Tipo de cliente</label>
                        <select name="type" required>
                            <option value="PF" selected>Pessoa física</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" value="{{ $clients->name }}" required />
                    </div>
                </div>
                <div class="column-group">
                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input type="text" name="rg" id="rg" value="{{ $clients->rg }}" required />
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" value="{{ $clients->cpf }}" required />
                    </div>
                </div>
                <div class="column-group">
                    <div class="form-group">
                        <label for="birthday">Data de nascimento</label>
                        <input type="date" name="birthday" value="<?php echo date('Y-m-d', $clients->birthday); ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" value="{{ $clients->email }}" required />
                    </div>
                </div>
                <div class="column-group">
                    <div class="form-group">
                        <label for="cellphone">Celular</label>
                        <input type="text" name="cellphone" id="cellphone" value="{{ $clients->cellphone }}" required />
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" value="{{ $clients->cep }}" required />
                    </div>
                </div>
                <div class="column-group">
                    <div class="form-group">
                        <label for="address">Endereço completo</label>
                        <input type="text" name="address" value="{{ $clients->address }}" required />
                    </div>
                    <div class="form-group">
                        <label for="number">Número</label>
                        <input type="number" name="number" value="{{ $clients->number }}" required />
                    </div>
                </div>
                <div class="column-group">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status">
                            <option <?php if ($clients->status == "Ativo") {
                                        echo "selected";
                                    } ?> value="Ativo">Ativo</option>
                            <option <?php if ($clients->status == "Inativo") {
                                        echo "selected";
                                    } ?>>Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="column-footer">
                    <div>
                        <a href={{ route("clients.list") }}>Voltar</a>
                    </div>
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </div>
        <script>
            $("#cellphone").inputmask({
                mask: ['(99) 9999-9999', '(99) 99999-9999'],
                keepStatic: true
            });
            Inputmask("99.999.999-9").mask("#rg");
            Inputmask("999.999.999-99").mask("#cpf");
            Inputmask("99999-999").mask("#cep");
        </script>
    </div>
</div>
@endsection