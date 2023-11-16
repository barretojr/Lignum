<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnersController extends Controller
{
    public function store(){
        return view('partners.store');
    }

    public function list(){
        $partners = DB::table('partners')
            ->orderBy('created_at', 'asc')
            ->get();

        if(count($partners) > 0){
            $clientView = '';
            $clientView .= "<div style='overflow-x:auto;'>";
            $clientView .= "<table style='width: 100%; '>";
            $clientView .= "
            <thead>
            <tr>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>CEP</th>
                <th>Ações</th>
            </tr>
            </thead>
            ";
            $clientView .= "<tbody>";
            foreach ($partners as $key => $partner) {
                $clientView .=
                    '
                    <tr>
                        <td>'.$partner->name.'</td>
                        <td>'.$partner->cnpj.'</td>
                        <td>'.$partner->email.'</td>
                        <td>'.$partner->cellphone.'</td>
                        <td>'.$partner->address.'</td>
                        <td>'.$partner->number.'</td>
                        <td>'.$partner->complement.'</td>
                        <td>'.$partner->cep.'</td>
                        <td><a href="'.route('partners.show', ['partner' => $partner->id]).'">Detalhes</a></td>
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

        return view("partners.list", ["view" => $clientView]);
    }

    public function insert(Request $r){
        $partner = Partner::create([
            'name' => $r->name,
            'cnpj' => $r->cnpj,
            'email' => $r->email,
            'cellphone' => $r->cellphone,
            'address' => $r->address,
            'number' => $r->number,
            'complement' => $r->complement,
            'cep' => $r->cep
        ]);

        if($partner){
            return view('stock.index', ["created" => true]);
        }

        return view('partners.store', ["error" => true]);
    }

    public function update($id, Request $r){
        $partner = Partner::find($id);
        $partner->update([
            'name' => $r->name,
            'cnpj' => $r->cnpj,
            'email' => $r->email,
            'cellphone' => $r->cellphone,
            'address' => $r->address,
            'number' => $r->number,
            'complement' => $r->complement,
            'cep' => $r->cep
        ]);

        $save = $partner->save();
        if($save){
            return view('stock.index', ["updated" => true]);
        }

        return view("partners.list", ["error" => true]);
    }

    public function show($id){
        $partners = DB::table("partners")
            ->where("id", $id)
            ->first();

        if(!$partners){
            return view("partners.show", ["error" => true]);
        }

        return view("partners.show", ["partners" => $partners]);
    }
}
