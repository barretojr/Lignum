@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <div class="home-layout">
        <x-nav />
        <div class="home-content">
            <div class="home-banner">
                <h2>Novo Fornecedor</h2>
            </div>
            <div class="home-form">
                <form method="POST" action="{{ route("partners.insert") }}">
                    @csrf
                    <div class="column-group">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" required/>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="email">E-mail para contato</label>
                            <input type="email" name="email" id="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="cellphone">Celular</label>
                            <input type="text" name="cellphone" id="cellphone" required/>
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" required/>
                        </div>
                        <div class="form-group">
                            <label for="number">Número</label>
                            <input type="text" name="number" required />
                        </div>
                    </div>
                    <div class="column-group">
                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input type="text" name="complement" id="complement" required />
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" required />
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
            <script>
                 $("#cellphone").inputmask({
                    mask: ['(99) 9999-9999', '(99) 99999-9999'],
                    keepStatic: true
                });
                Inputmask("99.999.999/9999-99").mask("#cnpj");
                Inputmask("99999-999").mask("#cep");
            </script>
        </div>
    </div>
@endsection