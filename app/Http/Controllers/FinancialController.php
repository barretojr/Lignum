<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialController extends Controller{

    public function index(){
        return view('financial.index');
    }
    public function payable(){
        return view('financial.payable');
    }
    public function receivable(){
        return view('financial.receivable');
    }
    
}