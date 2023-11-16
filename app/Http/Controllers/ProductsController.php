<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function store(){
        $clients = DB::table('clients')
            ->orderBy('name', 'asc')
            ->get();

        $items = DB::table('items')
            ->orderBy('type', 'asc')
            ->get();

        if(count($clients) > 0){
            if(count($items) > 0){
                return view('products.store', ["clients" => $clients, "items" => $items]);
            }
            return view('products.store', ["clients" => $clients, "items" => false]);
        }
        else{
            if(count($items) > 0){
                return view('products.store', ["clients" => false, "items" => $items]);
            }
        }

        return view('products.store', ["clients" => false, "items" => false]);
    }

    public function list(){
        $products = DB::table('products')
            ->orderBy('created_at', 'asc')
            ->get();

        if(count($products) > 0){
            $productView = "";
            foreach ($products as $key => $product) {
                $formatedData = date('d/m/Y', $product->expiration);
                $productView .=
                    '
                    <div class="product-item">
                        <div class="product-info">
                            <h3>Nº  '.$product->id.'</h3>
                            <p>Data de entrega</p>
                            <p>'.$formatedData.'</p>
                        </div>
                        <div class="details">
                            <a href="'.route('products.show', ['product' => $product->id]).'">Detalhes</a>
                        </div>
                    </div>
                    ';
            }
        }
        else{
            $productView = false;
        }

        return view("products.list", ["view" => $productView]);
    }

    public function show($id){
        $products = DB::table("products")
            ->where("id", $id)
            ->first();

        $clients = DB::table('clients')
            ->where("id", $products->client)
            ->orderBy('created_at', 'asc')
            ->first();

        if(!$products){
            return view("products.show", ["error" => true]);
        }

        return view("products.show", ["products" => $products, "clients" => $clients]);
    }

    public function insert(Request $r){
        $expiration = strtotime($r->expiration);

        if(!$r->itens){
            $r->itens = "";
        }

        $product = Product::create([
            'client' => $r->client,
            'product' => $r->product,
            'room' => $r->room,
            'itens' => $r->itens,
            'description' => $r->description,
            'value' => $r->value,
            'method' => $r->method,
            'installments' => $r->installments,
            'expiration' => $expiration,
            'status' => 'active'
        ]);

        if($product){
            return view('products.index', ["created" => true]);
        }

        return view('products.store', ["error" => true]);
    }

    public function update($id, Request $r){
        $expiration = strtotime($r->expiration);

        if(!$r->itens){
            $r->itens = "";
        }

        $product = Product::find($id);
        $product->update([
            'room' => $r->room,
            'itens' => $r->itens,
            'description' => $r->description,
            'value' => $r->value,
            'method' => $r->method,
            'installments' => $r->installments,
            'expiration' => $expiration,
            'status' => $r->status
        ]);

        $save = $product->save();
        if($save){
            return view('products.index', ["updated" => true]);
        }

        return view("products.list", ["error" => true]);
    }
}
