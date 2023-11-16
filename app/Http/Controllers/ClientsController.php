<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index(){
        return view('clients.index');
    }

    public function store(){
        return view('clients.store');
    }

    public function list(){
        $clients = DB::table('clients')
            ->orderBy('created_at', 'asc')
            ->get();

        if(count($clients) > 0){
            $clientView = '
            <form style="width: 100%;" method="POST" action="'.route('clients.search').'">
                <input type="hidden" name="_token" value="'.csrf_token().'" />
                <input type="search" name="search_client" required />
                <button type="submit">Pesquisar</button>
            </form>';

            $clientView .= "<div style='overflow-x:auto;'>";
            $clientView .= "<table style='width: 100%; '>";
            $clientView .= "
            <thead>
            <tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Data de nascimento</th>
                <th>Status</th>
                <th>Ações</th>
                <th>Histórico</th>
            </tr>
            </thead>
            ";
            $clientView .= "<tbody>";
            foreach ($clients as $key => $client) {
                $birthdayData = date("d/m/Y", $client->birthday);
                $clientView .=
                    '
                    <tr>
                        <td>'.$client->id.'</td>
                        <td>'.$client->name.'</td>
                        <td>'.$client->rg.'</td>
                        <td>'.$client->cpf.'</td>
                        <td>'.$client->email.'</td>
                        <td>'.$client->cellphone.'</td>
                        <td>'.$client->address.'</td>
                        <td>'.$client->number.'</td>
                        <td>'.$birthdayData.'</td>
                        <td>'.$client->status.'</td>
                        <td><a href="'.route('clients.show', ['client' => $client->id]).'">Detalhes</a></td>
                        <td><a href="'.route('clients.historic', ['client' => $client->id]).'">Ver histórico</a></td>
                    </tr>
                    ';
            }
            $clientView .= "</tbody>";
            $clientView .= "</table>";
            $clientView .= "</div>";
        }
        else{
            $clientView = false;
        }

        return view("clients.list", ["view" => $clientView]);
    }

    public function search(Request $r){
        $clients = DB::table('clients')
            ->where('name', 'LIKE', '%'.$r->search_client.'%')
            ->orderBy('created_at', 'asc')
            ->get();

        $clientView = '
            <form style="width: 100%;" method="POST" action="'.route('clients.search').'">
                <input type="hidden" name="_token" value="'.csrf_token().'" />
                <input type="search" name="search_client" value="'.$r->search_client.'"/>
                <button type="submit">Pesquisar</button>
                <a href="'.route('clients.list').'">Limpar filtro</a>
            </form>';

        if(count($clients) > 0){
            $clientView .= "<div style='overflow-x:auto;'>";
            $clientView .= "<table style='width: 100%; '>";
            $clientView .= "
            <thead>
            <tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Data de nascimento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            </thead>
            ";
            $clientView .= "<tbody>";
            foreach ($clients as $key => $client) {
                $birthdayData = date("d/m/Y", $client->birthday);
                $clientView .=
                    '
                    <tr>
                        <td>'.$client->id.'</td>
                        <td>'.$client->name.'</td>
                        <td>'.$client->rg.'</td>
                        <td>'.$client->cpf.'</td>
                        <td>'.$client->email.'</td>
                        <td>'.$client->cellphone.'</td>
                        <td>'.$client->address.'</td>
                        <td>'.$client->number.'</td>
                        <td>'.$birthdayData.'</td>
                        <td>'.$client->status.'</td>
                        <td><a href="'.route('clients.show', ['client' => $client->id]).'">Detalhes</a></td>
                    </tr>
                    ';
            }
            $clientView .= "</tbody>";
            $clientView .= "</table>";
            $clientView .= "</div>";
        }

        return view("clients.list", ["view" => $clientView]);
    }

    public function show($id){
        $clients = DB::table("clients")
            ->where("id", $id)
            ->first();

        if(!$clients){
            return view("clients.show", ["error" => true]);
        }

        return view("clients.show", ["clients" => $clients]);
    }

    public function historic($id){
        $products = DB::table('products')
        ->where('client', $id)
        ->orderBy('created_at', 'asc')
        ->get();

        $clientView = '';

        if(count($products) > 0){
            $clientView .= "<div style='overflow-x:auto;'>";
            $clientView .= "<table style='width: 100%; '>";
            $clientView .= "
            <thead>
            <tr>
                <th>Nº</th>
                <th>Cômodo da casa</th>
                <th>Itens do pedido</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Método de pagamento</th>
                <th>Parcelas</th>
                <th>Data de entrega</th>
                <th>Status</th>
            </tr>
            </thead>
            ";
            $clientView .= "<tbody>";
            foreach ($products as $key => $product) {
                $expirationData = date("d/m/Y", $product->expiration);
                $clientView .=
                    '
                    <tr>
                        <td>'.$product->id.'</td>
                        <td>'.$product->room.'</td>
                        <td>'.$product->itens.'</td>
                        <td>'.$product->description.'</td>
                        <td>R$'.$product->value.'</td>
                        <td>'.$product->method.'</td>
                        <td>'.$product->installments.'</td>
                        <td>'.$expirationData.'</td>
                        <td>'.$product->status.'</td>
                    </tr>
                    ';
            }
            $clientView .= "</tbody>";
            $clientView .= "</table>";
            $clientView .= "</div>";
        }

        return view("clients.historic", ["clients" => $clientView]);
    }

    public function insert(Request $r){
        $birthday = strtotime($r->birthday);

        $client = Client::create([
            'type' => $r->type,
            'name' => $r->name,
            'rg' => $r->rg,
            'cpf' => $r->cpf,
            'birthday' => $birthday,
            'email' => $r->email,
            'cellphone' => $r->cellphone,
            'address' => $r->address,
            'number' => $r->number,
            'cep' => $r->cep,
            'status' => 'Ativo'
        ]);

        if($client){
            return view('clients.index', ["created" => true]);
        }

        return view('clients.store', ["error" => true]);
    }

    public function update($id, Request $r){
        $birthday = strtotime($r->birthday);

        $client = Client::find($id);
        $client->update([
            'type' => $r->type,
            'name' => $r->name,
            'rg' => $r->rg,
            'cpf' => $r->cpf,
            'birthday' => $birthday,
            'email' => $r->email,
            'cellphone' => $r->cellphone,
            'address' => $r->address,
            'number' => $r->number,
            'cep' => $r->cep,
            'status' => $r->status
        ]);

        $save = $client->save();
        if($save){
            return view('clients.index', ["updated" => true]);
        }

        return view("clients.list", ["error" => true]);
    }
}
