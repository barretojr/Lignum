<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
}
