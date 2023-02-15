<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Tokoku\Product;
use App\Tokoku\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengunjungController extends Controller
{
    public function index()
    {
        $transaction_product_ids = Transaction::select('product_id')->distinct()->pluck('product_id')->toArray();

        $data['products'] = Product::whereIn('id', $transaction_product_ids)->paginate(60);

        return view('pengunjung.index', $data);
    }
}
