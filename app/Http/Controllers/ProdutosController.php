<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function produtos() {
        return view('produtos');
    }

    public function product($id) {
        return view('product',['id' => $id]);
    }
}
