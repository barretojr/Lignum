<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function store(){
        $partners = DB::table('partners')
            ->orderBy('name', 'asc')
            ->get();

        if(count($partners) > 0){
            return view('items.store', ["partners" => $partners]);
        }

        return view('items.store', ["partners" => false]);
    }

    public function list(){
        $items = DB::table('items')
            ->orderBy('created_at', 'asc')
            ->get();

        if(count($items) > 0){
            $clientView = '';
            $clientView .= "<div style='overflow-x:auto;'>";
            $clientView .= "<table style='width: 100%; '>";
            $clientView .= "
            <thead>
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Unidade de medida</th>
                <th>Fornecedor</th>
                <th>Quantidade</th>
                <th>Data da criação</th>
                <th>Ações</th>
            </tr>
            </thead>
            ";
            $clientView .= "<tbody>";
            foreach ($items as $key => $item) {
                $clientView .=
                    '
                    <tr>
                        <td>'.$item->description.'</td>
                        <td>'.$item->type.'</td>
                        <td>'.$item->unity.'</td>
                        <td>'.$item->partner.'</td>
                        <td>'.$item->quantity.'</td>
                        <td>'.$item->created_at.'</td>
                        <td><a href="'.route('items.show', ['item' => $item->id]).'">Detalhes</a></td>
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

        return view("items.list", ["view" => $clientView]);
    }

    public function insert(Request $r){
        $item = Item::create([
            'description' => $r->description,
            'type' => $r->type,
            'unity' => $r->unity,
            'partner' => $r->partner,
            'quantity' => $r->quantity
        ]);

        if($item){
            return view('stock.index', ["created" => true]);
        }

        return view('items.store', ["error" => true]);
    }

    public function update($id, Request $r){
        $item = Item::find($id);
        $item->update([
            'description' => $r->description,
            'type' => $r->type,
            'unity' => $r->unity,
            'partner' => $r->partner,
            'quantity' => $r->quantity
        ]);

        $save = $item->save();
        if($save){
            return view('stock.index', ["updated" => true]);
        }

        return view("items.list", ["error" => true]);
    }

    public function show($id){
        $items = DB::table("items")
            ->where("id", $id)
            ->first();

        $partners = DB::table('partners')
            ->where("id", $items->partner)
            ->orderBy('created_at', 'asc')
            ->first();
            
        if(!$items){
            return view("items.show", ["error" => true]);
        }

        return view("items.show", ["items" => $items, "partners" => $partners]);
    }
}
